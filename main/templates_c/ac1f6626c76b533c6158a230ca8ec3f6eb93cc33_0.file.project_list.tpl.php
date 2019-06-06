<?php
/* Smarty version 3.1.34-dev-7, created on 2019-06-06 17:51:35
  from 'D:\DB\flax-project_ctrl_web\main\templates\project_list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5cf9368759be76_43590364',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ac1f6626c76b533c6158a230ca8ec3f6eb93cc33' => 
    array (
      0 => 'D:\\DB\\flax-project_ctrl_web\\main\\templates\\project_list.tpl',
      1 => 1559836292,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cf9368759be76_43590364 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, "normal.conf", "project_list", 0);
?>

<html>
<head>
	<title><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'title');?>
_<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'page');?>
</title>
   
    <!-- Bootstrap core CSS -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <!-- Custom styles for this template -->
	<link rel="stylesheet" type="text/css" href="css/normal.css"/>	   
   
</head>
<body>
<header>
</header>
<?php echo '<script'; ?>
 src="js/header.js"><?php echo '</script'; ?>
>
<main role="main" class="container">
	<font color="red">prj_exist=<?php echo $_smarty_tpl->tpl_vars['prj_exist']->value;?>
</font></br>
	<?php if ($_smarty_tpl->tpl_vars['prj_exist']->value == "0") {?>
		<div class="jumbotron">
			<h1 class="display-4">哈哈是不是沒有專案齁</h1>
			<p class="lead">想要新增專案嗎</p>
			<hr class="my-4">
			<p>試試看下面這顆按鈕</p>
			<a class="btn btn-primary btn-lg" href="#" role="button">新增專案</a>
		</div>
	<?php } else { ?>
	<div class="row">
		<div class="col-sm-6">
			<div class="card">
				<div class="card-header">
					專案名稱
				</div>
				<div class="card-body">
					<h5 class="card-title">領導者</h5>
					<p class="card-text">開始日期</p>
					<a href="#" class="btn btn-primary">詳細希望</a>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="card">
				<div class="card-header">
					專案名稱
				</div>
				<div class="card-body">
					<h5 class="card-title">領導者</h5>
					<p class="card-text">開始日期</p>
					<a href="#" class="btn btn-primary">詳細希望</a>
				</div>
			</div>
		</div>
	</div>
	<?php }?>
</main><!-- /.container -->
<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../js/bootstrap.bundle.js"><?php echo '</script'; ?>
>
<footer>
</footer>
</body>
</html>
<?php }
}
