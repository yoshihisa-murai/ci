<body class="single single-post postid-21 single-format-standard col-1c full-width topbar-enabled unknown">
<div id="wrapper">
{include file='common/header.tpl'}

    <div class="container container_bg" id="page">
        <div class="image-block">
            <img src="{'/'|base_url}images/sub_bg_head2.jpg" alt="test3" />                   
        </div>
        <div class="container-inner container-inner2 up_margin">
            <div class="main">
                <section class="content">
                    <h1 class="subpage_h1">NEO CASINOマイページメニュー</h1>
                    <article class="main_block">
                        <p style="text-align:right; margin-bottom:10px;">いらっしゃいませ。{$user.nickname}さん<br />
                        {*前回ログイン：2016年4月30日15:43:26*}
                        </p>
                        <div class="mypage_cm">
                            <img src="{'/'|base_url}images/mypage_cm1.jpg">
                        </div>
                        <div class="mypage_cm_pc">
                            <img src="{'/'|base_url}images/mypage_cm_pc1.jpg">
                        </div>
                        <div>
                        	<div class="myapge_guide_block cf">
                        		<div class="myapge_guide_block_l" style="text-align:center;"><a href="{'/'|base_url}guide/appinstall"><img src="{'/'|base_url}images/install_btn.jpg" /></a></div>
                        		<div class="myapge_guide_block_r" style="text-align:center;"><a href="{'/'|base_url}guide/startup"><img src="{'/'|base_url}images/launch_btn.jpg" /></a></div>
                        	</div>
                            <div class="play_btns cf">
                                <div class="play_btns_l" style="text-align:center;"><a href="{$link_to_play}"><img src="{'/'|base_url}images/baccarat_play_btn.png" /></a></div>
                                <div class="play_btns_r" style="text-align:center;"><a href="{'/'|base_url}top/playapi"><img src="images/play_btn.png" /></a></div>
                            </div>
                            <h2 class="neteller_h2">操作メニュー</h2>
                            <div class="mypage_menu cf">
                                <div class="mypage_menu_btn_box"><a href="{'/'|base_url}payment/"><img src="{'/'|base_url}images/coincharge_btn.png"></a></div>
                                <div class="mypage_menu_btn_box"><img src="{'/'|base_url}images/playdata_btn.png"></div>
                                <div class="mypage_menu_btn_box"><a href="{'/'|base_url}payment/out"><img src="{'/'|base_url}images/payment_btn.png"></a></div>
                                <div class="mypage_menu_btn_box"><img src="{'/'|base_url}images/toto_btn.png"></div>
                                <div class="mypage_menu_btn_box"><a href="{'/'|base_url}payment/history"><img src="{'/'|base_url}images/userdata_btn.png"></a></div>
                                <div class="mypage_menu_btn_box"><img src="{'/'|base_url}images/friend_btn.png"></div>
                            </div>
                            <div>
                        </div>
                        <!--/.post-inner-->
                    </article>
                    <!--/.post-->
                </section>
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
