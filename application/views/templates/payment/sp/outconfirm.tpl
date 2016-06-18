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
                            <h1 class="post-title entry-title">出金確認画面</h1>
                            <p style="color:#fff;">このページでは、コインを変換し出金が行えます。</p>
                            <?php echo $msg; ?>
                            <?php echo $err_div; ?>
                            <p class="withdrawal_p">現在の引き出し可能な金額は<span>${$history.remain|number_format}</span>です。</p>
                        </div><!--/.page-title-->

                        <div class="pad group">
                            <article class="post-21 post type-post status-publish format-standard has-post-thumbnail hentry category-3">
                                <div class="entry share">
                                    <form action="withdrawal.php" method="post" enctype="multipart/form-data">
                                        <div class="entry-inner clearfix">
                                            <table class="regist_table">
                                                <tr>
                                                    <th>出金金額(USD)</th><td style="border-top:1px solid #fff;"></td>
                                                </tr>
                                                <tr>
                                                    <th>NETELLER ID</th><td></td>
                                                </tr>
                                            </table>
                                            <div style="text-align:center;"><?php echo $btn; ?></div>
                                        </div>
                                    </form>
                                    <!--
                                    <div class="oi_post_share_icons"> 
                                        <div class="oi_soc_icons">
                                            <a href="https://www.facebook.com/sharer/sharer.php?u=http://test.planx.jp/kjn/2016/05/07/%e7%b4%b9%e4%bb%8b%e8%80%85%e3%82%ad%e3%83%a3%e3%83%83%e3%82%b7%e3%83%a5%e3%83%90%e3%83%83%e3%82%af%e3%82%b3%e3%82%a4%e3%83%b3%e3%82%ad%e3%83%a3%e3%83%b3%e3%83%9a%e3%83%bc%e3%83%b3/" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a> 
                                            <a href="https://twitter.com/share?url=http://test.planx.jp/kjn/2016/05/07/%e7%b4%b9%e4%bb%8b%e8%80%85%e3%82%ad%e3%83%a3%e3%83%83%e3%82%b7%e3%83%a5%e3%83%90%e3%83%83%e3%82%af%e3%82%b3%e3%82%a4%e3%83%b3%e3%82%ad%e3%83%a3%e3%83%b3%e3%83%9a%e3%83%bc%e3%83%b3/" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                                            <a href="https://plus.google.com/share?url=http://test.planx.jp/kjn/2016/05/07/%e7%b4%b9%e4%bb%8b%e8%80%85%e3%82%ad%e3%83%a3%e3%83%83%e3%82%b7%e3%83%a5%e3%83%90%e3%83%83%e3%82%af%e3%82%b3%e3%82%a4%e3%83%b3%e3%82%ad%e3%83%a3%e3%83%b3%e3%83%9a%e3%83%bc%e3%83%b3/" title="Google+" target="_blank"><i class="fa fa-google-plus"></i></a>
                                            <a href="http://b.hatena.ne.jp/entry/" class="hatena-bookmark-button" data-hatena-bookmark-layout="simple"><span class="icon-hatebu"></span></a>
                                            <script type="text/javascript" src="http://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    -->
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
