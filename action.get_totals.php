<?php
if (!isset($gCms)) exit;

$t = $this->getTwitterObj();
$resp = $t->get('/account/totals.json');

//var_dump($resp);

$array = json_decode($resp->responseText);

$this->smarty->assign('twitter_totals', $array);
