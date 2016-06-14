<article class="post-21 post type-post status-publish format-standard has-post-thumbnail hentry category-3">
    {form_open( "{'/'|base_url}signup/complete" )}
    {form_hidden( 'nickname', set_value('nickname') )}
    {form_hidden( 'user_email', set_value('user_email') )}
    {form_hidden( 'password', $post.password )}
    {form_hidden( 'name1', set_value('name1') )}
    {form_hidden( 'name2', set_value('name2') )}
    {form_hidden( 'birth_year', set_value('birth_year') )}
    {form_hidden( 'birth_month', set_value('birth_month') )}
    {form_hidden( 'birth_date', set_value('birth_date') )}
    {form_hidden( 'sex', set_value('sex') )}
    {form_hidden( 'mobile1', set_value('mobile1') )}
    {form_hidden( 'mobile2', set_value('mobile2') )}
    {form_hidden( 'mobile3', set_value('mobile3') )}
    {form_hidden( 'zip_code1', set_value('zip_code1') )}
    {form_hidden( 'zip_code2', set_value('zip_code2') )}
    {form_hidden( 'add_no1', set_value('add_no1') )}
    {form_hidden( 'add_no2', set_value('add_no2') )}
	<div class="entry share">
		<div class="entry-inner clearfix">
			<table class="regist_table">
				<tr>
					<th>ニックネーム</th><td style="border-top:1px solid #fff;">{$post.nickname}</td>
				</tr>
				<tr>
					<th>email</th><td>{$post.user_email}</td>
				</tr>
				<tr>
					<th>パスワード</th><td>非表示</td>
				</tr>
				<tr>
					<th>姓名</th><td>{$post.name1}{$post.name2}</td>
				</tr>
				<tr>
					<th>生年月日</th><td>{$post.birth_year}年{$post.birth_month}月{$post.birth_date}日</td>
				</tr>
				<tr>
					<th>性別</th>
          <td>
            {if $post.sex == 0}男性{else}女性{/if}
          </td>
				</tr>
				<tr>
					<th>言語種別</th>
					<td>
              {html_options name='use_language' options=$use_language}
					</td>
				</tr>
				<tr>
					<th>通貨種別</th>
					<td>
              {html_options name='currency_unit' options=$currency_unit}
					</td>
				</tr>
				<tr>
					<th>国</th>
					<td>
              {html_options name='country' options=$country}
					</td>
				</tr>
				<tr>
					<th>携帯番号</th>
					<td>
              {html_options name='country_num' options=$country_num}
              {$post.mobile1}-{$post.mobile2}-{$post.mobile3}
              </td>
				</tr>
				<tr>
					<th>郵便番号</th>
            <td>
                {$post.zip_code1}-{$post.zip_code2}
            </td>
				</tr>
				<tr>
					<th>都道府県</th>
					<td>
              {html_options name='pref' options=$pref}
					</td>
				</tr>
				<tr>
					<th>住所</th><td>{$post.add_no1}</td>
				</tr>
				<tr>
					<th>建物名と部屋番</th><td>{$post.add_no2}</td>
				</tr>
			</table>
			<div style="text-align:center;">{form_submit('submit', '登録')}</div>
		</div>
	</div>
	<!--/.entry-->
	<!--/.post-inner-->
</article>
