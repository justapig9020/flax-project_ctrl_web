<?php
/* Smarty version 3.1.34-dev-7, created on 2019-06-06 17:17:26
  from 'D:\DB\flax-project_ctrl_web\main\templates\overView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5cf92e86477ca8_42936580',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fe1cfad0a6f2ba55a552ab5f1919cc91b5ab0ef5' => 
    array (
      0 => 'D:\\DB\\flax-project_ctrl_web\\main\\templates\\overView.tpl',
      1 => 1559834104,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cf92e86477ca8_42936580 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, "normal.conf", "overView", 0);
?>

<html>
<head>
    <title><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'title');?>
_<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'page');?>
</title>
   
    <!-- Bootstrap core CSS -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <!-- Custom styles for this template -->
	<link rel="stylesheet" type="text/css" href="css/normal.css"/>	
   
</head>
<body>
<?php echo '<script'; ?>
 src="js/header.js"><?php echo '</script'; ?>
>

	This is overview
	
<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../js/bootstrap.bundle.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
