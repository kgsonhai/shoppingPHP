<?php 
  session_start();
  if(!empty($_POST['logout'])){
        unset($_SESSION['username']); 
      }
 ?>
  <?php   
          include "../config/connect.php";
    $fullname = $username = $password = $email = $phone = $address = $error = "";
          if($_SERVER["REQUEST_METHOD"] == "POST"){
            $fullname = $_POST['fullname'];
            $username = $_POST['username']; 
            $password = md5($_POST['password']);
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
               include "../config/connect.php"; 
            $sql = "SELECT * FROM `user` WHERE `username` ='$username'";
            $checkUser = mysqli_query($conn,$sql);
             if (mysqli_num_rows($checkUser)>0){
                   $error = "<h4>Username đã tồn tại</h4>"; 
            }
              else {
                 $sql = "INSERT INTO `user`(`fullname`, `username`, `password`, `email`, `phone`, `address`) VALUES
               ('$fullname','$username','$password','$email','$phone','$address')";
                $ketqqua = mysqli_query($conn,$sql);
            
              }   
           
          }
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

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Thêm thành viên</h6>
            </div>
            <div class="card-body">
              <form action="themuser.php" method="post">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <input type="text" name="fullname" placeholder="Fullname" class="form-control"><br>
                  <input type="text" name="username" placeholder="Username" class="form-control">
                  <?php echo $error; ?> <br>
                  <input type="password" name="password" placeholder="Password" class="form-control"><br>
                  <input type="email" name="email" placeholder="Email" class="form-control"><br>
                  <input type="number" name="phone" placeholder="Phone" class="form-control"><br>
                  <input type="text" name="address" placeholder="Address" class="form-control"><br><br>
                    <div class="text-center text-md-right">
                      <input type="submit" value="Insert" class="btn btn-dark">
                  </div>
                </table>
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
