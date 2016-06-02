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
                {form_open("signup")}
								<div class="entry share">
									<div class="entry-inner clearfix">
										<table class="regist_table">
											<tr>
												<th>ニックネーム</th><td style="border-top:1px solid #fff;">{form_input('nickname', $input['nickname'])}</td>
											</tr>
											<tr>
												<th>パスワード</th><td>{form_input('password')}</td>
											</tr>
											<tr>
												<th>email</th><td>{form_input('user_email', $input['user_email'])}</td>
											</tr>
											<tr>
												<th>email(確認用)</th><td>{form_input('c_user_email', $input['c_user_email'])}</td>
											</tr>
											<tr>
												<th>姓名</th><td>{form_input('name1', $input['name1'])}{form_input('name2', $input['name2'])}</td>
											</tr>
											<tr>
												<th>生年月日</th><td>{form_input( $form_attr.birth_day.birth_year )}年{form_input( $form_attr.birth_day.birth_month )}月{form_input( $form_attr.birth_day.birth_date )}日</td>
											</tr>
											<tr>
												<th>性別</th><td>男<input type="radio" name="sex" value="1">　女<input type="radio" name="sex" value="2"></td>
											</tr>
											<tr>
												<th>言語種別</th>
												<td>
													<select name="language" style="color:#333;">
														<option value="1">日本語</option>
													</select>
												</td>
											</tr>
											<tr>
												<th>通貨種別</th>
												<td>
													<select name="language" style="color:#333;">
														<option value="1">米ドル</option>
													</select>
												</td>
											</tr>
											<tr>
												<th>国</th>
												<td>
													<select name="language" style="color:#333;">
														<option value="1">日本</option>
													</select>
												</td>
											</tr>
											<tr>
												<th>携帯番号</th>
												<td>
													<select name="language" style="color:#333;">
														<option value="81">(81)</option>
													</select>
                            {form_input( $form_attr.mobile.mobile1 )}-{form_input( $form_attr.mobile.mobile2 )}-{form_input( $form_attr.mobile.mobile3 )}</td>
											</tr>
											<tr>
												<th>郵便番号</th><td>{form_input( $form_attr.addr.add_no1 )}-{form_input( $form_attr.addr.add_no2 )}</td>
											</tr>
											<tr>
												<th>都道府県</th>
												<td>
													<select name="pref_name">
														<option value="" selected>--都道府県を選択してください--</option>
														<option value="北海道">北海道</option>
														<option value="青森県">青森県</option>
														<option value="岩手県">岩手県</option>
														<option value="宮城県">宮城県</option>
														<option value="秋田県">秋田県</option>
														<option value="山形県">山形県</option>
														<option value="福島県">福島県</option>
														<option value="茨城県">茨城県</option>
														<option value="栃木県">栃木県</option>
														<option value="群馬県">群馬県</option>
														<option value="埼玉県">埼玉県</option>
														<option value="千葉県">千葉県</option>
														<option value="東京都">東京都</option>
														<option value="神奈川県">神奈川県</option>
														<option value="新潟県">新潟県</option>
														<option value="富山県">富山県</option>
														<option value="石川県">石川県</option>
														<option value="福井県">福井県</option>
														<option value="山梨県">山梨県</option>
														<option value="長野県">長野県</option>
														<option value="岐阜県">岐阜県</option>
														<option value="静岡県">静岡県</option>
														<option value="愛知県">愛知県</option>
														<option value="三重県">三重県</option>
														<option value="滋賀県">滋賀県</option>
														<option value="京都府">京都府</option>
														<option value="大阪府">大阪府</option>
														<option value="兵庫県">兵庫県</option>
														<option value="奈良県">奈良県</option>
														<option value="和歌山県">和歌山県</option>
														<option value="鳥取県">鳥取県</option>
														<option value="島根県">島根県</option>
														<option value="岡山県">岡山県</option>
														<option value="広島県">広島県</option>
														<option value="山口県">山口県</option>
														<option value="徳島県">徳島県</option>
														<option value="香川県">香川県</option>
														<option value="愛媛県">愛媛県</option>
														<option value="高知県">高知県</option>
														<option value="福岡県">福岡県</option>
														<option value="佐賀県">佐賀県</option>
														<option value="長崎県">長崎県</option>
														<option value="熊本県">熊本県</option>
														<option value="大分県">大分県</option>
														<option value="宮崎県">宮崎県</option>
														<option value="鹿児島県">鹿児島県</option>
														<option value="沖縄県">沖縄県</option>
													</select>
												</td>
											</tr>
											<tr>
												<th>住所</th><td><input type="text" name="add1" value=""></td>
											</tr>
											<tr>
												<th>建物名と部屋番</th><td><input type="text" name="add2" value=""></td>
											</tr>
											<tr>
												<td colspan="2"><input type="checkbox" value="1" name="kiyaku">私は満18歳以上で<a style="color:#e9bc06;" href="{'/'|base_url}agreement">カジノ規約</a>に同意します。</td>
											</tr>
										</table>
										<div style="text-align:center;">{form_submit('submit', '確認画面へ')}</div>
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

<script type='text/javascript' src="{'/'|base_url}js/jquery.jplayer.min.js?ver=4.5.2"></script>
<script type='text/javascript' src="{'/'|base_url}js/owl.carousel.js?ver=4.5.2"></script>
<script type='text/javascript' src="{'/'|base_url}js/wow.js?ver=4.5.2"></script>
<script type='text/javascript' src="{'/'|base_url}js/jquery.mmenu.min.all.js?ver=4.5.2"></script>
<script type='text/javascript' src="{'/'|base_url}js/SmoothScroll.js?ver=4.5.2"></script>
<script type='text/javascript' src="{'/'|base_url}js/jquery.easing.1.3.js?ver=4.5.2"></script>
<script type='text/javascript' src="{'/'|base_url}js/jquery.scrolly.js?ver=4.5.2"></script>
<script type='text/javascript' src="{'/'|base_url}js/imgLiquid-min.js?ver=4.5.2"></script>
<script type='text/javascript' src="{'/'|base_url}js/scripts.js?ver=4.5.2"></script>
<script type='text/javascript' src="{'/'|base_url}js/social-button.js?ver=4.5.2"></script>
<script type='text/javascript' src="{'/'|base_url}js/megamenu.js?ver=4.5.2"></script>
<script type='text/javascript' src="{'/'|base_url}js/wp-embed.min.js?ver=4.5.2"></script>
<!--[if lt IE 9]>
<script src="{'/'|base_url}js/ie/respond.js"></script>
<![endif]-->
{include file='common/sp/navi.tpl'}
<div id="container">
{*if !$is_posted }
		<h1>会員登録ページ</h1>
		<span class="valid_error">{validation_errors()}</span>
		{form_open("signup")}
		<p> e-mail:
		{form_input('user_email', $input['user_email'])}
		</p>
		<p> ニックネーム:
		{form_input('nickname', $input['nickname'], 'id=nickname')}
		{form_button('nickname', '重複チェック', 'id=check_nickname')}
		<span id="check_result" class="valid_error"></span>
		</p>
		<p> パスワード
		{form_password('password')}
		</p>
		<p> パスワード確認用
		{form_password('cpassword')}
		</p>

		<p>
		{form_submit('submit', '登録')}
		</p>
		{form_close()}
{else}
		<h1>会員登録ページ</h1>
		<p>ご登録のメールアドレスに会員登録メールを送信しました。<br />メールに記載されたurlをクリックして本登録を完了させてください。</p>
{/if}
</div>
<a href="{'top'|base_url}">top</a>
*}
