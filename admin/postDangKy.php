<?php 
	include 'connect.php';
	$fullname = $_POST['fullname'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$diachi = $_POST['diachi'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];  

	$query = "INSERT INTO `user` (`id`, `fullname`, `username`, `password`, `email`, `phone`, `address`, `avata_user`) VALUES (NULL, '$fullname', '$username', '$password', '$email', '$phone', '$diachi', '')";
	$data = mysqli_query($conn,$query);
	if ($data) {
		echo 1;
	}else{
		echo "lỗi";
	}

	
 ?>