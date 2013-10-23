<?php
if (!cmsms()) exit;

    $connection = new TwitterOAuth(Twitter::CONSUMER_KEY, Twitter::CONSUMER_SECRET, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
    $connection->useragent = Twitter::USER_AGENT;

    $token_credentials = $connection->getAccessToken($_REQUEST['oauth_verifier']);

//    var_dump($token_credentials);

    if(isset($token_credentials['oauth_token']))
    {
        $this->SetPreference('oauth_token', $token_credentials['oauth_token']);
        $this->SetPreference('oauth_token_secret', $token_credentials['oauth_token_secret']);
    }

    $this->Redirect($id, 'defaultadmin', $returnid, array('active_tab' => 'options'));
