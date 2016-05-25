<?php /* Smarty version Smarty-3.1.8, created on 2015-12-22 18:13:21
         compiled from "/home/sites/heteml/users/p/l/a/planx/web/test/casino/application/views/templates/top/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:86089784356791431603153-29215571%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '635496b22628d4576b34867a3f3512572a65889c' => 
    array (
      0 => '/home/sites/heteml/users/p/l/a/planx/web/test/casino/application/views/templates/top/index.tpl',
      1 => 1450775528,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '86089784356791431603153-29215571',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'is_login' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5679143161c904_15317687',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5679143161c904_15317687')) {function content_5679143161c904_15317687($_smarty_tpl) {?><div id="container">
    <h1>topページ</h1>
    <?php if ($_smarty_tpl->tpl_vars['is_login']->value){?>
        ようこそ<?php echo $_smarty_tpl->tpl_vars['user']->value['user_email'];?>
さん<br />
        <a href="<?php echo base_url('top/logout');?>
">ログアウト</a>
        <a href="<?php echo base_url('edituser');?>
">会員情報変更</a>
    <?php }else{ ?>
        <?php echo $_smarty_tpl->getSubTemplate ("top/login.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <a href="<?php echo base_url('login');?>
">ログイン</a>
    <?php }?>
</div>
<?php }} ?>