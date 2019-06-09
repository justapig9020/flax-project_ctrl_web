<?php
/* Smarty version 3.1.34-dev-7, created on 2019-06-09 11:42:52
  from 'C:\flax-project_ctrl_web\main\templates\get_modify.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5cfcd49c132d81_83413147',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '22ba63465c26d7196ed7d1757e24d479144e108d' => 
    array (
      0 => 'C:\\flax-project_ctrl_web\\main\\templates\\get_modify.tpl',
      1 => 1560072560,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cfcd49c132d81_83413147 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['modifies']->value, 'row', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['row']->value) {
echo $_smarty_tpl->tpl_vars['key']->value+1;?>
-------------------
<?php if ($_smarty_tpl->tpl_vars['key']->value == 4) {
$_smarty_tpl->_assignInScope('id', "lid");
} else {
$_smarty_tpl->_assignInScope('id', "id");
}?>
<div id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
><?php echo $_smarty_tpl->tpl_vars['row']->value["id"];?>
</div>
<div id="fid"><?php echo $_smarty_tpl->tpl_vars['row']->value["file_id"];?>
</div>
<div id="uid"><?php echo $_smarty_tpl->tpl_vars['row']->value["user_id"];?>
</div>
<div id="t"><?php echo $_smarty_tpl->tpl_vars['row']->value["time"];?>
</div>
<div id="do"><?php echo $_smarty_tpl->tpl_vars['row']->value["do"];?>
</div>
</br>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

<?php }
}
