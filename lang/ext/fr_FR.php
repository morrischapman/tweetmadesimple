<?php
$lang['friendlyname'] = 'Twitter (TweetMadeSimple)';
$lang['postinstall'] = 'Le module Twitter (TweetMadeSimple) a &eacute;t&eacute; install&eacute; avec succ&egrave;s.';
$lang['postuninstall'] = 'Le module Twitter (TweetMadeSimple) a &eacute;t&eacute; d&eacute;sinstall&eacute; avec succ&egrave;s.';
$lang['really_uninstall'] = '&Ecirc;tes-vous vraiment s&ucirc;r de vouloir d&eacute;sinstaller ce module ?';
$lang['uninstalled'] = 'Module d&eacute;sinstall&eacute;.';
$lang['installed'] = 'Module install&eacute; en version %s.';
$lang['upgraded'] = 'Module mis &agrave; jour vers la version %s.';
$lang['moddescription'] = 'Ce module vous permet de g&eacute;rer votre compte Twitter depuis CMSMS. Les fonctions d&#039;envoi et de r&eacute;ception sont disponibles.';
$lang['error'] = 'Erreur !';
$lang['admindescription'] = 'Ce module vous permet de g&eacute;rer votre compte Twitter depuis CMSMS.';
$lang['accessdenied'] = 'Acc&egrave;s refus&eacute;. Merci de v&eacute;rifier vos droits d&#039;acc&egrave;s.';
$lang['Twitter'] = 'Twitter ';
$lang['Options'] = 'Options ';
$lang['title_twitter'] = 'Twitter ';
$lang['title_options'] = 'Options ';
$lang['submit'] = 'Enregistrer';
$lang['apply'] = 'Appliquer';
$lang['cancel'] = 'Annuler';
$lang['update'] = 'Mettre &agrave; jour';
$lang['send'] = 'Envoyer';
$lang['restore'] = 'Restaurer';
$lang['status_title'] = 'Quoi de neuf ?';
$lang['no_twitter_credential_set'] = 'Merci d&#039;autoriser l&#039;acc&egrave;s &agrave; votre compte Twitter via l&#039;onglet &quot;Options&quot;.';
$lang['set_twitter_credential'] = 'Veuillez entrer vos identifiants Twitter.';
$lang['require_curl'] = 'Ce module requiert Curl <em>(<a href="http://php.net/manual/en/book.curl.php" rel="external">http://php.net/manual/en/book.curl.php</a>)</em>';
$lang['login'] = 'Identifiant';
$lang['password'] = 'Mot de passe';
$lang['timeout'] = 'Timeout ';
$lang['twitter_credentials_not_set'] = 'Ce module n&eacute;cessite un acc&egrave;s autoris&eacute; par Twitter. Merci de consulter l&#039;interface d&#039;administration du module.';
$lang['sign_with_twitter'] = 'Identifiez-vous sur Twitter';
$lang['twitter_welcome'] = 'Bienvenue %s';
$lang['unsign_twitter'] = 'D&eacute;connexion de Twitter';
$lang['title_templates'] = 'Gabarits';
$lang['title_template'] = 'Nom du gabarit&nbsp;';
$lang['code'] = 'Code&nbsp;';
$lang['title_add_template'] = 'Ajouter un gabarit';
$lang['send_via_twitter'] = 'Envoyer via Twitter';
$lang['form_status'] = 'Statut';
$lang['shorten'] = 'Raccourcir les URLs';
$lang['editTemplate'] = 'Modifier le gabarit';
$lang['deleteTemplate'] = 'Supprimer le gabarit';
$lang['areyousure'] = '&Ecirc;tes-vous s&ucirc;r ?';
$lang['changelog'] = '<ul>
<li>Version 0.0.1 - 29 June 2009. Initial Release.</li>
<li>Version 1.0.0 - 30 June 2010. Implementation of OAuth.</li> 
</ul>';
$lang['help'] = '<h3>Que fait ce module ?</h3>
<p>Ce module vous permet de g&eacute;rer votre compte Twitter depuis CMSMS. Les fonctions d&#039;envoi et de r&eacute;ception sont disponibles.</p>
<h3>Comment l&#039;utiliser ?</h3>
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
?>