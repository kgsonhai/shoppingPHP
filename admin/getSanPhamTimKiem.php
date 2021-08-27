<?php 
	include 'connect.php';
	$tukhoa = $_POST['tukhoa'];
	$page = $_GET['page'];
	$space = 5;
	$limit = ($page - 1) * $space;
	$query = "SELECT * FROM `sanpham` WHERE `tensanpham` LIKE '%$tukhoa%' LIMIT $limit,$space";
	$data = mysqli_query($conn,$query);
	$mangsp = array();
	while ($row = mysqli_fetch_assoc($data)) {
		array_push($mangsp,new sanpham(
			$row['id'],
			$row['tensanpham'],
			$row['gia'],
			$row['img'],
			$row['chitiet'],
			$row['idsphot']));
	}
	echo json_encode($mangsp);
	class sanpham{
		function sanpham($id,$tensp,$giasp,$hinhanhsp,$motasp,$idLoaisp){
			$this->id = $id;
			$this->tensp = $tensp;
			$this->giasp = $giasp;
			$this->hinhanhsp = $hinhanhsp;
			$this->motasp = $motasp;
			$this->idLoaisp = $idLoaisp;
		}
	}
 ?>