<?php
/* Smarty version 3.1.34-dev-7, created on 2019-06-11 00:45:05
  from 'C:\flax-project_ctrl_web\main\templates\header.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5cfedd71d01004_83853060',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dad5c3435a9554cd1772c2a72ab1398cf8830db7' => 
    array (
      0 => 'C:\\flax-project_ctrl_web\\main\\templates\\header.html',
      1 => 1560206704,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cfedd71d01004_83853060 (Smarty_Internal_Template $_smarty_tpl) {
?><nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
		<a class="navbar-brand" href="overView.php">
			<span class="h3 mx-1">FLAX</span>
			<img src="image/Pornlogo.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
		</a>
		<div class="collapse navbar-collapse" id="navbarsExampleDefault">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="project.php">專案列表</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="newProject.php">新增專案</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">帳戶</a>
					<div class="dropdown-menu" aria-labelledby="dropdown01">
						<a class="dropdown-item" href="#">修改密碼</a>
						<a class="dropdown-item" href="logout.php">登出</a>
					</div>
				</li>
			</ul>
			<form class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
				<button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
			</form>
		</div>
	</nav>	
<?php }
}
