<?php 
	include 'connect.php';
	$idDH = $_POST['id_DH'];
	$changeStatus = $_POST['changeStatus'];

	$query = "UPDATE `dat_hang_details` SET `tinhtrang` = $changeStatus WHERE id = $idDH";
	$data = mysqli_query($conn,$query);
	if ($data) {
		echo 1;
	}else{
		echo 0;
	}

	
 ?>