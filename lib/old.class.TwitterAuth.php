<?php
/**
  * 
  * Project: Twitter
  * Created on: 16/07/13 14:34
  *
  * Copyright 2013 Atom Seeds - Jean-Christophe Cuvelier <jcc@atomseeds.com> 
  */

class TwitterAuth {

    var $consumer_key;
    var $consumer_secret;

    const USER_AGENT = 'TweetMadeSimple (http://dev.cmsmadesimple.org/projects/twitter)';

    /**
     * @param string $consumer_key Twitter consumer key
     * @param string $consumer_secret Twitter consumer secret
     */

    public function __construct($consumer_key, $consumer_secret) {
        $this->consumer_key = $consumer_key;
        $this->consumer_secret = $consumer_secret;
    }



    private function makeTwitterCall($url, $data, $method = 'GET', $auth = 'app', $auth_params = null)
    {

        $this->bearer = base64_encode(urlencode($key) . ':' . urlencode($secret));

        // TODO: Use Guzzle !
        $ch = curl_init();

        if ('POST' == $method) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        } else {
            $url .= '?' . http_build_query($data);
        }

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        switch ($auth) {
            case 'app':
                $auth = $this->getTwitterAuthorization();

                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    // 'Authorization: Bearer ' . $this->container->parameters['twitter']['app_token']
                    'Authorization: Bearer ' . $auth
                ));
                break;
            default:
                $credential = '';
                break;
        }

        $response = curl_exec($ch);

        if ($response === false) {
            echo 'Curl error: ' . curl_error($ch);
            curl_close($ch);
            return null;
        } else {
            curl_close($ch);
            return json_decode($response);
        }
    }

    private function getTwitterAuthorization()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.twitter.com/oauth2/token');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Pictawall V.1.0');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/x-www-form-urlencoded;charset=UTF-8',
            'Authorization: Basic ' . $this->bearer
        ));

        $response = curl_exec($ch);

        if ($response === false) {
            echo 'Curl error: ' . curl_error($ch);
            return '';
        } else {
            $json = json_decode($response);
            if (isset($json->access_token)) {
                return $json->access_token;
            } else {
                var_dump($json);
            }
        }
    }
}