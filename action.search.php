<?php
if (!cmsms()) { exit; }

/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

   Code for Twitter "default" action

   -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
   
   Typically, this will display something from a template
   or do some other task.
   
*/


if (isset($params['query'])) {
    $search_params = array(
        'q' => $params['query'],
        'result_type' => 'mixed'
    );

    if (isset($params['limit'])) {
        $search_params['count'] = (int)$params['limit'];
    }
    else
    {
        $search_params['count'] = 100;
    }

    $results = $this->doSearch($search_params);

//    var_dump($results);

    var_dump(count($results->statuses));

    $timeline = Tweet::parseTimeline($results->statuses);

    if (isset($params['limit'])) {
        $timeline = array_slice($timeline, 0, $params['limit']);
    }

    $this->smarty->assign('results', $results);
    $this->smarty->assign('timeline', $timeline);

    if (!isset($params['template']) || !$this->GetTemplate($params['template'])) {
        //    echo $this->ProcessTemplateFromDatabase('default');
        echo $this->ProcessTemplate('frontend.timeline.tpl');
    } else {
        echo $this->ProcessTemplateFromDatabase($params['template']);
    }
}