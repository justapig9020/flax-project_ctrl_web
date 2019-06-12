<?php
/* Smarty version 3.1.34-dev-7, created on 2019-06-12 01:51:46
  from 'C:\flax-project_ctrl_web\main\templates\project_list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5d003e92a3e569_76304396',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cdfebae95fb54140c3aa0e4afd2f11aba155e420' => 
    array (
      0 => 'C:\\flax-project_ctrl_web\\main\\templates\\project_list.tpl',
      1 => 1560297099,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d003e92a3e569_76304396 (Smarty_Internal_Template $_smarty_tpl) {
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
<?php echo '<script'; ?>
 src="js/jquery-3.4.1.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
//$(document).ready (
//);
function d_select (dpid) {
    $.post ("project.php", {"dpid": dpid});
    location.reload();
    //, function (ret) {document.write (ret)});
}
<?php echo '</script'; ?>
>

<main role="main" class="container">
	<?php if ($_smarty_tpl->tpl_vars['prj_exist']->value == "0") {?>
		<div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">少年，你渴望專案嗎?</h5>
                <p class="card-text">試試看下面這顆按鈕</p>
                <a href="newproject.php" class="btn btn-primary">新增專案</a>
            </div>
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
                <a class="list-group-item list-group-item-action list-group-item-danger text-center" onclick="d_select (<?php echo $_smarty_tpl->tpl_vars['row']->value['pid'];?>
)">
                <?php if ($_smarty_tpl->tpl_vars['user_id']->value == $_smarty_tpl->tpl_vars['row']->value["oid"]) {?>
                刪除
                <?php } else { ?>
                離開
                <?php }?>
                專案</a>
                </br>
            </div>
		</div>
	</div>	
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	<?php }?>
</main>
<footer>
</footer>
</body>
</html>
<?php }
}
