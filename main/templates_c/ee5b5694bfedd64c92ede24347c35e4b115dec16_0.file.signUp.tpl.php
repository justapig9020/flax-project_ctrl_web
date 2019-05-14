<?php
/* Smarty version 3.1.34-dev-7, created on 2019-05-14 02:02:56
  from 'C:\flax-project_ctrl_web\main\templates\signUp.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5cda05b0323205_59988253',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ee5b5694bfedd64c92ede24347c35e4b115dec16' => 
    array (
      0 => 'C:\\flax-project_ctrl_web\\main\\templates\\signUp.tpl',
      1 => 1557769902,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cda05b0323205_59988253 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
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
