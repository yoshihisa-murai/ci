<body class="single single-post postid-21 single-format-standard col-1c full-width topbar-enabled unknown">
<div id="wrapper">
{include file='common/sp/header.tpl'}
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
                <div class="main-inner group">
                    <section class="content">
                        <div class="page-title pad">
                            <h1 class="post-title entry-title">新規プレイヤー登録</h1>
                        </div><!--/.page-title-->
                        <div class="pad group">
            <article class="post-21 post type-post status-publish format-standard has-post-thumbnail hentry category-3">
                {form_open( "{'/'|base_url}signup/complete" )}
                {form_hidden( 'nickname', set_value('nickname') )}
                {form_hidden( 'user_email', set_value('user_email') )}
                {form_hidden( 'password', $post.password )}
                {form_hidden( 'name1', set_value('name1') )}
                {form_hidden( 'name2', set_value('name2') )}
                {form_hidden( 'birth_year', set_value('birth_year') )}
                {form_hidden( 'birth_month', set_value('birth_month') )}
                {form_hidden( 'birth_date', set_value('birth_date') )}
                {form_hidden( 'sex', set_value('sex') )}
                {form_hidden( 'mobile1', set_value('mobile1') )}
                {form_hidden( 'mobile2', set_value('mobile2') )}
                {form_hidden( 'mobile3', set_value('mobile3') )}
                {form_hidden( 'zip_code1', set_value('zip_code1') )}
                {form_hidden( 'zip_code2', set_value('zip_code2') )}
                {form_hidden( 'add_no1', set_value('add_no1') )}
                {form_hidden( 'add_no2', set_value('add_no2') )}
                {form_hidden( 'use_language', set_value('use_language') )}
                {form_hidden( 'currency_unit', set_value('currency_unit') )}
                {form_hidden( 'country', set_value('country') )}
                {form_hidden( 'pref', set_value('pref') )}
                <div class="entry share">
                    <div class="entry-inner clearfix">
                        <table class="regist_table">
                            <tr>
                                <th>ニックネーム</th><td style="border-top:1px solid #fff;">{$post.nickname}</td>
                            </tr>
                            <tr>
                                <th>email</th><td>{$post.user_email}</td>
                            </tr>
                            <tr>
                                <th>パスワード</th><td>非表示</td>
                            </tr>
                            <tr>
                                <th>姓名</th><td>{$post.name1}{$post.name2}</td>
                            </tr>
                            <tr>
                                <th>生年月日</th><td>{$post.birth_year}年{$post.birth_month}月{$post.birth_date}日</td>
                            </tr>
                            <tr>
                                <th>性別</th>
                      <td>
                        {if $post.sex == 0}男性{else}女性{/if}
                      </td>
                            </tr>
                            <tr>
                                <th>言語種別</th>
                                <td>
                          日本語
                                </td>
                            </tr>
                            <tr>
                                <th>通貨種別</th>
                                <td>
                          米ドル
                                </td>
                            </tr>
                            <tr>
                                <th>国</th>
                                <td>
                          日本
                                </td>
                            </tr>
                            <tr>
                                <th>携帯番号</th>
                                <td>
                          81-
                          {$post.mobile1}-{$post.mobile2}-{$post.mobile3}
                          </td>
                            </tr>
                            <tr>
                                <th>郵便番号</th>
                        <td>
                            {$post.zip_code1}-{$post.zip_code2}
                        </td>
                            </tr>
                            <tr>
                                <th>都道府県</th>
                                <td>
                          {$pref[$post.pref]}
                                </td>
                            </tr>
                            <tr>
                                <th>住所</th><td>{$post.add_no1}</td>
                            </tr>
                            <tr>
                                <th>建物名と部屋番</th><td>{$post.add_no2}</td>
                            </tr>
                        </table>
                        <div style="text-align:center;">{form_submit('submit', '登録')}</div>
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
{include file='common/sp/footer.tpl'}
</div>
<!--/#wrapper-->
{include file='common/sp/footer_script.tpl'}
{include file='common/sp/navi.tpl'}
