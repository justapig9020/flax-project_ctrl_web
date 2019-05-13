<?php
/* Smarty version 3.1.34-dev-7, created on 2019-05-13 19:51:46
  from 'C:\smarty\demo\templates\signUp.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5cd9aeb21f36b4_96358539',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '950418fbafdef3b75c8be242438b06c4d98ebff7' => 
    array (
      0 => 'C:\\smarty\\demo\\templates\\signUp.tpl',
      1 => 1557769902,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cd9aeb21f36b4_96358539 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '3672999145cd9aeb21c0a86_83881756';
?>
<html>
<head>
</head>
<body>
<header>
</header>
		<form id="login" name="form1" method="post" action="">
		<font color="red"><?php echo $_smarty_tpl->tpl_vars['signUp_retM']->value;?>
</font></br>
		<label>
		輸入學號: <input type="text" name="id" /></br>
		</label>
		<label>
		輸入姓名: <input type="text" name="name" /></br>
		</label>
		<label>
		輸入帳號: <input type="text" name="acc" /></br>
		</label>
		<label>
		輸入密碼: <input type="password" name="pw" /></br>
		</label>
		<label>
		重複輸入密碼: <input type="password" name="repw" /></br>
		</label>
		<label>
		輸入電子郵件: <input type="text" name="email" /></br>
		</label>		
		<label>
		<input type="submit" value="新增帳號" />
		</label>
	</form>
<footer>
</footer>
</body>
</html>
<?php }
}
