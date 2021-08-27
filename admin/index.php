<?php 
  session_start();
  if(!empty($_POST['logout'])){
        unset($_SESSION['username']); 
      }
 ?>
    <?php include "layout/menu.php";  ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include "layout/header.php"; ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Thống kê</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>
          <form action="" method="POST">
          <div class="row">
            <div class="col-md-3">
              <label>Từ ngày</label>
              <input type="date" id="datepicker" name="datepicker" class="form-control">
            </div>
            <div class="col-md-3">
             <label>Đến ngày</label>
              <input type="date" id="datepicker1" name="datepicker1" class="form-control">
            </div>
            <div class="col-md-1" style="margin-top:32px">
              <button type="submit" class="btn btn-info" name="button_search_datetime">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
          </form>
          <br>

          <div class="row">

            <!-- Area Chart -->
             <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Biểu đồ doanh thu theo tháng</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in allTables"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Các loại biểu đồ:</div>
                                            <a class="dropdown-item" href="?action=Area">
                                              Biểu đồ miền
                                            </a>
                                            <a class="dropdown-item" href="?action=Bar">
                                              Biểu đồ cột
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="?action=Line">
                                              Biểu đồ đường
                                            </a>
                                        </div>
                                    </div>
                                </div>  

                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <div id="myfirstchart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <?php
                          if (isset($_POST['button_search_datetime'])) {
                            $sqlMap = mysqli_query($conn,"SELECT * FROM `thongke` WHERE `dateCurrent` BETWEEN '".$_POST['datepicker']."' AND '".$_POST['datepicker1']."'");
                            $bieudo = '';
                            while ($row = mysqli_fetch_array($sqlMap)) {
                                $bieudo .= "{ year:'".$row['dateCurrent']."',doanhthu:".$row['doanhthu'].",soluong:".$row['soluong'].",tongdon:".$row['tongdonhang']."}, " ;
                            }
                            $bieudo = substr($bieudo,0,-2);
                          }else {
                             $sqlMap = mysqli_query($conn,"SELECT * FROM `thongke`");
                            $bieudo = '';
                            while ($row = mysqli_fetch_array($sqlMap)) {
                                $bieudo .= "{ year:'".$row['dateCurrent']."',doanhthu:".$row['doanhthu'].",soluong:".$row['soluong'].",tongdon:".$row['tongdonhang']."}, " ;
                            }
                            $bieudo = substr($bieudo,0,-2);
                          }
                          $Maps = isset($_GET['action']) ? $_GET['action'] : 'Line';
                         ?>

                        <script type="text/javascript">
                           $(document).ready(function(){
                            Morris.<?php echo $Maps ?>({

                              element: 'myfirstchart',

                              lineColors:['#819C79','#FF6541','#FF6541','#A4ADD3','#766B56'],

                              pointFillColors: ['#ffffff'],
                              pointStrokeColors: ['black'],
                              fillOpacity:0.3,
                              hideHover: 'auto',
                              parseTime: false,


                              data: [<?php echo $bieudo;?>],                      

                              xkey: 'year',

                              ykeys: ['doanhthu','soluong','tongdon'],

                              labels: ['Doanh thu','Số lượng','Tổng đơn hàng'],
                              hideHover:'auto'

                        });
                                  
                                  })
                    
                           
                        </script>

   

          </div>

          <!-- Content Row -->
          <div class="row">
            <?php
                        include "../config/connect.php"; 
                        $sql = "SELECT * FROM `dat_hang`";
                        $ketqua = mysqli_query($conn,$sql);
                        $total = 0;
                        if(mysqli_num_rows($ketqua) > 0){
                            while($row = mysqli_fetch_assoc($ketqua)){ 
                                $total += $row['total'];
                              }
                                               
                     ?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tổng Doanh thu</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?=number_format($total); }?>đ         
                        </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
             <?php
                        include "../config/connect.php"; 
                        $sql = "SELECT count(id) FROM `dat_hang`";
                        $ketqua = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($ketqua) > 0){
                            $row = mysqli_fetch_assoc($ketqua);                                                
                     ?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Tổng số đơn hàng</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$row['count(id)']; }?> đơn hàng</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <?php
                        include "../config/connect.php"; 
                        $sql = "SELECT COUNT(id),SUM(SLsanpham) FROM `sanpham`";
                        $ketqua = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($ketqua) > 0){
                          $row = mysqli_fetch_assoc($ketqua);
                            $persent = $row['SUM(SLsanpham)']/($row['COUNT(id)']*60);
                            $persents = round($persent,2, PHP_ROUND_HALF_UP)*100;                                          
                     ?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tổng SP trong kho</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                            <?=$persents;?>%                             
                            </div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: <?=$persents;?>%" aria-valuenow="<?=$persents; }?>" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <?php
                        include "../config/connect.php"; 
                        $ketqua = mysqli_query($conn,"SELECT count(id) FROM `binhluan`");
                            $row1 = mysqli_fetch_assoc($ketqua);
                        $ketqua = mysqli_query($conn,"SELECT count(id) FROM `replies`"); 
                            $row2 = mysqli_fetch_assoc($ketqua);
                            $row = $row1['count(id)']+$row2['count(id)'];                                              
                     ?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Tổng số bình luận</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?=$row?> bình luận         
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Dự án</h6>
                </div>
                <div class="card-body">
                  <h4 class="small font-weight-bold">Máy chủ<span class="float-right">20%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Theo dõi bán hàng<span class="float-right">40%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Cơ sở dữ liệu khách hàng<span class="float-right">60%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Chi tiết thanh toán<span class="float-right">80%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Đăng nhập thành công<span class="float-right">Complete!</span></h4>
                  <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>

              <!-- Color System -->
              <div class="row">
                <div class="col-lg-6 mb-4">
                  <div class="card bg-primary text-white shadow">
                    <div class="card-body">
                      Danh mục 
                      <div class="text-white-50 small">4 danh mục</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-success text-white shadow">
                    <div class="card-body">
                      Phân loại
                      <div class="text-white-50 small">4 loại sản phẩm</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-info text-white shadow">
                    <div class="card-body">
                      Sản phẩm
                      <div class="text-white-50 small">36 sản phẩm</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-warning text-white shadow">
                    <div class="card-body">
                    Khách hàng
                      <div class="text-white-50 small">3 khách hàng</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-danger text-white shadow">
                    <div class="card-body">
                      Mã Giảm giá
                      <div class="text-white-50 small">8 mã giảm giá</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-secondary text-white shadow">
                    <div class="card-body">
                      Hình thức vận chuyển
                      <div class="text-white-50 small">3 hình thức vận chuyển</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-light text-black shadow">
                    <div class="card-body">
                      Bình luận
                      <div class="text-black-50 small">41 bình luận</div>
                    </div>
                  </div>
              </div>
              <div class="col-lg-6 mb-4">
                <div class="card bg-dark text-white shadow">
                  <div class="card-body">
                      Hộp thư ý kiến
                      <div class="text-white-50 small">3 hộp thư</div>
                  </div>
                </div>
              </div>
            </div>

            </div>

            <div class="col-lg-6 mb-4">

              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Thông tin nhân viên </h6>
                </div>
                <div class="cart-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Họ tên</th>
                        <th scope="col">Email</th>
                        <th scope="col">Địa chỉ</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        include "../config/connect.php"; 
                        $sql = "SELECT * FROM `user` WHERE `id` IN (6,8,9,10,11)";
                        $ketqua = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($ketqua) > 0){
                            $num = 1;
                            while($row = mysqli_fetch_assoc($ketqua)){                        
                     ?>
                      <tr>
                        <th scope="row"><?=$num++?></th>
                        <td><?=$row['fullname']?></td>
                        <td><?=$row['email']?></td>
                        <td><?=$row['address']?></td>
                      </tr>
                       <?php } } ?> 
                    </tbody>
                  </table>
                </div>
              </div>

              <!-- Approach -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Khách hàng ưa chuộng</h6>
                </div>
                <div class="cart-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Họ tên</th>
                        <th scope="col">Chi tiêu</th>
                        <th scope="col">Địa chỉ</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        include "../config/connect.php"; 
                        $sql = "SELECT DISTINCT name,total,address FROM `dat_hang` ORDER BY total DESC LIMIT 5";
                        $ketqua = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($ketqua) > 0){
                            $num = 1;
                            while($row = mysqli_fetch_assoc($ketqua)){                        
                     ?>
                      <tr>
                        <th scope="row"><?=$num++?></th>
                        <td><?=$row['name']?></td>
                        <td><?=number_format($row['total'])?></td>
                        <td><?=$row['address']?></td>
                      </tr>
                       <?php } } ?> 
                    </tbody>
                  </table>
                </div>
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
</body>
</html>
