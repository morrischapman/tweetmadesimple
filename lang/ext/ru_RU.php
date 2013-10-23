<?php
$lang['friendlyname'] = 'Tweet Made Simple ';
$lang['postinstall'] = 'Post Install Message, (e.g., Be sure to set "Manage Twitter" permissions to use this module!)';
$lang['postuninstall'] = 'Tweet Made Simple удален.';
$lang['really_uninstall'] = 'Действительно? Вы уверены, что хотите удалить этот прекрасный модуль?';
$lang['uninstalled'] = 'Модуль удален.';
$lang['installed'] = 'Модуль версии %s установлен.';
$lang['upgraded'] = 'Модуль обновлен до версии %s.';
$lang['moddescription'] = 'Этот модуль позволяет управлять вашим Твиттером из CMSMS. Функции отправки и получения доступны.';
$lang['error'] = 'Ошибка!';
$lang['admindescription'] = 'Этот модуль позволяет управлять вашим Твиттером из CMSMS.';
$lang['accessdenied'] = 'Доступ закрыт. Пожалуйста проверьте свои права.';
$lang['Twitter'] = 'Твиттер';
$lang['Options'] = 'Опции';
$lang['title_twitter'] = 'Твиттер';
$lang['title_options'] = 'Опции';
$lang['submit'] = 'Отправить';
$lang['apply'] = 'Применить';
$lang['cancel'] = 'отмена';
$lang['update'] = 'Обновить';
$lang['send'] = 'Отправить';
$lang['restore'] = 'Восстановить';
$lang['status_title'] = 'Что вы делаете?';
$lang['no_twitter_credential_set'] = 'Please authorize your Twitter account into the "Options" tab.';
$lang['set_twitter_credential'] = 'Please enter your Twitter credential.';
$lang['require_curl'] = 'This module require curl <em>(<a href="http://php.net/manual/en/book.curl.php" rel="external">http://php.net/manual/en/book.curl.php</a>)</em>';
$lang['login'] = 'Логин';
$lang['password'] = 'Пароль';
$lang['timeout'] = 'Тайм-аут';
$lang['twitter_credentials_not_set'] = 'This module needs authorization from Twitter. Please see the module admin panel.';
$lang['sign_with_twitter'] = 'Sign in with Twitter';
$lang['twitter_welcome'] = 'Добро пожаловать %s';
$lang['unsign_twitter'] = 'Unsign from Twitter';
$lang['title_templates'] = 'Шаблоны';
$lang['title_template'] = 'Шаблон';
$lang['code'] = 'Код';
$lang['title_add_template'] = 'Добавить шаблон';
$lang['send_via_twitter'] = 'Отправить через Твиттер';
$lang['form_status'] = 'Статус';
$lang['shorten'] = 'Короткие url\'s';
$lang['editTemplate'] = 'Редактировать шаблон';
$lang['deleteTemplate'] = 'Удалить шаблон';
$lang['areyousure'] = 'Вы уверены?';
$lang['changelog'] = '<ul>
<li>Версия 0.0.1 - 29 June 2009. Первый выпуск.</li>
<li>Версия 1.0.0 - 30 June 2010. Внедрение OAuth.</li> 
</ul> ';
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
    <div id="status_{$tweet->id}" style="border-bottom: 1px dashed gray;">
      <div style="float: left; margin-right: 20px; "><img src="{$tweet->picture}" alt="{$tweet->author_name}" /></div>
      <p><strong>{$tweet->author_name}</strong> 
      {$tweet->getText()}</p>
      <p>{$tweet->getWhen()} from {$tweet->source}</p>
      <div style="clear: right"></div>  
    </div>  
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
 </ul>
 </p>
<h3>Support</h3>
<p>As per the GPL, this software is provided as-is. Please read the text of the license for the full disclaimer.</p>
<h3>Copyright and License</h3>
<p>Copyright © 2009, Jean-Christophe Cuvelier <a href="mailto:jcc@morris-chapman.com"><jcc@morris-chapman.com></a>. All Rights Are Reserved.</p>
<p>This module has been released under the <a href="http://www.gnu.org/licenses/licenses.html#GPL">GNU Public License</a>. You must agree to this license before using the module.</p>';
$lang['utmb'] = '156861353.2.10.1355951768';
$lang['utma'] = '156861353.566726294.1355735946.1355947882.1355951768.11';
$lang['utmc'] = '156861353';
$lang['utmz'] = '156861353.1355947882.10.2.utmcsr=feedburner|utmccn=Feed: cmsmadesimple/blog (CMS Made Simple)|utmcmd=feed';
?>