{if isset($form)}
	<div style="color: red;">{$form->showErrors()}</div>
	{$form->getHeaders()}
	{$form->showWidgets('<div class="pageoverflow">
		<div class="pagetext">%LABEL%:</div>
		<div class="pageinput">%INPUT%</div>
	</div>')}
	<p style="text-align: right; margin-top: 15px;">
		{$form->getButtons()}
	</p>
	{$form->getFooters()}
{/if}