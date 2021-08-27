<?php 
	include 'connect.php';
	$id_user = $_POST['id_user'];
    $idSP = isset($_POST['idSP']) ? $_POST['idSP'] : 0;
    if($idSP == 0){
	    $data = mysqli_query($conn,"DELETE FROM `giohang` WHERE id_user = $id_user");
    }else{
        $data = mysqli_query($conn,"DELETE FROM `giohang` WHERE id_user = $id_user AND id_sanpham = $idSP");
    }
    
	if ($data) {
		echo "1";
	}else{
		echo "0";
	}
 ?>