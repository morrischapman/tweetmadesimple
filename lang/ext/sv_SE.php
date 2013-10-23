<?php
$lang['friendlyname'] = 'Tweet MadeSimple';
$lang['postinstall'] = 'Installations meddelande, (Kom ih&aring;g att st&auml;lla in alla r&auml;ttigheter )';
$lang['postuninstall'] = 'Tweet MadeSimple avinstallerad.';
$lang['really_uninstall'] = '&Auml;r du s&auml;ker p&aring; att du vill avinstallera Tweet MadeSimple';
$lang['uninstalled'] = 'Modulen avinstallerad.';
$lang['installed'] = 'Modul version %s installerad.';
$lang['upgraded'] = 'Modulen uppgraderades till version %s.';
$lang['moddescription'] = 'Med den h&auml;r modulen kan du hantera din Twitter fr&aring;n CMSMS';
$lang['error'] = 'Fel!';
$lang['admindescription'] = 'Med denna modul kan du hantera Twitter fr&aring;n CMSMS.';
$lang['accessdenied'] = '&Aring;tkomst nekad. V&auml;nligen kolla dina r&auml;ttigheter.';
$lang['Twitter'] = 'Twitter';
$lang['Options'] = 'Alternativ';
$lang['title_twitter'] = 'Twitter';
$lang['title_options'] = 'Alternativ';
$lang['submit'] = 'Spara';
$lang['apply'] = 'Apply';
$lang['cancel'] = '&Aring;ngra';
$lang['update'] = 'Uppdatera';
$lang['send'] = 'Skicka';
$lang['restore'] = '&Aring;terst&auml;ll';
$lang['status_title'] = 'Vad g&ouml;r du?';
$lang['no_twitter_credential_set'] = 'V&auml;nligen verifera ditt Twitter-konto  i &quot;Options&quot;-fliken.';
$lang['set_twitter_credential'] = 'Ange din Twitter certifieringen.';
$lang['require_curl'] = 'This module require curl <em>(<a href="http://php.net/manual/en/book.curl.php" rel="external">http://php.net/manual/en/book.curl.php</a>)</em>';
$lang['login'] = 'Logga in';
$lang['password'] = 'L&ouml;senord';
$lang['timeout'] = 'Timeout';
$lang['twitter_credentials_not_set'] = 'Denna modul beh&ouml;ver verifera fr&aring;n Twitter. Se modules admin panel.';
$lang['sign_with_twitter'] = 'Logga in med Twitter';
$lang['twitter_welcome'] = 'V&auml;lkommen %s';
$lang['unsign_twitter'] = 'Unsign from Twitter';
$lang['title_templates'] = 'Mallar';
$lang['title_template'] = 'Mall';
$lang['code'] = 'Kod';
$lang['title_add_template'] = 'L&auml;gg till mall';
$lang['send_via_twitter'] = 'Skicka via Twitter';
$lang['form_status'] = 'Status';
$lang['shorten'] = 'Shorten urls';
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
 </ul>
 </p>
<h3>Support</h3>
<p>As per the GPL, this software is provided as-is. Please read the text of the license for the full disclaimer.</p>
<h3>Copyright and License</h3>
<p>Copyright &copy; 2009, Jean-Christophe Cuvelier <a href="mailto:jcc@morris-chapman.com"><jcc@morris-chapman.com></a>. All Rights Are Reserved.</p>
<p>This module has been released under the <a href="http://www.gnu.org/licenses/licenses.html#GPL">GNU Public License</a>. You must agree to this license before using the module.</p>';
$lang['qca'] = 'P0-1661890032-1292100548202';
$lang['utma'] = '156861353.659299578.1292456318.1292456318.1292456318.1';
$lang['utmb'] = '156861353.1.10.1292456318';
$lang['utmc'] = '156861353';
$lang['utmz'] = '156861353.1292456318.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none)';
?>