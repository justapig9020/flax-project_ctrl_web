<?php
/* Smarty version 3.1.34-dev-7, created on 2019-06-08 22:56:06
  from 'D:\DB\flax-project_ctrl_web\main\templates\project_selected.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5cfc20e6d9f1f0_45435033',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b7b9d3fcf6e2bc8d15b56e5bec0e1d85d7e297c0' => 
    array (
      0 => 'D:\\DB\\flax-project_ctrl_web\\main\\templates\\project_selected.tpl',
      1 => 1560027364,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cfc20e6d9f1f0_45435033 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, "normal.conf", "project", 0);
?>

<html>
<head>
	<title><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'title');?>
_<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'page');?>
</title>
   
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/normal.css"/>
	<link rel="stylesheet" type="text/css" href="./css/project.css"/>
   
</head>
<body>
<header>
</header>
<?php echo '<script'; ?>
 src="js/header.js"><?php echo '</script'; ?>
>
<main role="main" class="container">
    <div class="container text-center">
        <div class="row">
            <div class="col-sm">
                <p class="h1"><?php echo $_smarty_tpl->tpl_vars['prjs']->value;?>
</p>
            </div>
        </div>
    </div>
    </br>
<div class="row">
    <div class="col-2">
        <ul class="list-group list-group-flush">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new_Mem">新增成員</button>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['mems']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="list-group">
                            <li class="list-group-item"><?php echo $_smarty_tpl->tpl_vars['row']->value["uid"];?>
</li>
                            <li class="list-group-item">123</li>
                        </div>
                    </div>
                </div>	
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
    <div class="col-8">
        第一行文字<br>第二行文字<br>第三行文字
    </div>
    <div class="col-2">
        <ul class="list-group list-group-flush">
            <b><li class="list-group-item list-group-item-warning">擁有者</li></b>
            <li class="list-group-item">123456</li>
        </ul>
        <ul class="list-group list-group-flush">
            <b><li class="list-group-item list-group-item-info">Teacher</li></b>
            <li class="list-group-item">654321</li>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new_Tea">新增老師</button>
        </ul>    
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="new_Mem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">新增成員</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-project_selected" id="project_selected" name="form1" method="post" action="">
                <div class="modal-body">
                   <input class="form-control" type="text" name="mid" placeholder="請輸入成員學號" autofocus="" required="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                    <input class="btn btn-primary" type="submit" value="新增成員"></input>
                </div>
            </form>            
        </div>
    </div>
</div>
<div class="modal fade" id="new_Tea" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">新增老師</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-project_selected" id="project_selected" name="form1" method="post" action="">
                <div class="modal-body">
                   <input class="form-control" type="text" name="tid" placeholder="請輸入老師代號" autofocus="" required="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                    <input class="btn btn-primary" type="submit" value="新增老師"></input>
                </div>
            </form>            
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
