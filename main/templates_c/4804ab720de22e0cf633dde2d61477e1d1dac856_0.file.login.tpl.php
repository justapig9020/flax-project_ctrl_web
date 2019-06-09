<?php
/* Smarty version 3.1.34-dev-7, created on 2019-06-09 00:06:07
  from 'C:\flax-project_ctrl_web\main\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5cfc314f897839_94114765',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4804ab720de22e0cf633dde2d61477e1d1dac856' => 
    array (
      0 => 'C:\\flax-project_ctrl_web\\main\\templates\\login.tpl',
      1 => 1560027919,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cfc314f897839_94114765 (Smarty_Internal_Template $_smarty_tpl) {
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
		<?php if ($_smarty_tpl->tpl_vars['login_retM']->value != '') {?>
			<p><span class="badge badge-pill badge-warning"><?php echo $_smarty_tpl->tpl_vars['login_retM']->value;?>
</span></p>
		<?php }?>		
		<label for="inputEmail" class="sr-only">帳號</label>
		<input type="text" id="id" name="id" class="form-control" placeholder="帳號" required="" autofocus="">
		<label for="inputPassword" class="sr-only">密碼</label>
		<input type="password" id="pw" name="pw" class="form-control" placeholder="密碼" required="">
		<button class="btn btn-lg btn-primary btn-block" type="submit">登入</button></br>
		<a class="btn btn-lg btn-outline-success" href="signUp.php">註冊</a>

	</form>
</body>
</html>
<?php }
}
