<?php 
	include "../config/connect.php";

	function checkPrivilege($url = false)
	{  
	$url = $url != false ? $url : $_SERVER['REQUEST_URI'];
	if (empty($_SESSION['username']['privilege'])) {
		return false;
	}
	$privilege = $_SESSION['username']['privilege'];
	$privilege = implode("|", $privilege);
	preg_match('/index\.php$|'.$privilege.'/',$url,$mathes);
		return !empty($mathes);
	}
 ?>