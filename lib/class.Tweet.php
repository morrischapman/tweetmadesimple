<?php

    /*
     * Relation class
     *
     * This class allow management of a Tweet object
     *
     *
     * Copyrights: Morris & Chapman Belgium - Jean-Christophe Cuvelier - 2009
     *
     */

    class Tweet
    {

        var $id;
        var $created_at;

        var $text;
        var $source;
        var $author_name;
        var $picture;

        var $xml;
        var $object;

        public function getWhen()
        {
            return self::distance_of_time_in_words(strtotime($this->created_at)) . ' ago';
        }

        public function getText()
        {
            $text = $this->text;

            if ((strpos($text, 'http') !== false) || (strpos($text, '@') !== false) || (strpos($text, '#') !== false)) {
                $words = array_unique(explode(' ', $this->text));
                foreach ($words as $word) {
                    if (strpos($word, 'http') !== false) {
                        $text = str_replace($word, '<a href="' . $word . '" target="_new">' . $word . '</a>', $text);
                    }

                    if (strpos($word, '@') === 0) {
                        $link = str_replace('@', '', $word);
                        $link = str_replace(':', '', $link);

                        $text = str_replace($word, '@<a href="http://twitter.com/' . $link . '" target="_new">' . str_replace('@', '', $word) . '</a>', $text);
                    }

                    if (strpos($word, '#') === 0) {
                        $text = str_replace($word, '<a href="http://twitter.com/search?q=' . rawurlencode($word) . '" target="_new">' . $word . '</a>', $text);
                    }

                }
            }

            return $text;
        }

        public static function shortenUrls($message)
        {
            $words = array_unique(explode(' ', $message));

            $new_words = array();

            foreach ($words as $word) {
                if (strpos($word, 'http') !== false) {
                    //$text = str_replace($word, '<a href="' . $word . '" target="_new">' . $word . '</a>', $text);
                    $new_words[] = self::shortenUrl($word);
                } else {
                    $new_words[] = $word;
                }
            }

            return implode(' ', $new_words);
        }

        public static function shortenUrl($url, $service = 'bitly')
        {
            switch ($service) {
                case 'bitly':
                    return self::shortenUrlBitLy($url);
                default:
                    return self::shortenUrlBitLy($url);
            }
        }

        public static function shortenUrlBitLy($url)
        {
            // Made with bit.ly (for the moment, totophe account: api key: R_c5b04743731e86abe31da494f40d4cb4)

            $main_url = 'http://api.bit.ly/shorten';

            $params = array(
                'version' => '2.0.1',
                'format'  => 'xml',
                'login'   => 'totophe',
                'apiKey'  => 'R_c5b04743731e86abe31da494f40d4cb4',
                'longUrl' => $url,
            );
            //var_dump($params);

            $xml = simplexml_load_string(file_get_contents($main_url . '?' . http_build_query($params)));

            if ($xml->statusCode == 'OK' && !isset($xml->results->nodeKeyVal->statusCode)) {
                //var_dump($xml->results->nodeKeyVal);
                return $xml->results->nodeKeyVal->shortUrl;
            } else {
                return $url;
            }
        }

        public static function createFromObject(stdClass $object)
        {

            $tweet  =   new self();
            $tweet->id = $object->id;
            $tweet->created_at = $object->created_at;
            $tweet->text = $object->text;
            $tweet->source = $object->source;
            $tweet->author_name = $object->user->screen_name;
            $tweet->picture = $object->user->profile_image_url;

            $tweet->object = $object;

            return $tweet;
        }

        public static function createFromXml($xml)
        {
            $tweet      = new self;
            $tweet->xml = $xml;

            $content = simplexml_load_string($tweet->xml);

            //echo '<pre>'; var_dump($content); echo '</pre>';

            $datas['created_at']  = $content->created_at;
            $datas['id']          = number_format($content->id, 0, '.', '');
            $datas['text']        = $content->text;
            $datas['source']      = $content->source;
            $datas['author_name'] = $content->user->screen_name;
            $datas['picture']     = $content->user->profile_image_url;

            $tweet->populate($datas);

            //echo '<pre>'; var_dump($tweet); echo '</pre>';

            return $tweet;
        }

        public static function createFromJson($json)
        {
            $tweet                = new self;
            $tweet->xml           = $json;
            $datas['created_at']  = $json['created_at'];
            $datas['id']          = number_format($json['id'], 0, '.', '');
            $datas['text']        = $json['text'];
            $datas['source']      = $json['source'];
            $datas['author_name'] = $json['user']['screen_name'];
            $datas['picture']     = $json['user']['profile_image_url'];
            $tweet->populate($datas);


            //$tweet->picture = $json
            return $tweet;
        }

        public static function createFromJsonSearch($json)
        {
            $tweet      = new self;
            $tweet->xml = $json;
            //var_dump($json);
            $datas['created_at']  = $json['created_at'];
            $datas['id']          = number_format($json['id'], 0, '.', '');
            $datas['text']        = $json['text'];
            $datas['source']      = html_entity_decode($json['source']);
            $datas['author_name'] = $json['from_user'];
            //$datas['picture'] =  $json['user']['profile_image_url'];
            $datas['picture'] = $json['profile_image_url'];
            $tweet->populate($datas);


            //$tweet->picture = $json
            return $tweet;
        }


        public function populate($datas)
        {
            $this->created_at  = $datas['created_at'];
            $this->id          = $datas['id'];
            $this->text        = $datas['text'];
            $this->source      = $datas['source'];
            $this->author_name = $datas['author_name'];
            $this->picture     = $datas['picture'];
        }


        public static function parseTimeline($entries)
        {
            $timeline = array();

            foreach ($entries as $entry) {
                if(is_object($entry))
                {
                    $timeline[] = self::createFromObject($entry);
                }
                else
                {
                    // TODO: FIX THIS ISSUE... Here I cannot do a ->asXML because it's not an object....
//                    $timeline[] = self::createFromXml($entry->asXml());
                }
            }

            return $timeline;
        }

        /**
         * @param $timeline_xml
         *
         * @return array
         *
         * @deprecated
         */

        public static function parseTimelineFromXml($timeline_xml)
        {
            $timeline = array();

            foreach ($timeline_xml as $status) {
                $timeline[] = self::createFromXml($status->asXml());
            }

            return $timeline;
        }

        public static function parseTimelineFromJson($timeline_xml)
        {
            $timeline = array();
            if (isset($timeline_xml->results)) {
                $list = $timeline_xml->results;
            } else {
                $list = $timeline_xml;
            }

            if (is_array($list)) {
                foreach ($list as $status) {
                    $timeline[] = self::createFromJson($status);
                }
            }

            return $timeline;
        }

        public static function parseSearchFromJson($timeline_xml)
        {
            $timeline_xml = json_decode($timeline_xml, 1);
            //var_dump($timeline_xml);
            $timeline = array();
            if (isset($timeline_xml['results'])) {
                $list = $timeline_xml['results'];
            } else {
                $list = $timeline_xml;
            }


            foreach ($list as $status) {
                $timeline[] = self::createFromJsonSearch($status);
            }

            return $timeline;
        }

        public static function distance_of_time_in_words($from_time, $to_time = NULL, $include_seconds = false)
        {
            $to_time = $to_time ? $to_time : time();

            $distance_in_minutes = floor(abs($to_time - $from_time) / 60);
            $distance_in_seconds = floor(abs($to_time - $from_time));

            $string     = '';
            $parameters = array();

            if ($distance_in_minutes <= 1) {
                if (!$include_seconds) {
                    $string = $distance_in_minutes == 0 ? 'less than a minute' : '1 minute';
                } else {
                    if ($distance_in_seconds <= 5) {
                        $string = 'less than 5 seconds';
                    } else if ($distance_in_seconds >= 6 && $distance_in_seconds <= 10) {
                        $string = 'less than 10 seconds';
                    } else if ($distance_in_seconds >= 11 && $distance_in_seconds <= 20) {
                        $string = 'less than 20 seconds';
                    } else if ($distance_in_seconds >= 21 && $distance_in_seconds <= 40) {
                        $string = 'half a minute';
                    } else if ($distance_in_seconds >= 41 && $distance_in_seconds <= 59) {
                        $string = 'less than a minute';
                    } else {
                        $string = '1 minute';
                    }
                }
            } else if ($distance_in_minutes >= 2 && $distance_in_minutes <= 44) {
                $string                  = '%minutes% minutes';
                $parameters['%minutes%'] = $distance_in_minutes;
            } else if ($distance_in_minutes >= 45 && $distance_in_minutes <= 89) {
                $string = 'about 1 hour';
            } else if ($distance_in_minutes >= 90 && $distance_in_minutes <= 1439) {
                $string                = 'about %hours% hours';
                $parameters['%hours%'] = round($distance_in_minutes / 60);
            } else if ($distance_in_minutes >= 1440 && $distance_in_minutes <= 2879) {
                $string = '1 day';
            } else if ($distance_in_minutes >= 2880 && $distance_in_minutes <= 43199) {
                $string               = '%days% days';
                $parameters['%days%'] = round($distance_in_minutes / 1440);
            } else if ($distance_in_minutes >= 43200 && $distance_in_minutes <= 86399) {
                $string = 'about 1 month';
            } else if ($distance_in_minutes >= 86400 && $distance_in_minutes <= 525959) {
                $string                 = '%months% months';
                $parameters['%months%'] = round($distance_in_minutes / 43200);
            } else if ($distance_in_minutes >= 525960 && $distance_in_minutes <= 1051919) {
                $string = 'about 1 year';
            } else {
                $string                = 'over %years% years';
                $parameters['%years%'] = floor($distance_in_minutes / 525960);
            }

            return strtr($string, $parameters);

        }

        public static function getCurl($url, $credentials = NULL, $data = array(), $method = 'POST')
        {
            // create a new cURL resource
            $ch = curl_init();

            if (count($data) != 0) {
                $url .= '?' . http_build_query($data);
            }

            // set URL and other appropriate options
            curl_setopt($ch, CURLOPT_URL, $url);

            if ($credentials) {
                curl_setopt($ch, CURLOPT_USERPWD, '' . $credentials['login'] . ':' . $credentials['password'] . '');
            }

            if ($method == 'POST') {
                curl_setopt($ch, CURLOPT_POST, 1);
            }

            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));

            /*
            /*
            if (count($data) != 0)
            {
             curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            }
            */

            // grab URL and pass it to the browser
            $output = curl_exec($ch);

            // close cURL resource, and free up system resources
            curl_close($ch);

            return $output;
        }

        /**
         * doSearch performs a search query
         *
         * @param $query  The query string, limited to 140 chars
         * @param $params Parameters for the query
         *
         * @return simplexml
         * @deprecated
         */
        public static function doSearch($query, $params = array())
        {
            $url = 'http://search.twitter.com/search.atom';

            if (strpos($query, 'OR') !== false) {
                $query         = str_replace('OR', ' ', str_replace(' ', '', $query));
                $params['ors'] = $query;
            } else {
                $params['q'] = str_replace(' ', '', $query);
            }

            return simplexml_load_string(Tweet::getCurl($url, NULL, $params, 'GET'));
        }

        /**
         * @deprecated
         */
        public static function doJsonSearch($query, $params = array())
        {
            $url = 'https://api.twitter.com/1.1/search/tweets.json';

            if (strpos($query, 'OR') !== false) {
                $query         = str_replace('OR', ' ', str_replace(' ', '', $query));
                $params['ors'] = $query;
            } else {
                $params['q'] = str_replace(' ', '', $query);
            }

            return (Tweet::getCurl($url, NULL, $params, 'GET'));
        }

        public static function parseSearch($results, $limit = NULL)
        {
            $entries = array();
            foreach ($results->entry as $entry) {
                $tweet      = new self;
                $tweet->xml = $entry;


                $datas['created_at']  = $entry->published;
                $datas['id']          = $entry->id;
                $datas['text']        = $entry->title;
                $datas['source']      = $entry->source;
                $datas['author_name'] = $entry->user->screen_name;
                //$datas['author_uri'] =  $entry->author->uri;
                $datas['picture'] = '';

                foreach ($entry->link as $info) {
                    if ($info->attributes()->rel == 'image') {
                        $datas['picture'] = $info->attributes()->href;
                    }
                }

                $tweet->populate($datas);

                $entries[] = $tweet;
            }

            return $entries;
        }
    }