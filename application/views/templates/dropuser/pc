<div id="container">
{if !$is_posted }
		<h1>退会ページ</h1>
		<p>退会していいんですか？</p>
		<span class="valid_error">{validation_errors()}</span>
		{form_open("dropuser")}
		<p>
		{form_submit('submit', '退会')}
		<a href="{'top'|base_url}">取り消し</a>
		{form_close()}
{else}
		<h1>退会ページ</h1>
		<p>退会しました</p>
{/if}
</div>
<a href="{'top'|base_url}">top</a>
