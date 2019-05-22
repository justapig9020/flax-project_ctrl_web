<?php
/* Smarty version 3.1.34-dev-7, created on 2019-05-22 15:28:00
  from 'C:\flax-project_ctrl_web\main\templates\signUp.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ce54e600fb545_73004645',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ee5b5694bfedd64c92ede24347c35e4b115dec16' => 
    array (
      0 => 'C:\\flax-project_ctrl_web\\main\\templates\\signUp.tpl',
      1 => 1558531585,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ce54e600fb545_73004645 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
<head>
	<title><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'title');?>
_<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'page');?>
</title>

    <!-- Bootstrap core CSS -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>

    <!-- Custom styles for this template -->
	<link rel="stylesheet" type="text/css" href="css/signup.css"/>	
</head>
<body class="text-center">
<header>
</header>
<div class="container">
	<form class="form-signin" id="login" name="form1" method="post" action="">
	<div class="alert alert-danger" role="alert">
		<font color="red"><?php echo $_smarty_tpl->tpl_vars['signUp_retM']->value;?>
</font>
	</div>
		<div class="form-row">
			<div class="form-group col-md-4">
				<label class="sr-only">輸入學號</label>
				<input class="form-control" type="text" name="id" placeholder="學號" autofocus="" required="">
			</div>
			<div class="form-group col-md-4">
				<label class="sr-only">輸入姓名</label>
				<input class="form-control" type="text" name="name" placeholder="姓名" required="">
			</div>
			<div class="form-group col-md-4">
				<label class="sr-only">輸入帳號</label>
				<input class="form-control" type="text" name="acc" placeholder="帳號" required="">
			</div>
			<div class="form-group col-md-6">
				<label class="sr-only">輸入密碼</label>
				<input class="form-control" type="password" name="pw" placeholder="密碼" required="">
			</div>
			<div class="form-group col-md-6">
				<label class="sr-only">再輸入一次密碼</label>
				<input class="form-control" type="password" name="repw" placeholder="再輸入一次密碼" required="">
			</div>
			<div class="form-group col-md-12">
				<label class="sr-only">輸入電子郵件</label>
				<input class="form-control" type="email" name="email" placeholder="電子郵件" required="">
			</div>
			<input class="btn btn-lg btn-primary btn-block" type="submit" value="新增帳號"></input>
		</div>
	</form>
</div>
<footer>
</footer>
</body>
</html>
<?php }
}
