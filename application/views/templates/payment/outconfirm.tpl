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
                            <h1 class="post-title entry-title">出金確認画面</h1>
                            <p style="color:#fff;">このページでは、コインを変換し出金が行えます。</p>
                            <p class="withdrawal_p">現在の引き出し可能な金額は<span>${$current_money|default:0|number_format}</span>です。</p>
                        </div><!--/.page-title-->

                        <div class="pad group">
                            <article class="post-21 post type-post status-publish format-standard has-post-thumbnail hentry category-3">
                                <div class="entry share">
                                    {form_open( 'payment/outredirect' )}
                                        {form_hidden( 'pay_number', $post.pay_number )}
                                        {form_hidden( 'neteller_id', $post.neteller_id )}
                                        {form_hidden( 'password', $post.neteller_pass )}
                                        <div class="entry-inner clearfix">
                                            <table class="regist_table">
                                                <tr>
                                                    <th>出金金額(USD)</th>
                                                    <td style="border-top:1px solid #fff;">
                                                        ${$post.pay_number|number_format}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>NETELLER ID</th>
                                                    <td>
                                                        {$post.neteller_id}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>PASSWORD</th><td style="text-align:left;">非表示</td>
                                                </tr>
                                            </table>
                                            <div style="text-align:center;">
                                                <input type="submit" name="send" value="　出金する　" class="login_btn">
                                                <input type="submit" name="back" value="　戻　る　" style="background:#fff;" class="login_btn">
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
{include file='common/footer_script.tpl'}
{include file='common/navi.tpl'}
