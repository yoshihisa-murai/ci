{*
<?php
    require_once("lib/Err_Code_Class.php");

    if(empty($_GET["err_id"]) && empty($_GET["succmsg"]))
    {
        $id = "";
        $sebu_check = new Err_Code_Class($id);
    }
    else
    {
        if(!empty($_GET["err_id"]))
        {
            $id = $_GET["err_id"];
            $sebu_check = new Err_Code_Class($id);
        }
        if(!empty($_GET["succmsg"]))
        {
            $id = $_GET["succmsg"];
            $sebu_check = new Err_Code_Class($id,2);//1:入金　2:出金
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
                            <h1 class="post-title entry-title">{$error_code->message_title}</h1>
                            <p style="color:#fff;">{$error_code->message_detail}</p>
                        </div><!--/.page-title-->
        
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
