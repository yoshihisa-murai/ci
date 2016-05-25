<div id="container">
{if !$is_posted }
		<h1>会員登録ページ</h1>
		<span class="valid_error">{validation_errors()}</span>
		{form_open("signup")}
		<p> e-mail:
		{form_input('user_email', $input['user_email'])}
		</p>
		<p> ニックネーム:
		{form_input('nickname', $input['nickname'], 'id=nickname')}
		{form_button('nickname', '重複チェック', 'id=check_nickname')}
		<span id="check_result" class="valid_error"></span>
		</p>
		<p> パスワード
		{form_password('password')}
		</p>
		<p> パスワード確認用
		{form_password('cpassword')}
		</p>

		<p>
		{form_submit('submit', '登録')}
		</p>
		{form_close()}
{else}
		<h1>会員登録ページ</h1>
		<p>ご登録のメールアドレスに会員登録メールを送信しました。<br />メールに記載されたurlをクリックして本登録を完了させてください。</p>
{/if}
</div>
<a href="{'top'|base_url}">top</a>
