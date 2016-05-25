<?php /* Smarty version Smarty-3.1.8, created on 2016-05-25 11:54:44
         compiled from "/home/sites/heteml/users/p/l/a/planx/web/test/casino/application/views/templates/top/sp/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17867722855744267cbe32f0-99593310%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '944eddc6fbbef967fc480f1d7a3daa3e7a1a5189' => 
    array (
      0 => '/home/sites/heteml/users/p/l/a/planx/web/test/casino/application/views/templates/top/sp/login.tpl',
      1 => 1464144852,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17867722855744267cbe32f0-99593310',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5744267cbf4ea0_85453890',
  'variables' => 
  array (
    'form_style' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5744267cbf4ea0_85453890')) {function content_5744267cbf4ea0_85453890($_smarty_tpl) {?><span class="valid_error"><?php echo validation_errors();?>
</span>
<?php echo form_open('top/sp',$_smarty_tpl->tpl_vars['form_style']->value);?>

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

<a href="<?php echo base_url('signup/sp');?>
">会員登録</a>
<?php }} ?>