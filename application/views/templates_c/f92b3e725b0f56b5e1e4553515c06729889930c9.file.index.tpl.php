<?php /* Smarty version Smarty-3.1.8, created on 2016-05-24 20:03:35
         compiled from "/home/sites/heteml/users/p/l/a/planx/web/test/casino/application/views/templates/top/pc/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10118135185744214301e3f1-47243447%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f92b3e725b0f56b5e1e4553515c06729889930c9' => 
    array (
      0 => '/home/sites/heteml/users/p/l/a/planx/web/test/casino/application/views/templates/top/pc/index.tpl',
      1 => 1464084193,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10118135185744214301e3f1-47243447',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_574421430360d1_17587781',
  'variables' => 
  array (
    'is_login' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574421430360d1_17587781')) {function content_574421430360d1_17587781($_smarty_tpl) {?><div id="container">
    <h1>topページ</h1>
    <?php if ($_smarty_tpl->tpl_vars['is_login']->value){?>
        ようこそ<?php echo $_smarty_tpl->tpl_vars['user']->value['user_email'];?>
さん<br />
        <a href="<?php echo base_url('top/pc/logout');?>
">ログアウト</a>
        <a href="<?php echo base_url('edituser/pc');?>
">会員情報変更</a>
    <?php }else{ ?>
        <?php echo $_smarty_tpl->getSubTemplate ("top/pc/login.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <a href="<?php echo base_url('login/pc');?>
">ログイン</a>
    <?php }?>
</div>
<?php }} ?>