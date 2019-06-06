{config_load file="normal.conf" section="newProject"}
<html>
<head>
	<title>{#title#}_{#page#}</title>
   {literal}
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="css/normal.css"/>
		<link rel="stylesheet" type="text/css" href="css/newProject.css"/>
   {/literal}
</head>
<body class="text-center">
<script src="js/header.js"></script>
<header>
</header>
<div class="container">
	<form class="form-newProject" id="newProject" name="form1" method="post" action="">
		<div class="form-row">
			<div class="form-group col-md-12">
				<input class="form-control" type="text" name="pname" placeholder="專題名稱" autofocus="" required="">
			</div>
			<div class="form-group col-md-12">
				<input class="form-control" type="text" name="pintr" placeholder="專題簡介">
			</div>
			<div class="form-group col-md-12">
				<input class="btn btn-lg btn-primary btn-block" type="submit" value="新增專題"></input>
			</div>
		</div>			
		<div class="form-group col-md-12">
			{if $retMesse neq ""}
				<span class="badge badge-pill badge-warning">{$retMesse}</span>
			{/if}
		</div>
	</form>
</div>
<footer>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="../js/bootstrap.bundle.js"></script>
</body>
</html>
