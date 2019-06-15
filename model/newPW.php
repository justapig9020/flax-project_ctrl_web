<?php
include("../include/network.php");
include("../include/sql.php");
if(isset($_POST['npw']) 
    and isset($_POST['rnpw'])
    and isset($_POST['oldpw'])
    )
{
    $npw = $_POST['npw'];
    $rnpw = $_POST['rnpw'];
    $oldpw = $_POST['oldpw'];
    if ($npw==$rnpw)
    {
        if(strlen($npw) >5 and strlen($npw) <26) 
        {
            $db = str_con();
            if ($db)
            {
                $sel = "select * from user where (pw=:oldpw and id=:id)";
                try 
                {
                    $ins = $db->prepare($sel);
                    if($ins)
                    {
                        $key = hash('sha256',$oldpw);
                        $ins->bindParam(':oldpw',$key);
                        $ins->bindParam(':id',$_SESSION["user"]);
                        $result = $ins->execute();
                        if($result)
                        {
                            $row = $ins->fetch(PDO::FETCH_ASSOC);
                        }
                        else
                        {
                            $error = $ins->errorInfo();
                            echo "查詢失敗".$error[2];
                        }
                    }   
                }
                catch(PDOException $e)
                {
                    echo $e;
                }
                if($row)
                {
                    $sel = "update user set pw = :npw where id=:id";
                    try 
                    {
                        $ins = $db->prepare($sel); 
                        if($ins)
                        {
                            $key = hash('sha256',$npw);
                            $ins->bindParam(':id',$_SESSION["user"]);
                            $ins->bindParam(':npw',$key);
                            $ins->execute();
                        }
                    } 
                    catch (PDOException $e)
                    {
                        echo "insert error: ".$e;
                        exit();
                    }
                    $retMesse = "完成";
                }
                else
                {
                    $retMesse = "舊密碼錯誤";
                }
                $db=null;
            }
            else
            {
               echo "資料庫無法連線 請聯絡管理員</br>";
            }
        } 
        else 
        {
             $retMesse = "請按照規則輸入";
        }
    }else
    {
        $retMesse = "重複輸入密碼錯誤";
    }
}
?>

