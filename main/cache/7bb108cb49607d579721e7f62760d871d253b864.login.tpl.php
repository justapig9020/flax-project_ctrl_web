<?php
/* Smarty version 3.1.34-dev-7, created on 2019-05-14 02:13:33
  from 'C:\flax-project_ctrl_web\main\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5cda082d7e19d3_93138248',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4804ab720de22e0cf633dde2d61477e1d1dac856' => 
    array (
      0 => 'C:\\flax-project_ctrl_web\\main\\templates\\login.tpl',
      1 => 1557766418,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_5cda082d7e19d3_93138248 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
<head>
<title>
Flax-PC_login
</title>
</head>
<body>
<a href="signUp.php">sign up</a></br>
This is login
<form id="login" name="login" method="post" action="">
	<font color="red"></font></br>
	<label>
	帳號: <input type="text" name="id" /></br>
	</label>
	<label>
	密碼: <input type="password" name="pw" /></br>
	</label>
	<label>
	<input type="submit" value="登入" />
	</label>
</body}
</html>
<?php }
}
