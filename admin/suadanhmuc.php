<?php 
  session_start();
  if(!empty($_POST['logout'])){
        unset($_SESSION['username']); 
      }
 ?>
  <?php   
          include "../config/connect.php";
          $tensanpham = "";
          if($_SERVER["REQUEST_METHOD"] == "POST"){
            $tensanpham = $_POST['tensanpham'];
            if (isset($_GET['action'])) {
               $sql = "UPDATE `sanphamhot` SET `loaigiay`='$tensanpham' WHERE id =".$_GET['iddanhmuc'];
            }
            else {
               $sql = "UPDATE `danhmuc` SET `hangsx`='$tensanpham' WHERE id =".$_GET['iddanhmuc'];
            }
               $ketqqua = mysqli_query($conn,$sql);
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
              <h6 class="m-0 font-weight-bold text-primary">Sửa danh mục</h6>
            </div>
            <div class="card-body">
              <form action="" method="POST">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <?php 
                    if (isset($_GET['action'])) {
                      $ketqua = mysqli_query($conn,"SELECT * FROM `sanphamhot` WHERE id = ".$_GET['iddanhmuc']); 
                    }else {
                      $ketqua = mysqli_query($conn,"SELECT * FROM `danhmuc` WHERE id = ".$_GET['iddanhmuc']); 
                    }                  
                        $tendm = mysqli_fetch_assoc($ketqua);
                    ?>
                  <input type="text" name="tensanpham" value="<?php echo isset($_GET['action']) ? $tendm['loaigiay'] : $tendm['hangsx'] ?>" class="form-control"><br>
                </table>
                  <div class="text-center text-md-right">
                      <input type="submit" value="Sửa" class="btn btn-dark">
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

</body>
</html>
