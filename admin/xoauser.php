<?php
	session_start();
	include "../config/connect.php"; 
	$sql = "DELETE FROM `user` WHERE id=".$_GET['iduser'];
	$ketqua = mysqli_query($conn,$sql);
	header('location:khachhang.php');

 ?>