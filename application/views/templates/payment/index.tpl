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
                <div class="main-inner group">
                    <section class="content">
                        <div class="page-title pad">
                            <h1 class="post-title entry-title">入金画面</h1>
                            <p style="color:#fff;">このページでは、コインのご購入が行えます。</p>
                            {if $error_msg}
                            <div class="error">{$error_msg}</div>
                            {/if}
                        </div><!--/.page-title-->
                        <div class="pad group">
                            <article class="post-21 post type-post status-publish format-standard has-post-thumbnail hentry category-3">
                                <div class="entry share">
                                    {form_open( 'payment' )}
                                        <div class="entry-inner clearfix">
                                            <table class="regist_table">
                                                <tr>
                                                    <th>入金金額(USD)</th>
                                                    <td style="border-top:1px solid #fff;">
                                                      {form_input( 'pay_number' )}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>i-wallet ID</th>
                                                    <td>
                                                        {form_input( 'neteller_id' )}
                                                        <br />アカウントIDまたはメールアドレス(ご本人様名義のみ利用可)
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>PASSWORD</th>
                                                    <td>
                                                        {form_password( 'neteller_pass' )}
                                                        <br />セキュアIDまたは認証コード(ご本人様名義のアカウントのみ利用可)
                                                    </td>
                                                </tr>
                                            </table>
                                            <div style="text-align:center;">
                                                <input class="login_btn" type="submit" name="check" value="入金確認画面へ" />
                                            </div>
                                        </div>
                                    </form>
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
<!--/#wrapper-->

{include file='common/footer_script.tpl'}
{include file='common/navi.tpl'}
