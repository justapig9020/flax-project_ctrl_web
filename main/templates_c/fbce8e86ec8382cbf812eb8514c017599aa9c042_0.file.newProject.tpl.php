<?php
/* Smarty version 3.1.34-dev-7, created on 2019-06-06 23:22:16
  from 'C:\flax-project_ctrl_web\main\templates\newProject.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5cf984087387f1_03620781',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fbce8e86ec8382cbf812eb8514c017599aa9c042' => 
    array (
      0 => 'C:\\flax-project_ctrl_web\\main\\templates\\newProject.tpl',
      1 => 1559856116,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cf984087387f1_03620781 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, "normal.conf", "newProject", 0);
?>

<html>
<head>
	<title><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'title');?>
_<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'page');?>
</title>
   
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="css/normal.css"/>
		<link rel="stylesheet" type="text/css" href="css/newProject.css"/>
   
</head>
<body class="text-center">
<?php echo '<script'; ?>
 src="js/header.js"><?php echo '</script'; ?>
>
<header>
</header>
<div class="container">
		<font color="red"><?php echo $_smarty_tpl->tpl_vars['retMesse']->value;?>
</font>
	<form class="form-newProject" id="newProject" name="form1" method="post" action="">
		<div class="form-row">
			<div class="form-group col-md-12">
				<input class="form-control" type="text" name="pname" placeholder="專題名稱" autofocus="" required="">
			</div>
			<div class="form-group col-md-12">
				<input class="form-control" type="text" name="pintr" placeholder="專題簡介">
			</div>
			<div class="form-group col-md-12">
				<input class="btn btn-lg btn-primary btn-block" type="submit" value="新增帳號"></input>
			</div>
		</div>
	</form>
</div>
<footer>
</footer>
</body>
</html>
<?php }
}
