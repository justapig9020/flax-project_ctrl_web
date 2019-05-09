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
		$uid = $_SESSION["user"];
		if (isset($_GET["oid"]) and isset($_GET["pname"])) {
			$oid = $_GET["oid"];
			$pname = $_GET["pname"];
			$pid = get_pid($pname,$oid);
			echo "Project: ".$oid."/".$pname."</br>";
			echo "<form method=\"post\" enctype=\"multipart/form-data\">
			<input type=\"file\" name=\"pfile\" id=\"pfile\">
			<input type=\"submit\" name=\"fsubmit\" id=\"fsubmit\" value=\"上傳\">
			</form>";
			echo "<form method=\"post\" >
			新增使用者: <input type=\"text\" name=\"nuser\" id=\"nuser\">
			<input type=\"submit\" name=\"usubmit\" id=\"usubmit\" value=\"新增\">
			</form>";
			if (isset($_POST["fsubmit"])) {
				echo "</br>upload</br>";
			} else if (isset($_POST["usubmit"])) {
				echo "</br>new user</br>";
			}
		} else {
			/*do project select*/
			$db = str_con();
			if ($db){
				//echo "連線成功</br>";
				$sel = "select do_proj.user_id as oid,project.name as pname from project,(select project_id from do_proj where user_id = :uid) as used,do_proj where project.id=used.project_id and do_proj.project_id=project.id and status=0;";
				try {
					$ins = $db->prepare($sel); 
					if($ins){
						$ins->bindParam(':uid',$uid);
						$result = $ins->execute();
						if($result){
								$rows = $ins->fetchall(PDO::FETCH_NUM);
						}else{
							$error = $ins->errorInfo();
							//echo "查詢失敗".$error[2];
						}
					}
				} catch (PDOException $e){
					
				}
				if(!$rows){
					echo "尚無專案</br>";
					echo "<a href=\"newProject.php\">點此新增專案</a></br>";
				}else{
					/*show selectable projects*/
					foreach ($rows as $row) {
						foreach ($row as $key=>$value) {
							if ($key&1)
								echo "<a href=\"project.php?oid=".$buf."&pname=".$value."\">".$buf."/".$value."</a></br>";
								//echo $key.": ".$value."</br>";
							else 
								$buf = $value;
						}
					}
				}
			$result=null;
			$row=null;
			$db=null;
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
