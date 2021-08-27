<?php 
  session_start();
  include "../config/connect.php";    
 ?>
    <?php include "layout/menu.php"  ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include "layout/header.php" ?>
        <!-- End of Topbar -->
        <?php 
            $username = $TB = $fullname = $email = $phone = $address = $password_small = $password_new = $error = $img = "";
            if($_SERVER["REQUEST_METHOD"] == "POST"){
              $targer_dir = 'upload/';
              $targer_file = basename($_FILES['fileupload']['name']);
              $targer_files = $targer_dir.$targer_file;

              move_uploaded_file($_FILES['fileupload']['tmp_name'],$targer_files);

              $img = !empty($targer_file) ? $targer_files : $_GET['img'];
              $username = $_POST['username'];
              $fullname = $_POST['fullname'];
              $email = $_POST['email'];
              $phone = $_POST['phone'];
              $address = $_POST['address'];
              $password_small = md5($_POST['password_small']);
              $password_new = md5($_POST['password_new']);

              $sqlcheckPass = mysqli_query($conn,"SELECT * FROM `user` WHERE id = ".$_SESSION['id']);
              $checkpass = mysqli_fetch_assoc($sqlcheckPass);
              if ($password_small != $checkpass['password']) {
                $error = 'Mật khẩu không chính xác';
              }
              else {
                $updateUser = mysqli_query($conn,"UPDATE `user` SET `username` = '$username' , `fullname` = '$fullname', `email` = '$email', `phone` = '$phone', `address` = '$address', `password` = '$password_new', `avata_user` = '$img' WHERE `id` = ".$_SESSION['id']);
              }
            }
        ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Thông tin cá nhân</h6>
            </div>
            <div class="card-body">            
              <form action="" method="POST" enctype="multipart/form-data">
              <div class="table-responsive">
                <?php 
                  $result = mysqli_query($conn,"SELECT * FROM `user` WHERE id = ".$_SESSION['id']);
                  $row = mysqli_fetch_assoc($result);
                 ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <input type="text" name="username" value="<?=$row['username']?>" class="form-control"><br>
                  <input type="text" name="fullname" value="<?=$row['fullname']?>" class="form-control"><br>
                  <input type="text" name="email" value="<?=$row['email']?>" class="form-control"><br>
                  <input type="text" name="phone" value="<?=$row['phone']?>" class="form-control"><br>
                  <input type="text" name="address" value="<?=$row['address']?>" class="form-control"><br>
                  <p class="text-bold">Cập nhật ảnh đại diện</p>
                  <input type="file" name="fileupload"><br><br>
                  <a class="changePass text-primary">Thay đổi mật khẩu tại đây</a><br>
                  <div style="<?= empty($error) ? 'display:none' : '';?>" id="changePassword">
                    <input type="password" class="form-control" name="password_small" placeholder="Mật khẩu hiện tại">
                    <div class="text-danger"><?=$error?></div><br>            
                    <input type="password" class="form-control" name="password_new" placeholder="Mật khẩu mới">
                  </div>
                  
                </table>
                  <div class="text-center text-md-right">           
                      <input type="submit" value="Cập nhật" class="btn btn-dark">
                  </div>
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
  <script type="text/javascript">
    $(document).ready(function(){
        $(".changePass").click(function(){
          $("#changePassword").toggle();    
      });
    });
  </script>

</body>
</html>
