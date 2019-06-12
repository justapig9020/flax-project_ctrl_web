<?php
/* Smarty version 3.1.34-dev-7, created on 2019-06-12 01:56:57
  from 'C:\flax-project_ctrl_web\main\templates\project_selected.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5d003fc9217eb6_80117561',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9ceca0716f4c567437ddddc8c818c212af8203da' => 
    array (
      0 => 'C:\\flax-project_ctrl_web\\main\\templates\\project_selected.tpl',
      1 => 1560297402,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d003fc9217eb6_80117561 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, "normal.conf", "project", 0);
?>

<html>
<head>
	<title><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'title');?>
_<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'page');?>
</title>
   
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/normal.css"/>
	<link rel="stylesheet" type="text/css" href="css/project.css"/>
   
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
var ms = 0;
/*
var d_mem;
    d_mem = function (duid) {
        if (ms == 1) {
            $.post ("project.php", {"duid": duid});
            location.reload();
        }
    }
    */
//$("#file_array_last").
$(document).ready (function () {
    var ml = $("#mem_list").html ();
    //function d_m(duid) {
    //}
//    $(function() {
//        $( document ).tooltip();
//    });
//    if ($("#file_array_last").val () != "") {
//        alert (1);
//   }
    $("#more_files").click (function (){
        str = '<input type="file" name="myFile[]" id="file_array" style="display: block;margin-bottom: 5px;">';
        $("#file_list").append (str);

    });

    /*
    (function () {
        alert (1);
    });
    */
    $("#mem_list").click (function (event) {
        $target = $(event.target);
        if (ms == 1 && $target.is("#mem_list_mem")) {
            duid = $target.html();
            if (window.confirm("確定要移除成員" + duid)) {
                $.post ("project.php", {"duid": duid});
                location.reload();
            }
        }
    });
    $("#mem_title").click (function () {
        if (ms == 0) {
            ms = 1;
            $("#mem_title").html ("<b>刪除成員</b>")
            $("#mem_list").html(ml);
        } else {
            ms = 0;
            $("#mem_title").html ("<b>成員</b>")
           //$("#mem_list").empty ();
        }
    });
});
<?php echo '</script'; ?>
>

<main role="main" class="container">
    <div class="container text-center">
        <div class="row">
            <div class="col-sm">
                <p class="h1">
                <?php $_smarty_tpl->_assignInScope('is_own', 0);?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['mems']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
                    <?php if ($_smarty_tpl->tpl_vars['row']->value["status"] == 1) {?>
                        <?php if ($_smarty_tpl->tpl_vars['row']->value["uid"] == $_smarty_tpl->tpl_vars['user_id']->value) {?>
                            <?php $_smarty_tpl->_assignInScope('is_own', 1);?>
                        <?php }?>
                        <?php echo $_smarty_tpl->tpl_vars['row']->value["uid"];?>
/<?php echo $_smarty_tpl->tpl_vars['pname']->value;?>

                    <?php }?>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </p>
            </div>
        </div>
    </div>
    </br>

<div class="row"> 
    
    <div class="col-2">
        <ul class="list-group">
                    <?php $_smarty_tpl->_assignInScope('pro_ex', 0);?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['mems']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
                <?php if ($_smarty_tpl->tpl_vars['row']->value["status"] == "2") {?>
                    <?php $_smarty_tpl->_assignInScope('pro_ex', 1);?>
                    <!--<li class="list-group-item"><?php echo $_smarty_tpl->tpl_vars['row']->value["uid"];?>
</li>-->
                <?php }?>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php if ($_smarty_tpl->tpl_vars['pro_ex']->value == 0 && $_smarty_tpl->tpl_vars['is_own']->value == 1) {?>    
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new_Tea">新增指導員</button>
            <?php }?>
            <ul class="list-group">
            <!--<li class="list-group-item list-group-item-dark text-center" id="mem_title"><b>O成員</b></li>-->
            <li  type="button" class="btn btn-primary" data-toggle="modal"  id="mem_title"><b>成員</b></li>
            <div id="mem_list">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['mems']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
                <?php if ($_smarty_tpl->tpl_vars['row']->value["status"] == "1") {?>
                    <li class="list-group-item list-group-item-warning" title="組長" id="mem_list_lea"><?php echo $_smarty_tpl->tpl_vars['row']->value["uid"];?>
</li>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['row']->value["status"] == "2") {?>
                    <li class="list-group-item list-group-item-info" title="指導" id="mem_list_mem" ><?php echo $_smarty_tpl->tpl_vars['row']->value["uid"];?>
</li>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['row']->value["status"] == "0") {?>
                    <li class="list-group-item" title="成員" id="mem_list_mem" ><?php echo $_smarty_tpl->tpl_vars['row']->value["uid"];?>
</li>
                <?php }?>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
        </ul>

        </ul>
    </div>
    <div class="col-8">
        <table class="table table-hover">
               
            <thead>
                <tr>
                    <th scope="col">wname</th>
                    <th scope="col">wstart</th>
                    <th scope="col">wend</th>
                    <th scope="col">wintr</th>
                </tr>
            </thead>
            <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['works']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
                <tr>
                    <th scope="row"><?php echo $_smarty_tpl->tpl_vars['row']->value["wname"];?>
</th>
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value["wstarty"];?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value["wstartm"];?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value["wstartd"];?>
/</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value["wendy"];?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value["wendm"];?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value["wendd"];?>
</td>
                        <td id="fintr"><?php echo $_smarty_tpl->tpl_vars['row']->value["intr"];?>
</td>
                </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
    </div>

    <div class="col-2">
        <div class="btn-group-vertical">
            <div class="btn-group dropright" role="group">
                <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    檔案
                </button>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <button type="button" class="dropdown-item btn btn-primary" data-toggle="modal" data-target="#new_file">新增檔案</button>
                    <button type="button" class="dropdown-item btn btn-primary" data-toggle="modal" data-target="#">刪除檔案</button>
                </div>
            </div>
            <div class="btn-group dropright" role="group">
                <button id="btnGroupDrop2" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    工作
                </button>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop2">
                    <button type="button" class="dropdown-item btn btn-primary" data-toggle="modal" data-target="#new_work">新增工作</button>
                    <button type="button" class="dropdown-item btn btn-primary" data-toggle="modal" data-target="#">刪除工作</button>
                </div>
            </div>
            <?php if ($_smarty_tpl->tpl_vars['is_own']->value == 1) {?>
            <div class="btn-group dropright" role="group">
                <button id="btnGroupDrop3" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    成員
                </button>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop3">
                    <button type="button" class="dropdown-item btn btn-primary" data-toggle="modal" data-target="#new_Mem">新增成員</button>
                    <button type="button" class="dropdown-item btn btn-primary" data-toggle="modal" data-target="#">刪除成員</button>
                </div>
            </div>
            <?php }?>
        </div>
        </br>
            </div>

</div>
<!-- new_file -->
<div class="modal fade" id="new_file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">新增工作</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" enctype="multipart/form-data">
                <!-- 限制上傳檔案的最大值 -->
                <div id="file_list">
                    <!-- accept 限制上傳檔案類型。多檔案上傳 name 的屬性值須定義為 array -->
                    <input type="file" name="myFile[]" id="file_array" style="display: block;margin-bottom: 5px;">
                    <!-- 使用 html 5 實現單一上傳框可多選檔案方式，須新增 multiple 元素 -->
                    <!-- <input type="file" name="myFile[]" id="" accept="image/jpeg,image/jpg,image/gif,image/png" multiple> -->
                </div>
                <div>
                    <input type="button" id="more_files" value="更多檔案">
                </div>
                <input type="submit" value="上傳檔案">
            </form>
        </div>
    </div>
</div>


<!-- new_work -->
<div class="modal fade" id="new_work" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">新增工作</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-new_work" id="new_work" name="new_work" method="post" action="">
                <div class="modal-body">
                   <input class="form-control" type="text" name="wname" placeholder="請輸入工作名稱" autofocus="" required="">
                   <input class="form-control" type="date" name="wstart" placeholder="請輸入開始工作日期" required="">
                   <input class="form-control" type="date" name="wend" placeholder="請輸入結束工作日期" required="">
                   <input class="form-control" type="text" name="wintr" placeholder="請輸入工作簡介">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                    <input class="btn btn-primary" type="submit" value="新增工作"></input>
                </div>
            </form>            
        </div>
    </div>
</div>

<!-- new_Mem -->
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

<!-- new_Tea -->
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
 src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"><?php echo '</script'; ?>
>
<footer>
</footer>
</body>
</html>
<?php }
}
