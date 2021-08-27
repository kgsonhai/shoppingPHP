<?php 
  session_start();
  if(!empty($_POST['logout'])){
        unset($_SESSION['username']); 
      }
 ?>
  <?php   
          include "../config/connect.php";
        $NameMaCoupon = $nameCoupon = $soluong = $priceCoupon = $img = "";
          if($_SERVER["REQUEST_METHOD"] == "POST"){

            $targer_dir = 'upload/';
            $targer_file = basename($_FILES['fileupload']['name']);
            $targer_files = $targer_dir.$targer_file;

            move_uploaded_file($_FILES['fileupload']['tmp_name'],$targer_files);

            $img = !empty($targer_file) ? $targer_files : $_GET['img'];
            $NameMaCoupon = $_POST['NameMaCoupon'];
            $nameCoupon = $_POST['nameCoupon'];
            $soluong = $_POST['soluong'];
            $priceCoupon = $_POST['priceCoupon'];

             $sql = "UPDATE `coupon` SET `NameMaCoupon`='$NameMaCoupon',`nameCoupon`='$nameCoupon',`soluong`='$soluong',`priceCoupon`='$priceCoupon',`imageCoupon`='$img' WHERE id=".$_GET['id'];
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

          <?php
             $sql = "SELECT * FROM `coupon` WHERE id =".$_GET['id'];
             $ketqua = mysqli_query($conn,$sql);
             $row = mysqli_fetch_assoc($ketqua);
           ?>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Chỉnh sửa mã giảm giá</h6>
            </div>
            <div class="card-body">
              <form action="" method="post" enctype="multipart/form-data">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                <input type="text" name="NameMaCoupon" value="<?php echo $row['NameMaCoupon'] ?>" class="form-control" >
                <br>
                <input type="text" name="nameCoupon" value="<?php echo $row['nameCoupon'] ?>" class="form-control" >
                <br>
                <input type="text" name="priceCoupon" value="<?php echo number_format($row['priceCoupon']) ?>đ" class="form-control" ><br>
                <input type="text" name="soluong" value="<?php echo $row['soluong'] ?>" class="form-control" >
                <br>
                <div class="btn btn-link">Thay đổi Image</div>
                <input type="file" name="fileupload"><br><br>
                  <div class="text-center text-md-right">
                      <input type="submit" value="Update" class="btn btn-dark">
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
