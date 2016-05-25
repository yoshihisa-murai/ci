<?php /* Smarty version Smarty-3.1.8, created on 2016-05-24 20:03:35
         compiled from "/home/sites/heteml/users/p/l/a/planx/web/test/casino/application/views/templates/top/pc/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:147670392657443507523974-14279563%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '07ab5b3db3d4337aa4445a729689122de85ad566' => 
    array (
      0 => '/home/sites/heteml/users/p/l/a/planx/web/test/casino/application/views/templates/top/pc/login.tpl',
      1 => 1464082383,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '147670392657443507523974-14279563',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_574435075376e9_92171670',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574435075376e9_92171670')) {function content_574435075376e9_92171670($_smarty_tpl) {?><span class="valid_error"><?php echo validation_errors();?>
</span>
<?php echo form_open('top');?>

<p>
<?php echo form_input('user_email');?>

</p>
<p>
<?php echo form_password('password');?>

</p>

<p>
<?php echo form_submit('submit','ログイン');?>

</p>
<?php echo form_close();?>

<a href="<?php echo base_url('signup');?>
">会員登録</a>
<?php }} ?>