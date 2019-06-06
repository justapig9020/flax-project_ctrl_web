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
	<font color="red">prj_exist={$prj_exist}</font></br>
	{if $prj_exist eq "0"}
		<div class="jumbotron">
			<h1 class="display-4">哈哈是不是沒有專案齁</h1>
			<p class="lead">想要新增專案嗎</p>
			<hr class="my-4">
			<p>試試看下面這顆按鈕</p>
			<a class="btn btn-primary btn-lg" href="#" role="button">新增專案</a>
		</div>
	{else}
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
	{/if}
</main><!-- /.container -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="../js/bootstrap.bundle.js"></script>
<footer>
</footer>
</body>
</html>
