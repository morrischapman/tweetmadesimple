<?php
$lang['friendlyname'] = 'Tweet Made Simple';
$lang['postinstall'] = 'Post Install Message, (e.g., Be sure to set &quot;Manage Twitter&quot; permissions to use this module!)';
$lang['postuninstall'] = 'Tweet Made Simple blev afinstalleret';
$lang['really_uninstall'] = 'Really? Are you sure
you want to unsinstall this fine module?';
$lang['uninstalled'] = 'Module Uninstalled.';
$lang['installed'] = 'Module version %s installed.';
$lang['upgraded'] = 'Module upgraded to version %s.';
$lang['moddescription'] = 'This module allow you to manage your Twitter from CMSMS. Both send and receive functions are available.';
$lang['error'] = 'Fejl!';
$lang['admindescription'] = 'This module allow you to manage your Twitter from CMSMS.';
$lang['accessdenied'] = 'Access Denied. Please check your permissions.';
$lang['Twitter'] = 'Twitter';
$lang['Options'] = 'Options';
$lang['title_twitter'] = 'Twitter';
$lang['title_options'] = 'Options';
$lang['submit'] = 'Submit';
$lang['apply'] = 'Apply';
$lang['cancel'] = 'cancel';
$lang['update'] = 'Update';
$lang['restore'] = 'Restore';
$lang['status_title'] = 'What are you doing?';
$lang['no_twitter_credential_set'] = 'Please authorize your Twitter account into the &quot;Options&quot; tab.';
$lang['set_twitter_credential'] = 'Please enter your Twitter credential.';
$lang['login'] = 'Login';
$lang['password'] = 'Password';
$lang['timeout'] = 'Timeout';
$lang['twitter_credentials_not_set'] = 'This module needs authorization from Twitter. Please see the module admin panel.';
$lang['sign_with_twitter'] = 'Sign in with Twitter';
$lang['twitter_welcome'] = 'Welcome %s';
$lang['unsign_twitter'] = 'Unsign from Twitter';
$lang['title_templates'] = 'Templates';
$lang['title_template'] = 'Template';
$lang['code'] = 'Code';
$lang['title_add_template'] = 'Add template';
$lang['changelog'] = '<ul>
<li>Version 0.0.1 - 29 June 2009. Initial Release.</li>
<li>Version 1.0.0 - 30 June 2010. Implementation of OAuth.</li> 
</ul>';
$lang['help'] = '<h3>What Does This Do?</h3>
<p>This module allow you to manage your Twitter from CMSMS. Both send and receive functions are available.</p>
<h3>How Do I Use It</h3>
<p>Configure your Twitter credentials in the backend. Use {cms_module module=&quot;Twitter&quot;} in your pages/templates.</p>
<p>You can also show Twitter search results using {cms_module module=&quot;Twitter&quot; action=&quot;search&quot; query=&quot;your search #terms&quot;}.</p>
<p>Other modules can call the public function updateStatus($message, $shorten) (with a 140 max message) to send message to Twitter.</p>
<p>They can also use the public function shortenUrls($message) to only shorten the urls contained into the message.</p>
<h3>Example of timeline</h3>
<p>To create a template, you can first loop on {$timeline}. Then, I advise you to use the {$timeline|var_dump} function to know what are the options you can use.</p>
<p>You can also click on the &quot;Restore&quot; button who&#039;ll give you a basic template.</p>
<p>Example :</p>
<pre>
{foreach from=$timeline item=tweet}  
    <div id=&quot;status_{$tweet->id}&quot; style=&quot;border-bottom: 1px dashed gray;&quot;>
      <div style=&quot;float: left; margin-right: 20px; &quot;><img src=&quot;{$tweet->picture}&quot; alt=&quot;{$tweet->author_name}&quot; /></div>
      <p><strong>{$tweet->author_name}</strong> 
      {$tweet->getText()}</p>
      <p>{$tweet->getWhen()} from {$tweet->source}</p>
      <div style=&quot;clear: right&quot;></div>  
    </div>  
{/foreach}
</pre>
<h3>What Parameters Does It Take</h3>
<p>
<ul>
  <li><b>limit</b> - If you set that, it will limit the number of latest twitter updates to this value.</li>
  <li><b>template</b> - Select a custom template set in the admin pannel.</li>
  <li><b>user_id</b> - Specify an user id</li>
  <li><b>screen_name</b> - Specify an user screen name</li>
 </ul>
 </p>
<h3>Support</h3>
<p>As per the GPL, this software is provided as-is. Please read the text of the license for the full disclaimer.</p>
<h3>Copyright and License</h3>
<p>Copyright &copy; 2009, Jean-Christophe Cuvelier <a href="mailto:jcc@morris-chapman.com"><jcc@morris-chapman.com></a>. All Rights Are Reserved.</p>
<p>This module has been released under the <a href="http://www.gnu.org/licenses/licenses.html#GPL">GNU Public License</a>. You must agree to this license before using the module.</p>';
$lang['qca'] = '1229601790-85243197-43260713';
$lang['utma'] = '156861353.150641055.1290514235.1290548625.1290593435.3';
$lang['utmz'] = '156861353.1290514235.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none)';
$lang['utmb'] = '156861353';
$lang['utmc'] = '156861353';
?>