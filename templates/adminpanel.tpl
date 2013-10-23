{$form_start}
{$tab_headers}

{$start_twitter_tab}
{$twitter_tab}
{$end_tab}

{$start_templates_tab}

<div class="pageoptions">
  <p class="pageoptions">{$addtemplateicon} {$addtemplatelink}</p>
</div>
{if $templates|count > 0}
<table cellspacing="0" class="pagetable"><thead><tr><th>{$title_template}</th><th class="pageicon"> </th><th class="pageicon"> </th></tr></thead><tbody>
{foreach from=$templates item=entry}
    <tr class="{$entry->rowclass}" onmouseover="this.className='{$entry->rowclass}hover';" onmouseout="this.className='{$entry->rowclass}';">
    <td>{$entry->name}</td><td>{$entry->editlink}</td><td>{$entry->deletelink}</td></tr>
{/foreach}
  </tbody></table>

<div class="pageoptions">
  <p class="pageoptions">{$addtemplateicon} {$addtemplatelink}</p>
</div>
{/if}
{$end_tab}

{$start_options_tab}
{$options_tab}
{$end_tab}

{$tab_footers}
{$form_end}
