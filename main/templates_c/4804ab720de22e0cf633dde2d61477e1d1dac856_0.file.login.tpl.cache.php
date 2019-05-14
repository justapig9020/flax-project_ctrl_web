<?php
/* Smarty version 3.1.34-dev-7, created on 2019-05-14 01:37:26
  from 'C:\flax-project_ctrl_web\main\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5cd9ffb60430d2_46112574',
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
  'includes' => 
  array (
  ),
),false)) {
function content_5cd9ffb60430d2_46112574 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '17861417865cd9ffb5f34506_26899863';
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, "normal.conf", "login", 0);
?>

<html>
<head>
<title>
<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'title');?>
_<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'page');?>

</title>
</head>
<body>
<a href="signUp.php">sign up</a></br>
This is <?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'page');?>

<form id="login" name="login" method="post" action="">
	<font color="red"><?php echo $_smarty_tpl->tpl_vars['login_retM']->value;?>
</font></br>
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
