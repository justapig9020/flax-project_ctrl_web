<?php
/* Smarty version 3.1.34-dev-7, created on 2019-06-10 10:35:31
  from 'C:\xampp\htdocs\projs_108\6\flax\main\templates\signUp.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5cfe1653c06ba8_80805932',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7e9fed3c7703ac902dabd264db76940b8e355196' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projs_108\\6\\flax\\main\\templates\\signUp.tpl',
      1 => 1560155474,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cfe1653c06ba8_80805932 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, "normal.conf", "signup", 0);
?>

<html>
<head>
	<title><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'title');?>
_<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'page');?>
</title>
   
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/signup.css"/>	
   
</head>
<body class="text-center">
<header>
</header>
<div class="container">
	<form class="form-signup" id="login" name="form1" method="post" action="">
		<?php if ($_smarty_tpl->tpl_vars['signUp_retM']->value != '') {?>
			<p><span class="badge badge-pill badge-warning"><?php echo $_smarty_tpl->tpl_vars['signUp_retM']->value;?>
</span></p>
		<?php }?>		
		<div class="form-row">
			<div class="form-group col-md-12">
				<input class="form-control" type="text" name="id" placeholder="學號" autofocus="" required="">
			</div>
			<div class="form-group col-md-12">
				<input class="form-control" type="text" name="name" placeholder="姓名" required="">
			</div>
			<div class="form-group col-md-12">
				<input class="form-control" type="text" name="acc" placeholder="帳號" required="">
			</div>
			<div class="form-group col-md-12">
				<input class="form-control" type="password" name="pw" placeholder="密碼" required="">
			</div>
			<div class="form-group col-md-12">
				<input class="form-control" type="password" name="repw" placeholder="再輸入一次密碼" required="">
			</div>
			<div class="form-group col-md-12">
				<input class="form-control" type="email" name="email" placeholder="電子郵件" required="">
			</div>
			<div class="form-group col-md-12">
				<input class="btn btn-lg btn-primary btn-block" type="submit" value="新增帳號"></input>
			</div>
			<div class="form-group col-md-12">
				<a class="btn btn-lg btn-outline-success" href="index.php">回到登入畫面</a>
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
