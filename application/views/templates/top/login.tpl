<span class="valid_error">{validation_errors()}</span>
{form_open( 'top' )}
<p>
{form_input( 'user_email' )}
</p>
<p>
{form_password( 'password' )}
</p>

<p>
{form_submit( 'submit', 'ログイン' )}
</p>
{form_close()}
<a href="{'signup'|base_url}">会員登録</a>
