<?php 
	include 'connect.php';
	$json = $_POST['json'];
    $id_user = $_POST['idUser'];
	$deleteGioHang = mysqli_query($conn,"DELETE FROM `giohang` WHERE id_user = $id_user");
	$data = json_decode($json,true);
	foreach ($data as $value) {
		$idsp = $value['id_sanpham'];
		$soluong = $value['soluong'];
		$idUser = $value['id_user'];

		$query = "INSERT INTO `giohang` (`id`, `id_sanpham`, `soluong`, `id_user`, `expire_time`) VALUES (NULL, $idsp, $soluong, $idUser, '".date("Y-m-d")."')";
		$data = mysqli_query($conn,$query);
	}

	if ($data) {
		echo "1";
	}else{
		echo "0";
	}
 ?>