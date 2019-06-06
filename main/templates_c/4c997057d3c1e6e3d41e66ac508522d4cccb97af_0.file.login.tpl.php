<?php
/* Smarty version 3.1.34-dev-7, created on 2019-06-06 22:47:15
  from 'D:\DB\flax-project_ctrl_web\main\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5cf97bd3497a64_51352110',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4c997057d3c1e6e3d41e66ac508522d4cccb97af' => 
    array (
      0 => 'D:\\DB\\flax-project_ctrl_web\\main\\templates\\login.tpl',
      1 => 1559853625,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cf97bd3497a64_51352110 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, "normal.conf", "login", 0);
?>

<html>
<head>
    <title><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'title');?>
_<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'page');?>
</title>
   
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/signin.css"/>	
   
  </head>
  <body class="text-center">
    <form class="form-signin" id="login" name="login" method="post" action="">
		<img class="mb-4" src="image/logo.png" alt="" width="72" height="72">
		<h1 class="h3 mb-3 font-weight-normal">聽說是FLAX</h1>
		<label for="inputEmail" class="sr-only">帳號</label>
		<input type="text" id="id" name="id" class="form-control" placeholder="帳號" required="" autofocus="">
		<label for="inputPassword" class="sr-only">密碼</label>
		<input type="password" id="pw" name="pw" class="form-control" placeholder="密碼" required="">
		<button class="btn btn-lg btn-primary btn-block" type="submit">登入</button></br>
		<a class="btn btn-lg btn-outline-success" href="signUp.php">註冊</a>
		<?php if ($_smarty_tpl->tpl_vars['login_retM']->value != '') {?>
			<div class="alert alert-danger" role="alert">
				<p class="font-weight-bold"><?php echo $_smarty_tpl->tpl_vars['login_retM']->value;?>
</p>
			</div>
		<?php }?>
	</form>
</body>
</html>
<?php }
}
