  <?php 
	include 'connect.php';
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

	$query = mysqli_query($conn,"SELECT COUNT(id) FROM `sanpham` WHERE ".$where."");
	$result = mysqli_fetch_assoc($query);
    if($result){
        echo $result['COUNT(id)'];
    }else{
        echo "Không có sản phẩm nào";
    }
    
	
 ?>