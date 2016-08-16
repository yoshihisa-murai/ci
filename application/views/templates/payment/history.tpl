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
                            <h1 class="post-title entry-title">ユーザーデータ</h1>
                            <p class="def_p">ユーザー情報や入出金情報が確認できます</p>
                        </div><!--/.page-title-->
                        <div class="pad group">
                            <article class="post-21 post type-post status-publish format-standard has-post-thumbnail hentry category-3">
                                <div class="entry share">
                                    <div class="entry-inner clearfix">
                                        <table class="regist_table">
                                            <tr>
                                                <th>入出金日時</th><th>種別</th><th>金額</th><th>入出金直後の<br />コイン残高</th>
                                            </tr>
                                            {foreach from=$history item=value}
                                            <tr>
                                                <td>{$value.insert_date|date_format:"%G-%m-%d<br />%H:%M:%S"}</td><td>{$config['payment_category'][$value.category]}</td><td>${$value.num|number_format}</td><td>${$value.remain|number_format}</td>
                                            </tr>
                                            {/foreach}
                                        </table>
                                        {$pager}
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
                                                <th>性別</th><td>{$config['sex'][$user.sex]}</td>
                                            </tr>
                                            <tr>
                                                <th>言語種別</th><td>{$config['use_language'][$user.language]}</td>
                                            </tr>
                                            <tr>
                                                <th>通貨種別</th><td>{$config['currency_unit'][$user.currency_unit]}</td>
                                            </tr>
                                            <tr>
                                                <th>国</th><td>{$config['country'][$user.country]}</td>
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
