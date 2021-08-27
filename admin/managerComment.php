<?php 
  session_start();
  if(!empty($_POST['logout'])){
        unset($_SESSION['username']); 
      }
 ?>
<?php
    include "../config/connect.php"; 
    if (isset($_GET['idcomment'])) {
      $sql = mysqli_query($conn,"DELETE FROM `binhluan` WHERE id = ".$_GET['idcomment']);
    }elseif (isset($_GET['idreplies'])) {
      $sql = mysqli_query($conn,"DELETE FROM `replies` WHERE id = ".$_GET['idreplies']);
    }
  ?>
    <?php include "layout/menu.php"  ?>
    <!-- End of Sidebar -->
    <style type="text/css">
    </style>
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
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th class="text-center">Thông tin cá nhân</th>
                      <th>Comment</th>
                      <th>Spam</th>          
                    </tr>
                  </thead>
                  <tbody>
                      <?php 
                      include "../config/connect.php"; 
                        $sql = "SELECT binhluan.id,binhluan.noidung,user.fullname,user.email,user.address,user.avata_user FROM binhluan AS binhluan INNER JOIN user AS user ON binhluan.iduser = user.id";
                        $ketqua = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($ketqua) > 0){
                            while($row = mysqli_fetch_assoc($ketqua)){  ?>
                      <tr>
                      <th> 
                        <div class="col-sm-6 col-md-9">
                          <div class="card">
                            <div class="card-body">
                              <?php 
                                if ($row['avata_user']!=NULL) { ?>

                            <img src="<?=$row['avata_user']?>" class="float-left m-2 pt-0"
                            height="120px" weigth="120px">      
                              <?php  }else{  ?>

                            <img src="../images/username.png" class="float-left m-2 pt-0"
                            height="120px" width="120px">
                              <?php } ?>

                              <h5 class="card-title"><?=$row['fullname']?></h5>
                              <p class="card-text"><?=$row['email']?></p>
                              <p class="card-text"><?=$row['address']?></p>
                            </div>
                          </div>
                        </div>
                      </th>
                      <th>
                        <?=$row['noidung']?>             
                      </th>
                      <th>
                        <?php echo '<a href="?idcomment='.$row['id'].'"><i class="fas fa-user-times"></i></a>'?>         
                        </th>          
                    </tr>
                  <?php } }  ?>

                   <?php 
                      include "../config/connect.php"; 
                        $sql = "SELECT replies.id,replies.comment,user.fullname,user.email,user.address,user.avata_user FROM replies AS replies INNER JOIN user AS user ON replies.userID=user.id";
                        $ketqua = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($ketqua) > 0){
                            while($row = mysqli_fetch_assoc($ketqua)){  ?>
                      <tr>
                      <th> 
                        <div class="col-sm-6 col-md-9">
                          <div class="card">
                            <div class="card-body">
                              <?php 
                              if ($row['avata_user']!=NULL) { ?>

                                <img src="<?=$row['avata_user']?>" class="float-left m-2 pt-0"
                                height="120px" width="120px">      
                              <?php  }else{  ?>

                                <img src="../images/username.png" class="float-left m-2 pt-0">
                              <?php } ?>

                              <h5 class="card-title"><?=$row['fullname']?></h5>
                              <p class="card-text"><?=$row['email']?></p>
                              <p class="card-text"><?=$row['address']?></p>
                            </div>
                          </div>
                        </div>
                      </th>
                      <th><?=$row['comment']?></th>
                      <th><a href=""><?php echo '<a href="?idreplies='.$row['id'].'"><i class="fas fa-user-times"></i></a>'?></a></th>          
                    </tr>
                  <?php } }  ?>
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
