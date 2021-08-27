<?php 
  session_start();
  if(!empty($_POST['logout'])){
        unset($_SESSION['username']); 
      }
 ?>
 <?php 
      include "../config/connect.php";
      if($_SERVER["REQUEST_METHOD"] == "POST"){
        $tinhtrang = $_POST['tinhtrang'];

        $sql = "UPDATE `dat_hang_details` SET `tinhtrang`='$tinhtrang' WHERE id= ".$_GET['id'];
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
              <h6 class="m-0 font-weight-bold text-primary">Chỉnh sửa đơn hàng</h6>
            </div>
            <div class="card-body">
              <form action="" method="POST">
              <div class="table-responsive"> 
                <?php 
                $result = mysqli_query($conn,"SELECT dat_hang.name,dat_hang.phone,dat_hang.address,dat_hang_details.created_time FROM dat_hang_details INNER JOIN dat_hang ON dat_hang_details.id_dathang=dat_hang.id WHERE dat_hang_details.id =".$_GET['id']);
                while($row = mysqli_fetch_assoc($result)){ 
                 ?>
                 <div class="informationCustomer">
                  <h4>Thông tin khách hàng</h4>
                  <div class="ttkh">Họ tên khách hàng: 
                    <input type="text" value="<?=$row['name']?>" name="name" class="ml-1" disabled>
                  </div>
                  <div>Số điện thoại: 
                    <input type="text" value="0<?=$row['phone']?>" name="phone" class="mb-3 ml-5" disabled>
                  </div>
                  <div>Địa chỉ: 
                    <input type="text" value="<?=$row['address']?>" name="address" style="margin-left:92px" disabled>
                  </div>
                  <div>Ngày đặt hàng: <?=$row['created_time']?></div>
                </div>
              <?php } ?>
              <br><br>
              <table class="table table-bordered">
                <h4>Đơn hàng</h4>
                <tr>
                  <th>STT</th>
                  <th>Tên sản phẩm</th>
                  <th>Số lượng</th>
                  <th>Đơn giá</th>
                  <th>Thành tiền</th>
                </tr>
                <?php
                $num=1;
                $total=0; 
                $ketqua = mysqli_query($conn,"SELECT * FROM `dat_hang_details` INNER JOIN sanpham ON dat_hang_details.id_sanpham=sanpham.id WHERE dat_hang_details.id =".$_GET['id']);;
                while($rows = mysqli_fetch_assoc($ketqua)){
                 ?>
                 <tr>
                  <th><?=$num++?></th>
                  <th><?=$rows['tensanpham']?></th>
                  <th><?=$rows['soluong']?></th>
                  <th><?=$rows['gia']?></th>
                  <th><?=($rows['soluong']*$rows['gia'])?></th>
                </tr>
                <?php $total += $rows['soluong']*$rows['gia'];}?>
                <tr>
                  <td colspan="4" class="tong" style="text-align: center;color: red">Tổng cộng</td>
                  <td class="cotSo" id="total" style="font-style:bold;color:red"><?=$total?></td>
                </tr>
              </table>
              </div>

              <div class="form-group col-md-3">
                <select class="form-control" name="tinhtrang">
                  <?php         
                  $ketqua1 = mysqli_query($conn,"SELECT * FROM `dat_hang_details` WHERE id=".$_GET['id']);
                  $row1 = mysqli_fetch_assoc($ketqua1);
                  $result = mysqli_query($conn,"SELECT * FROM `tinhtrang_donhang`");
                        while ($row2 = mysqli_fetch_assoc($result)) {
                            $select = "";
                            if($row2['id']==$row1['tinhtrang']) {
                                $select = 'selected';   
                              }                                                         
              echo '<option value="'.$row2['id'].'" '.$select.'>'.$row2['tinhtrang'].'</option>';
                            }                                                       
                  ?>         
                </select>
              </div>    
              <button type="submit" class="btn btn-primary" style="float: right">Cập nhập</button>

            </form>
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
