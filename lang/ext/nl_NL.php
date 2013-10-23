<?php
$lang['friendlyname'] = 'Tweet Made Simple ';
$lang['postinstall'] = 'Controleer de &quot;Manage Twitter&quot; permissies voordat u deze module gaat gebruiken!';
$lang['postuninstall'] = 'Tweet Made Simple gede&iuml;nstalleerd.';
$lang['really_uninstall'] = 'Weet u zeker dat u deze module wilt verwijderen?';
$lang['uninstalled'] = 'Module gede&iuml;nstalleerd.';
$lang['installed'] = 'Module versie %s ge&iuml;nstalleerd.';
$lang['upgraded'] = 'Module bijgewerkt naar versie %s.';
$lang['moddescription'] = 'Met deze module kunt u uw Twitter account beheren vanuit CMSMS. Zowel ontvang, als verzendfuncties zijn beschikbaar.';
$lang['error'] = 'Fout!';
$lang['admindescription'] = 'Met deze module kunt u uw Twitter tweets beheren vanuit de CMSMS admin.';
$lang['accessdenied'] = 'Toegang geweigerd. Controleer uw permissies.';
$lang['Twitter'] = 'Twitter ';
$lang['Options'] = 'Opties';
$lang['title_twitter'] = 'Twitter ';
$lang['title_options'] = 'Opties';
$lang['submit'] = 'Versturen';
$lang['apply'] = 'Toepassen';
$lang['cancel'] = 'Annuleer';
$lang['update'] = 'Bijwerken';
$lang['send'] = 'Versturen';
$lang['restore'] = 'Terugzetten';
$lang['status_title'] = 'Wat bent u aan het doen?';
$lang['no_twitter_credential_set'] = 'Please authorize your Twitter account into the &quot;Options&quot; tab.';
$lang['set_twitter_credential'] = 'Voer uw Twitter gegevens in.';
$lang['require_curl'] = 'Deze module vereist curl <em>(<a href="http://php.net/manual/en/book.curl.php" rel="external">http://php.net/manual/en/book.curl.php</a>)</em>';
$lang['login'] = 'Login ';
$lang['password'] = 'Wachtwoord';
$lang['timeout'] = 'Time-out';
$lang['proxy'] = 'Gemachtigde';
$lang['twitter_user'] = 'Twitter Gebbruiker';
$lang['twitter_user_help'] = 'In de meeste gevallen hoeft u alleen Twitter-gebruiker te hebben (om de tijdlijn te tonen). Voor andere gevallen, moet u zich aanmelden op Twitter (let op dat het alleen werkt op dedicated servers).';
$lang['twitter_credentials_not_set'] = 'Deze module heeft authorisatie nodig van Twitter. Controleer hiervoor de module admin pagina.';
$lang['sign_with_twitter'] = 'Inloggen bij Twitter';
$lang['twitter_welcome'] = 'Welkom %s';
$lang['unsign_twitter'] = 'Uitloggen bij Twitter';
$lang['title_templates'] = 'Sjablonen';
$lang['title_template'] = 'Sjabloon';
$lang['code'] = 'Code ';
$lang['title_add_template'] = 'Sjabloon toevoegen';
$lang['send_via_twitter'] = 'Verstuurd via Twitter';
$lang['form_status'] = 'Status ';
$lang['shorten'] = 'Pas korte urls toe';
$lang['editTemplate'] = 'Bewerk sjabloon';
$lang['deleteTemplate'] = 'Verwijder sjabloon';
$lang['areyousure'] = 'Weet u het zeker?';
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
$lang['utma'] = '156861353.733393393.1379582887.1379582887.1379582887.1';
$lang['utmz'] = '156861353.1379582887.1.1.utmccn=(direct)|utmcsr=(direct)|utmcmd=(none)';
$lang['utmc'] = '156861353';
$lang['utmb'] = '156861353';
?>