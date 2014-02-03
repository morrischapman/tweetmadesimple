{$now}
{if isset($timeline)}
    {foreach from=$timeline item=tweet}
        <div id="status_{$tweet->id}" style="border-bottom: 1px dashed gray;">
            <div style="float: left; margin-right: 20px; "><img src="{$tweet->picture}" alt="{$tweet->author_name}"/>
            </div>
            <p><strong><a href="http://twitter.com/{$tweet->author_name}" rel="external"
                          target="_new">{$tweet->author_name}</a></strong>
                {$tweet->getText()}</p>

            <p>{$tweet->getWhen()} via {$tweet->source}</p>

            <div style="clear: right"></div>
        </div>
    {/foreach}
{else}
    <p>No tweet found!</p>
{/if}