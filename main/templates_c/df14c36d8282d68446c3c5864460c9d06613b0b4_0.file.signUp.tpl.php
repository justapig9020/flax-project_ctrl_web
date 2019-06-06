<?php
/* Smarty version 3.1.34-dev-7, created on 2019-06-06 14:20:22
  from 'D:\DB\flax-project_ctrl_web\main\templates\signUp.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5cf90506ce2079_53329900',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'df14c36d8282d68446c3c5864460c9d06613b0b4' => 
    array (
      0 => 'D:\\DB\\flax-project_ctrl_web\\main\\templates\\signUp.tpl',
      1 => 1559823620,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cf90506ce2079_53329900 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, "normal.conf", "signup", 0);
?>

<html>
<head>
	<title><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'title');?>
_<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'page');?>
</title>
   
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
		<!-- Custom styles for this template -->
		<link rel="stylesheet" type="text/css" href="css/signup.css"/>	
		<!-- Bootstrap core CSS -->
   
</head>
<body class="text-center">
<header>
</header>
<div class="container">
	<form class="form-signup" id="login" name="form1" method="post" action="">
	<?php if ($_smarty_tpl->tpl_vars['signUp_retM']->value != '') {?>
	<div class="alert alert-danger" role="alert">
		<font color="red"><?php echo $_smarty_tpl->tpl_vars['signUp_retM']->value;?>
</font>
	</div>
	<?php }?>
		<div class="form-row">
			<div class="form-group col-md-12">
				<label class="sr-only">輸入學號</label>
				<input class="form-control" type="text" name="id" placeholder="學號" autofocus="" required="">
			</div>
			<div class="form-group col-md-12">
				<label class="sr-only">輸入姓名</label>
				<input class="form-control" type="text" name="name" placeholder="姓名" required="">
			</div>
			<div class="form-group col-md-12">
				<label class="sr-only">輸入帳號</label>
				<input class="form-control" type="text" name="acc" placeholder="帳號" required="">
			</div>
			<div class="form-group col-md-12">
				<label class="sr-only">輸入密碼</label>
				<input class="form-control" type="password" name="pw" placeholder="密碼" required="">
			</div>
			<div class="form-group col-md-12">
				<label class="sr-only">再輸入一次密碼</label>
				<input class="form-control" type="password" name="repw" placeholder="再輸入一次密碼" required="">
			</div>
			<div class="form-group col-md-12">
				<label class="sr-only">輸入電子郵件</label>
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
