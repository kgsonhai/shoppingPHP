<?php 
	include 'connect.php';
	$json = $_POST['json'];
	$data = json_decode($json,true);
	foreach ($data as $value) {
		$id_dathang = $value['madonhang'];
		$id_sanpham = $value['masanpham'];
		$soluong = $value['soluong'];
		$gia = $value['gia'];
		$query = "INSERT INTO `dat_hang_details` (`id`, `id_dathang`, `id_sanpham`, `soluong`, `gia`, `created_time`) VALUES (NULL, '$id_dathang', '$id_sanpham', '$soluong', '$gia', '".date("Y-m-d")."')";
		$data = mysqli_query($conn,$query);

		//update so luong
		$SPQuery = mysqli_query($conn,"SELECT * FROM `sanpham` WHERE id = '$id_sanpham'");
		$dataSP = mysqli_fetch_assoc($SPQuery);
		$SLCurrent = $dataSP['SLsanpham'] - $soluong;

		$UpdateQuery = mysqli_query($conn,"UPDATE `sanpham` SET `SLsanpham` = '$SLCurrent' WHERE `sanpham`.`id` = '$id_sanpham'"); 
	}

	if ($data) {
		echo "1";
	}else{
		echo "0";
	}
 ?>