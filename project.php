<html>
<head>
    <?php
	include("share/head.php");
	?>
	<link rel="stylesheet" type="text/css" href="/css/normal.css">
</head>
<body>
<header>
    <?php
    include("include/network.php");
	if (!checkIn()) {
		header("location:index.php");
	}
	include("include/sql.php");
	$page = "overview";
	include("share/_headerIn.php");
	?>	
</header>
<?php
	if(!isset($_GET["p"])){
		$id = $_SESSION["user"];
		$db = str_con();
		if ($db){
			$sel = "select project.name as name from do_proj inner join project on project.id = do_proj.project_id where do_proj.user_id = :id";
			try {
				$ins = $db->prepare($sel);
				if($ins){
					$ins->bindParam(':id',$id);
					$result = $ins->execute();
					if($result){
						$rows = $ins->fetchAll(PDO::FETCH_ASSOC);
						//
					}else{
						$error = $ins->errorInfo();
						echo "查詢失敗".$error[2];
					}
				}
			}catch (PDOException $e){
				echo $e;
			}
			if($rows){
				//echo $rows["name"]."</br>";
				foreach($rows as $row){
					foreach($row as $value){
						echo "<a href=\"project.php?p=".$value."\">".$value."</a></br>";
					}	
				}
			}else{
				echo "尚無專案";
			}
			$db = null;
		}else{
			$ret = "資料庫無法連線 請聯絡管理員</br>";
		}
	}else{
		$id = $_SESSION["user"];
		$pname = $_GET["p"];
		$db = str_con();
		if ($db){
			$sel = "select project.name as name from do_proj inner join project on project.id = do_proj.project_id where do_proj.user_id = :id and project.name = :pname";
			try {
				$ins = $db->prepare($sel);
				if($ins){
					$ins->bindParam(':id',$id);
					$ins->bindParam(':pname',$pname);
					$result = $ins->execute();
					if($result){
						$rows = $ins->fetchAll(PDO::FETCH_ASSOC);
						//
					}else{
						$error = $ins->errorInfo();
						echo "查詢失敗".$error[2];
					}
				}
			}catch (PDOException $e){
				echo $e;
			}
			if($rows){
				
			}else{
				echo "專案不存在";
			}
		}
	} 
?>
<footer>
	<?php
	include("share/_footer.php");
	?>
</footer>
</body>
</html>
