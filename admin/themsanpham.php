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

            $targer_dir = "upload/";
            $targer_file = $targer_dir.basename($_FILES['fileupload']['name']);
           
            move_uploaded_file($_FILES['fileupload']['tmp_name'],$targer_file);
            $flag = true;
            $tensanpham = $_POST['tensanpham'];
            $img = $targer_file;
            $gia = $_POST['gia'];
            $mota = $_POST['editor1'];
            $color = $_POST['color'];
            $size = $_POST['size'];
            $xuatxu = $_POST['xuatxu'];
            $sale = $_POST['sale'];
            $SLsanpham = $_POST['SLsanpham'];
            $iddanhmuc = $_POST['iddanhmuc'];
            $idsphot = $_POST['idsphot'];
               $sql = "INSERT INTO `sanpham`(`tensanpham`, `img`, `gia`, `chitiet`, `color`, `size`, `xuatxu`, `sale`, `SLsanpham`,`iddanhmuc`, `idsphot`) VALUES
               ('$tensanpham','$img',$gia,'$mota','$color','$size','$xuatxu','$sale','$SLsanpham','$iddanhmuc','$idsphot')";
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
              <h6 class="m-0 font-weight-bold text-primary">Danh sách sản phẩm</h6>
            </div>
            <div class="card-body">
              <form action="themsanpham.php" method="post" enctype="multipart/form-data">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <input type="text" name="tensanpham" placeholder="Tên sản phẩm" class="form-control"><br>
                  <input type="file" name="fileupload"><br><br>
                  <input type="number" name="gia" placeholder="Giá"><br><br>
                  <textarea name="editor1"></textarea>
                  <script>
                        CKEDITOR.replace( 'editor1' );
                  </script>
                  <br><br>

                  <select  name="color" class="form-control">
                    <option value="">Color</option>
                    <option value="red">Red</option>
                    <option value="white">White</option>
                    <option value="Black">Black</option>
                    <option value="Pink">Pink</option>
                    <option value="Blue">Blue</option>
                    <option value="Purple">Purple</option>
                    <option value="Orange">Orange</option>
                    <option value="Brown">Brown</option>
                  </select><br><br>

                  <select name="size" class="form-control">
                    <option value="">size</option>
                    <option value="37">37</option>
                    <option value="38">38</option>
                    <option value="39">39</option>
                    <option value="40">40</option>
                    <option value="41">41</option>
                    <option value="42">42</option>
                    <option value="43">43</option>
                  </select><br><br>

                  <select name="xuatxu" class="form-control">
                    <option value="">Xuất xứ</option>
                    <option value="USA">USA</option>
                    <option value="GERMANY">GERMANY</option>
                    <option value="FRANCE">FRANCE</option>
                    <option value="VIETNAM">VIETNAM</option>
                  </select><br><br>

                  <select name="sale" class="form-control">
                    <option value="">Sale</option>
                    <option value="10%">10%</option>
                    <option value="25%">25%</option>
                    <option value="30%">30%</option>
                    <option value="50%">50%</option>
                  </select><br><br>

                  <select name="SLsanpham" class="col-md-3">
                    <option value="">Số lượng</option>
                    <?php for ($i = 10; $i <=50 ; $i++) { ?>
                      <option value="<?=$i?>"><?=$i?></option>
                   <?php }  ?>
                    
                  </select><br><br>

                  <select name="iddanhmuc" class="form-control">
                    <?php 
                        $sql = "SELECT * FROM `danhmuc`";
                        $ketqqua = mysqli_query($conn,$sql);
  
                        while ($row = mysqli_fetch_assoc($ketqqua)) {
                             $select = "";  
                          if ($row['id']==$_GET['iddanhmuc']) {
                             $select = 'selected';
                          }
                          echo '<option value="'.$row['id'].'" '.$select.'>'.$row['hangsx'].'</option>';
                            
                        }
                     ?>

                  </select>
                  <br><br>
                   <select name="idsphot" class="form-control">
                     <?php 
                        $sql = "SELECT * FROM `sanphamhot`";
                        $ketqua = mysqli_query($conn,$sql);
                        while ($row2 = mysqli_fetch_assoc($ketqua)){
                           $select = "";
                            if ($row2['id']==$row['idsphot']) {
                                 $select = "selected";
                            }  
                  echo '<option value="'.$row2['id'].'" '.$select.'>'.$row2['loaigiay'].'</option>';                                                        
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
