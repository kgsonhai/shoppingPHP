       <?php
       	  include "../config/connect.php";
       	  session_start();
       	  if (isset($_SESSION['idCoupon'])) { 
          $Coupon = mysqli_query($conn,"SELECT * FROM `coupon` WHERE id=".$_SESSION['idCoupon']);
          if (mysqli_num_rows($Coupon)>0) {
            $row = mysqli_fetch_assoc($Coupon);
          }
          echo '<span style="font-weight:bold;color:red">'.$row['nameCoupon'].'</span>';
      }else {
      	echo '<span style="font-weight:bold;color:red">Bạn chưa có mã giảm giá nào!</span>';
      }
        ?>