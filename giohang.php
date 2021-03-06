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
                $tontai = 'H???p l???';
                $priceCoupon = $row['priceCoupon'];
                $SLCoupon = $row['soluong'];               
              }else {
                $tontai = 'Vui l??ng nh???p l???i ????ng m??';
              }
            }
        elseif(isset($_POST['order_click'])){
          if (empty($_POST['name'])) {
            $err = "B???n c???n nh???p nh???p t??n ng?????i nh???n";
          }
          elseif (empty($_POST['phone'])) {
            $err = "B???n c???n nh???p s??? ??i???n tho???i ng?????i nh???n";
          }
          elseif (empty($_POST['address'])) {
            $err = "B???n c???n nh???p ?????a ch??? nh???n h??ng";
          }
          elseif (empty($_POST['soluong'])) {
            $err = "Gi??? h??ng r???ng";
          }
          elseif (empty($_POST['payment'])) {
            $err = "Vui l??ng ch???n h??nh th???c thanh to??n";
          }
          if ($err == false && !empty($_POST['soluong'])) {
            $total = 0;
            $ordersp = array();
            $result = mysqli_query($conn,"SELECT * FROM `sanpham` WHERE id IN (".implode(",",array_keys($_POST['soluong'])).")");
            while ($row = mysqli_fetch_assoc($result)) {
              $ordersp[] = $row;  
                $total += $row['gia']*$_POST['soluong'][$row['id']];
                $SLsanpham = $row['SLsanpham']-$_POST['soluong'][$row['id']];

                //ch???nh s???a s??? l?????ng SP
                 $updateProduct = mysqli_query($conn,"UPDATE `sanpham` SET `SLsanpham` = '$SLsanpham' WHERE`id` = ".$row['id']);
            }

            // Th??m gi?? tr??? v??o b???ng ?????t h??ng
           $insertOder = mysqli_query($conn,"INSERT INTO `dat_hang` (`name`, `phone`, `address`, `note`, `total`, `created_time`,`user_dathang`,`payment`) VALUES ('".$_POST['name']."', '".$_POST['phone']."', '".$_POST['address']."', '".$_POST['editor1']."', '$total', '". date("yy-m-d")."','".$_SESSION['id']."','".$_POST['payment']."')");
           $orderID = mysqli_insert_id($conn);
   
           
           $insertString = "";
           foreach ($ordersp as $keys => $sanpham) {      
             $insertString .= "('".$orderID."', '".$sanpham['id']."', '".$_POST['soluong'][$sanpham['id']]."', '".$sanpham['gia']."', '".date("yy-m-d")."')";
             if ($keys != count($ordersp)-1){
               $insertString .= ",";
             }

           }
           //th??m v??o b???ng chi ti???t ?????t h??ng
           $insertOder = mysqli_query($conn,"INSERT INTO `dat_hang_details` (`id_dathang`, `id_sanpham`, `soluong`, `gia`, `created_time`) VALUES ".$insertString.";");
               $sucsess = "?????t h??ng th??nh c??ng";                             

            //tr??? s??? l?????ng coupon
            $tontai = '';
            $priceCoupon = '';
            $SLCoupon = '';
            $coupon = $_POST['nameCoupon'];
          $sql = mysqli_query($conn,"SELECT * FROM `coupon` WHERE `nameCoupon` LIKE '$coupon'");
          $row = mysqli_fetch_assoc($sql);
              if($row!=NULL){
                $tontai = 'H???p l???';
                $priceCoupon = $row['priceCoupon'];
                $SLCoupon = $row['soluong'];               
              }else {
                $tontai = 'Vui l??ng nh???p l???i ????ng m??';
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
    <!-- Danh s??ch ????n h??ng -->
  <div class="container table-bordered">
      <?php if (!empty($err)) { ?>
        <div>
          <?php echo $err."  ".'<a href="javascript:history.back()">Quay l???i</a>'  ?>
        </div>
      <?php }elseif (!empty($sucsess)) { ?>
              <div>
                <?php echo $sucsess."  ".'<a href="javascript:history.back()">Quay l???i</a>'; ?>
             </div>;    
    <?php  } else { ?>

      <div class="font-weight-bold display-4 mt-4 ">Trang gi??? h??ng</div><br>
      <form action="giohang.php?action=submit" method="POST">
        <table class="table table-bordered text-center">
         <thead class="thead-secondary">
      <tr class="text-center">
         <th>STT</th>  
         <th>H??nh ???nh</th>
         <th>T??n s???n ph???m</th>
         <th>Gi??</th>
         <th>S??? l?????ng</th>
         <th>Th??nh ti???n</th>
         <th>X??a</th>
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
           <td><?php echo number_format($row['gia']* $_SESSION['cart'][$row['id']],0,",",".").'??'; ?></td>
           <td><a href="giohang.php?action=delete&id=<?= $row['id'] ?>">X??a</a></td>     
        </tr>
    <?php
        $_SESSION['SLgiohang']=$num;
        $total += ($row['gia']* $_SESSION['cart'][$row['id']]);
      } }  ?>
      
      <tr class="bg bg-light">
        <th></th>
        <th colspan="4" class="text-center">T???ng ti???n</th>
        <th colspan="2"><?php echo number_format($total,0,",",".").'??';  ?></th> 
      </tr>
    <?php } ?>




      <tr>
        <th colspan="5" class="text-left">
          <div class="btn btn-warning">
               <a href="products.php" class="lead font-weight-bold">Ti???p t???c mua h??ng</a>
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
    <div class="text-center text-primary" style="font-size:30px;">Th??ng tin kh??ch h??ng</div>
    <div class="form-group">
      <label class="control-label col-sm-2">T??n ng?????i nh???n</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" placeholder="T??n ng?????i nh???n" name="name" 
        value="<?php echo  $_SESSION['name']; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">S??? ??i???n tho???i</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" placeholder="S??? ??i???n tho???i" name="phone">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">?????a ch???</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" placeholder="?????a ch???" name="address">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" >Ghi ch??</label>         
      <div class="col-sm-12">
        <textarea name="editor1"></textarea>
        <script>
         CKEDITOR.replace('editor1');
       </script>         
     </div>
   </div>
   <hr>
   <div class="form-group">
      <div class="text-center text-primary" style="font-size:30px">Thanh to??n</div>
      <br>
      <div class="row">
        <div class="col-md-3">Nh???p m?? gi???m gi??:<br>(t???i ??a 1 m?? gi???m gi??)</div>
        <div class="col-md-3">
            <input type="text" class="form-control coupon" name="nameCoupon" value="<?=isset($_POST['checkCoupon']) ? $coupon : ''?>" placeholder="M?? gi???m gi??">
            <div id="magiamgia"></div>
            <div><?php echo isset($_POST['checkCoupon']) ? $tontai : ''  ?></div>
        </div>
        <div>
          <button class="btn btn-warning mr-2" type="submit" name="checkCoupon">Ki???m tra</button>
          <a href="#" id="showCoupon">Show m?? gi???m gi?? c???a b???n</a>
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
          H??nh th???c thanh to??n:
        </div>
        <div class="col-md-4">
          <label>
          Thanh to??n b???ng th??? ATM
          <input type="radio" name="payment" value="1">
          </label>
        </div>
        <div class="col-md-4">
          <label>
          Thanh to??n khi nh???n h??ng
          <input type="radio" name="payment" value="2">
          </label>
        </div>
        <div class="col-md-4">
          <label>
          Thanh to??n b???ng Credit Card
          <input type="radio" name="payment" value="3">
          </label>
        </div>
      </div>
    </div>
    <hr>
    <div class="form-group">
      <div class="table-bordered col-md-3">
          <div>T???ng gi??: <?php echo number_format($total,0,",",".").' vn??';  ?></div>
          <div>Thu??? VAT: 0 vn??</div>
          <div>M?? gi???m gi??: <?= !empty($priceCoupon) ? number_format($priceCoupon,0,",",".") : 
          '0'  ?> vn??</div>
          <div>Ph?? v???n chuy???n: <?= !empty($total) ? $PVC=20000 : $PVC=0  ?> vn??</div>
          <div>T???ng ????n h??ng: <?= !empty($priceCoupon) ? number_format($total-$priceCoupon+20000,0,",",".") : number_format($total+$PVC,0,",",".") ?> vn??</div>
      </div>
    </div>
   <h5><?= isset($err) ? $err : ''; ?></h5>
    <div class="form-group">      
       <input type="submit" name="order_click" value="?????t h??ng" class="btn btn-primary pr-14">
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
