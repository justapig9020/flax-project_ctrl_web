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
				<input class="form-control" type="text" name="pname" placeholder="專案名稱" autofocus="" required="">
			</div>
			<div class="form-group col-md-12">
				<input class="form-control" type="text" name="pintr" placeholder="專案簡介">
			</div>
			<div class="form-group col-md-12">
				<input class="btn btn-lg btn-primary btn-block" type="submit" value="新增專案"></input>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script></body>
</html>
