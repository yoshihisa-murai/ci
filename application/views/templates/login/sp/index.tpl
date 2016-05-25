<div id="container">
		<h1>ログインページ</h1>
		<span class="valid_error">{validation_errors()}</span>
		{form_open("login?r=`$redirect_url`")}
		<p> e-mail:
		{form_input('user_email', $user_email)}
		</p>
		<p> パスワード
		{form_password('password')}
		</p>

		<p>
		{form_submit('submit', 'ログイン')}
		</p>
		{form_close()}
		<a href="{'signup'|base_url}">会員登録</a><br />
		<a href="{'forgot'|base_url}">パスワードを忘れた場合</a>
</div>
