<?php
include("../include/network.php");
if (checkIn()) {
    header("location:../main/overView.php");
}
include("../include/sql.php");
if(isset($_POST['id']) 
    and isset($_POST['pw']) 
    and isset($_POST['repw'])
    and isset($_POST['acc'])
    and isset($_POST['email'])
    and isset($_POST['name'])
    )
{
    $id = $_POST['id'];
    $pw = $_POST['pw'];
    $repw = $_POST['repw'];
    $acc = $_POST['acc'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    if ($pw==$repw){
        if(preg_match("/^\d{8,8}$/",$id) and
            preg_match("/^(\w+)$/",$acc) and
            strlen($acc) > 5 and strlen($acc) < 26 and
            strlen($pw) >5 and strlen($pw) <26 and
            preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email) and strlen($pw) > 0 and
            preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)
        ) {
                $db = str_con();
                if ($db){
                    $sel = "select * from user where id=:id or account = :acc";
                    try {
                          $ins = $db->prepare($sel);
                        if($ins){
                            $ins->bindParam(':id',$id);
                            $ins->bindParam(':acc',$acc);
                            $result = $ins->execute();
                            if($result){
                                $row = $ins->fetch(PDO::FETCH_ASSOC);
                            }else{
                                $error = $ins->errorInfo();
                                echo "查詢失敗".$error[2];
                            }
                        }   
                    }catch (PDOException $e){
                        echo $e;
                    }
                    if(!$row){
                    $sel = "insert into user (id,account,pw,email,name) values (:id,:acc,:pw,:ema,:name)";
                    try {
                        $ins = $db->prepare($sel); 
                        if($ins){
                            $key = hash('sha256',$pw);
                            $ins->bindParam(':id',$id);
                            $ins->bindParam(':pw',$key);
                            $ins->bindParam(':acc',$acc);
                            $ins->bindParam(':ema',$email);
                            $ins->bindParam(':name',$name);
                            $ins->execute();
                        }
                    } catch (PDOException $e){
                        echo "insert error: ".$e;
                        exit();
                    }
                    $ndir = sprintf("mkdir \"../users/%s\\\"",$id);
                    shell_exec($ndir);
                    $ndir = sprintf("mkdir \"../users/%s/sticker\\\"",$id);
                    shell_exec($ndir);
                    $retMesse = "完成";
                }else{
                    $retMesse = "使用者已存在";
                }
                $db=null;
            }else{
               echo "資料庫無法連線 請聯絡管理員</br>";
            }
        } else {
             $retMesse = "請按照規則輸入";
        }
    }else{
        $retMesse = "重複輸入密碼錯誤";
    }
}
?>

