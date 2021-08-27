<?php 
	include 'connect.php';
	$idUser = $_POST['idUser'];
	$ten = $_POST['ten'];
    $username = $_POST['tendangnhap'];
	$sdt = $_POST['sdt'];
	$diachi = $_POST['diachi'];
	$email = $_POST['email']; 

	$query = "UPDATE `user` SET `fullname` = '$ten', `username` = '$username', `email` = '$email', `phone` = '$sdt', `address` = '$diachi' WHERE `user`.`id` = $idUser";
	$data = mysqli_query($conn,$query);
	if ($data) {
		echo 1;
	}else{
		echo 0;
	}

	
 ?>