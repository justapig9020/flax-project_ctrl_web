{config_load file="normal.conf" section="login"}
<html>
<head>
<title>
{#title#}_{#page#}
</title>
</head>
<body>
<a href="signUp.php">sign up</a></br>
This is {#page#}
<form id="login" name="login" method="post" action="">
	<font color="red">{$login_retM}</font></br>
	<label>
	帳號: <input type="text" name="id" /></br>
	</label>
	<label>
	密碼: <input type="password" name="pw" /></br>
	</label>
	<label>
	<input type="submit" value="登入" />
	</label>
</body}
</html>
