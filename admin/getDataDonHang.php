<?php 
	include 'connect.php';
	$idUser = $_POST['idUser'];
	$status = $_POST['tinhtrang'];
	$query = "SELECT dat_hang_details.id,dat_hang_details.id_sanpham, sanpham.tensanpham,sanpham.img,sanpham.gia,dat_hang_details.soluong,dat_hang_details.tinhtrang,dat_hang_details.created_time,sanpham.chitiet,sanpham.idsphot FROM dat_hang_details INNER JOIN dat_hang ON dat_hang_details.id_dathang = dat_hang.id INNER JOIN sanpham ON dat_hang_details.id_sanpham = sanpham.id WHERE dat_hang_details.tinhtrang = $status AND dat_hang.user_dathang = $idUser";
	$data = mysqli_query($conn,$query);
	$mangsp = array();
	while ($row = mysqli_fetch_assoc($data)) {
		array_push($mangsp,new DonHang(
			$row['id'],
			$row['id_sanpham'],
			$row['tensanpham'],
			$row['gia'],
			$row['soluong'],
            $row['img'],
			$row['tinhtrang'],
            $row['created_time'],
			$row['chitiet'],
			$row['idsphot']));
	}
	echo json_encode($mangsp);
	class DonHang{
		function DonHang($id_dathang,$id_sanpham,$ten,$gia,$soluong,$hinhanh,$tinhtrang,$createdtime,$mota,$IDLoaiSP){
			$this->id_dathang = $id_dathang;
			$this->id_sanpham = $id_sanpham;
			$this->ten = $ten;
			$this->gia = $gia;
            $this->soluong = $soluong;
			$this->hinhanh = $hinhanh;
			$this->tinhtrang = $tinhtrang;
			$this->createdtime = $createdtime;
			$this->mota = $mota;
			$this->IDLoaiSP = $IDLoaiSP;
		}
	}
 ?>