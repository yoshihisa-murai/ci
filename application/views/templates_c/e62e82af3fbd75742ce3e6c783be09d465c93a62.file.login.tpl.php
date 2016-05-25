<?php /* Smarty version Smarty-3.1.8, created on 2015-12-22 18:13:21
         compiled from "/home/sites/heteml/users/p/l/a/planx/web/test/casino/application/views/templates/top/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16846527735679143161eed5-92059785%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e62e82af3fbd75742ce3e6c783be09d465c93a62' => 
    array (
      0 => '/home/sites/heteml/users/p/l/a/planx/web/test/casino/application/views/templates/top/login.tpl',
      1 => 1450775528,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16846527735679143161eed5-92059785',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_56791431630d11_67082084',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56791431630d11_67082084')) {function content_56791431630d11_67082084($_smarty_tpl) {?><span class="valid_error"><?php echo validation_errors();?>
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