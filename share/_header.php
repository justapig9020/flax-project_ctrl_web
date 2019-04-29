<a href="./index.php"><img src="picture/logo.jpg" height="40" weight="40"></a>
<?php

if(isset($page)){
	if ($page == "login")
	{
		$text = "新增帳號";
		$url = "./signUp.php";
		/*echo"<a href=\"./signUp.php\">新增帳號</a>
		</br>		
		";*/
	}
}else{
	$text = "登入";
	$url = "./login.php";
	/*echo"<a href=\"./login.php\">登入</a>
			</br>
			";
			*/
}
echo"<a href=\"$url\">$text</a>
			</br>"
//echo "<form action=$url><button type=\"submit\">$text</button></from>"
?>


