<?php
    
	if(isset($params['via']))
	{
		$this->smarty->assign('via', $params['via']);
	}

	echo $this->ProcessTemplate('tweet.tpl');