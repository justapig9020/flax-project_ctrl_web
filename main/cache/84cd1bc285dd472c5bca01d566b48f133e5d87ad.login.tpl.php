<?php
/* Smarty version 3.1.34-dev-7, created on 2019-05-13 19:38:27
  from 'C:\smarty\demo\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5cd9ab93d8ab27_94103234',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '13d882ad5a501a8750214f8356cbca771ffb9742' => 
    array (
      0 => 'C:\\smarty\\demo\\templates\\login.tpl',
      1 => 1557766418,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_5cd9ab93d8ab27_94103234 (Smarty_Internal_Template $_smarty_tpl) {
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
	<font color="red">密碼錯誤</font></br>
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
