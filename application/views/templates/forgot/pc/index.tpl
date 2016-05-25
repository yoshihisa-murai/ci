<div id="container">
{if ! $is_posted}
    <span class="valid_error">{validation_errors()}</span>
    <h1>forgot password</h1>
    {form_open("forgot")}
    <p> e-mail:
    {form_input('user_email', $user_email)}
    </p>
    <p>
    {form_submit('submit', '送信')}
    </p>
    {form_close()}
    <a href="{'forgot/email'|base_url}">登録したメールアドレスを忘れた場合</a>
{else}
    {include file="forgot/mailsend.tpl"}
{/if}
</div>
