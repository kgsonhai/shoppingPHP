<?php 
  session_start();
  include "config/connect.php";

    if (!isset($_SESSION['cart'])) {
      $_SESSION['cart'] = array();
    }  

    $err = '';

    if(isset($_SESSION['id'])){
        $id_user = $_SESSION['id'];
        $checkSPinDB = mysqli_query($conn,"SELECT * FROM `giohang` WHERE id_user = $id_user");
        while($spDB = mysqli_fetch_assoc($checkSPinDB)){
          $maSP = $spDB['id_sanpham'];
          $SLSP = $spDB['soluong'];
            $_SESSION['cart'][$maSP] = $SLSP;
            $newdate = date('Y-m-d',strtotime('-2 month',strtotime(date('Y-m-j'))));
            if(strtotime($spDB['expire_time']) < strtotime($newdate)){
                  $deleteHetHan = mysqli_query($conn,"DELETE FROM `giohang` WHERE id_user = $id_user AND id_sanpham = $maSP");
                  unset($_SESSION['cart'][$maSP]);
              }
          foreach($_SESSION['cart'] as $key => $value){
              if($key == $spDB['id_sanpham']){
                $idsp = $spDB['id_sanpham'];
                $deleteEmpty = mysqli_query($conn,"DELETE FROM `giohang` WHERE id_sanpham = $idsp AND id_user = $id_user");
              }
        }
      }
      foreach($_SESSION['cart'] as $key => $value){
       $addGiohang = mysqli_query($conn,"INSERT INTO `giohang` (`id`, `id_sanpham`, `soluong`, `id_user`, `expire_time`) VALUES (NULL,$key,$value,$id_user, '".date("Y-m-d")."')");
      }
              
  }
  if (isset($_GET['action'])) {
      function update_product($them = false)
      {
        foreach ($_POST["soluong"] as $id => $soluong){
          if ($soluong == 0) {
            unset($_SESSION['cart'][$id]);
          }else {
              if ($them){
                  $_SESSION['cart'][$id] += $soluong;
              }else {          
                  $_SESSION['cart'][$id] = $soluong;
                   }
          }

      }
    }
      switch($_GET['action']) {
      case "add":
          update_product(true);
          header('location:./giohang.php');
        break;
      case "delete":
          if(isset($_GET['id'])) {
              unset($_SESSION['cart'][$_GET['id']]);
              $iddelete = $_GET['id'];              
              $deleteSP = mysqli_query($conn,"DELETE FROM `giohang` WHERE id_sanpham = $iddelete AND id_user = $id_user");
                }
          header('location:./giohang.php');      
          break;      
      case "submit":
        if (isset($_POST['update_click'])) {
               update_product();      
        }
        elseif (empty($_SESSION['username'])) {
            header('location:admin/login.php');
        }
        elseif(isset($_POST['checkCoupon'])) {
            $tontai = '';
            $priceCoupon = '';
            $SLCoupon = '';
            $coupon = $_POST['nameCoupon'];
          $sql = mysqli_query($conn,"SELECT * FROM `coupon` WHERE `nameCoupon` LIKE '$coupon'");
            $row = mysqli_fetch_assoc($sql);
              if($row!=NULL){
                $tontai = 'Hợp lệ';
                $priceCoupon = $row['priceCoupon'];
                $SLCoupon = $row['soluong'];               
              }else {
                $tontai = 'Vui lòng nhập lại đúng mã';
              }
            }
        elseif(isset($_POST['order_click'])){
          if (empty($_POST['name'])) {
            $err = "Bạn cần nhập nhập tên người nhận";
          }
          elseif (empty($_POST['phone'])) {
            $err = "Bạn cần nhập số điện thoại người nhận";
          }
          elseif (empty($_POST['address'])) {
            $err = "Bạn cần nhập địa chỉ nhận hàng";
          }
          elseif (empty($_POST['soluong'])) {
            $err = "Giỏ hàng rỗng";
          }
          elseif (empty($_POST['payment'])) {
            $err = "Vui lòng chọn hình thức thanh toán";
          }
          if ($err == false && !empty($_POST['soluong'])) {
            $total = 0;
            $ordersp = array();
            $result = mysqli_query($conn,"SELECT * FROM `sanpham` WHERE id IN (".implode(",",array_keys($_POST['soluong'])).")");
            while ($row = mysqli_fetch_assoc($result)) {
              $ordersp[] = $row;  
                $total += $row['gia']*$_POST['soluong'][$row['id']];
                $SLsanpham = $row['SLsanpham']-$_POST['soluong'][$row['id']];

                //chỉnh sửa số lượng SP
                 $updateProduct = mysqli_query($conn,"UPDATE `sanpham` SET `SLsanpham` = '$SLsanpham' WHERE`id` = ".$row['id']);
            }

            // Thêm giá trị vào bảng đặt hàng
           $insertOder = mysqli_query($conn,"INSERT INTO `dat_hang` (`name`, `phone`, `address`, `note`, `total`, `created_time`,`user_dathang`,`payment`) VALUES ('".$_POST['name']."', '".$_POST['phone']."', '".$_POST['address']."', '".$_POST['editor1']."', '$total', '". date("yy-m-d")."','".$_SESSION['id']."','".$_POST['payment']."')");
           $orderID = mysqli_insert_id($conn);
   
           
           $insertString = "";
           foreach ($ordersp as $keys => $sanpham) {      
             $insertString .= "('".$orderID."', '".$sanpham['id']."', '".$_POST['soluong'][$sanpham['id']]."', '".$sanpham['gia']."', '".date("yy-m-d")."')";
             if ($keys != count($ordersp)-1){
               $insertString .= ",";
             }

           }
           //thêm vào bảng chi tiết đặt hàng
           $insertOder = mysqli_query($conn,"INSERT INTO `dat_hang_details` (`id_dathang`, `id_sanpham`, `soluong`, `gia`, `created_time`) VALUES ".$insertString.";");
               $sucsess = "Đặt hàng thành công";                             

            //trừ số lượng coupon
            $tontai = '';
            $priceCoupon = '';
            $SLCoupon = '';
            $coupon = $_POST['nameCoupon'];
          $sql = mysqli_query($conn,"SELECT * FROM `coupon` WHERE `nameCoupon` LIKE '$coupon'");
          $row = mysqli_fetch_assoc($sql);
              if($row!=NULL){
                $tontai = 'Hợp lệ';
                $priceCoupon = $row['priceCoupon'];
                $SLCoupon = $row['soluong'];               
              }else {
                $tontai = 'Vui lòng nhập lại đúng mã';
              }
            if(!empty($SLCoupon) && ($SLCoupon>0)){
              $quantityCoupon = $SLCoupon - 1; 
              $updateSLCoupon = mysqli_query($conn,"UPDATE `coupon` SET `soluong` = '$quantityCoupon' WHERE `nameCoupon` LIKE '$coupon' ");
            }

            unset($_SESSION['cart']);
            $deleteSP = mysqli_query($conn,"DELETE FROM `giohang` WHERE id_user = $id_user");
                
          }
        }
      break;     
    }
  }
  if (!empty($_SESSION['cart'])) {
    $sql = "SELECT * FROM `sanpham` WHERE id IN (".implode(",",array_keys($_SESSION['cart'])).")";
    $ketqua = mysqli_query($conn,$sql);
  }
 ?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>

</head>
<body>
    <!-- Danh sách đơn hàng -->
  <div class="container table-bordered">
      <?php if (!empty($err)) { ?>
        <div>
          <?php echo $err."  ".'<a href="javascript:history.back()">Quay lại</a>'  ?>
        </div>
      <?php }elseif (!empty($sucsess)) { ?>
              <div>
                <?php echo $sucsess."  ".'<a href="javascript:history.back()">Quay lại</a>'; ?>
             </div>;    
    <?php  } else { ?>

      <div class="font-weight-bold display-4 mt-4 ">Trang giỏ hàng</div><br>
      <form action="giohang.php?action=submit" method="POST">
        <table class="table table-bordered text-center">
         <thead class="thead-secondary">
      <tr class="text-center">
         <th>STT</th>  
         <th>Hình ảnh</th>
         <th>Tên sản phẩm</th>
         <th>Giá</th>
         <th>Số lượng</th>
         <th>Thành tiền</th>
         <th>Xóa</th>
      </tr>
   </thead>
   <tbody>
      <?php
          $total = 0;  
          $num = 0;
          if (isset($ketqua)) {           
         if(mysqli_num_rows($ketqua) > 0){
         while($row = mysqli_fetch_assoc($ketqua)){            
            ?>
        <tr class="text-center">
           <td><?php echo $num++ ?></td>
           <td><img src="<?php echo 'admin/'.$row['img'] ?>" height="50" width="50"></td>
           <td><?php echo $row['tensanpham'] ?></td>
           <td><?php echo number_format($row['gia'] ,0, ",","."); ?></td>
           <td><input type="text" value="<?php echo $_SESSION['cart'][$row['id']]?>" name="soluong[<?= $row['id'] ?>]" size=2>
           </td>
           <td><?php echo number_format($row['gia']* $_SESSION['cart'][$row['id']],0,",",".").'đ'; ?></td>
           <td><a href="giohang.php?action=delete&id=<?= $row['id'] ?>">Xóa</a></td>     
        </tr>
    <?php
        $_SESSION['SLgiohang']=$num;
        $total += ($row['gia']* $_SESSION['cart'][$row['id']]);
      } }  ?>
      
      <tr class="bg bg-light">
        <th></th>
        <th colspan="4" class="text-center">Tổng tiền</th>
        <th colspan="2"><?php echo number_format($total,0,",",".").'đ';  ?></th> 
      </tr>
    <?php } ?>




      <tr>
        <th colspan="5" class="text-left">
          <div class="btn btn-warning">
               <a href="products.php" class="lead font-weight-bold">Tiếp tục mua hàng</a>
          </div>
        </th>
        <th colspan="3" class="text-center">
          <input type="submit" name="update_click" value="UPDATE" class="btn btn-primary">
        </th>
      </tr>  
   </tbody>
</table>

  <hr>

  <div class="container">
    <div class="text-center text-primary" style="font-size:30px;">Thông tin khách hàng</div>
    <div class="form-group">
      <label class="control-label col-sm-2">Tên người nhận</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" placeholder="Tên người nhận" name="name" 
        value="<?php echo  $_SESSION['name']; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Số điện thoại</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" placeholder="Số điện thoại" name="phone">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Địa chỉ</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" placeholder="Địa chỉ" name="address">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" >Ghi chú</label>         
      <div class="col-sm-12">
        <textarea name="editor1"></textarea>
        <script>
         CKEDITOR.replace('editor1');
       </script>         
     </div>
   </div>
   <hr>
   <div class="form-group">
      <div class="text-center text-primary" style="font-size:30px">Thanh toán</div>
      <br>
      <div class="row">
        <div class="col-md-3">Nhập mã giảm giá:<br>(tối đa 1 mã giảm giá)</div>
        <div class="col-md-3">
            <input type="text" class="form-control coupon" name="nameCoupon" value="<?=isset($_POST['checkCoupon']) ? $coupon : ''?>" placeholder="Mã giảm giá">
            <div id="magiamgia"></div>
            <div><?php echo isset($_POST['checkCoupon']) ? $tontai : ''  ?></div>
        </div>
        <div>
          <button class="btn btn-warning mr-2" type="submit" name="checkCoupon">Kiểm tra</button>
          <a href="#" id="showCoupon">Show mã giảm giá của bạn</a>
        </div>
      </div>

      <script type="text/javascript">
        $(function() {
          $("#showCoupon").on('click',function() {
           $.ajax({
            url: "layout/showmaCoupon.php",
            type: 'POST',
            success: function(result){
            $("#magiamgia").prepend(result);
          }});
          })
        })
      </script>


      <br>
      <div class="row">
        <div class="col-md-12 mb-2">
          Hình thức thanh toán:
        </div>
        <div class="col-md-4">
          <label>
          Thanh toán bằng thẻ ATM
          <input type="radio" name="payment" value="1">
          </label>
        </div>
        <div class="col-md-4">
          <label>
          Thanh toán khi nhận hàng
          <input type="radio" name="payment" value="2">
          </label>
        </div>
        <div class="col-md-4">
          <label>
          Thanh toán bằng Credit Card
          <input type="radio" name="payment" value="3">
          </label>
        </div>
      </div>
    </div>
    <hr>
    <div class="form-group">
      <div class="table-bordered col-md-3">
          <div>Tổng giá: <?php echo number_format($total,0,",",".").' vnđ';  ?></div>
          <div>Thuế VAT: 0 vnđ</div>
          <div>Mã giảm giá: <?= !empty($priceCoupon) ? number_format($priceCoupon,0,",",".") : 
          '0'  ?> vnđ</div>
          <div>Phí vận chuyển: <?= !empty($total) ? $PVC=20000 : $PVC=0  ?> vnđ</div>
          <div>Tổng đơn hàng: <?= !empty($priceCoupon) ? number_format($total-$priceCoupon+20000,0,",",".") : number_format($total+$PVC,0,",",".") ?> vnđ</div>
      </div>
    </div>
   <h5><?= isset($err) ? $err : ''; ?></h5>
    <div class="form-group">      
       <input type="submit" name="order_click" value="Đặt hàng" class="btn btn-primary pr-14">
    </div>
  </div>
     </form>

       <?php
          if (isset($_SESSION['idCoupon'])) {
          $Coupon = mysqli_query($conn,"SELECT * FROM `coupon` WHERE id=".$_SESSION['idCoupon']);
          if (mysqli_num_rows($Coupon)>0) {
            $row = mysqli_fetch_assoc($Coupon);
          }
        }
        ?> 

      <?php } ?>          
  </div>
</body>
</html>
