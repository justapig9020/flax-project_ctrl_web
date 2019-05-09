<a href="../overView.php"><img src="../image/logo.jpg" height="40" weight="40"></a>
<?php  
$n = array(
	"project.php"=>"專案",
	"newProject.php"=>"新增專案",
	"config.php"=>"設定",
	"logout.php"=>"登出"
    );
foreach ($n as $value=>$key) {
	echo "<a href=\"".$value."\">".$key."</a>&nbsp";
}
echo "hello! ".$_SESSION["user"];
?>
