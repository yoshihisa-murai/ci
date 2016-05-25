<div id="container">
{if $is_posted == false}
		<h1>メールアドレスを忘れた</h1>
		<span class="valid_error">{validation_errors()}</span>
		{form_open('forgot/email')}
		<p>ニックネーム:
		{form_input( 'nickname', {$nickname})}
		</p>
		<p>
		{form_submit('submit', '送信')}
		</p>
		{form_close()}
{else}
		<h1>登録されたニックネーム</h1>
		<span class="valid_error">{validation_errors()}</span>
		{$user['user_email']}
		<a href="{'forgot'|base_url}">パスワードを忘れた場合</a>
		<a href="{'login'|base_url}">ログイン</a>
{/if}
</div>
