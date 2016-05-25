<?php /* Smarty version Smarty-3.1.8, created on 2016-05-24 18:39:14
         compiled from "/home/sites/heteml/users/p/l/a/planx/web/test/casino/application/views/templates/common/pc/layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:70380085957442142de6f63-23060137%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4365db2e15273ef0b9dc2ceb89a3a0344d4bf423' => 
    array (
      0 => '/home/sites/heteml/users/p/l/a/planx/web/test/casino/application/views/templates/common/pc/layout.tpl',
      1 => 1464082206,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '70380085957442142de6f63-23060137',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_title' => 0,
    'content_tpl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_57442142ef12a5_27978805',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57442142ef12a5_27978805')) {function content_57442142ef12a5_27978805($_smarty_tpl) {?><!DOCTYPE html>
<html lang="ja">
<head>
		<meta charset="utf-8">
		<title><?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
</title>
		<link rel="stylesheet" href="<?php echo base_url('/');?>
css/common.css" type="text/css" />
</head>
<body>
 
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['content_tpl']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
<script>
var url = "<?php echo base_url('signup/check_nickname');?>
";
</script> 
<script src="<?php echo base_url('/');?>
js/check_duplicate.js"></script>
</body>
</html>
<?php }} ?>