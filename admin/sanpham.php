<?php 
  session_start();
  if(!empty($_POST['logout'])){
        unset($_SESSION['username']); 
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
              <div class="table-responsive">
                <?php if (checkPrivilege('themsanpham.php')){  ?>
                  <div class="text-center text-md-right"><a href="<?php echo 'themsanpham.php?iddanhmuc='.$_GET['iddanhmuc'];  ?>" class="text- font-weight-bold btn btn-primary">Thêm sản phẩm</a></div>
                <?php } ?>  
                  <br>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Hình ảnh</th>
                      <th>Tên sản phẩm</th>
                      <th>Giá</th>
                      <th>Mô tả chi tiết</th>
                      <th>Màu sắc</th>
                      <th>Size</th>
                      <th>Xuất xứ</th>
                      <th>Sale</th>
                      <th>Hãng sản xuất</th>
                 <?php if (checkPrivilege('suasanpham.php?idsp=0')){   ?>
                      <th>Sửa</th>
                      <?php } ?>  
                  <?php if (checkPrivilege('xoasanpham.php?idsp=0')){   ?>                        
                      <th>Xóa</th>
                    <?php }  ?>
                    </tr>
                  </thead> 
                  <tbody>
                   <?php 
                        include "../config/connect.php"; 
                        $sql = "SELECT * FROM `sanpham` WHERE iddanhmuc=".$_GET['iddanhmuc'] ;
                        $ketqua = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($ketqua) > 0){
                            while($row = mysqli_fetch_assoc($ketqua)){                        
                     ?>
                    <tr>
                      <th><img src="<?php echo $row['img'];?>" height="80px" width="100px"></th>
                      <th><?php echo $row['tensanpham'];?></th>
                      <th><?php echo number_format($row['gia']); ?>đ</th>
                      <th><?php echo $row['chitiet']; ?></th>
                      <th><?php echo $row['color']; ?></th>
                      <th><?php echo $row['size']; ?></th>
                      <th><?php echo $row['xuatxu']; ?></th>
                      <th><?php echo $row['sale']; ?></th>
                      <th>
                        <?php 
                          $sql1 = "SELECT * FROM `danhmuc` WHERE id =".$_GET['iddanhmuc'];
                          $ketqua1 = mysqli_query($conn,$sql1);
                          $row1 = mysqli_fetch_assoc($ketqua1);
                          if ($row['iddanhmuc']==$row1['id']){
                            echo $row1['hangsx'];
                          }
                       ?></th>
                       <?php if (checkPrivilege('suasanpham.php?idsp='.$row['id'].'')){   ?>
                      <th><?php echo '<a href="suasanpham.php?idsp='.$row['id'].'">Sửa</a>'?></th>
                         <?php } ?>

                       <?php if (checkPrivilege('xoasanpham.php?idsp='.$row['id'].'')){   ?>  
                      <th><?php echo '<a href="xoasanpham.php?id='.$row['id'].'">Xóa</a>'?></th>
                        <?php } ?>
                    </tr>
                   <?php } } ?>
                  </tbody>
                </table>
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
