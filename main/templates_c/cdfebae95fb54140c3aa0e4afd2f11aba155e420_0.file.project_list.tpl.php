<?php
/* Smarty version 3.1.34-dev-7, created on 2019-06-09 17:30:50
  from 'C:\flax-project_ctrl_web\main\templates\project_list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5cfd262a2213f0_99176092',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cdfebae95fb54140c3aa0e4afd2f11aba155e420' => 
    array (
      0 => 'C:\\flax-project_ctrl_web\\main\\templates\\project_list.tpl',
      1 => 1560094129,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cfd262a2213f0_99176092 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, "normal.conf", "project_list", 0);
?>

<html>
<head>
	<title><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'title');?>
_<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'page');?>
</title>
   
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/normal.css"/>	   
   
</head>
<body>
<header>
</header>
<?php echo '<script'; ?>
 src="js/header.js"><?php echo '</script'; ?>
>
<main role="main" class="container">
	<?php if ($_smarty_tpl->tpl_vars['prj_exist']->value == "0") {?>
		<div class="jumbotron">
			<h3 class="display-4">哈哈是不是沒有專案齁</h3><!--字條小-->
			<p class="lead">想要新增專案嗎</p>
			<p>試試看下面這顆按鈕</p><!--線刪掉-->
			<a class="btn btn-primary btn-lg" href="newProject.php" role="button">新增專案</a>
		</div>
	<?php } else { ?>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['prjs']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
	<div class="row">
		<div class="col-sm-4">
			<div class="list-group">
				<a href="./project.php?pid=<?php echo $_smarty_tpl->tpl_vars['row']->value["pid"];?>
" class="list-group-item list-group-item-action"><?php echo $_smarty_tpl->tpl_vars['row']->value["oid"];?>
 / <?php echo $_smarty_tpl->tpl_vars['row']->value["pname"];?>
</a>
			</div>
		</div>
	</div>	
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	<?php }?>
</main><!-- /.container -->
<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"><?php echo '</script'; ?>
><footer>
</footer>
</body>
</html>
<?php }
}
