<?php
if (!isset($gCms)) exit;

	$this->RemovePreference('oauth_token');
	$this->RemovePreference('oauth_token_secret');	
	$this->RemovePreference('login');
	$this->RemovePreference('password');


$this->Redirect($id, 'defaultadmin', $returnid, array('active_tab' => 'options'));
	