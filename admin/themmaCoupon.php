  <?php 
  session_start();
  if(!empty($_POST['logout'])){
        unset($_SESSION['username']); 
      }
 ?>
  <?php   
          include "../config/connect.php";
          $tensanpham = $gia = $img = $mota = $iddanhmuc = $idsphot = $color = $size = $xuatxu = $sale = "";
          if($_SERVER["REQUEST_METHOD"] == "POST"){
            $targer_dir = 'upload/';
            $targer_file = basename($_FILES['fileupload']['name']);
            $targer_files = $targer_dir.$targer_file;

            move_uploaded_file($_FILES['fileupload']['tmp_name'],$targer_files);
            $img = !empty($targer_file) ? $targer_files : $_GET['img'];
            $tensanpham = $_POST['tensanpham'];
            $tenmaCODE = $_POST['tenmaCODE'];
            $gia = $_POST['gia'];
            $SLsanpham = $_POST['SLsanpham'];
            $idsphot = $_POST['idsphot'];
               $sql = "INSERT INTO `coupon` (`id`, `NameMaCoupon`, `nameCoupon`, `priceCoupon`, `soluong`, `imageCoupon`, `idsp`) VALUES (NULL, '$tensanpham', '$tenmaCODE', '$gia', '$SLsanpham', '$img', '$idsphot')";
               $ketqua = mysqli_query($conn,$sql);
           
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
              <h6 class="m-0 font-weight-bold text-primary">THÊM MÃ COUPON</h6>
            </div>
            <div class="card-body">
              <form action="" method="post" enctype="multipart/form-data">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <input type="text" name="tensanpham" placeholder="Tên mã sản phẩm" class="form-control col-md-6"><br>
                  <input type="text" name="tenmaCODE" placeholder="Tên mã CODE" class="form-control col-md-6"><br>
                  <input type="file" name="fileupload"><br><br>
                  <input type="number" name="gia" class="form-control col-md-6" placeholder="Giá"><br><br>

                  <select name="SLsanpham" class="col-md-6 form-control">
                    <option value="">Số lượng</option>
                    <?php for ($i = 1; $i <=10 ; $i++) { ?>
                      <option value="<?=$i?>"><?=$i?></option>
                   <?php }  ?>
                    
                  </select>
                  <br><br>

                   <select name="idsphot" class="form-control col-md-6">
                     <?php 
                        $sql = "SELECT * FROM `sanpham`";
                        $ketqua = mysqli_query($conn,$sql);
                        while ($row = mysqli_fetch_assoc($ketqua)){
                  echo '<option value="'.$row['id'].'">'.$row['tensanpham'].'</option>';                                                        
                        }
                     ?>
                  </select>                 
                  <br>
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
