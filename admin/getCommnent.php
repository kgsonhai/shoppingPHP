<?php 
	include 'connect.php';
	$idSP = $_POST['idSP'];
	$query = "SELECT user.fullname,user.avata_user,binhluan.id,binhluan.noidung,binhluan.createdtime,binhluan.danhgia FROM binhluan INNER JOIN user ON binhluan.iduser = user.id WHERE idsanpham = $idSP";
	$data = mysqli_query($conn,$query);
	$mangsp = array();
	while ($row = mysqli_fetch_assoc($data)) {
		array_push($mangsp,new Comment(
			$row['id'],
			$row['fullname'],
            $row['avata_user'],
			$row['danhgia'],
			$row['noidung'],
			$row['createdtime']));
	}
	echo json_encode($mangsp);
	class Comment{
		function Comment($idComment,$name,$avatar,$danhgia,$noidung,$createdtime){
			$this->idCommnent= $idComment;
			$this->name = $name;
			$this->avatar = $avatar;
			$this->danhgia = $danhgia;
			$this->noidung = $noidung;
			$this->createdtime = $createdtime;
		}
	}
 ?>