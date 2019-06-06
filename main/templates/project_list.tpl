{config_load file="normal.conf" section="project_list"}
<html>
<head>
	<title>{#title#}_{#page#}</title>
   {literal}
    <!-- Bootstrap core CSS -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <!-- Custom styles for this template -->
	<link rel="stylesheet" type="text/css" href="css/normal.css"/>	   
   {/literal}
</head>
<body>
<header>
</header>
<script src="js/header.js"></script>
<main role="main" class="container">
	{if $prj_exist eq "0"}
		<div class="jumbotron">
			<h1 class="display-4">哈哈是不是沒有專案齁</h1>
			<p class="lead">想要新增專案嗎</p>
			<hr class="my-4">
			<p>試試看下面這顆按鈕</p>
			<a class="btn btn-primary btn-lg" href="#" role="button">新增專案</a>
		</div>
	{else}
	{foreach $prjs as $row}
		<div class="row">
		<div class="col-sm-4">
			<div class="card">
				<div class="card-header">
					<ul class="list-inline">
						<li class="list-inline-item">{$row["oid"]}/{$row["pname"]}</li>
						<li class="list-inline-item"><div class="text-right"><a href="./project.php?pid={$row["pid"]}" class="btn btn-primary">詳細希望</a></div></li>
					</ul>
				</div>
			</div>
		</div>
	</div>	
	{/foreach}
	{/if}
</main><!-- /.container -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="../js/bootstrap.bundle.js"></script>
<footer>
</footer>
</body>
</html>
