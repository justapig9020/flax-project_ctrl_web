<?php
session_start();

function getIp()
{
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	return $ip;
}

function checkIn ()
{
	$chk = false;
	if (isset($_SESSION["ip"])) {
		if ($_SESSION["ip"] == getIp()) {
			$chk = true;
		}
	}
	return $chk;
}
?>