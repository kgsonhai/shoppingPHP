<?php 
	include 'connect.php';
	$page = $_GET['page'];
	$idLoaisp = $_POST['idLoaisp'];
	$space = 5;
	$limit = ($page - 1) * $space;
	$query = "SELECT * FROM `sanpham` WHERE idsphot = $idLoaisp LIMIT $limit,$space ";
	$data = mysqli_query($conn,$query);
	$mangsp = array();
	while ($row = mysqli_fetch_assoc($data)) {
		array_push($mangsp,new Sanphammoinhat(
			$row['id'],
			$row['tensanpham'],
			$row['gia'],
			$row['img'],
			$row['chitiet'],
			$row['idsphot']));
	}
	echo json_encode($mangsp);
	class Sanphammoinhat{
		function Sanphammoinhat($id,$tensp,$giasp,$hinhanhsp,$motasp,$idLoaisp){
			$this->id = $id;
			$this->tensp = $tensp;
			$this->giasp = $giasp;
			$this->hinhanhsp = $hinhanhsp;
			$this->motasp = $motasp;
			$this->idLoaisp = $idLoaisp;
		}
	}
 ?>