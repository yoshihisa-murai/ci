<body class="single single-post postid-21 single-format-standard col-1c full-width topbar-enabled unknown">
<div id="wrapper">
{include file='common/header.tpl'}
    <div class="container container_bg" id="page">
        <div id="head_space" class="clearfix"> 
            <div class="page-image">
                <div class="image-container">
                    <img width="960" height="440" src="{'/'|base_url}images/sub_bg_head.jpg" class="attachment-thumb-large size-thumb-large wp-post-image" alt="test3" />                   
                </div>
            </div><!--/.page-image-->
        </div>
        <div class="container-inner container-inner2 up_margin">
            <div class="main">
                {if $error_msg}
                <div class="error">{$error_msg}</div>
                {/if}
                <div class="main-inner group">
                    <section class="content">
                        <div class="page-title pad">
                            <h1 class="post-title entry-title">新規プレイヤー登録</h1>
                        </div><!--/.page-title-->
                        <div class="pad group">
                        <article class="post-21 post type-post status-publish format-standard has-post-thumbnail hentry category-3">
                        {form_open("{'/'|base_url}signup/")}
                            <div class="entry share">
                                <div class="entry-inner clearfix">
                                    <table class="regist_table">
                                        <tr>
                                            <th>ニックネーム</th><td style="border-top:1px solid #fff;">{form_input('nickname', set_value('nickname'))}</td>
                                        </tr>
                                        <tr>
                                            <th>email</th><td>{form_input('user_email', set_value('user_email'))}</td>
                                        </tr>
                                        <tr>
                                            <th>email(確認用)</th><td>{form_input('c_user_email', set_value('c_user_email'))}</td>
                                        </tr>
                                        <tr>
                                            <th>パスワード</th><td>{form_input('password')}</td>
                                        </tr>
                                        <tr>
                                            <th>姓名</th><td>{form_input('name1', set_value('name1'))}{form_input('name2', set_value('name2'))}</td>
                                        </tr>
                                        <tr>
                                            <th>生年月日</th><td>{form_input( $form_attr.birth_day.birth_year, set_value('birth_year') )}年{form_input( $form_attr.birth_day.birth_month, set_value('birth_month') )}月{form_input( $form_attr.birth_day.birth_date, set_value('birth_date') )}日</td>
                                        </tr>
                                        <tr>
                                            <th>性別</th>
                                            <td>
                                                {html_radios name='sex' options=$sex selected=0}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>言語種別</th>
                                            <td>
                                                {html_options name='use_language' options=$use_language}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>通貨種別</th>
                                            <td>
                                                {html_options name='currency_unit' options=$currency_unit}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>国</th>
                                            <td>
                                                {html_options name='country' options=$country}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>携帯番号</th>
                                            <td>
                                                {html_options name='country_num' options=$country_num}
                                                {form_input( $form_attr.mobile.mobile1, set_value('mobile1') )}-{form_input( $form_attr.mobile.mobile2, set_value('mobile2') )}-{form_input( $form_attr.mobile.mobile3, set_value('mobile3') )}</td>
                                        </tr>
                                        <tr>
                                            <th>郵便番号</th><td>{form_input( $form_attr.addr.zip_code1, set_value('zip_code1') )}-{form_input( $form_attr.addr.zip_code2, set_value('zip_code2') )}</td>
                                        </tr>
                                        <tr>
                                            <th>都道府県</th>
                                            <td>
                                                {html_options name='pref' options=$pref}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>住所</th><td>{form_input('add_no1', set_value('add_no1'))}</td>
                                        </tr>
                                        <tr>
                                            <th>建物名と部屋番</th><td>{form_input('add_no2', set_value('add_no2'))}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">{html_checkboxes name='kiyaku' options=$kiyaku}私は満18歳以上で<a style="color:#e9bc06;" href="{'/'|base_url}agreement">カジノ規約</a>に同意します。</td>
                                        </tr>
                                    </table>
                                    <div style="text-align:center;">{form_submit('submit', '確認画面へ')}</div>
                                </div>
                            </div>
                            <!--/.entry-->
                            <!--/.post-inner-->
                            </article>
                            <!--/.post-->
                        </div>
                    </section>
                    <!--/.content-->
                </div>
                <!--/.main-inner-->
            </div>
            <!--/.main-->

        </div>
        <!--/.container-inner-->
    </div>
    <!--/.container-->
    <div id="page-top">
        <p><a id="move-page-top"><i class="fa fa-angle-up"></i></a></p>
    </div>
{include file='common/footer.tpl'}
</div>
<!--/#wrapper-->

{include file='common/footer_script.tpl'}
{include file='common/navi.tpl'}
{*if !$is_posted }
<div id="container">
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
*}
