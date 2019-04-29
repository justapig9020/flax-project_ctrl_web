<?php
	function str_con () {
		try {
			$db = new PDO('mysql:host=localhost;dbname=project_ctrl;charsetutf8','root','pw4d6f1na1');
		} catch (\PDOException $e) {
			//echo "Error: ".$e."</br>";
			return null;
		} 	
		return $db;
	}
?>