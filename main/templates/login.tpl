{config_load file="normal.conf" section="login"}
<html>
<head>
    <title>{#title#}_{#page#}</title>

    <!-- Bootstrap core CSS -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>


    <!-- Custom styles for this template -->
	<link rel="stylesheet" type="text/css" href="css/signin.css"/>	

  </head>
  <body class="text-center">
    <form class="form-signin" id="login" name="login" method="post" action="">
		<img class="mb-4" src="image/logo.png" alt="" width="72" height="72">
		<h1 class="h3 mb-3 font-weight-normal">聽說是FLAX</h1>
		<font color="red">{$login_retM}</font></br>
		<label for="inputEmail" class="sr-only">帳號</label>
		<input type="text" id="text" class="form-control" placeholder="帳號" required="" autofocus="">
		<label for="inputPassword" class="sr-only">密碼</label>
		<input type="password" id="inputPassword" class="form-control" placeholder="密碼" required="">
		<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button></br>
		<a class="btn btn-lg btn-outline-success" href="signUp.php">Sign up</a>
	</form>
</body>
</html>