{config_load file="normal.conf" section="config"}
<html>
<head>
    <title>{#title#}_{#page#}</title>
    {literal}
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="css/normal.css"/>
		<link rel="stylesheet" type="text/css" href="css/config.css"/>
    {/literal}
</head>
<body class="text-center">
<script src="js/header.js"></script>
<div class="container">
	<form class="form-newPW" id="config" name="form1" method="post" action="">
		<div class="form-row">
            <div class="form-group col-md-12">
				<input class="form-control" type="password" name="oldpw" placeholder="請輸入舊密碼" autofocus="" required="">
			</div>
			<div class="form-group col-md-12">
				<input class="form-control" type="password" name="npw" placeholder="請輸入新密碼" required="">
			</div>
			<div class="form-group col-md-12">
				<input class="form-control" type="password" name="rnpw" placeholder="請再輸入新密碼">
			</div>
			<div class="form-group col-md-12">
				<input class="btn btn-lg btn-primary btn-block" type="submit" value="更改密碼"></input>
			</div>
		</div>			
		<div class="form-group col-md-12">
			{if $newPW_retM neq ""}
				<span class="badge badge-pill badge-warning">{$newPW_retM}</span>
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
