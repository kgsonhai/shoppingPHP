<?php 
	include 'connect.php';
	$idUser = $_POST['idUser'];
	$tenkh = $_POST['tenkh'];
	$sdt = $_POST['sdtkh'];
	$diachi = $_POST['diachikh'];
	$totalSP = $_POST['TotalSP']; 

	$query = "INSERT INTO `dat_hang` (`id`, `name`, `phone`, `address`, `note`, `total`, `created_time`, `status`, `user_dathang`, `payment`) VALUES (NULL, '$tenkh', '$sdt', '$diachi', '', '$totalSP', '".date("Y-m-d")."', '0', '$idUser', '2')";
	$data = mysqli_query($conn,$query);
	if ($data) {
		$iddh = $conn->insert_id;
		echo $iddh;
	}else{
		echo "lỗi";
	}

	
 ?>