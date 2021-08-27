<?php 
	include 'connect.php';
	$idnhomSP = $_POST['idDanhmuc'];
	$query = "SELECT * FROM `danhmuc` WHERE id_nhomSP = $idnhomSP";
	$data = mysqli_query($conn,$query);
	$mangDM = array();
	while ($row = mysqli_fetch_assoc($data)) {
		array_push($mangDM,new Danhmuc(
			$row['id'],
			$row['hangsx'],
			$row['hinhanhdanhmuc']));
	}
	echo json_encode($mangDM);
	class Danhmuc{
		function Danhmuc($id,$tenDM,$hinhanhDM){
			$this->id = $id;
			$this->tenDM = $tenDM;
			$this->hinhanhDM = $hinhanhDM;
		}
	}
 ?>