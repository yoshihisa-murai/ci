{if !$is_login}
<body class="home blog col-1c full-width topbar-enabled unknown">
<div id="wrapper">
{include file='common/header.tpl'}

    <div class="container container_bg" id="page">
        <div id="head_space" class="clearfix"> 
            <div class="flexslider" id="flexslider-featured">
                <script>
                {literal}
                jQuery(document).ready(function(){
                    var firstImage = jQuery('#flexslider-featured').find('img').filter(':first'),
                    checkforloaded = setInterval(function() {
                        var image = firstImage.get(0);
                        if (image.complete || image.readyState == 'complete' || image.readyState == 4) {
                            clearInterval(checkforloaded);
                            jQuery('#flexslider-featured').flexslider({
                                animation: 'fade',
                                useCSS: false, // Fix iPad flickering issue
                                slideshow: true,
                                easing: 'swing',
                                directionNav: true,
                                controlNav: true,
                                pauseOnHover: true,
                                slideshowSpeed: 7000,
                                animationSpeed: 600,
                                smoothHeight: true,
                                touch: true});
                        }
                    }, 20);
                });
                {/literal}
                </script>
                <!--#loading-->
                <div id="loading">
                    <div class="loader"></div>
                </div>
                <!--#loading-->
                <ul class="slides">
                    <li>
                        <div class="feature_meta">
                            <h2 class="fadeInDown wow" data-wow-delay="0.3s"></h2>
                            <div class="feature_description fadeInUp wow" data-wow-delay="0.5s"></div>
                        </div>
                        <div id="toppc" class="slider_image img-liquid"> 
                            <div class="overlayer"></div>
                            <img src="{'/'|base_url}images/topbana.jpg" alt="" title="" />
                        </div>
                        <div id="topsp" class="slider_image img-liquid"> 
                            <div class="overlayer"></div>
                            <img src="{'/'|base_url}images/topbana_sp.jpg" alt="" title="" />
                        </div>
                    </li>
                </ul>
            </div>
            <!--/.featured-->
        </div>

        <div class="container-inner container-inner2 freespace-pad">
            <div class="login_block cf">
                <div class="login_b_l"><a href="{'/'|base_url}signup/"><img src="{'/'|base_url}images/regist_btn2.png"></a></div><div class="login_b_r"><img id="trigger-overlay" src="{'/'|base_url}images/login_btn2.png"></div>
            </div>
            <div class="login_block_sp cf">
                <div class="login_b_l"><a href="{'/'|base_url}signup/"><img src="{'/'|base_url}images/regist_btnsp2.png"></a></div><div class="login_b_r"><img id="trigger-overlay" src="{'/'|base_url}images/login_btnsp2.png"></div>
            </div>
            <h2 class="top_h2">ネオカジノのゲーム</h2>
            <div class="top_game">
                <ul class="top_ul cf">
                	<li><a href="#"><img src="{'/'|base_url}images/top_baccarat.jpg"></a></li>
					<li><a href="#"><img src="{'/'|base_url}images/top_poker.jpg"></a></li>
					<li><a href="#"><img src="{'/'|base_url}images/top_sicbo.jpg"></a></li>
					<li><a href="#"><img src="{'/'|base_url}images/top_toto.jpg"></a></li>
                </ul>
            </div>
            <div class="content_all cf">
                <div class="content_l">
                    <h3 class="lanking_title"><img src="{'/'|base_url}images/lanking_title.png"></h3>
                    <table class="def_table">
                        <tr>
                            <th class="col_b1">1位</th><td class="col_b1">$123,125(Ken)</td>
                        </tr>
                        <tr>
                            <th class="col_b2">2位</th><td class="col_b2">$114,256</td>
                        </tr>
                        <tr>
                            <th class="col_b1">3位</th><td class="col_b1">$98,444</td>
                        </tr>
                        <tr>
                            <th class="col_b2">4位</th><td class="col_b2">$75,799</td>
                        </tr>
                        <tr>
                            <th class="col_b1">5位</th><td class="col_b1">$75,423</td>
                        </tr>
                    </table>
                </div>
                <div class="content_l sp_top1">
                    <h3 class="lanking_title"><img src="{'/'|base_url}images/news_title.png"></h3>
                    <table class="def_table">
                        <tr>
                            <th  class="col_b1">2016.04.01</th><td  class="col_b1">お知らせその1のタイトル</td>
                        </tr>
                        <tr>
                            <th  class="col_b2">2016.04.02</th><td  class="col_b2">お知らせその2のタイトル</td>
                        </tr>
                        <tr>
                            <th  class="col_b1">2016.04.03</th><td  class="col_b1">お知らせその3のタイトル</td>
                        </tr>
                        <tr>
                            <th  class="col_b2">2016.04.04</th><td  class="col_b2">お知らせその4のタイトル</td>
                        </tr>
                        <tr>
                            <th  class="col_b1">2016.04.05</th><td  class="col_b1">お知らせその5のタイトル</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div><!--/.alx-slider-->
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

    <div class="overlay overlay-contentscale">
        <button type="button" class="overlay-close">Close</button>
        <div class="loginbox">
            <h3><img src="{'/'|base_url}images/neo_casino_logo2.png" /></h3>
            <p style="text-align:center; margin-top:10px;">ネオカジノにログイン</p>
            {*<form style="margin-top:10px;" action="mypage.html" method="post" enctype="multipart/form-data">*}
      {form_open( 'login', $form_style )}
                <ul>
                    <li>E-mail：{form_input( 'user_email' )}</li>
                    <li>パスワード：{form_password( 'password' )}</li>
                </ul>
                <p style="text-align:center;"><input class="login_btn" type="submit" name="login_submit" value="ログイン" />{*form_submit( 'submit', 'ログイン' )*}</p>
                <p style="margin-top:10px;">アカウントをお持ちでない場合は<a href="{'/'|base_url}signup/sp">登録へ</a></p>
        {form_close()}
            </form>
        </div>
    </div>
{else}
{include file='top/mypage.tpl'}
{/if}
