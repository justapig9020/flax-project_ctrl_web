<?php
/* Smarty version 3.1.34-dev-7, created on 2019-06-06 17:17:16
  from 'D:\DB\flax-project_ctrl_web\main\templates\project_list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5cf92e7cbfbb50_11154002',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ac1f6626c76b533c6158a230ca8ec3f6eb93cc33' => 
    array (
      0 => 'D:\\DB\\flax-project_ctrl_web\\main\\templates\\project_list.tpl',
      1 => 1559834233,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cf92e7cbfbb50_11154002 (Smarty_Internal_Template $_smarty_tpl) {
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

<div class="card text-center">
	<div class="card-header">
		專案名稱
	</div>
	<div class="card-body">
		<h5 class="card-title">領導者</h5>
		<p class="card-text">開始日期</p>
		<a href="#" class="btn btn-primary ">詳細希望</a>
	</div>
</div>
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
