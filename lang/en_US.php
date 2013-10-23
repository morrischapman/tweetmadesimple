<?php
$lang['friendlyname'] = 'Tweet Made Simple';
$lang['postinstall'] = 'Tweet Made Simple installed.';
$lang['postuninstall'] = 'Tweet Made Simple uninstalled.';
$lang['really_uninstall'] = 'Really? Are you sure
you want to unsinstall this fine module?';
$lang['uninstalled'] = 'Module Uninstalled.';
$lang['installed'] = 'Module version %s installed.';
$lang['upgraded'] = 'Module upgraded to version %s.';
$lang['moddescription'] = 'This module allow you to manage your Twitter from CMSMS. Both send and receive functions are available.';

$lang['error'] = 'Error!';
$land['admin_title'] = 'Tweet Made Simple Admin Panel';
$lang['admindescription'] = 'This module allow you to manage your Twitter from CMSMS.';
$lang['accessdenied'] = 'Access Denied. Please check your permissions.';
$lang['postinstall'] = 'Post Install Message, (e.g., Be sure to set "Manage Twitter" permissions to use this module!)';
$lang['Twitter'] = 'Twitter';
$lang['Options'] = 'Options';
$lang['title_twitter'] = 'Twitter';
$lang['title_options'] = 'Options';

$lang['submit'] = 'Submit';
$lang['apply'] = 'Apply';
$lang['cancel'] = 'cancel';
$lang['update'] = 'Update';
$lang['send'] = 'Send';
$lang['restore'] = 'Restore';

// Admin

$lang['status_title'] = 'What are you doing?';

$lang['no_twitter_credential_set'] = 'Please authorize your Twitter account into the "Options" tab.';
$lang['set_twitter_credential'] = 'Please enter your Twitter credential.';
$lang['require_curl'] = 'This module require curl <em>(<a href="http://php.net/manual/en/book.curl.php" rel="external">http://php.net/manual/en/book.curl.php</a>)</em>';
$lang['login'] = 'Login';
$lang['password'] = 'Password';
$lang['timeout'] = 'Timeout';
$lang['proxy'] = 'Proxy';
$lang['twitter_user'] = 'Twitter user';
$lang['twitter_user_help'] = 'In most of the cases, you only need Twitter user (to show user timeline). For other cases, you will need to Sign in with Twitter (please note that it only work with dedicated servers).' ;

$lang['twitter_credentials_not_set'] = 'This module needs authorization from Twitter. Please see the module admin panel.';

// OAuth
$lang['sign_with_twitter'] = 'Sign in with Twitter';
$lang['twitter_welcome'] = 'Welcome %s';
$lang['unsign_twitter'] = 'Unsign from Twitter';

// Templates

$lang['title_templates'] = 'Templates';
$lang['title_template'] = 'Template';
$lang['code'] = 'Code';
$lang['title_add_template'] = 'Add template';
$lang['send_via_twitter'] = 'Send via Twitter';

$lang['form_status'] = 'Status';
$lang['shorten'] = 'Shorten urls';

$lang['editTemplate'] = 'Edit template';
$lang['deleteTemplate'] = 'Delete template';
$lang['areyousure'] = 'Are you sure?';

$lang['changelog'] = '<ul>
<li>Version 0.0.1 - 29 June 2009. Initial Release.</li>
<li>Version 1.0.0 - 30 June 2010. Implementation of OAuth.</li> 
</ul>';
$lang['help'] = '<h3>What Does This Do?</h3>
<p>This module allow you to manage your Twitter from CMSMS. Both send and receive functions are available.</p>
<h3>How Do I Use It</h3>
<p>Configure your Twitter credentials in the backend. Use {cms_module module="Twitter"} in your pages/templates.</p>
<p>You can also show Twitter search results using {cms_module module="Twitter" action="search" query="your search #terms"}.</p>
<h3>Example of timeline</h3>
<p>To create a template, you can first loop on {$timeline}. Then, I advise you to use the {$timeline|var_dump} function to know what are the options you can use.</p>
<p>You can also click on the "Restore" button who\'ll give you a basic template.</p>
<p>Example :</p>
<pre>
{foreach from=$timeline item=tweet}  
    &lt;div id="status_{$tweet-&gt;id}" style="border-bottom: 1px dashed gray;"&gt;
      &lt;div style="float: left; margin-right: 20px; "&gt;&lt;img src="{$tweet-&gt;picture}" alt="{$tweet-&gt;author_name}" /&gt;&lt;/div&gt;
      &lt;p&gt;&lt;strong&gt;{$tweet-&gt;author_name}&lt;/strong&gt; 
      {$tweet-&gt;getText()}&lt;/p&gt;
      &lt;p&gt;{$tweet-&gt;getWhen()} from {$tweet-&gt;source}&lt;/p&gt;
      &lt;div style="clear: right"&gt;&lt;/div&gt;  
    &lt;/div&gt;  
{/foreach}
</pre>
<h4>Tweet button</h4>
<p>To insert the Tweet button in your articles or pages, just use {Twitter action="tweet"}. You can also add the param "via" with a desired Twitter screenname.</p>
<h4>Integrate Twitter in your own modules</h4>
<p>You can get a small Twitter icon and link using the function $gCms->modules[\'Twitter\'][\'object\']->createSendLink($id,$returnid,array(\'status\' => $status));</p>
<p>You can also call the public function $gCms->modules[\'Twitter\'][\'object\']->updateStatus(string $message, boolean $shorten) (with a 140 max message.) to send message to Twitter.</p>
<p>You can also use the public function $gCms->modules[\'Twitter\'][\'object\']->shortenUrls($message) to only shorten the urls contained into the message.</p>
<p>
<h3>What Parameters Does It Take</h3>
<p>
<ul>
  <li><b>limit</b> - If you set that, it will limit the number of latest twitter updates to this value.</li>
  <li><b>template</b> - Select a custom template set in the admin pannel.</li>
  <li><b>user_id</b> - Specify an user id</li>
  <li><b>screen_name</b> - Specify an user screen name</li>
	<li><b>friends</b> - Publish friends timeline</li>
 </ul>
 </p>
<h3>Twitter totals</h3>
<p>If you want to have Twitter totals you can call the action "get_totals" ({Twitter action="get_totals"}) who generate a smarty var $twitter_totals which content information like number of followers, number of twitter messages, etc.</p>
<h3>Support</h3>
<p>As per the GPL, this software is provided as-is. Please read the text of the license for the full disclaimer.</p>
<h3>Copyright and License</h3>
<p>Copyright &copy; 2009, Jean-Christophe Cuvelier <a href="mailto:jcc@morris-chapman.com">&lt;jcc@morris-chapman.com&gt;</a>. All Rights Are Reserved.</p>
<p>This module has been released under the <a href="http://www.gnu.org/licenses/licenses.html#GPL">GNU Public License</a>. You must agree to this license before using the module.</p>';
?>
