<?php
	session_start();
	include "../config/connect.php";
	$idsp = $_POST['idsp'];
	$iduser = $_SESSION['id'];
	$noidung = $_POST['noidung'];
	$isReply = $_POST['isreply'];
	$commentID = $_POST['commentid'];
	if (isset($_SESSION['username'])) {
			if ($isReply=='true') {
			$ketqua = mysqli_query($conn,"INSERT INTO `replies` (`commentID`,`userID`, `comment`, `createtime`) VALUES ('$commentID','$iduser', '$noidung', '".date("yy-m-d")."')");	
			}else{				
				$ketqua = mysqli_query($conn,"INSERT INTO `binhluan` (`idsanpham`, `iduser`, `noidung`,`createdtime`) VALUES ('$idsp','$iduser','$noidung','".date("yy-m-d")."')");

				}	
				    		echo '<div><span style="font-weight:bold;color:red">'.$_SESSION['name'].'</span>:    <span style="font-size:8px">'.date("yy-m-d").'</span></div>';
				    		echo '<div>'.$noidung.'</div>';
				    		echo '<a style="color:blue;cursor:pointer;font-weight:bold" href="javascript:void(0)" onclick="reply(this)">REPLY</a>';
	}
	else{
		header('location:../admin/login.php');
	}
	
  ?>