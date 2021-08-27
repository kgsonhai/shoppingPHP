<?php 
	include 'connect.php';
	$idUser = $_POST['idUser'];
	$idSP = $_POST['idSP'];
    $noidung = $_POST['noidung'];
	$danhgia = $_POST['danhgia'];


	$query = "INSERT INTO `binhluan` (`id`, `idsanpham`, `iduser`, `noidung`, `createdtime`, `danhgia`) VALUES (NULL, '$idSP', '$idUser', '$noidung', '".date("Y-m-d")."', '$danhgia')";
	$data = mysqli_query($conn,$query);
	if ($data) {
		echo 1;
	}else{
		echo 0;
	}

	
 ?>