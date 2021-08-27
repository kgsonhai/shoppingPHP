<?php 
	include 'connect.php';
	$idUser = $_POST['idUser'];
	$query = "SELECT sanpham.id,sanpham.tensanpham,sanpham.gia,sanpham.img,giohang.soluong FROM `giohang` INNER JOIN sanpham ON giohang.id_sanpham = sanpham.id WHERE giohang.id_user = $idUser";
	$data = mysqli_query($conn,$query);
	$mangsp = array();
	while ($row = mysqli_fetch_assoc($data)) {
		array_push($mangsp,new GioHang(
			$row['id'],
			$row['tensanpham'],
			$row['gia'],
			$row['img'],
			$row['soluong']));
	}
	echo json_encode($mangsp);
	class GioHang{
		function GioHang($id,$tensp,$giasp,$hinhanhsp,$soluongsp){
			$this->id = $id;
			$this->tensp = $tensp;
			$this->giasp = $giasp;
			$this->hinhanhsp = $hinhanhsp;
			$this->soluongsp = $soluongsp;
		}
	}
 ?>