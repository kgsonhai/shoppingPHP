<?php 
	include 'connect.php';
	$page = $_GET['page'];
	$space = 5;
	$limit = ($page - 1) * $space;
	$giaSP = !empty($_POST['giaSP']) ? $_POST['giaSP'] : "";
	$mauSP = !empty($_POST['mauSP']) ? $_POST['mauSP'] : "";
	$sizeSP = !empty($_POST['sizeSP']) ? $_POST['sizeSP'] : "";
	$saleSP = !empty($_POST['saleSP']) ? $_POST['saleSP'] : "";
	$tinhtrang = !empty($_POST['tinhtrangSP']) ? $_POST['tinhtrangSP'] : "";
	$where = "";

	if (!empty($giaSP)){
		$where .= (!empty($where)) ? " AND "."`gia` BETWEEN ".$giaSP."" : "`gia` BETWEEN  ".$giaSP."" ;
	}
	if (!empty($mauSP)) {
		$where .= (!empty($where)) ? " AND "."`color` LIKE '%$mauSP%'" : "`color` LIKE '%$mauSP%'";
	}
	if (!empty($sizeSP)) {
		$where .= (!empty($where)) ? " AND "."`size` LIKE '%".$sizeSP."%'" : "`size` LIKE '%".$sizeSP."%'";
	}
	if (!empty($saleSP)) {
		$where .= (!empty($where)) ? " AND "."`sale` LIKE '%".$saleSP."%'" : "`sale` LIKE '%".$saleSP."%'";
	}
	if (!empty($tinhtrang)) {
		$where .= (!empty($where)) ? " AND "."`SLsanpham` LIKE '%".$tinhtrang."%'" : "`SLsanpham` LIKE '%".$tinhtrang."%'";
	}

	$query = "SELECT * FROM `sanpham` WHERE ".$where." LIMIT $limit,$space";
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