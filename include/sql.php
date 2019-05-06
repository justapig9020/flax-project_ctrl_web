<?php
    include("dbconf.php");
	function str_con () {
		try {
			$db = new PDO('mysql:host=localhost;dbname=project_ctrl;charsetutf8',getDBUser(),getDBPw());
		} catch (\PDOException $e) {
			//echo "Error: ".$e."</br>";
			return null;
		} 	
		return $db;
	}
?>
