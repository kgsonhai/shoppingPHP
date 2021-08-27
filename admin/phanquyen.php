<?php 
  session_start();
  if(!empty($_POST['logout'])){
        unset($_SESSION['username']); 
      }
 ?>	
    <?php include "layout/menu.php"  ?>
    <link rel="stylesheet" type="text/css" href="css/phanquyen.css">
    <script src="https://kit.fontawesome.com/yourcode.js"></script>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include "layout/header.php" ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
        <?php 
        	$privilege = mysqli_query($conn,"SELECT * FROM `privillege`");
        	$privilege = mysqli_fetch_all($privilege,MYSQLI_ASSOC);
        	$privilege_group = mysqli_query($conn,"SELECT * FROM `privillege_group` ORDER BY `privillege_group`.`position` ASC");
        	$privilege_group = mysqli_fetch_all($privilege_group,MYSQLI_ASSOC);

        	$currentPrivileges = mysqli_query($conn,"SELECT * FROM `user_privillege` WHERE `user_id`=".$_GET['iduser']);        	
        	$currentPrivilege = mysqli_fetch_all($currentPrivileges,MYSQLI_ASSOC);
        	$currentList = array();
        	if (!empty($currentPrivilege)) {
        		foreach ($currentPrivilege as $currentprivilege) {
        			$currentList[] = $currentprivilege['privillege_id'];
        		}
        	}
         ?>		

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Phân quyền thành viên</h6>
              <?php
              	if (!empty($_GET['action']) && $_GET['action']=="save") {
              		$data = $_POST;
              		$insertString = "";
              		$DeleteOldPrivilege = mysqli_query($conn,"DELETE FROM `user_privillege` WHERE `user_id`=".$data['user_id']);
              		foreach ($data['privilege'] as $insert) { 
              			  $insertString .= !empty($insertString) ? "," :"";            			  
              			  $insertString .= "(NULL,".$data['user_id'].", ".$insert.", '1603028856')";
              		}
         			$InsertPrivileges = mysqli_query($conn,"INSERT INTO `user_privillege` (`id`, `user_id`, `privillege_id`, `createtime`) VALUES ".$insertString);
         			echo "<h4>Phân quyền thành công</h4>";exit();
              	}
               ?>
            </div>
            <div class="card-body">
              <div class="table-responsive"> 
                <form action="?action=save&iduser=<?=$_GET['iduser']?>" method="POST" enctype="multipart/form-data" id="edit_form">
                	<input type="submit" title="Lưu thành viên" value="" class="Save">
                	<input type="hidden" name="user_id" value="<?=$_GET['iduser']?>">
                	<div class="clearfix"></div>
                	<?php foreach ($privilege_group as $group) {   ?>
                	<div class="privilege-group">
                	  <h4 class="group-name"><?=$group['name']?></h4>
                	  	<ul>
                	  		<?php foreach ($privilege as $privileges) {
                	  			if ($privileges['group_id'] == $group['id']) { ?>
                			<li>
                				<input type="checkbox" 
                					<?php if (in_array($privileges['id'], $currentList)) { ?>
                						checked = ""
                					<?php } ?>
                				value="<?=$privileges['id']?>" id="privilege_<?=$privileges['id']?>" name="privilege[]">
                				<label for="privilege_<?=$privileges['id']?>"><?=$privileges['name']?></label>
                			</li>
                			<?php }  ?>
                			<?php }  ?>                	
                	  </ul>
                	</div>
                <?php } ?>              
                </form>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>
</html>
