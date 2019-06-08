<?php
/* Smarty version 3.1.34-dev-7, created on 2019-06-08 23:25:35
  from 'C:\flax-project_ctrl_web\main\templates\newProject.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5cfc27cf0a5061_87853953',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fbce8e86ec8382cbf812eb8514c017599aa9c042' => 
    array (
      0 => 'C:\\flax-project_ctrl_web\\main\\templates\\newProject.tpl',
      1 => 1560027919,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cfc27cf0a5061_87853953 (Smarty_Internal_Template $_smarty_tpl) {
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
	<form class="form-newProject" id="newProject" name="form1" method="post" action="">
		<div class="form-row">
			<div class="form-group col-md-12">
				<input class="form-control" type="text" name="pname" placeholder="專題名稱" autofocus="" required="">
			</div>
			<div class="form-group col-md-12">
				<input class="form-control" type="text" name="pintr" placeholder="專題簡介">
			</div>
			<div class="form-group col-md-12">
				<input class="btn btn-lg btn-primary btn-block" type="submit" value="新增專題"></input>
			</div>
		</div>			
		<div class="form-group col-md-12">
			<?php if ($_smarty_tpl->tpl_vars['retMesse']->value != '') {?>
				<span class="badge badge-pill badge-warning"><?php echo $_smarty_tpl->tpl_vars['retMesse']->value;?>
</span>
			<?php }?>
		</div>
	</form>
</div>
<footer>
</footer>
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
