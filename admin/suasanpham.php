<?php
  session_start();
  if(!empty($_POST['logout'])){
        unset($_SESSION['username']); 
      }
  include "../config/connect.php";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $targer_dir = 'upload/';
            $targer_file = basename($_FILES['fileupload']['name']);
            $targer_files = $targer_dir.$targer_file;

            move_uploaded_file($_FILES['fileupload']['tmp_name'],$targer_files);
         
          $tensanpham = $_POST['tensanpham'];
          $img = !empty($targer_file) ? $targer_files : $_GET['img'];
          $gia = $_POST['gia'];
          $chitiet = $_POST['editor1'];
          $color = $_POST['color']; 
          $size = $_POST['size'];
          $xuatxu = $_POST['xuatxu'];
          $sale = $_POST['sale'];
          $iddanhmuc = $_POST['iddanhmuc'];
          $idspsua = $_POST['idspsua'];
          $sql = "UPDATE `sanpham` SET `tensanpham`='$tensanpham',`img`='$img',`gia`=$gia,`chitiet`='$chitiet',`color`='$color',`size`='$size',`xuatxu`='$xuatxu',`sale`='$sale',`iddanhmuc`=$iddanhmuc,`idsphot`=$idspsua WHERE id= ".$_GET['idsp'];
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

          <?php
              if (isset($_GET['idsp'])) {            
               $sql = "SELECT * FROM `sanpham` WHERE id =".$_GET['idsp'];
               $ketqua = mysqli_query($conn,$sql);
               while ($row = mysqli_fetch_assoc($ketqua)) {
            ?>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Sửa sản phẩm</h6>
            </div>
            <div class="card-body">
              <form action="<?php echo 'suasanpham.php?img='.$row['img'].'&idsp='.$_GET['idsp'];  ?>" method="POST" enctype="multipart/form-data">  
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                  <input type="text" name="tensanpham" value="<?php echo $row['tensanpham'] ?>" class="form-control"><br>
                  <input type="number" name="gia" value="<?php echo $row['gia'] ?>" class="form-control"><br>
                  <img src="<?php echo $row['img']?>" height="250px"><br><br>
                  <input type="file" name="fileupload"><br><br>
                  <textarea name="editor1"><?php echo $row['chitiet'] ?></textarea>
                  <script>
                        CKEDITOR.replace('editor1');
                  </script>
                  <br>

                   <select  name="color" class="form-control">
                    <option value="<?php echo $row['color'];?>"><?php echo $row['color'];  ?></option>
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
                    <option value="<?php echo $row['size'];  ?>"><?php echo $row['size'];  ?></option>
                    <option value="37">37</option>
                    <option value="38">38</option>
                    <option value="39">39</option>
                    <option value="40">40</option>
                    <option value="41">41</option>
                    <option value="42">42</option>
                    <option value="43">43</option>
                  </select><br><br>

                  <select name="xuatxu" class="form-control">
                    <option value="<?php echo $row['xuatxu'];  ?>"><?php echo $row['xuatxu'];  ?></option>
                    <option value="USA">USA</option>
                    <option value="GERMANY">GERMANY</option>
                    <option value="FRANCE">FRANCE</option>
                    <option value="VIETNAM">VIETNAM</option>
                  </select><br><br>

                  <select name="sale" class="form-control">
                    <option value="<?php echo $row['sale'];  ?>"><?php echo $row['sale'];  ?></option>
                    <option value="10%">10%</option>
                    <option value="25%">25%</option>
                    <option value="30%">30%</option>
                    <option value="50%">50%</option>
                  </select><br><br>

                  <select name="iddanhmuc" class="form-control">
                    <?php 
                        $sql = "SELECT * FROM `danhmuc`";
                        $ketqua = mysqli_query($conn,$sql);
                        while ($row1 = mysqli_fetch_assoc($ketqua)){
                           $select = "";
                            if ($row1['id']==$row['iddanhmuc']) {
                                 $select = "selected";
                            }  
                  echo '<option value="'.$row1['id'].'" '.$select.'>'.$row1['hangsx'].'</option>';                                                        
                        }
                     ?>

                  </select>                 
                  <br><br>
                  <select name="idspsua" class="form-control">
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
                      }
                    }
                     ?>
                  </select>
                </table>
                  <div class="text-center text-md-right">
                      <input type="submit" value="UPDATE" class="btn btn-dark">
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
