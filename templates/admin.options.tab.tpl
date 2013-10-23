{*}<div class="pageoverflow">
    <p class="pagetext">{$twitter_user_title}:</p>
    <p class="pageinput">{$twitter_user}</p>
    
    <p class="pagetext">{$twitter_user_help}</p>
</div>*}
{if isset($twitter_account)}
	<div class="pageoverflow">
		<p class="pagetext"><img src="{$profile_picture}" style="float: left; padding: 5px;"><p><strong>{$twitter_welcome}</strong></p></p>
		<p>{$unsign}</p>
		<div style="clear:left; padding: 5px;"></div>
	</div>
{else}
<div class="pageoverflow">
	<p class="pagetext"><a href="{$twitter_oauth_authorize}"><img src="{$sign_with_twitter_img}" alt="{$sign_with_twitter}"/></a></p>
</div>
{/if}
<div class="pageoverflow">
    <p class="pagetext">{$timeout_title}:</p>
    <p class="pageinput">{$timeout}</p>
</div>

{*<div class="pageoverflow">
    <p class="pagetext">{$proxy_title}:</p>
    <p class="pageinput">{$proxy}</p>
</div>*}
{$submit_options}{$cancel}