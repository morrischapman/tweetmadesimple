<?php
    if (!cmsms()) exit;

    if (!$this->CheckAccess()) {
        return $this->DisplayErrorPage($id, $params, $returnid, $this->Lang('accessdenied'));
    }

    /* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

       Code for Twitter "defaultadmin" admin action

       -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

       Typically, this will display something from a template
       or do some other task.

    */

//echo $this->CreateLink($id, 'unsign', $returnid, 'Unsign');

    if (!function_exists('curl_init')) {
        echo $this->lang('require_curl');

        return;
    }

    $this->smarty->assign('tab_headers', $this->StartTabHeaders() .
        $this->SetTabHeader('twitter', $this->Lang('title_twitter')) .
        $this->SetTabHeader('templates', $this->Lang('title_templates')) .
        $this->SetTabHeader('options', $this->Lang('title_options')) .
        $this->EndTabHeaders() . $this->StartTabContent());
    $this->smarty->assign('end_tab', $this->EndTab());
    $this->smarty->assign('tab_footers', $this->EndTabContent());
    $this->smarty->assign('start_twitter_tab', $this->StartTab('twitter'));
    $this->smarty->assign('start_templates_tab', $this->StartTab('templates'));
    $this->smarty->assign('start_options_tab', $this->StartTab('options'));
    $this->smarty->assign('title_section', 'defaultadmin');

// Tweets tab
//    $this = new Twitter();

    $token = $this->GetPreference('oauth_token');

    if (!empty($token)) {
        $connection = $this->getConnection();

        $account = $connection->get('account/verify_credentials');

        $this->smarty->assign('twitter_account', $account);
        $this->smarty->assign('twitter_welcome', $this->lang('twitter_welcome', $account->screen_name));
        $this->smarty->assign('profile_picture', $account->profile_image_url);
        $this->smarty->assign('unsign', $this->CreateLink($id, 'unsign', $returnid, $this->lang('unsign_twitter')));
    } else {
        $connection            = new TwitterOAuth(Twitter::CONSUMER_KEY, Twitter::CONSUMER_SECRET);
        $connection->useragent = Twitter::USER_AGENT;

        $temporary_credentials = $connection->getRequestToken(html_entity_decode($this->CreateLink($id, 'oauth', '', '', array(), '', true)));

        $_SESSION['oauth_token']        = $temporary_credentials['oauth_token'];
        $_SESSION['oauth_token_secret'] = $temporary_credentials['oauth_token_secret'];

        $oauth_url = $connection->getAuthorizeURL($temporary_credentials, false);

        $this->smarty->assign('twitter_oauth_authorize', $oauth_url);
        $this->smarty->assign('sign_with_twitter', $this->lang['sign_with_twitter']);
        $config = cms_utils::get_config();
        $this->smarty->assign('sign_with_twitter_img', $config['root_url'] . '/modules/Twitter/images/lighter.png');
    }


// General
    $this->smarty->assign('form_start', $this->CreateFormStart($id, 'defaultadmin', $returnid));
    $this->smarty->assign('form_end', $this->CreateFormEnd());
// Twitter Tab


    if (!empty($token)) {
        $this->smarty->assign('status_title', $this->Lang('status_title'));
        $this->smarty->assign('status', $this->CreateTextArea(false, $id, '', 'status', '', '', '', '', '70', '3', '', '', 'style="height: auto; width: auto;"'));
        $this->smarty->assign('update', $this->CreateInputSubmit($id, 'update', $this->Lang('update')));

        if (isset($params['status'])) {
            $this->updateStatus($params['status']);
        }

//  $public_timeline = $this->getTimeline('friends');

//  $timeline = Tweet::parseTimelineFromJson($public_timeline);

//        $timeline = array_slice($timeline, 0, 10);

        $this->smarty->assign('timeline', $timeline);
        $this->smarty->assign('timeline_status', $this->ProcessTemplate('frontend.timeline.tpl'));
        $this->smarty->assign('twitter_tab', $this->ProcessTemplate('admin.twitter.tab.tpl'));
    } elseif ($this->GetPreference('twitter_user', false)) {
        $public_timeline = $this->getTimeline('friends');

        $timeline = Tweet::parseTimelineFromJson($public_timeline);

        $timeline = array_slice($timeline, 0, 10);

        $this->smarty->assign('timeline', $timeline);
        $this->smarty->assign('timeline_status', $this->ProcessTemplate('frontend.timeline.tpl'));
        $this->smarty->assign('twitter_tab', $this->ProcessTemplate('admin.twitter.tab.tpl'));
    } else {
        $this->smarty->assign('twitter_tab', '<p>' . $this->Lang('no_twitter_credential_set') . '</p>');
    }

// Templates Tabs
//****************

    $template_list = $this->ListTemplates();

    $rowclass = 'row1';

    $templates = array();

    foreach ($template_list as $template) {
        $onerow = new stdClass();

        $onerow->name       = $template;
        $onerow->deletelink = $this->CreateLink($id, 'deleteTemplate', $returnid, $gCms->variables['admintheme']->DisplayImage('icons/system/delete.gif', $this->Lang('deleteTemplate'), '', '', 'systemicon'), array('template' => $template), $this->Lang('areyousure'));
        $onerow->editlink   = $this->CreateLink($id, 'manageTemplate', $returnid, $gCms->variables['admintheme']->DisplayImage('icons/system/edit.gif', $this->Lang('editTemplate'), '', '', 'systemicon'), array('template' => $template));
        $onerow->rowclass   = $rowclass;
        $templates[]        = $onerow;

        ($rowclass == "row1" ? $rowclass = "row2" : $rowclass = "row1");
    }

    $this->smarty->assign('templates', $templates);
    $this->smarty->assign('title_template', $this->Lang('title_template'));
    $this->smarty->assign('addtemplatelink', $this->CreateLink($id, 'manageTemplate', '', $this->Lang('title_add_template'), array()));
    $this->smarty->assign('addtemplateicon', $this->CreateLink($id, 'manageTemplate', '', $gCms->variables['admintheme']->DisplayImage('icons/system/newobject.gif', $this->Lang('title_add_template'), '', '', 'systemicon'), array()));


// Option Tab
//************
    $this->smarty->assign('options_title', $this->Lang('set_twitter_credential'));

// if (isset($params['twitter_login']) && isset($params['submit_options']))
// {
//  $this->SetPreference('login', $params['twitter_login']);
// }
// 
// $this->smarty->assign('login_title', $this->Lang('login'));
// $this->smarty->assign('login', $this->CreateInputText($id, 'twitter_login', $this->GetPreference('login')));
// 
// if (isset($params['twitter_password']) && isset($params['submit_options']) && $params['twitter_password'] != '')
// {
//  $this->SetPreference('password', $params['twitter_password']);
// }
// 
// $this->smarty->assign('password_title', $this->Lang('password'));
// $this->smarty->assign('password', $this->CreateInputPassword($id, 'twitter_password', '', 60));

    if (isset($params['submit_options'])) {
        if (isset($params['timeout']) && is_numeric($params['timeout']) && $params['timeout'] > 0) {
            $this->SetPreference('timeout', $params['timeout']);
        }

        if (isset($params['proxy'])) {
            $this->SetPreference('proxy', $params['proxy']);
        }

        if (isset($params['twitter_user'])) {
            $this->SetPreference('twitter_user', $params['twitter_user']);
        }
    }

    $this->smarty->assign('timeout_title', $this->Lang('timeout'));
    $this->smarty->assign('timeout', $this->CreateInputText($id, 'timeout', $this->GetPreference('timeout')));
// 
// $this->smarty->assign('proxy_title', $this->Lang('proxy'));
// $this->smarty->assign('proxy', $this->CreateInputText($id, 'proxy', $this->GetPreference('proxy'), 80));

    $this->smarty->assign('twitter_user_title', $this->Lang('twitter_user'));
    $this->smarty->assign('twitter_user_help', $this->Lang('twitter_user_help'));
    $this->smarty->assign('twitter_user', $this->CreateInputText($id, 'twitter_user', $this->GetPreference('twitter_user'), 80));


    $this->smarty->assign('submit_options', $this->CreateInputSubmit($id, 'submit_options', $this->Lang('submit')));
    $this->smarty->assign('cancel', $this->CreateInputSubmit($id, 'cancel', $this->Lang('cancel')));

    $this->smarty->assign('options_tab', $this->ProcessTemplate('admin.options.tab.tpl'));

//echo $this->GetPreference('login') . ' --- ' . $this->GetPreference('password')  . '<br />'; 

    echo $this->ProcessTemplate('adminpanel.tpl');


?>