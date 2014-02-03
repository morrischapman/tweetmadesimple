<?php
    if (!cmsms()) exit;

    /** @var Smarty_CMS $smarty */


    $caching = $smarty->caching;
    $smarty->caching = true;

    $global_lifetime = $smarty->cache_lifetime;
    $smarty->setCacheLifetime(900); // 15 mins for tweets

    $cache_id = '|' . $this->GetName() . '_twitter_default_' . md5(serialize($params));
    $compile_id = '';
    $template_resource = $this->getTemplateResource('timeline', $params);




    if(!$smarty->isCached($template_resource,$cache_id,$compile_id))
    {
        if (isset($params['friends'])) {
            die('friends');
            $public_timeline = $this->getTimeline('friends', $params);
        } elseif (isset($params['public'])) {
            die('public');
            $public_timeline = $this->getTimeline('public', $params);
        } else {
            $public_timeline = $this->getTimeline('user', $params);
        }

        $timeline = Tweet::parseTimeline($public_timeline);

        if (isset($params['limit'])) {
            $timeline = array_slice($timeline, 0, $params['limit']);
        }

        $this->smarty->assign('timeline', $timeline);
    }



    echo $smarty->fetch($template_resource,$cache_id,$compile_id);


    $smarty->caching = $caching;
    $smarty->setCacheLifetime($global_lifetime);