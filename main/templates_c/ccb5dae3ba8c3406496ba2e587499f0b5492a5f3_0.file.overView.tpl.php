<?php
/* Smarty version 3.1.34-dev-7, created on 2019-06-07 01:00:06
  from 'C:\flax-project_ctrl_web\main\templates\overView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5cf99af6a6bff4_28060387',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ccb5dae3ba8c3406496ba2e587499f0b5492a5f3' => 
    array (
      0 => 'C:\\flax-project_ctrl_web\\main\\templates\\overView.tpl',
      1 => 1559861985,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cf99af6a6bff4_28060387 (Smarty_Internal_Template $_smarty_tpl) {
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
 src="jquery-3.4.1.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/header.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="js/works.js"><?php echo '</script'; ?>
>
	
<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../js/bootstrap.bundle.js"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
