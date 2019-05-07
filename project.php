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
	if(isset($_POST["submit"]) and isset($_GET["p"])){ //post a file
		if (isset($_FILES)) {
			$id = $_SESSION["user"];
			$fname = $_FILES["pfile"]["name"];
			$pname = $_GET["p"];
			$db = str_con();
			echo "檔案: ".$fname;
			if ($db){
				$sel = "select * from file where (
				select id from project inner join do_proj on id=project_id where name=:pname and user_id=:id)=project_id and name=:fname";
				try {
					$ins = $db->prepare($sel);
					if($ins){
						$ins->bindParam(':pname',$pname);
						$ins->bindParam(':fname',$fname);
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
				if($rows){//modify exist file
					$sel = "insert into modify 
						(proj_id,file_name,user_id,do)
						value
						((select id from project where name=:pname),:fname,:id,:do)";
					try {
						$ins = $db->prepare($sel);
						$do = 1;
						if($ins){
							$ins->bindParam(':pname',$pname);
							$ins->bindParam(':fname',$fname);
							$ins->bindParam(':id',$id);
							$ins->bindParam(':do',$do);
							$ins->execute();
						}
					}catch (PDOException $e){
						echo $e;
					}
					echo "更新成功</br>";
				}else{//it's a new file
					$sel = "insert into file 
						(name,own_id,project_id) 
						value
						(:fname,:id,(select id from project where name=:pname))";
					try {
						$ins = $db->prepare($sel);
						if($ins){
							$ins->bindParam(':pname',$pname);
							$ins->bindParam(':fname',$fname);
							$ins->bindParam(':id',$id);
							$ins->execute();
						}
					}catch (PDOException $e){
						echo $e;
					}
					$sel = "insert into modify 
						(proj_id,file_name,user_id,do)
						value
						((select id from project where name=:pname),:fname,:id,:do)";
					try {
						$ins = $db->prepare($sel);
						$do = 0;
						if($ins){
							$ins->bindParam(':pname',$pname);
							$ins->bindParam(':fname',$fname);
							$ins->bindParam(':id',$id);
							$ins->bindParam(':do',$do);
							$ins->execute();
						}
					}catch (PDOException $e){
						echo $e;
					}
					echo "上傳成功</br>";
				}
				$db = null;
			}else{
				$ret = "資料庫無法連線 請聯絡管理員</br>";
			}
			move_uploaded_file($_FILES["pfile"]["tmp_name"],"./users/".$_SESSION["user"]."/".$fname);
		}
    }
	if(!isset($_GET["p"])){//prj unselect
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
    }else{//prj selected
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
			if($rows){//prj exict
                echo "<form method=\"post\" enctype=\"multipart/form-data\"><input type=\"file\" id=\"pfile\" name=\"pfile\" value=\"新增檔案\"><input type=\"submit\" name=\"submit\"value=\"確認上傳\"></form>";
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
