<html>
<?php
if(isset($_POST["id"])){
	echo "get </br>";
	/*if(preg_match("/^([a-z]+\d+\w*)$/",$_POST["id"]))
		echo "r";
	else
		echo "n";
	
}*/
$ndir = sprintf("xcopy newuser \"./users/%s\\\"",$_POST["id"]);
echo $ndir;
shell_exec($ndir);
}

echo "</br>";
?>
<form id="login" name="form1" method="post" action="">
		
		<label>
		輸入學號: <input type="text" name="id" /></br>
		</label>
		<input type="submit">
	</form>
</html>