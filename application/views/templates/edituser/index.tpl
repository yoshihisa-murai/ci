<div id="container">
{if !$is_posted }
		<h1>会員情報変更ページ</h1>
		<span class="valid_error">{validation_errors()}</span>
		{form_open("edituser")}
		<p> e-mail:
		{$user['user_email']}
		{form_input('user_email', $input['user_email'])}
		</p>
		<p> ニックネーム:
		{$user['nickname']}
		{form_input('nickname', $input['nickname'])}
		</p>
		<p> パスワード
		{form_password('password')}
		</p>
		<p> パスワード確認用
		{form_password('cpassword')}
		</p>

		<p>
		{form_submit('submit', '変更')}
		</p>
		{form_close()}
		<a href="{'dropuser'|base_url}">退会</a>
{else}
		<h1>会員登録ページ</h1>
		<p>登録情報を変更しました</p>
{/if}
</div>
<a href="{'top'|base_url}">top</a>


