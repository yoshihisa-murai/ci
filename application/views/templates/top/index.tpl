<div id="container">
    <h1>topページ</h1>
    {if $is_login }
        ようこそ{$user['user_email']}さん<br />
        <a href="{'top/logout'|base_url}">ログアウト</a>
        <a href="{'edituser'|base_url}">会員情報変更</a>
    {else}
        {include file="top/login.tpl"}
        <a href="{'login'|base_url}">ログイン</a>
    {/if}
</div>
