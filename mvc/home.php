<?php 
	include "model/DBconfig.php";
	$db = new Database;
	$db->connect();

		require_once 'controller/ContactController.php';
 ?>