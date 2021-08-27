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

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Danh sách người dùng</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <div class="text-center text-md-right"><a href="themuser.php" class="text- font-weight-bold btn btn-primary">Thêm thành viên</a></div>
              <br>      
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Mã ID</th>
                      <th>Họ tên</th>
                      <th>Tên đăng nhập</th>
                      <th>Mật khẩu</th>
                      <th>Email</th>
                      <th>Số điện thoại</th>
                      <th>Địa chỉ</th>
                          <?php if (checkPrivilege('phanquyen.php?iduser=0')){   ?>
                      <th>Phân quyền</th>
                          <?php } ?>
                           <?php if (checkPrivilege('suauser.php?iduser=0')){   ?>
                      <th>Sửa</th>
                            <?php } ?>
                            <?php if (checkPrivilege('xoauser.php?iduser=0')){   ?>
                      <th>Xóa</th>
                            <?php } ?>
                    </tr>
                  </thead>
                  <tbody>
                   <?php
                        include "../config/connect.php"; 
                        $sql = "SELECT * FROM `user`";
                        $ketqua = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($ketqua) > 0){
                            while($row = mysqli_fetch_assoc($ketqua)){                        
                     ?>
                    <tr>
                      <th><?php echo $row['id']; ?></th>
                      <th><?php echo $row['fullname'] ?></th>
                      <th><?php echo $row['username'] ?></th>
                      <th><?php echo $row['password'] ?></th>
                      <th><?php echo $row['email'] ?></th>
                      <th><?php echo $row['phone'] ?></th>
                      <th><?php echo $row['address'] ?></th>
                        <?php if (checkPrivilege('phanquyen.php?iduser='.$row['id'].'')){  ?>
                  <th><a href="<?php echo 'phanquyen.php?iduser='.$row['id'].'' ?>">phân quyền</a></th>
                        <?php } ?>
                         <?php if (checkPrivilege('suauser.php?iduser='.$row['id'].'')){  ?>
                  <th><a href="<?php echo 'suauser.php?iduser='.$row['id'].'' ?>">Sửa</a></th>
                        <?php }  ?>
                           <?php if (checkPrivilege('xoauser.php?iduser='.$row['id'].'')){  ?>
                    <th><a href="<?php echo 'xoauser.php?iduser='.$row['id'].'' ?>">Xóa</a></th>
                          <?php }  ?>
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
