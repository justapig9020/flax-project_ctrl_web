<a href="./index.php"><img src="../../picture/logo.jpg" height="40" weight="40"></a>
<?php
$n = array(
	"index"=>"Over View",
	"project"=>"project",
	"logout"=>"logout"
);
foreach ($n as $key=>$value){
	//echo $file." ".$key."</br>";
	if($file == $key)
		echo "<font color=\"red\">";
	echo "<a href=\"./".$key.".php\">".$value."</a>&nbsp";
	if($file == $key)
		echo "</font>";
}
?>