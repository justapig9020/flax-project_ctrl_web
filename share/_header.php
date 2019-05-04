<a href="./index.php"><img src="../image/logo.jpg" height="40" weight="40"></a>
<?php
    if (isset($page)) {
        switch ($page) {
            case "index":
                $n = array("註冊"=>"signUp.php");
                break;
            case "signUp":
            default:
                $n = array("登入"=>"index.php");
        }
    }
foreach ($n as $key=>$value) {
	echo "<a href=\"".$value."\">".$key."</a>&nbsp";
}

?>
