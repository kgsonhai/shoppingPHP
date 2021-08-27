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
              <h6 class="m-0 font-weight-bold text-primary">Danh sách đóng góp ý kiến khách hàng</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Họ tên</th>
                      <th>Số điện thoại</th>
                      <th>Email</th>
                      <th>Message</th>
                  <?php if (checkPrivilege('xoasanpham.php?idsp=0')){   ?>                
                      <th colspan="2">Xóa</th>
                    <?php }  ?>
                    </tr>
                  </thead> 
                  <tbody>
                   <?php 
                        include "../config/connect.php"; 
                        $sql = "SELECT * FROM `contact_reply`" ;
                        $ketqua = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($ketqua) > 0){
                            while($row = mysqli_fetch_assoc($ketqua)){                        
                     ?>
                    <tr>
                      <th><?php echo $row['name'];?></th>
                      <th><?php echo $row['phone']; ?></th>
                      <th><?php echo $row['email']; ?></th>
                      <th><?php echo $row['message']; ?></th>
                       <?php if (checkPrivilege('xoasanpham.php?idsp='.$row['id'].'')){   ?>  
                        <?php if($row['status']==0){ ?>
                          <th colspan="2">
                          <a class="btn btn-info" data-commentID="<?=$row['id']?>" href="javascript:void(0)" onclick="reply(this)">
                            Gửi phản hồi
                          </a>
                          <div class="Replyrow" style="margin-top:10px;display: none">
                            <textarea id="replyComment" class="form-control" placeholder="Add reply comment" cols="30" rows="2"></textarea><br>
                            <button class="btn btn-secondary text-center" onclick="$('.Replyrow').hide();">Close</button>
                            <button class="btn btn-primary text-center" onclick="isReply=true;" id="addReply">Send</button>
                          </div>

                          </th>
                        <?php }else{ ?>
                          <th>
                            <button class="btn btn-danger" disabled="">Đã gửi phản hồi</button>
                          </th>
                          <th>
                           <a href="editRecommendUser.php?id=<?=$row['id']?>" class="btn btn-warning">Xem</a> 
                          </th>                                                    
                      <?php }  ?>
                        <?php } ?>
                    </tr>
                   <?php } } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <script type="text/javascript">
            var IDUser = ""; 
            function reply(caller)
            { 
              $(".Replyrow").insertAfter($(caller));
              $('.Replyrow').show();
              IDUser = $(caller).attr('data-commentID');
            }
              $(document).ready(function() {
              $('#addReply').click(function(){ 
                  var txt;
                  txt = $("#replyComment").val();
                $.post("file/guiContact.php",{
                  noidung: txt,
                  IDUser:IDUser                              
                }, function(result){
                      alert(result);
                      window.location.reload(); 
                  });               
                });             
              });
          </script>
          

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
