<?php /* Smarty version Smarty-3.1.8, created on 2016-06-01 22:50:43
         compiled from "/home/sites/heteml/users/p/l/a/planx/web/test/casino/application/views/templates/top/sp/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18196652175744220bb15e60-24519645%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0b12adea2c6a67e82882d909e10422670ffaa974' => 
    array (
      0 => '/home/sites/heteml/users/p/l/a/planx/web/test/casino/application/views/templates/top/sp/index.tpl',
      1 => 1464787649,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18196652175744220bb15e60-24519645',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5744220bb2c7d8_31919842',
  'variables' => 
  array (
    'form_style' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5744220bb2c7d8_31919842')) {function content_5744220bb2c7d8_31919842($_smarty_tpl) {?><body class="home blog col-1c full-width topbar-enabled unknown">
<div id="wrapper">
<?php echo $_smarty_tpl->getSubTemplate ('common/sp/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div class="container container_bg" id="page">
		<div id="head_space" class="clearfix"> 
			<div class="flexslider" id="flexslider-featured">
				<script>
                
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
							<img src="<?php echo base_url('/');?>
images/topbana.jpg" alt="" title="" />
						</div>
						<div id="topsp" class="slider_image img-liquid"> 
							<div class="overlayer"></div>
							<img src="<?php echo base_url('/');?>
images/topbana_sp.jpg" alt="" title="" />
						</div>
					</li>
				</ul>
			</div>
			<!--/.featured-->
		</div>

		<div class="container-inner container-inner2 freespace-pad">
			<div class="login_block">
				<a href="<?php echo base_url('/');?>
signup/"><img src="<?php echo base_url('/');?>
images/regist_btn.png"></a><img id="trigger-overlay" src="<?php echo base_url('/');?>
images/login_btn.png">
			</div>
			<div class="widget-meta">  
				<h2 class='widgettitle wow'>イベント一覧<span class="left" style="background-color:#f1b458;"></span> <span class="right" style="background-color:#f1b458;"></span></h2>
				<div class='subtitle wow ' data-wow-delay="0.2s">ネオカジで行われているお得なイベント一覧。</div>
			</div>
			<div id="owl_wrapper">
				<ul class="owl alx-slider group thumbs-enabled owl-carousel">
					<li class="item project-item style-1">
						<figure>
							<img width="520" height="520" src="<?php echo base_url('/');?>
images/2016/05/test4-520x520.jpg" class="attachment-thumb-medium size-thumb-medium wp-post-image" alt="test4" srcset="<?php echo base_url('/');?>
images/2016/05/test4-520x520.jpg 520w, <?php echo base_url('/');?>
images/2016/05/test4-150x150.jpg 150w, <?php echo base_url('/');?>
images/2016/05/test4-300x300.jpg 300w, <?php echo base_url('/');?>
images/2016/05/test4-100x100.jpg 100w, <?php echo base_url('/');?>
images/2016/05/test4.jpg 306w" sizes="(max-width: 520px) 100vw, 520px" />
							<figcaption>
								<a href="#
								" title="敗者キャッシュバック"></a>
								<div class="project-info">
									<h4><a href="/kjn/2016/05/07/%e6%95%97%e8%80%85%e3%82%ad%e3%83%a3%e3%83%83%e3%82%b7%e3%83%a5%e3%83%90%e3%83%83%e3%82%af/" title="敗者キャッシュバック">敗者キャッシュバック</a></h4>
									<div class="project-categories"><a href="/kjn/category/%e3%82%a4%e3%83%99%e3%83%b3%e3%83%88/" rel="category tag">イベント</a></div>
								</div>
								<div class="project-links"><a href="/kjn/wp-content/uploads/2016/05/test4.jpg" data-rel="lightbox-0" title="敗者キャッシュバック"><i class="fa fa-arrows-alt"></i></a> <a title="敗者キャッシュバック" href="/kjn/2016/05/07/%e6%95%97%e8%80%85%e3%82%ad%e3%83%a3%e3%83%83%e3%82%b7%e3%83%a5%e3%83%90%e3%83%83%e3%82%af/"><i class="fa fa-share"></i></a></div>
    						</figcaption>
						</figure>
					</li>
					<li class="item project-item style-1">
						<figure>
							<img width="520" height="520" src="<?php echo base_url('/');?>
images/2016/05/test3-520x520.jpg" class="attachment-thumb-medium size-thumb-medium wp-post-image" alt="test3" srcset="<?php echo base_url('/');?>
images/2016/05/test3-520x520.jpg 520w, <?php echo base_url('/');?>
images/2016/05/test3-150x150.jpg 150w, <?php echo base_url('/');?>
image/2016/05/test3-300x300.jpg 300w, <?php echo base_url('/');?>
images/2016/05/test3-100x100.jpg 100w, <?php echo base_url('/');?>
images/2016/05/test3.jpg 327w" sizes="(max-width: 520px) 100vw, 520px" />
							<figcaption>
								<a href="#" title="紹介者コインバック"></a>
								<div class="project-info">
									<h4><a href="/kjn/2016/05/07/%e7%b4%b9%e4%bb%8b%e8%80%85%e3%82%ad%e3%83%a3%e3%83%83%e3%82%b7%e3%83%a5%e3%83%90%e3%83%83%e3%82%af%e3%82%b3%e3%82%a4%e3%83%b3%e3%82%ad%e3%83%a3%e3%83%b3%e3%83%9a%e3%83%bc%e3%83%b3/" title="紹介者コインバック">紹介者コインバック</a></h4>
									<div class="project-categories"><a href="/kjn/category/%e3%82%a4%e3%83%99%e3%83%b3%e3%83%88/" rel="category tag">イベント</a></div>
								</div>
								<div class="project-links"><a href="/kjn/wp-content/uploads/2016/05/test3.jpg" data-rel="lightbox-0" title="紹介者コインバック"><i class="fa fa-arrows-alt"></i></a> <a title="紹介者コインバック" href="/kjn/2016/05/07/%e7%b4%b9%e4%bb%8b%e8%80%85%e3%82%ad%e3%83%a3%e3%83%83%e3%82%b7%e3%83%a5%e3%83%90%e3%83%83%e3%82%af%e3%82%b3%e3%82%a4%e3%83%b3%e3%82%ad%e3%83%a3%e3%83%b3%e3%83%9a%e3%83%bc%e3%83%b3/"><i class="fa fa-share"></i></a></div>
							</figcaption>
						</figure>
					</li>
					<li class="item project-item style-1">
						<figure>
							<img width="520" height="520" src="<?php echo base_url('/');?>
images/2016/05/test2-520x520.jpg" class="attachment-thumb-medium size-thumb-medium wp-post-image" alt="test2" srcset="<?php echo base_url('/');?>
images/2016/05/test2-520x520.jpg 520w, <?php echo base_url('/');?>
images/2016/05/test2-150x150.jpg 150w, <?php echo base_url('/');?>
images/2016/05/test2-300x300.jpg 300w, <?php echo base_url('/');?>
images/2016/05/test2-100x100.jpg 100w, <?php echo base_url('/');?>
images/2016/05/test2.jpg 400w" sizes="(max-width: 520px) 100vw, 520px" />
							<figcaption>
								<a href="#" title="ネオカジオープンキャンペーン"></a>
								<div class="project-info">
									<h4><a href="/kjn/2016/05/07/%e3%83%8d%e3%82%aa%e3%82%ab%e3%82%b8%e3%82%aa%e3%83%bc%e3%83%97%e3%83%b3%e3%82%ad%e3%83%a3%e3%83%b3%e3%83%9a%e3%83%bc%e3%83%b3/" title="ネオカジオープンキャンペーン">ネオカジオープンキャンペ...</a></h4>
									<div class="project-categories"><a href="/kjn/category/%e3%82%a4%e3%83%99%e3%83%b3%e3%83%88/" rel="category tag">イベント</a></div>
								</div>
								<div class="project-links"><a href="/kjn/wp-content/uploads/2016/05/test2.jpg" data-rel="lightbox-0" title="ネオカジオープンキャンペーン"><i class="fa fa-arrows-alt"></i></a> <a title="ネオカジオープンキャンペーン" href="/kjn/2016/05/07/%e3%83%8d%e3%82%aa%e3%82%ab%e3%82%b8%e3%82%aa%e3%83%bc%e3%83%97%e3%83%b3%e3%82%ad%e3%83%a3%e3%83%b3%e3%83%9a%e3%83%bc%e3%83%b3/"><i class="fa fa-share"></i></a></div>
							</figcaption>
						</figure>
					</li>
					<li class="item project-item style-1">
						<figure>
							<img width="520" height="520" src="<?php echo base_url('/');?>
images/2016/05/test1-520x520.jpg" class="attachment-thumb-medium size-thumb-medium wp-post-image" alt="test1" srcset="<?php echo base_url('/');?>
images/2016/05/test1-520x520.jpg 520w, <?php echo base_url('/');?>
images/2016/05/test1-150x150.jpg 150w, <?php echo base_url('/');?>
images/2016/05/test1-300x300.jpg 300w, <?php echo base_url('/');?>
images/2016/05/test1-100x100.jpg 100w, <?php echo base_url('/');?>
images/2016/05/test1.jpg 557w" sizes="(max-width: 520px) 100vw, 520px" />
							<figcaption>
								<a href="#" title="入金5%コイン追加キャンペーン"></a>
								<div class="project-info">
									<h4><a href="/kjn/2016/05/07/%e5%85%a5%e9%87%915%e3%82%b3%e3%82%a4%e3%83%b3%e8%bf%bd%e5%8a%a0%e3%82%ad%e3%83%a3%e3%83%b3%e3%83%9a%e3%83%bc%e3%83%b3/" title="入金5%コイン追加キャンペーン">入金5%コイン追加キャン...</a></h4>
									<div class="project-categories"><a href="/kjn/category/%e3%82%a4%e3%83%99%e3%83%b3%e3%83%88/" rel="category tag">イベント</a></div>
								</div>
								<div class="project-links"><a href="/kjn/wp-content/uploads/2016/05/test1.jpg" data-rel="lightbox-0" title="入金5%コイン追加キャンペーン"><i class="fa fa-arrows-alt"></i></a> <a title="入金5%コイン追加キャンペーン" href="/kjn/2016/05/07/%e5%85%a5%e9%87%915%e3%82%b3%e3%82%a4%e3%83%b3%e8%bf%bd%e5%8a%a0%e3%82%ad%e3%83%a3%e3%83%b3%e3%83%9a%e3%83%bc%e3%83%b3/"><i class="fa fa-share"></i></a></div>
							</figcaption>
						</figure>
					</li>
				</ul>
			</div>
			<div class="content_all cf">
				<div class="content_l">
					<h3 class="lanking_title"><img src="<?php echo base_url('/');?>
images/lanking_title.png"></h3>
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
					<h3 class="lanking_title"><img src="<?php echo base_url('/');?>
images/news_title.png"></h3>
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
<?php echo $_smarty_tpl->getSubTemplate ('common/sp/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


</div>
<!--/#wrapper-->

<?php echo $_smarty_tpl->getSubTemplate ('common/sp/footer_script.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('common/sp/navi.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div class="overlay overlay-contentscale">
		<button type="button" class="overlay-close">Close</button>
		<div class="loginbox">
			<h3><img src="<?php echo base_url('/');?>
images/neo_casino_logo2.png" /></h3>
			<p style="text-align:center; margin-top:10px;">ネオカジノにログイン</p>
			
      <?php echo form_open('login',$_smarty_tpl->tpl_vars['form_style']->value);?>

				<ul>
					<li>ログインID：<?php echo form_input('user_email');?>
</li>
					<li>パスワード：<?php echo form_password('password');?>
</li>
				</ul>
				<p style="text-align:center;"><input class="login_btn" type="submit" name="login_submit" value="ログイン" /><?php echo form_submit('submit','ログイン');?>
</p>
				<p style="margin-top:10px;">アカウントをお持ちでない場合は<a href="<?php echo base_url('/');?>
signup/sp">登録へ</a></p>
        <?php echo form_close();?>

			</form>
		</div>
	</div>
<?php }} ?>