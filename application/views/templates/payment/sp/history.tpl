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
                            <h1 class="post-title entry-title">ユーザーデータ</h1>
                            <p class="def_p">ユーザー情報や入出金情報が確認できます</p>
                        </div><!--/.page-title-->
                        <div class="pad group">
                            <article class="post-21 post type-post status-publish format-standard has-post-thumbnail hentry category-3">
                                <div class="entry share">
                                    <div class="entry-inner clearfix">
                                        <table class="regist_table">
                                            <tr>
                                                <th>入出金日時</th><th>種別</th><th>金額</th><th>入出金直後のコイン残高</th>
                                            </tr>
                        {foreach from=$history item=value}
                            <tr>
                                <td>{$value.insert_date}</td><td>{$value.category}</td><td>${$value.num|number_format}</td><td>${$value.remain|number_format}</td>
                            </tr>
                        {/foreach}
                                        </table>
                                        <h3>ユーザー登録情報</h3>
                                        <table class="regist_table">
                                            <tr>
                                                <th>ユーザーID</th><td style="border-top:1px solid #fff;">{$user.user_id}</td>
                                            </tr>
                                            <tr>
                                                <th>氏名</th><td>{$user.name} 様</td>
                                            </tr>
                                            <tr>
                                                <th>ニックネーム</th><td>{$user.nickname}</td>
                                            </tr>
                                            <tr>
                                                <th>email</th><td>{$user.user_email}</td>
                                            </tr>
                                            <tr>
                                                <th>性別</th><td>{$user.sex}</td>
                                            </tr>
                                            <tr>
                                                <th>言語種別</th><td>{$user.language}</td>
                                            </tr>
                                            <tr>
                                                <th>通貨種別</th><td>{$user.currency_unit}</td>
                                            </tr>
                                            <tr>
                                                <th>国</th><td>{$user.country}</td>
                                            </tr>
                                            <tr>
                                                <th>携帯番号</th><td>(+81){$user.phone_number}</td>
                                            </tr>
                                            <tr>
                                                <th>郵便番号</th><td>{$user.zip_code}</td>
                                            </tr>
                                            <tr>
                                                <th>都道府県</th><td>{$user.address}</td>
                                            </tr>
                                            <tr>
                                                <th>住所</th><td>{$user.address_detail}</td>
                                            </tr>
                                            <tr>
                                                <th>建物名</th><td></td>
                                            </tr>
                                        </table>
                                    </div>
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
