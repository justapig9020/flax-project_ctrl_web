<?php
if (isset ($_POST["end"])) {
    if ($_POST["end"]<10){
        echo "<img src='http://www.233xiao.com/tup/2018101211.jpg'/>";
    }else if($_POST["end"]<15) {
        echo "<img src='image/到底了.PNG'  />";
    }else {
        echo "<img src='image/壞掉惹.png'  />";
    }
}
?>