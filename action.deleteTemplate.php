<?php
if (!isset($gCms)) exit;

if (! $this->CheckAccess(""))
	{
	return $this->DisplayErrorPage($id, $params, $returnid,$this->Lang('accessdenied'));
	}

/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

   Code for DocumentsLibrary "manageCategories" admin action
   
   -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
   
   Typically, this will display something from a template
   or do some other task.
   
*/

if (isset($params['template']))
{
	$this->DeleteTemplate($params['template']);
	
	$params = array('active_tab' => 'templates');
	$this->Redirect($id, 'defaultadmin', $returnid, $params);

}

?>