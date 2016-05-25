<?php /* Smarty version Smarty-3.1.8, created on 2015-12-22 18:13:21
         compiled from "/home/sites/heteml/users/p/l/a/planx/web/test/casino/application/views/templates/common/layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:391903549567914315b3b44-71520002%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd684d2137fea6ab8981f15b6d30eb84c42c344fe' => 
    array (
      0 => '/home/sites/heteml/users/p/l/a/planx/web/test/casino/application/views/templates/common/layout.tpl',
      1 => 1450775528,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '391903549567914315b3b44-71520002',
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
  'unifunc' => 'content_567914315fcac3_08853816',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_567914315fcac3_08853816')) {function content_567914315fcac3_08853816($_smarty_tpl) {?><!DOCTYPE html>
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