<?php
$lang['friendlyname'] = 'Tweet Made Simple';
$lang['postinstall'] = 'Post Install Message, (e.g., Be sure to set &quot;Manage Twitter&quot; permissions to use this module!)';
$lang['postuninstall'] = 'Tweet Made Simple uninstalled.';
$lang['really_uninstall'] = 'Really? Are you sure
you want to unsinstall this fine module?';
$lang['uninstalled'] = 'Module Uninstalled.';
$lang['installed'] = 'Module version %s installed.';
$lang['upgraded'] = 'Module upgraded to version %s.';
$lang['moddescription'] = 'This module allow you to manage your Twitter from CMSMS. Both send and receive functions are available.';
$lang['error'] = 'Fehler';
$lang['admindescription'] = 'This module allow you to manage your Twitter from CMSMS.';
$lang['accessdenied'] = 'Access Denied. Please check your permissions.';
$lang['Twitter'] = 'Twitter';
$lang['Options'] = 'Optionen';
$lang['title_twitter'] = 'Twitter';
$lang['title_options'] = 'Optionen';
$lang['submit'] = 'Senden';
$lang['apply'] = 'Anwenden';
$lang['cancel'] = 'Abbrechen';
$lang['update'] = 'Aktualisieren';
$lang['send'] = 'Senden';
$lang['restore'] = 'Zur&uuml;cksetzen';
$lang['status_title'] = 'Was tust du gerade?';
$lang['no_twitter_credential_set'] = 'Bitte autorisieren Sie das Twitter-Konto im Reiter &bdquo;Optionen&ldquo;.';
$lang['set_twitter_credential'] = 'Bitte geben Sie ihre Twitter-Anmeldedaten ein.';
$lang['require_curl'] = 'This module require curl <em>(<a href="http://php.net/manual/en/book.curl.php" rel="external">http://php.net/manual/en/book.curl.php</a>)</em>';
$lang['login'] = 'Anmelden';
$lang['password'] = 'Kennwort';
$lang['timeout'] = 'Zeit&uuml;berschreitung';
$lang['twitter_credentials_not_set'] = 'This module needs authorization from Twitter. Please see the module admin panel.';
$lang['sign_with_twitter'] = 'Mit Twitter anmelden';
$lang['twitter_welcome'] = 'Willkommen, %s';
$lang['unsign_twitter'] = 'Von Twitter abmelden';
$lang['title_templates'] = 'Vorlagen';
$lang['title_template'] = 'Vorlage';
$lang['code'] = 'Code';
$lang['title_add_template'] = 'Vorlage hinzuf&uuml;gen';
$lang['send_via_twitter'] = '&Uuml;ber Twitter senden';
$lang['form_status'] = 'Status';
$lang['shorten'] = 'URL abk&uuml;rzen';
$lang['editTemplate'] = 'Vorlage bearbeiten';
$lang['deleteTemplate'] = 'Vorlage l&ouml;schen';
$lang['areyousure'] = 'Sind Sie sicher?';
$lang['changelog'] = '<ul>
<li>Version 0.0.1 - 29 June 2009. Initial Release.</li>
<li>Version 1.0.0 - 30 June 2010. Implementation of OAuth.</li> 
</ul>';
$lang['help'] = '<h3>What Does This Do?</h3>
<p>This module allow you to manage your Twitter from CMSMS. Both send and receive functions are available.</p>
<h3>How Do I Use It</h3>
<p>Configure your Twitter credentials in the backend. Use {cms_module module=&quot;Twitter&quot;} in your pages/templates.</p>
<p>You can also show Twitter search results using {cms_module module=&quot;Twitter&quot; action=&quot;search&quot; query=&quot;your search #terms&quot;}.</p>
<h3>Example of timeline</h3>
<p>To create a template, you can first loop on {$timeline}. Then, I advise you to use the {$timeline|var_dump} function to know what are the options you can use.</p>
<p>You can also click on the &quot;Restore&quot; button who&#039;ll give you a basic template.</p>
<p>Example :</p>
<pre>
<code>
{foreach from=$timeline item=tweet}  
    &amp;lt;div id=&amp;quot;status_{$tweet->id}&amp;quot; style=&amp;quot;border-bottom: 1px dashed gray;&amp;quot;&amp;gt;
      &amp;lt;div style=&amp;quot;float: left; margin-right: 20px; &amp;quot;&amp;gt;&amp;lt;img src=&amp;quot;{$tweet->picture}&amp;quot; alt=&amp;quot;{$tweet->author_name}&amp;quot; /&amp;gt;&amp;lt;/div&amp;gt;
      &amp;lt;p&amp;gt;&amp;lt;strong&amp;gt;{$tweet->author_name}&amp;lt;/strong&amp;gt; 
      {$tweet->getText()}&amp;lt;/p&amp;gt;
      &amp;lt;p&amp;gt;{$tweet->getWhen()} from {$tweet->source}&amp;lt;/p&amp;gt;
      &amp;lt;div style=&amp;quot;clear: right&amp;quot;>&amp;lt;/div&amp;gt;  
    &amp;lt;/div&amp;gt;
{/foreach}
</code>
</pre>
<h4>Tweet button</h4>
<p>To insert the Tweet button in your articles or pages, just use {Twitter action=&quot;tweet&quot;}. You can also add the param &quot;via&quot; with a desired Twitter screenname.</p>
<h4>Integrate Twitter in your own modules</h4>
<p>You can get a small Twitter icon and link using the function $gCms->modules[&#039;Twitter&#039;][&#039;object&#039;]->createSendLink($id,$returnid,array(&#039;status&#039; => $status));</p>
<p>You can also call the public function $gCms->modules[&#039;Twitter&#039;][&#039;object&#039;]->updateStatus(string $message, boolean $shorten) (with a 140 max message.) to send message to Twitter.</p>
<p>You can also use the public function $gCms->modules[&#039;Twitter&#039;][&#039;object&#039;]->shortenUrls($message) to only shorten the urls contained into the message.</p>
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
<p>If you want to have Twitter totals you can call the action &quot;get_totals&quot; ({Twitter action=&quot;get_totals&quot;}) who generate a smarty var $twitter_totals which content information like number of followers, number of twitter messages, etc.</p>
<h3>Support</h3>
<p>As per the GPL, this software is provided as-is. Please read the text of the license for the full disclaimer.</p>
<h3>Copyright and License</h3>
<p>Copyright &copy; 2009, Jean-Christophe Cuvelier <a href="mailto:jcc@morris-chapman.com"><jcc@morris-chapman.com></a>. All Rights Are Reserved.</p>
<p>This module has been released under the <a href="http://www.gnu.org/licenses/licenses.html#GPL">GNU Public License</a>. You must agree to this license before using the module.</p>';
?>