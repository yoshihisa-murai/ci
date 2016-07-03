<body class="single single-post postid-21 single-format-standard col-1c full-width topbar-enabled unknown">
<div id="wrapper">
{include file='common/header.tpl'}

    <div class="container container_bg" id="page">
        <div id="head_space" class="clearfix"> 
            <div class="page-image">
                <div class="image-container">
                    <img width="960" height="440" src="{'/'|base_url}images/callcenter_header.png" class="attachment-thumb-large size-thumb-large wp-post-image" alt="test3" />                   
                </div>
            </div><!--/.page-image-->
        </div>
        <div class="container-inner container-inner2 up_margin">
            <div class="main">
                <div class="main-inner group">
                    <section class="content">
                        <div class="page-title pad">
                            <h1 class="post-title entry-title">ヘルプセンターメニュー</h1>
                            <p style="color:#fff;">
                                以下のお問い合わせ内容でよろしいでしょうか
                            </p>
                        </div><!--/.page-title-->
                        <div class="pad group">
                            <article class="post-21 post type-post status-publish format-standard has-post-thumbnail hentry category-3">
                                <div class="entry share">
                                    <div class="entry-inner clearfix">
                                        <div class="mypage_menu cf">
                                            <div>
                                                <h2>コールセンターでのお問い合わせ</h2>
                                                <img src="{'/'|base_url}images/callcenter_time.png" />
                                            </div>
                                            <div>
                                                <h2>メールによるお問い合わせ</h2>
                                                <p style="margin-bottom:20px;">対応時間(月～金)12:00 - 24:00[日本時間]</p>
                                                {form_open( 'callcenter/complete' )}
                                                {form_hidden( 'name1' )}
                                                {form_hidden( 'name2' )}
                                                {form_hidden( 'email1' )}
                                                {form_hidden( 'info_title' )}
                                                {form_hidden( 'info_textarea' )}
                                                <table class="regist_table">
                                                    <tr>
                                                        <th>登録名</th>
                                                        <td style="border-top:1px solid #fff;">
                                                            {$post['name1']} {$post['name2']}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>email</th>
                                                        <td>
                                                            {$post['email1']}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>件名</th>
                                                        <td style="border-top:1px solid #fff;">
                                                            {$post['info_title']}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>備考</th>
                                                        <td style="border-top:1px solid #fff;">
                                                            {$post['into_textarea']}
                                                        </td>
                                                    </tr>
                                                </table>
                                                <div style="text-align:center;"><input class="login_btn" type="submit" name="check" value="送信" /></div>
                                                {form_close()}
                                            </div>
                                        </div>
                                        <div>
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
