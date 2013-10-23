<?php
if (!isset($gCms)) exit;

if (! $this->CheckAccess("Manage Twitter"))
	{
	return $this->DisplayErrorPage($id, $params, $returnid,$this->Lang('accessdenied'));
	}

/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

   Code for Twitter "send" admin action
   
   -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
   
   Typically, this will display something from a template
   or do some other task.
   
*/

/* Steps:

	- Review the message
	- Post the message
	- Return to module (TODO)
	
*/

if (isset($params['return_page']))
{
	$_SESSION['tweetmadesimple']['send']['return_module'] == $params['return_page'];
}

// STEP 2: REVIEW THE MESSAGE
if (isset($params['submit']))
{
	if (
		isset($params['status']) 
		&& 
		strlen($params['status']) < 140)
		{
			$status = html_entity_decode($params['status']);
			$this->updateStatus($status, false);			
			return $this->Redirect($id,'defaultadmin',$returnid);
		}
}


$form = new CMSForm('Twitter',$id,'send',$returnid);
$form->setButtons(array('submit','apply','cancel'));
$form->setLabel('submit' , $this->lang('send'));
$form->setLabel('apply' , $this->lang('shorten'));
$form->setWidget('status', 'textarea');
$this->smarty->assign('form', $form);

if (isset($params['apply']))
{
	$form->getWidget('status')->setValues(Tweet::shortenUrls(implode(' ', $form->getWidget('status')->getValues())));
}

echo $this->ProcessTemplate('send.tpl');

