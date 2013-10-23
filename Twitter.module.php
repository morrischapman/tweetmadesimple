<?php
    #-------------------------------------------------------------------------
    # Module: Twitter - This module allow you to manage your Twitter from CMSMS. Both send and receive functions are available.
    # Version: 0.0.1, Jean-Christophe Cuvelier
    #
    #-------------------------------------------------------------------------
    # CMS - CMS Made Simple is (c) 2009 by Ted Kulp (wishy@cmsmadesimple.org)
    # This project's homepage is: http://www.cmsmadesimple.org
    #
    # This file originally created by ModuleMaker module, version 0.3.1
    # Copyright (c) 2009 by Samuel Goldstein (sjg@cmsmadesimple.org)
    #
    #-------------------------------------------------------------------------
    #
    # This program is free software; you can redistribute it and/or modify
    # it under the terms of the GNU General Public License as published by
    # the Free Software Foundation; either version 2 of the License, or
    # (at your option) any later version.
    #
    # This program is distributed in the hope that it will be useful,
    # but WITHOUT ANY WARRANTY; without even the implied warranty of
    # MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    # GNU General Public License for more details.
    # You should have received a copy of the GNU General Public License
    # along with this program; if not, write to the Free Software
    # Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
    # Or read it online: http://www.gnu.org/licenses/licenses.html#GPL
    #
    #-------------------------------------------------------------------------

    #-------------------------------------------------------------------------
    # For Help building modules:
    # - Read the Documentation as it becomes available at
    #   http://dev.cmsmadesimple.org/
    # - Check out the Skeleton Module for a commented example
    # - Look at other modules, and learn from the source
    # - Check out the forums at http://forums.cmsmadesimple.org
    # - Chat with developers on the #cms IRC channel
    #-------------------------------------------------------------------------

    class Twitter extends CMSModule
    {
        const CONSUMER_KEY = '0stQXgmu4dyd6Ky3CD2tw'; // TweetMadeSimple Consumer Key
        const CONSUMER_SECRET = 'fyi24SUw4ZI7J3Oj4uUSbl3WVABzxsdKetvh92v8jg'; // TweetMadeSimple Consumer Secret
        const USER_AGENT = 'TweetMadeSimple (http://dev.cmsmadesimple.org/projects/twitter)';

        var $twitterObj;
        var $twitterInfo;

        function GetName()
        {
            return 'Twitter';
        }

        function GetFriendlyName()
        {
            return $this->Lang('friendlyname');
        }

        function GetVersion()
        {
            return '2.0.2';
        }

        function GetHelp()
        {
            return $this->Lang('help');
        }

        function GetAuthor()
        {
            return 'Jean-Christophe Cuvelier';
        }

        function GetAuthorEmail()
        {
            return 'jcc@atomseeds.com';
        }

        function GetChangeLog()
        {
            return $this->Lang('changelog');
        }

        function IsPluginModule()
        {
            return true;
        }

        function HasAdmin()
        {
            return true;
        }

        function GetAdminSection()
        {
            return 'content';
        }

        function GetAdminDescription()
        {
            return $this->Lang('admindescription');
        }

        function VisibleToAdminUser()
        {
            return $this->CheckAccess();
        }

        function CheckAccess($perm = 'Manage Twitter')
        {
            return $this->CheckPermission($perm);
        }

        public function AllowSmartyCaching()
        {
            return true;
        }

        public function LazyLoadFrontend()
        {
            return true;
        }

        public function SetParameters()
        {
            if (!isset($this->initialized)) {
                $this->initialized = true;
                $this->InitializeAdmin();
                $this->InitializeFrontend();
            }
        }

        function InitializeFrontend()
        {
            $this->RegisterModulePlugin();


        }

        function GetDependencies()
        {
            return array('CMSForms' => '1.10.9');
        }

        function DisplayErrorPage($id, &$params, $return_id, $message = '')
        {
            $this->smarty->assign('title_error', $this->Lang('error'));
            $this->smarty->assign_by_ref('message', $message);

            // Display the populated template
            echo $this->ProcessTemplate('error.tpl');
        }

        function MinimumCMSVersion()
        {
            return "1.11";
        }

        function InstallPostMessage()
        {
            return $this->Lang('postinstall');
        }

        function UninstallPostMessage()
        {
            return $this->Lang('postuninstall');
        }

        function UninstallPreMessage()
        {
            return $this->Lang('really_uninstall');
        }

        // MODULE LOGIC

        public function getAuthorizationUrl($id)
        {
            $connection = new TwitterOAuth(self::CONSUMER_KEY, self::CONSUMER_SECRET);
            $connection->useragent = self::USER_AGENT;

            $temporary_credentials = $connection->getRequestToken(html_entity_decode($this->CreateLink($id, 'oauth', '', '', array(), '', true)));
            $redirect_url = $connection->getAuthorizeURL($temporary_credentials, FALSE);

            return $redirect_url;
        }

        public function getConnection()
        {
            if(($token = $this->GetPreference('oauth_token')) && ($token_secret =  $this->GetPreference('oauth_token_secret')))
            {
                $connection = new TwitterOAuth(Twitter::CONSUMER_KEY, Twitter::CONSUMER_SECRET, $token, $token_secret);
                $connection->useragent = self::USER_AGENT;

                return $connection;
            }
            else
            {
                $connection = new TwitterOAuth(self::CONSUMER_KEY, self::CONSUMER_SECRET);
                $connection->useragent = self::USER_AGENT;

                return $connection;
            }
        }

        /**
         * @param string $type
         * @param array  $params
         *
         * @return API|mixed
         *
         */
        public function getTimeline($type = 'public', $params = array())
        {
            switch ($type) {
                case 'friends':
                    return $this->getFriendsTimeline();

                case 'public':
                    return $this->getPublicTimeline($params);

                case 'user':
                    return $this->getUserTimeline($params);
            }

        }

        /**
         * @return API|mixed
         */

        public  function getFriendsTimeline()
        {
            $connection = $this->getConnection();
//            $connection->decode_json = true;
            return $connection->get('/statuses/friends_timeline');
        }

        public  function getPublicTimeline($params)
        {
            $tparams = array();

            if (isset($params['user_id'])) {
                $tparams['user_id'] = $params['user_id'];
            } elseif (isset($params['screen_name'])) {
                $tparams['screen_name'] = $params['screen_name'];
            }

            $connection = $this->getConnection();
            return $connection->get('/statuses/public_timeline', $tparams);
        }

        public  function getUserTimeline($params = array())
        {
            $tparams = array();

            if (isset($params['user_id'])) {
                $tparams['user_id'] = $params['user_id'];
            } elseif (isset($params['screen_name'])) {
                $tparams['screen_name'] = $params['screen_name'];
            }

            $connection = $this->getConnection();

            return $connection->get('/statuses/user_timeline', $tparams);
        }

        public function updateStatus($message, $shorten = true)
        {
            if ($shorten) {
//TODO                $message = Tweet::shortenUrls($message);
            }

            if ($message != '' && strlen($message) < 140) {
                $connection = $this->getConnection();
                return $connection->post('/statuses/update', array('status' => $message));
            } else {
                return false;
            }
        }

        /**
         * This function return the right template resource regarding default and override parameters
         *
         * @param string $template The default template name
         * @param array  $params   The action parameters (to catch the params['template'])
         *
         * @return null|string
         */

        public function getTemplateResource($template, $params)
        {
            if (isset($params['template'])) {
                $template = trim($params['template']);
            }

            if ($this->GetTemplate($template) != '') {
                return $this->GetDatabaseResource($template);
            }

            if ($resource = $this->GetDefaultTemplate($template)) {
                return $this->GetDatabaseResource($resource);
            }

            if (is_file($this->GetModulePath() . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'frontend.' . $template . '.tpl')) {
                return $this->GetFileResource('frontend.' . $template . '.tpl');
            }

            return NULL;
        }


        /**
         * @param $params   The params given for the action
         * @param $returnid The global returnid
         */

        public function getDetailPage($params, $returnid)
        {
            if (isset($params['detailpage'])) {
                $manager = cmsms()->GetHierarchyManager();

                if ($node = $manager->sureGetNodeByAlias($params['detailpage'])) {
                    $returnid = $node->getID();
                } elseif ($node = $manager->sureGetNodeById($params['detailpage'])) {
                    $returnid = $node->getID();
                }
            }

            return $returnid;
        }

        /**
         * Get the list of the default templates
         * @return array
         */

        public function GetDefaultTemplates()
        {
            $array = unserialize($this->GetPreference('default_templates'));
            if (is_array($array)) {
                return $array;
            }

            return array();
        }

        /**
         * Get the default template for an action
         *
         * @param string $action The action who have a default template
         *
         * @return string|bool
         */

        public function GetDefaultTemplate($action)
        {


            $list = $this->GetDefaultTemplates();
            if (!is_array($list)) $list = array();
            if (array_key_exists($action, $list)) {
                return $list[$action];
            } else {
                return false;
            }
        }


        // REFACTOR
        // Twitter functions

        /**
         * @return EpiTwitter
         * @deprecated use getConnection
         */

        public function getTwitterObj()
        {
            if (!empty($this->twitterObj)) {
                return $this->twitterObj;
            } else {
                $token  = $this->GetPreference('oauth_token');
                $secret = $this->GetPreference('oauth_token_secret');

                try {
                    $this->twitterObj = new EpiTwitter(Twitter::CONSUMER_KEY, Twitter::CONSUMER_SECRET, $token, $secret);

                    return $this->twitterObj;
                } catch (EpiTwitterException $e) {
                    echo 'We caught an EpiOAuthException';
                    echo $e->getMessage();
                    exit;
                } catch (Exception $e) {
                    echo 'We caught an unexpected Exception';
                    echo $e->getMessage();
                    exit;
                }
            }
        }


        public function getContent($url)
        {
            $config  = $this->getConfig();
            $timeout = $this->GetPreference('timeout');
            $file    = $config['previews_path'] . '/Twitter_' . base64_encode($url) . '.tmp';
            if (is_file($file)) {
                if (filemtime($file) > (time() - $timeout)) {
                    // Cache is fresh, return cache
                    return @file_get_contents($file);
                }
            }
            // Cache is not fresh or unexistant, create it.
            $content = @file_get_contents($url);
            @file_put_contents($file, $content);

            return $content;
        }

        public function getCache($key)
        {
            $config  = $this->getConfig();
            $timeout = $this->GetPreference('timeout');
            $file    = $config['previews_path'] . '/Twitter_' . base64_encode($url) . '.tmp';
            if (is_file($file)) {
                if (filemtime($file) > (time() - $timeout)) {
                    // Cache is fresh, return cache
                    $content = @file_get_contents($file);

                    return unserialize($content);
                }
            }

            return false;
        }

        public function setCache($key, $content)
        {
            $config = $this->getConfig();
            $file   = $config['previews_path'] . '/Twitter_' . base64_encode($key) . '.tmp';
            @file_put_contents($file, serialize($content));
        }

        /**
         * This function send a message to twitter with Twitter account
         *
         * @param string  $message The 140 chars message to be sent
         * @param boolean $shorten Tell if the urls has to be shortened (true by default)
         *
         * @return boolean
         */


        public function shortenUrls($message)
        {
            return Tweet::shortenUrls($message);
        }

        public function shortenUrl($url)
        {
            return Tweet::shortenUrl($url);
        }

        function getCurl($url, $with_credential = false, $data = array(), $method = 'POST')
        {
            if ($with_credential) {
                return Tweet::getCurl($url, array('login' => $this->GetPreference('login'), 'password' => $this->GetPreference('password')), $data, $method);
            } else {
                return Tweet::getCurl($url, NULL, $data, $method);
            }
        }

        function createSendLink($id, $returnid, $params)
        {
            return $this->CreateLink(
                $id, 'send', $returnid,
                $this->getIcon('twitter_icon.gif', $this->lang('send_via_twitter')),
                array('status' => html_entity_decode($params['status']))
            );
        }

        function getIcon($icon, $alt = NULL)
        {
            $config     =& $this->getConfig();
            $image_path = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'icons' . DIRECTORY_SEPARATOR . $icon;
            $image_url  = $config['root_url'] . '/modules/Twitter/images/icons/' . $icon;
            if (is_file($image_path)) {
                $img = '<img src="' . $image_url . '"';
                if (!is_null($alt)) {
                    $img .= ' alt="' . $alt . '" title="' . $alt . '"';
                }
                $img .= ' />';

                return $img;
            }

            return NULL;
        }
    }

?>
