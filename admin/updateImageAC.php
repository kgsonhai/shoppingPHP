<?php 
	include 'connect.php';
	$targer_dir = "upload/";
    $targer_file = basename($_FILES['image']['name']);
    $targer_files = $targer_dir.$targer_file;
    $idUser = $_POST['idUser'];
	 
	

	if (move_uploaded_file($_FILES['image']['tmp_name'],$targer_files)) {
	    $sql = "UPDATE `user` SET `avata_user`= '$targer_files' WHERE id = $idUser ";
	    $result = mysqli_query($conn,$sql);
	    if( $result){
	       	echo $_FILES['image']['name'];

	    }else{
		    echo "Failed";
    	}
	}else{
		echo "Failed";
	}

	
 ?>