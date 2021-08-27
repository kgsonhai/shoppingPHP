<?php 
	include 'connect.php';
	$idSP= $_POST['idSP'];
	$query = "SELECT * FROM `sanpham` WHERE `id` = $idSP";
	$data = mysqli_query($conn,$query);

	$row = mysqli_fetch_assoc($data);
	echo $row['SLsanpham'];
	
 ?>