<?php
	session_start();
	include "../../config/connect.php";
	$noidung = $_POST['noidung'];
	$ID = $_POST['IDUser'];
	if (isset($_SESSION['username'])) {
			$ketqua = mysqli_query($conn,"UPDATE `contact_reply` SET `contentReply` = '$noidung' , 
				`status` = '1'   WHERE `id` = '$ID'");
				echo 'Gửi phản hồi thành công';		
	}
	
  ?>