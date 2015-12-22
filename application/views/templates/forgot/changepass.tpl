<div id="container">
{if $is_post == false}
    <span class="valid_error">{validation_errors()}</span>
    <h1>change password</h1>
    {form_open("forgot/changepass")}
    {form_hidden('user_email', $user_email)}
    {form_hidden('key', $key)}
    <p> password:
    {form_password('password')}
    </p>
    <p> password(確認用):
    {form_password('cpassword')}
    </p>
    <p>
    {form_submit('submit', '変更')}
    </p>
    {form_close()}
{else}
    {if is_null( $message ) }
    <p>パスワードを変更しました。</p>
    <p><a href="{'login'|base_url}">ログインページ</a>からログインしてください</p>
    {else}
        {$message}
    {/if}
{/if}
</div>
