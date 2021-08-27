<?php 
	include "../config/connect.php";
	if (isset($_GET['action'])){
		$xoadm = mysqli_query($conn,"DELETE FROM `sanphamhot` WHERE id = ".$_GET['iddanhmuc']);
	}else{
	$xoadm = mysqli_query($conn,"DELETE FROM `danhmuc` WHERE id = ".$_GET['iddanhmuc']);
		}
	header('location:tables.php');
 ?>