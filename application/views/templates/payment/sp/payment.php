<?php
require_once("lib/Func_Escape.php");
define('_BCC1', 'info@casanavi.co.jp,kuni@planx.jp,324@casanavi.co.jp');
//define('_BCC1', 'info@casanavi.co.jp,kuni@planx.jp');
//define('_BCC1', 'kuni@planx.jp');
define('_Tax', 0.05);
session_start();

#*************************************
#*  データ受取、エスケープ、変数展開
#*************************************
if(!empty($_POST))
{
	$escape_POST = Escape($_POST, "escape_POST");
	extract($escape_POST);
}
#*************************************
#*  back処理
#*************************************
if(isset($back))
{
	extract($_SESSION);
}
#*************************************
#*  送信処理
#*************************************
if(isset($send))
{
	extract($_SESSION);

	//IPとブラウザの取得
	$ip = getenv("REMOTE_ADDR");
	$user = getenv("HTTP_USER_AGENT");

	//ここからセブ島API処理
	require_once("lib/StringEncrypter.php");
	require_once("lib/Nihtan_API.php");
	require_once("lib/neo_define.php");

	$params['public_key'] = '7b2bc08226811a42cbd5e70762aac5b7';
	$params['secret_key'] = '1b5515594819ffe711c3f9ae53e803d8';
	$params['meta'] = array(
				'client_id' => 'ModuleTestID0001',
				'client_username' => 'ModuleTest',
				'fallback_url' => 'http://test.planx.jp/kjn/payment_complete.php',
				'receiver_url' => 'http://test.planx.jp/kjn/payment_complete.php' // Point your domain or IP here then the path to the receiver php file
				);

	$api = new Nihtan_API($params);

	// STEP 3: Call the transfer_money_then_redirect() method
	// 		Provide the transfer amount in parameter 1 : Double(15,2)
	// 		Provide the transfer method (either 'cash_in' or 'cash_out') in parameter 2 : String
	$transfer_amount = $pay_number;
	$transfer_method = 'cash_in';

	$api->transfer_money_then_redirect($transfer_amount, $transfer_method, 'test1111');

/*
	//メールライブラリの読み込み
	require_once("bp_contact_text.php");
	require_once("lib/mail/qdmail.php");

	//メール組み立てClassの実行
	$qdmail = new Qdmail();
	$qdmail->to($mail1, '');
	$qdmail->subject('ATRES - 建材補助剤のご注文有難うございます。');
	$qdmail->text($text);
	//$qdmail->from('kuni@planx.jp','カーサナビ事務局');
	$qdmail->from('info@neocasino.com','');
	$qdmail->bcc(_BCC1);
	
	if($qdmail->send() == false)
	{
		$msg = "
				<div class=\"msg_box\">
					送信に失敗しました。<br />もう一度再送信するか時間をおいて送信してみて下さい。
				</div>
		";
		require_once("payment_confirm.php");
		exit();
	}
	else
	{
		$meta = "<meta http-equiv=\"Refresh\" content=\"3;URL=http://www.casanavi.co.jp/inaba/index.html\">";
		require_once("payment_complete.php");
		exit();
	}
	*/
	require_once("payment_complete.php");
}

#*************************************
#*  入力データエラーチェック
#*************************************
if(isset($check))
{
	//カタカナ判定を行えるようにする
	mb_regex_encoding("EUC-JP");

	$buy_checked1 = "";
	$buy_checked2 = "";

	if($pay_number < 5)
	{
		$err_msg .= "最低ご入金金額は$5からになります。<br />";
	}
	if(empty($neteller_id))
	{
		$err_msg .= "NETELLER IDが入力されていません。<br />";
	}
	if(empty($neteller_pass))
	{
		$err_msg .= "NETELLERパスワードが入力されていません。";
	}


	//エラーがなかった場合の処理とあった場合の処理
	if(empty($err_msg))
	{
		$msg = '
			<div class=\"msg_box\" style="color:#fff;">
				入力内容に間違いがなければ「入金する」ボタンを、<br />修正する場合は「戻る」ボタンを押してください。
			</div>
		';
		$btn = '<input type="submit" name="send" value="　入金する　" class="login_btn">　　<input type="submit" name="back" value="　戻　る　" style="background:#fff;" class="login_btn">';

		unset($_SESSION["check"]);
		$_SESSION["pay_number"] = $pay_number;
		$_SESSION["neteller_id"] = $neteller_id;
		$_SESSION["neteller_pass"] = $neteller_pass;
		require_once("payment_confirm.php");
		exit();
	}
	else
	{
		$err_div = '<div class="error">'.$err_msg.'</div>';
	}
}

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
<link rel='stylesheet' id='style-css'  href="/kjn/wp-content/themes/mutation/style.css?ver=4.5.2" type='text/css' media='all' />
<link rel='stylesheet' id='custom-css'  href="/kjn/wp-content/themes/mutation/custom.css?ver=4.5.2" type='text/css' media='all' />
<link rel='stylesheet' id='responsive-css'  href="/kjn/wp-content/themes/mutation/responsive.css?ver=4.5.2" type='text/css' media='all' />
<link rel='stylesheet' id='drawer-css'  href="/kjn/wp-content/themes/mutation/drawer.css?ver=4.5.2" type='text/css' media='all' />
<link rel='stylesheet' id='font-awesome-css'  href="/kjn/wp-content/themes/mutation/fonts/font-awesome.min.css?ver=4.5.2" type='text/css' media='all' />
<link rel='stylesheet' id='animate-css'  href="/kjn/wp-content/themes/mutation/animate.min.css?ver=4.5.2" type='text/css' media='all' />
<link rel='stylesheet' id='megamenu-css'  href="/kjn/wp-content/themes/mutation/functions/megamenu.css?ver=4.5.2" type='text/css' media='all' />
<link rel='stylesheet' href="/kjn/css/style8.css" type='text/css' media='all' />
<link rel='stylesheet' href="/kjn/css/neocasi.css" type='text/css' media='all' />
<link rel='stylesheet' href="/kjn/css/override1.css" type='text/css' media='all' />
<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js?ver=4.5.2"></script>
<script type='text/javascript' src="/kjn/wp-content/themes/mutation/js/jquery.flexslider.min.js?ver=4.5.2"></script>
<script type='text/javascript' src="//maps.google.com/maps/api/js?v=3"></script>
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
<meta name="twitter:image:src" content=""><!--[if lt IE 9]>
<script src="/kjn/wp-content/themes/mutation/js/ie/html5.js"></script>
<script src="/kjn/wp-content/themes/mutation/js/ie/selectivizr.js"></script>
<![endif]-->
</head>
<body class="single single-post postid-21 single-format-standard col-1c full-width topbar-enabled unknown">
<div id="wrapper">
	<header id="header">
		<div id="header-inner" class="container-inner">
			<div id="logo-small">
				<h1 class="site-title"><a href="/kjn/" rel="home" itemprop="url"><img src="/kjn/wp-content/uploads/2016/05/top_logo.png" alt="テスト"></a></h1>
			</div>
    		<!--#nav-topbar-->
			<nav  id="nav-topbar"> 
	    	<!--smartphone drawer menu--> 
	    		<a class="nav-toggle-smart" href="#menu"> <span></span> </a> 
			<!--/smartphone drawer menu-->

				<div class="nav-wrap container">
		        	<ul id="menu-menu-1" class="nav container-inner group">
		        		<li id="menu-item-10" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home"><a href="/kjn/"><div class="menu_title">ホーム</div><div class="menu_description"></div></a></li>
						<li id="menu-item-14" class="menu-item menu-item-type-custom menu-item-object-custom"><a href="http://yahoo.co.jp"><div class="menu_title">イベント</div><div class="menu_description"></div></a></li>
						<li id="menu-item-15" class="menu-item menu-item-type-custom menu-item-object-custom"><a href="http://yahoo.co.jp"><div class="menu_title">help</div><div class="menu_description"></div></a></li>
						<li id="menu-item-15" class="menu-item menu-item-type-custom menu-item-object-custom"><a href="neteller.html"><div class="menu_title">NETELLER</div><div class="menu_description"></div></a></li>
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
					<img width="960" height="440" src="img/sub_bg_head.jpg" class="attachment-thumb-large size-thumb-large wp-post-image" alt="test3" />                   
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
							<?php echo $err_div; ?>
						</div><!--/.page-title-->
						<div class="pad group">
							<article class="post-21 post type-post status-publish format-standard has-post-thumbnail hentry category-3">
								<div class="entry share">
									<form action="payment.php" method="post" enctype="multipart/form-data">
										<div class="entry-inner clearfix">
											<table class="regist_table">
												<tr>
													<th>入金金額(USD)</th><td style="border-top:1px solid #fff;"><input type="number" value="<?php echo $pay_number; ?>" name="pay_number" /></td>
												</tr>
												<tr>
													<th>NETELLER ID</th><td><input type="text" value="<?php echo $neteller_id ?>" name="neteller_id" /><br />アカウントIDまたはメールアドレス(ご本人様名義のみ利用可)</td>
												</tr>
												<tr>
													<th>PASSWORD</th><td><input type="password" value="<?php echo $neteller_pass ?>" name="neteller_pass" /><br />セキュアIDまたは認証コード(ご本人様名義のアカウントのみ利用可)</td>
												</tr>
											</table>
											<div style="text-align:center;"><input class="login_btn" type="submit" name="check" value="入金確認画面へ" /></div>
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
	<footer id="footer">
		<section class="container" id="footer-bottom">
			<div class="container-inner">
				<div class="pad group">
					<div><img src="img/under_bana.png" /></div>
					<div class="content_all cf">
						<div class="content_l">
							<img src="img/licence.png" />
						</div>
						<div class="content_l">
							<img src="img/under18ng.png" />
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

<script type='text/javascript' src="/kjn/wp-content/themes/mutation/js/jquery.jplayer.min.js?ver=4.5.2"></script>
<script type='text/javascript' src="/kjn/wp-content/themes/mutation/js/owl.carousel.js?ver=4.5.2"></script>
<script type='text/javascript' src="/kjn/wp-content/themes/mutation/js/wow.js?ver=4.5.2"></script>
<script type='text/javascript' src="/kjn/wp-content/themes/mutation/js/jquery.mmenu.min.all.js?ver=4.5.2"></script>
<script type='text/javascript' src="/kjn/wp-content/themes/mutation/js/SmoothScroll.js?ver=4.5.2"></script>
<script type='text/javascript' src="/kjn/wp-content/themes/mutation/js/jquery.easing.1.3.js?ver=4.5.2"></script>
<script type='text/javascript' src="/kjn/wp-content/themes/mutation/js/jquery.scrolly.js?ver=4.5.2"></script>
<script type='text/javascript' src="/kjn/wp-content/themes/mutation/js/imgLiquid-min.js?ver=4.5.2"></script>
<script type='text/javascript' src="/kjn/wp-content/themes/mutation/js/scripts.js?ver=4.5.2"></script>
<script type='text/javascript' src="/kjn/wp-content/themes/mutation/js/social-button.js?ver=4.5.2"></script>
<script type='text/javascript' src="/kjn/wp-content/themes/mutation/functions/megamenu.js?ver=4.5.2"></script>
<script type='text/javascript' src="/kjn/wp-includes/js/wp-embed.min.js?ver=4.5.2"></script>
<!--[if lt IE 9]>
<script src="/kjn/wp-content/themes/mutation/js/ie/respond.js"></script>
<![endif]-->
  <!--drawer menu-->
	<nav id="menu">
	    <ul id="menu-menu-2" class=""><li id="menu-item-10" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home"><a href="/kjn/"><div class="menu_title">ホーム</div><div class="menu_description"></div></a></li>
			<li id="menu-item-14" class="menu-item menu-item-type-custom menu-item-object-custom"><a href="http://yahoo.co.jp"><div class="menu_title">イベント</div><div class="menu_description"></div></a></li>
			<li id="menu-item-15" class="menu-item menu-item-type-custom menu-item-object-custom"><a href="http://yahoo.co.jp"><div class="menu_title">help</div><div class="menu_description"></div></a></li>
			<li id="menu-item-15" class="menu-item menu-item-type-custom menu-item-object-custom"><a href="neteller.html"><div class="menu_title">NETELLER</div><div class="menu_description"></div></a></li>
		</ul>
	</nav>
  <!--/drawer menu-->

</body></html>