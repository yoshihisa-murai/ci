<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = config_item( "base_url" );
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="ja" class="ie6 oldie no-js"> <![endif]-->
<!--[if IE 7 ]>    <html lang="ja" class="ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="ja" class="ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="ja" class="ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="ja" class="js">
<!--<![endif]-->
<head>
<meta http-equiv="Last-Modified" content="Tue, 10 May 2016 22:58:29 GMT">
<meta charset="UTF-8">
<title>紹介者コインバック &#8211; テスト</title>
<meta name='robots' content='noindex,follow' />
<meta http-equiv="Expires" content="604800">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel='stylesheet' id='style-css'  href="<?php echo $base_url?>css/style.css?ver=4.5.2" type='text/css' media='all' />
<link rel='stylesheet' id='custom-css'  href="<?php echo $base_url?>css/custom.css?ver=4.5.2" type='text/css' media='all' />
<link rel='stylesheet' id='responsive-css'  href="<?php echo $base_url?>css/responsive.css?ver=4.5.2" type='text/css' media='all' />
<link rel='stylesheet' id='drawer-css'  href="<?php echo $base_url?>css/drawer.css?ver=4.5.2" type='text/css' media='all' />
<link rel='stylesheet' id='font-awesome-css'  href="<?php echo $base_url?>fonts/font-awesome.min.css?ver=4.5.2" type='text/css' media='all' />
<link rel='stylesheet' id='animate-css'  href="<?php echo $base_url?>css/animate.min.css?ver=4.5.2" type='text/css' media='all' />
<link rel='stylesheet' id='megamenu-css'  href="<?php echo $base_url?>css/megamenu.css?ver=4.5.2" type='text/css' media='all' />
<link rel='stylesheet' href="/kjn/css/style8.css" type='text/css' media='all' />
<link rel='stylesheet' href="/kjn/css/neocasi.css" type='text/css' media='all' />
<link rel='stylesheet' href="/kjn/css/override1.css" type='text/css' media='all' />
<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js?ver=4.5.2"></script>
<script type='text/javascript' src="<?php echo $base_url?>js/jquery.flexslider.min.js?ver=4.5.2"></script>
<script type='text/javascript' src="//maps.google.com/maps/api/js?v=3"></script>
<?php
/*
<link rel='https://api.w.org/' href="/kjn/wp-json/" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="/kjn/wp-includes/wlwmanifest.xml" /> 
<link rel='prev' title='ネオカジオープンキャンペーン' href="/kjn/2016/05/07/%e3%83%8d%e3%82%aa%e3%82%ab%e3%82%b8%e3%82%aa%e3%83%bc%e3%83%97%e3%83%b3%e3%82%ad%e3%83%a3%e3%83%b3%e3%83%9a%e3%83%bc%e3%83%b3/" />
<link rel='next' title='敗者キャッシュバック' href="/kjn/2016/05/07/%e6%95%97%e8%80%85%e3%82%ad%e3%83%a3%e3%83%83%e3%82%b7%e3%83%a5%e3%83%90%e3%83%83%e3%82%af/" />
<link rel="canonical" href="http://test.planx.jp/kjn/2016/05/07/%e7%b4%b9%e4%bb%8b%e8%80%85%e3%82%ad%e3%83%a3%e3%83%83%e3%82%b7%e3%83%a5%e3%83%90%e3%83%83%e3%82%af%e3%82%b3%e3%82%a4%e3%83%b3%e3%82%ad%e3%83%a3%e3%83%b3%e3%83%9a%e3%83%bc%e3%83%b3/" />
<link rel="alternate" type="application/json+oembed" href="/kjn/wp-json/oembed/1.0/embed?url=http%3A%2F%2Ftest.planx.jp%2Fkjn%2F2016%2F05%2F07%2F%25e7%25b4%25b9%25e4%25bb%258b%25e8%2580%2585%25e3%2582%25ad%25e3%2583%25a3%25e3%2583%2583%25e3%2582%25b7%25e3%2583%25a5%25e3%2583%2590%25e3%2583%2583%25e3%2582%25af%25e3%2582%25b3%25e3%2582%25a4%25e3%2583%25b3%25e3%2582%25ad%25e3%2583%25a3%25e3%2583%25b3%25e3%2583%259a%25e3%2583%25bc%25e3%2583%25b3%2F" />
<link rel="alternate" type="text/xml+oembed" href="/kjn/wp-json/oembed/1.0/embed?url=http%3A%2F%2Ftest.planx.jp%2Fkjn%2F2016%2F05%2F07%2F%25e7%25b4%25b9%25e4%25bb%258b%25e8%2580%2585%25e3%2582%25ad%25e3%2583%25a3%25e3%2583%2583%25e3%2582%25b7%25e3%2583%25a5%25e3%2583%2590%25e3%2583%2583%25e3%2582%25af%25e3%2582%25b3%25e3%2582%25a4%25e3%2583%25b3%25e3%2582%25ad%25e3%2583%25a3%25e3%2583%25b3%25e3%2583%259a%25e3%2583%25bc%25e3%2583%25b3%2F&#038;format=xml" />
<meta property="og:type" content="article" />
<meta property="og:title" content="紹介者コインバック | " />
<meta property="og:description" content="仮ページ" />
<meta property="og:url" content="http://test.planx.jp/kjn/2016/05/07/%e7%b4%b9%e4%bb%8b%e8%80%85%e3%82%ad%e3%83%a3%e3%83%83%e3%82%b7%e3%83%a5%e3%83%90%e3%83%83%e3%82%af%e3%82%b3%e3%82%a4%e3%83%b3%e3%82%ad%e3%83%a3%e3%83%b3%e3%83%9a%e3%83%bc%e3%83%b3/" />
<meta property="og:image" content="" />
<meta property="og:site_name" content="テスト" />
<meta property="og:locale" content="ja_JP" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="@" />
<meta name="twitter:image:src" content="">
 */
?>
<!--[if lt IE 9]>
<script src="<?php echo $base_url?>js/ie/html5.js"></script>
<script src="<?php echo $base_url?>js/ie/selectivizr.js"></script>
<![endif]-->
</head>
<body class="single single-post postid-21 single-format-standard col-1c full-width topbar-enabled unknown">
<div id="wrapper">
    <header id="header">
        <div id="header-inner" class="container-inner">
            <div id="logo-small">
                <h1 class="site-title"><a href="<?php echo $base_url?>" rel="home" itemprop="url"><img src="<?php echo $base_url?>images/2016/05/top_logo.png" alt="テスト"></a></h1>
            </div>
            <!--#nav-topbar-->
            <nav  id="nav-topbar"> 
            <!--smartphone drawer menu--> 
                <a class="nav-toggle-smart" href="#menu"> <span></span> </a> 
            <!--/smartphone drawer menu-->

                <div class="nav-wrap container">
                    <ul id="menu-menu-1" class="nav container-inner group">
                        <li id="menu-item-10" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home"><a href="<?php echo $base_url?>"><div class="menu_title">ホーム</div><div class="menu_description"></div></a></li>
                        <li id="menu-item-14" class="menu-item menu-item-type-custom menu-item-object-custom"><a href="http://yahoo.co.jp"><div class="menu_title">イベント</div><div class="menu_description"></div></a></li>
                        <li id="menu-item-15" class="menu-item menu-item-type-custom menu-item-object-custom"><a href="http://yahoo.co.jp"><div class="menu_title">help</div><div class="menu_description"></div></a></li>
                        <li id="menu-item-15" class="menu-item menu-item-type-custom menu-item-object-custom"><a href="<?php echo $base_url?>neteller/"><div class="menu_title">NETELLER</div><div class="menu_description"></div></a></li>
                    </ul>
                </div>
                <div class="toggle-search"><i class="fa fa-search"></i></div>
                <div class="search-expand">
                    <div class="search-expand-inner">
                        <form method="get" class="searchform themeform" action="/kjn/">
                            <div>
                                <input type="text" class="search" name="s" onblur="if(this.value=='')this.value='検索キーワードを入力して、Enterキーをクリックします';" onfocus="if(this.value=='検索キーワードを入力して、Enterキーをクリックします')this.value='';" value="検索キーワードを入力して、Enterキーをクリックします" />
                            </div>
                        </form>
                    </div>
                </div>
            </nav>
            <!--/#nav-topbar--> 
            <!--/.container-inner--> 
            <!--/.container--> 
          </div>
    </header>
    <!--/#header-->

    <div class="container container_bg" id="page">
        <div id="head_space" class="clearfix"> 
            <div class="page-image">
                <div class="image-container">
                    <img width="960" height="440" src="<?php echo $base_url?>images/sub_bg_head.jpg" class="attachment-thumb-large size-thumb-large wp-post-image" alt="test3" />                   
                </div>
            </div><!--/.page-image-->
        </div>
        <div class="container-inner container-inner2 up_margin">
            <div class="main">
                <div class="main-inner group">
                    <section class="content">
                        <div class="page-title pad">
                            <h1 class="post-title entry-title"><?php echo $heading; ?></h1>
                            <p style="color:#fff;"><?php echo $message; ?></p>
                        </div><!--/.page-title-->
                        <div class="pad group">
                            <article class="post-21 post type-post status-publish format-standard has-post-thumbnail hentry category-3">
                                <div class="entry share">
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
    <footer id="footer">
        <section class="container" id="footer-bottom">
            <div class="container-inner">
                <div class="pad group">
                    <div><img src="<?php echo $base_url?>images/under_bana.png" /></div>
                    <div class="content_all cf">
                        <div class="content_l">
                            <img src="<?php echo $base_url?>images/licence.png" />
                        </div>
                        <div class="content_l">
                            <img src="<?php echo $base_url?>images/under18ng.png" />
                        </div>
                    </div>
                    <div class="footer_copyright">
                        <div id="copyright">
                            <p>&copy; 2016.テストAll Rights Reserved.</p>
                        </div>
                        <!--/#copyright-->
                    </div>
                    <div class="oi_soc_icons clearfix"></div>
                </div>
                <!--/.pad--> 
            </div>
            <!--/.container-inner--> 
        </section>
        <!--/.container--> 
    </footer>
    <!--/#footer-->
</div>
<!--/#wrapper-->

<script type='text/javascript' src="<?php echo $base_url?>js/jquery.jplayer.min.js?ver=4.5.2"></script>
<script type='text/javascript' src="<?php echo $base_url?>js/owl.carousel.js?ver=4.5.2"></script>
<script type='text/javascript' src="<?php echo $base_url?>js/wow.js?ver=4.5.2"></script>
<script type='text/javascript' src="<?php echo $base_url?>js/jquery.mmenu.min.all.js?ver=4.5.2"></script>
<script type='text/javascript' src="<?php echo $base_url?>js/SmoothScroll.js?ver=4.5.2"></script>
<script type='text/javascript' src="<?php echo $base_url?>js/jquery.easing.1.3.js?ver=4.5.2"></script>
<script type='text/javascript' src="<?php echo $base_url?>js/jquery.scrolly.js?ver=4.5.2"></script>
<script type='text/javascript' src="<?php echo $base_url?>js/imgLiquid-min.js?ver=4.5.2"></script>
<script type='text/javascript' src="<?php echo $base_url?>js/scripts.js?ver=4.5.2"></script>
<script type='text/javascript' src="<?php echo $base_url?>js/social-button.js?ver=4.5.2"></script>
<script type='text/javascript' src="<?php echo $base_url?>js/megamenu.js?ver=4.5.2"></script>
<script type='text/javascript' src="<?php echo $base_url?>js/wp-embed.min.js?ver=4.5.2"></script>
<!--[if lt IE 9]>
<script src="<?php echo $base_url?>js/ie/respond.js"></script>
<![endif]-->
  <!--drawer menu-->
    <nav id="menu">
        <ul id="menu-menu-2" class=""><li id="menu-item-10" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home"><a href="<?php echo $base_url?>"><div class="menu_title">ホーム</div><div class="menu_description"></div></a></li>
            <li id="menu-item-14" class="menu-item menu-item-type-custom menu-item-object-custom"><a href="http://yahoo.co.jp"><div class="menu_title">イベント</div><div class="menu_description"></div></a></li>
            <li id="menu-item-15" class="menu-item menu-item-type-custom menu-item-object-custom"><a href="http://yahoo.co.jp"><div class="menu_title">help</div><div class="menu_description"></div></a></li>
            <li id="menu-item-15" class="menu-item menu-item-type-custom menu-item-object-custom"><a href="<?php echo $base_url?>neteller/"><div class="menu_title">NETELLER</div><div class="menu_description"></div></a></li>
        </ul>
    </nav>
  <!--/drawer menu-->

</body></html>
