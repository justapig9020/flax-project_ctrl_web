<?php
/* Smarty version 3.1.34-dev-7, created on 2019-06-06 16:46:41
  from 'C:\flax-project_ctrl_web\main\templates\project_list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5cf92751e9a0d7_59227897',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cdfebae95fb54140c3aa0e4afd2f11aba155e420' => 
    array (
      0 => 'C:\\flax-project_ctrl_web\\main\\templates\\project_list.tpl',
      1 => 1559832339,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cf92751e9a0d7_59227897 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
<head>
	<title><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'title');?>
_<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'page');?>
</title>
   
    <!-- Bootstrap core CSS -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
	<link rel="import" href="header.html">
    <!-- Custom styles for this template -->
	<link rel="stylesheet" type="text/css" href="css/list.css"/>	   
   
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
