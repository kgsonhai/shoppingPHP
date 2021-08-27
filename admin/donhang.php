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
              <h6 class="m-0 font-weight-bold text-primary">Danh sách đơn hàng</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive"> 
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Tên người nhận</th>
                      <th>Tên sản phẩm</th>               
                      <th>Diện thoại</th>
                      <th>Địa chỉ</th>
                      <th>Giá sản phẩm</th>
                      <th>Ngày tạo</th>
                      <th width="165px">Tình trạng đơn hàng</th>
                        <?php if (checkPrivilege('indon.php')){   ?>                   
                      <th colspan="3">Action</th>
                        <?php } ?>
                     
                    </tr>
                  </thead> 
                  <tbody>
                   <?php 
                        include "../config/connect.php"; 
                        $sql = "SELECT dat_hang_details.id,dat_hang.name,sanpham.tensanpham,dat_hang.phone,dat_hang.address,sanpham.gia,dat_hang_details.created_time,dat_hang_details.tinhtrang FROM dat_hang_details INNER JOIN dat_hang ON dat_hang_details.id_dathang=dat_hang.id INNER JOIN sanpham ON dat_hang_details.id_sanpham=sanpham.id" ;
                        $ketqua = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($ketqua) > 0){
                            while($row = mysqli_fetch_assoc($ketqua)){                        
                     ?>
                    <tr>
                      <th><?php echo $row['id'];?></th>
                      <th><?php echo $row['name']; ?></th>
                      <th><?php echo $row['tensanpham']; ?></th>
                      <th><?php echo $row['phone']; ?></th>
                      <th><?php echo $row['address']; ?></th>
                      <th><?php echo number_format($row['gia']); ?>đ</th>
                      <th><?php echo $row['created_time']; ?></th>
                      <th style="text-align: center;"><?php
                        $status = '';
                        if ($row['tinhtrang']==0) {
                          $status = 'Chưa xử lý';
                        }elseif ($row['tinhtrang']==1) {
                          $status = '<p class="btn btn-warning">Đã xử lý</p>';
                        }elseif ($row['tinhtrang']==2) {
                          $status = '<p class="btn btn-success">Đang giao hàng</p>';
                        }elseif ($row['tinhtrang']==3) {
                          $status = '<p class="btn btn-primary">Đã giao hàng</p>';
                        }elseif ($row['tinhtrang']==4) {
                          $status = '<p class="btn btn-danger">Hủy đơn</p>';
                        }
                        echo $status;
                         ?>
                       </th>
                       <?php if (checkPrivilege('indon.php')){   ?>
                        <th>
                          <?php echo '<a href="suadonhang.php?id='.$row['id'].'">sửa</a>'?>
                        </th>
                        <th>
                          <?php echo '<a href="indon.php?id='.$row['id'].'">in</a>'?>
                        </th>
                        <th>
                          <?php echo '<a href="guidonhang.php?id='.$row['id'].'">gửi</a>'?>
                        </th>         
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
