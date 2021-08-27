<?php 
	include 'connect.php';
	$username = $_POST['UserName'];
	$password = md5($_POST['PassWord']);
	$query = "SELECT * FROM `user` WHERE `username` = '$username' AND `password` = '$password'";
	$data = mysqli_query($conn,$query);
	$manguser = array();
	while ($row = mysqli_fetch_assoc($data)) {
		array_push($manguser,new User(
			$row['id'],
			$row['username'],
			$row['password'],
			$row['fullname'],
			$row['email'],
			$row['phone'],
			$row['address'],
			$row['avata_user']));
	}
	echo json_encode($manguser);
	class User{
		function User($id,$username,$password,$ten,$email,$sdt,$diachi,$avata_user){
			$this->id = $id;
			$this->username = $username;
			$this->password = $password;
			$this->ten = $ten;
			$this->email = $email;
			$this->sdt = $sdt;
			$this->diachi = $diachi;
			$this->avata_user = $avata_user;
		}
	}
 ?>