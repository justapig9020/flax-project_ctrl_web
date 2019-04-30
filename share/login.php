<?php
session_start();
if(isset($_SESSION["user"])){
	if($_SESSION["user"]==$dir){
		goto s2;
	}
}
echo"<a href=\"../../index.php\">請先登入</a>
		</br>";
exit();
s2:
?>