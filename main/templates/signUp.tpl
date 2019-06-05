<html>
<head>
	<title>{#title#}_{#page#}</title>

    <!-- Bootstrap core CSS -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>

    <!-- Custom styles for this template -->
	<link rel="stylesheet" type="text/css" href="css/signup.css"/>	
</head>
<body class="text-center">
<header>
</header>
<div class="container">
	<form class="form-signup" id="login" name="form1" method="post" action="">
	<div class="alert alert-danger" role="alert">
		<font color="red">{$signUp_retM}</font>
	</div>
		<div class="form-row">
			<div class="form-group col-md-12">
				<label class="sr-only">輸入學號</label>
				<input class="form-control" type="text" name="id" placeholder="學號" autofocus="" required="">
			</div>
			<div class="form-group col-md-12">
				<label class="sr-only">輸入姓名</label>
				<input class="form-control" type="text" name="name" placeholder="姓名" required="">
			</div>
			<div class="form-group col-md-12">
				<label class="sr-only">輸入帳號</label>
				<input class="form-control" type="text" name="acc" placeholder="帳號" required="">
			</div>
			<div class="form-group col-md-12">
				<label class="sr-only">輸入密碼</label>
				<input class="form-control" type="password" name="pw" placeholder="密碼" required="">
			</div>
			<div class="form-group col-md-12">
				<label class="sr-only">再輸入一次密碼</label>
				<input class="form-control" type="password" name="repw" placeholder="再輸入一次密碼" required="">
			</div>
			<div class="form-group col-md-12">
				<label class="sr-only">輸入電子郵件</label>
				<input class="form-control" type="email" name="email" placeholder="電子郵件" required="">
			</div>
			<div class="form-group col-md-12">
				<input class="btn btn-lg btn-primary btn-block" type="submit" value="新增帳號"></input>
			</div>
			<div class="form-group col-md-12">
				<a class="btn btn-lg btn-outline-success" href="index.php">回到登入畫面</a>
			</div>
		</div>
	</form>
</div>
<footer>
</footer>
</body>
</html>
