<?php 
	include 'connect.php';
	$tukhoa = $_POST['tukhoa'];
	$query = "SELECT COUNT(id) FROM `sanpham` WHERE `tensanpham` LIKE '%$tukhoa%'";
	$data = mysqli_query($conn,$query);

	$result = mysqli_fetch_assoc($data);
	
	echo $result['COUNT(id)'];
	
 ?>