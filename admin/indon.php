<?php 
  session_start();
  include "../config/connect.php";
  if(!empty($_POST['logout'])){
        unset($_SESSION['username']); 
      }
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>in đơn</title>
	<link rel="stylesheet" type="text/css" href="css/indon1.css">
</head>
	<body onload="window.print();">
<div id="page" class="page">
    <div class="header">
        <div class="logo"><img src="../images/logo.png"/></div>
        <div class="company">Shop giày thể thao cao cấp</div>
    </div>
  <br/>
  <div class="title">
        HÓA ĐƠN THANH TOÁN
        <br/>
        -------oOo-------
  </div>
  <br/>
  <br/>
    <?php 
        $result = mysqli_query($conn,"SELECT * FROM `dat_hang` INNER JOIN dat_hang_details ON dat_hang.id=dat_hang_details.id_dathang WHERE id_dathang=".$_GET['id']." "."LIMIT 1");
        while($row = mysqli_fetch_assoc($result)){ 
     ?>
    <div class="IFkhachhang">
          <div>Họ tên khách hàng:<?=$row['name']?></div>
          <div>Mã đơn hàng:<?=$row['id']?></div>
          <div>Số điện thoại:0<?=$row['phone']?></div>
          <div>Địa chỉ:<?=$row['address']?></div>
          <div>Ngày đặt hàng:<?=$row['created_time']?></div>
    </div>
    <?php } ?>
    <br><br>
  <table class="TableData">
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
        $ketqua = mysqli_query($conn,"SELECT * FROM `dat_hang_details` INNER JOIN sanpham ON dat_hang_details.id_sanpham=sanpham.id WHERE id_dathang =".$_GET['id']);
        while($rows = mysqli_fetch_assoc($ketqua)){
     ?>
    <tr>
      <th><?=$num++?></th>
      <th><?=$rows['tensanpham']?></th>
      <th><?=$rows['soluong']?></th>
      <th><?=$rows['gia']?></th>
      <th><?=($rows['soluong']*$rows['gia'])?></th>
    </tr>
       <?php $total += $rows['soluong']*$rows['gia'];} ?>
    <tr>
      <td colspan="4" class="tong">Tổng cộng</td>
      <td class="cotSo" id="total"><?=$total?></td>
    </tr>
  </table>
  <br><br>
  <div class="footer-left"> Đà Nẵng, ngày...tháng...năm 2020 <br/>
    Khách hàng </div>
  <div class="footer-right"> Đà Nẵng, ngày...tháng...năm 2020<br/>
    Nhân viên </div>
</div>
</body>
</html>