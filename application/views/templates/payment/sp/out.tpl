{*
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
                'fallback_url' => 'http://test.planx.jp/kjn/withdrawal_complete.php',
                'receiver_url' => 'http://test.planx.jp/kjn/withdrawal_complete.php' // Point your domain or IP here then the path to the receiver php file
                );

    $api = new Nihtan_API($params);

    // STEP 3: Call the transfer_money_then_redirect() method
    //         Provide the transfer amount in parameter 1 : Double(15,2)
    //         Provide the transfer method (either 'cash_in' or 'cash_out') in parameter 2 : String
    $transfer_amount = $withdrawal_number;
    $transfer_method = 'cash_out';

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
    require_once("withdrawal_complete.php");
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

    if($withdrawal_number < 5)
    {
        $err_msg .= "最低ご入金金額は$50からになります。<br />";
    }
    if(empty($neteller_id))
    {
        $err_msg .= "NETELLER IDが入力されていません。<br />";
    }


    //エラーがなかった場合の処理とあった場合の処理
    if(empty($err_msg))
    {
        $msg = '
            <div class=\"msg_box\" style="color:#fff;">
                入力内容に間違いがなければ「出金する」ボタンを、<br />修正する場合は「戻る」ボタンを押してください。
            </div>
        ';
        $btn = '<input type="submit" name="send" value="　出金する　" class="login_btn">　　<input type="submit" name="back" value="　戻　る　" style="background:#fff;" class="login_btn">';

        unset($_SESSION["check"]);
        $_SESSION["withdrawal_number"] = $withdrawal_number;
        $_SESSION["neteller_id"] = $neteller_id;
        require_once("withdrawal_confirm.php");
        exit();
    }
    else
    {
        $err_div = '<div class="error">'.$err_msg.'</div>';
    }
}

?>
*}
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
                            <h1 class="post-title entry-title">出金画面</h1>
                            <p style="color:#fff;">このページでは、コインを変換し出金が行えます。</p>
                            <?php echo $err_div; ?>
                            <p class="withdrawal_p">現在の引き出し可能な金額は<span>${$history.remain|number_format}</span>です。</p>
                        </div><!--/.page-title-->

                        <div class="pad group">
                            <article class="post-21 post type-post status-publish format-standard has-post-thumbnail hentry category-3">
                                <div class="entry share">
                                    {form_open( 'payment/outconfirm' )}
                                        <div class="entry-inner clearfix">
                                            <table class="regist_table">
                                                <tr>
                                                    <th>出金金額(USD)</th>
                                                    <td style="border-top:1px solid #fff;">
                                                    {form_input( 'num' )}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>NETELLER ID</th>
                                                    <td>
                                                    {form_input( 'neteller_id' )}
                                                    <br />アカウントIDまたはメールアドレス(ご本人様名義のみ利用可)
                                                    </td>
                                                </tr>
                                            </table>
                                            <div style="text-align:center;">
                                                <input class="login_btn" type="submit" name="check" value="出金確認画面へ" />
                                            </div>
                                        </div>
                                    {form_close()}
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
