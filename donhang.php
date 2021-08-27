<?php 
	session_start();
	include "config/connect.php";

			if(!empty($_POST['logout'])){
				unset($_SESSION['username']);
				!empty($_POST['logout']=='logout')? header('refresh:0') : "";
			}

			if (!empty($_POST['thanhcong'])) {
				$thanhcong = mysqli_query($conn,"UPDATE `dat_hang` SET `status` = '3' WHERE user_dathang = ".$_SESSION['id']);
			}
			if (!empty($_POST['huydon'])) {
				$huydon = mysqli_query($conn,"UPDATE `dat_hang` SET `status` = '4' WHERE user_dathang = ".$_SESSION['id']);
			}			
 ?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Brnd-logo Website Template | Contact :: w3layouts</title>
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery.min.js"></script>
		 <!-- Custom Theme files -->
		<link href="css/style.css" rel="stylesheet" type="text/css">
   		 <!-- Custom Theme files -->
   		 <!---- start-smoth-scrolling---->
		<script type="text/javascript" src="js/move-top.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>
		<link rel="stylesheet" type="text/css" href="css/stepper.css">
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>
		 <!---- start-smoth-scrolling---->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		</script>
		<!----webfonts--->
		<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
		<!---//webfonts--->
		<!----start-top-nav-script---->
		<script>
			$(function() {
				var pull 		= $('#pull');
					menu 		= $('nav ul');
					menuHeight	= menu.height();
				$(pull).on('click', function(e) {
					e.preventDefault();
					menu.slideToggle();
				});
				$(window).resize(function(){
	        		var w = $(window).width();
	        		if(w > 320 && menu.is(':hidden')) {
	        			menu.removeAttr('style');
	        		}
	    		});
			});
		</script>
		<!----//End-top-nav-script---->
		<style type="text/css">
			p{
				font-size: 15px
			}
			.total-result{
				font-size: 15px
			}
			.steppers{
				margin-top: 20px;
				border: 1px solid #ecebdf;
			}
			
			.adress_order{
				margin-top: 35px;
				border: 1px solid #ecebdf;
				margin-bottom: 40px;
			}
			.cart-info{
				border: 1px solid #ecebdf;
			}

		</style>
	</head>
	<body>
		<!----container---->
		<div class="container">
			<!----top-header---->
			<div class="top-header">
				<div class="logo">
					<a href="index.php"><img src="images/logo.png" title="barndlogo" /></a>
				</div>
				<div class="top-header-info">
					<div class="top-contact-info">
						<ul class="unstyled-list list-inline">
							<li><span class="phone"> </span>090 - 223 44 66</li>
							<li><span class="mail"> </span><a href="#">help@trendd.com</a></li>
							<div class="clearfix"> </div>
						</ul>
					</div>
					<div class="cart-details">
						<div class="add-to-cart">
							<ul class="unstyled-list list-inline">
								<a href="giohang.php">
								<li><span class="cart"> </span>
									<ul class="cart-sub">
										<li><p><?php echo isset($_SESSION['SLgiohang']) ?  $_SESSION['SLgiohang'] : '0';  ?></p></li>
									</ul>
								</li>
							</a>
							</ul>
						</div>
							<div class="login-rigister">
							<?php  if(!isset($_SESSION['username'])){  ?>
							<ul class="unstyled-list list-inline">
								<li><a class="login" href="admin/login.php">Login</a></li>
								<li><a class="rigister" href="admin/register.php">REGISTER <span> </span></a></li>
								<div class="clearfix"> </div>
							</ul>
						<?php }else { ?>
							
							<ul class="unstyled-list list-inline">
							<li>
								<form action="" method="POST">
									<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['name'];  ?>
										<span class="caret"></span></a>
										<ul class="dropdown-menu">
											<li><a href="#"> Profile</a></li>
											<li><a href="#">Settings</a></li>
											<li><a><input  type="submit" name="logout" value="logout"></a></li>
										</ul>
									</div>	
								</form>		
							</li>
							<li>
								<?php 
								
								$ketqua = mysqli_query($conn,"SELECT * FROM `user` WHERE id=".$_SESSION['id']);
								$row = mysqli_fetch_assoc($ketqua);
								if ($row['avata_user']!=NULL) { ?>
									<a href="admin/index.php"><img class="img-circle" src="<?='admin/'.$row['avata_user']?>" width="50" height="50"></a>

								<?php    }else { ?>

									<a href="admin/index.php"><img class="img-circle" src="admin/img/logo1.jpg" width="50" height="50"></a>

								<?php   }  ?>
							</li>
							</ul>
								
						<?php } ?>  
						
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<!----//top-header---->
			<!---top-header-nav---->
			<div class="top-header-nav"> 
			<!----start-top-nav---->
			 <nav class="top-nav main-menu">
					<ul class="top-nav">
						<li><a href="index.php">HOME</a><span> </span></li>
						<li><a href="products.php">PRODUCT</a><span> </span></li>
						<li><a href="coupon.php">COUPONS</a><span> </span></li>
						<li><a href="blog.php">BLOG</a><span> </span></li>
						<li><a href="mvc/home.php">CONTACT</a></li>
						<div class="clearfix"></div>
					</ul>
					<a href="#" id="pull"><img src="images/nav-icon.png" title="menu" /></a>
			  </nav>
			  <!----End-top-nav---->
			  <!---top-header-search-box--->
			  <div class="top-header-search-box">
			  	<form>
			  		<input type="text" placeholder="Search" required / maxlength="22">
			  		<input type="submit" value=" " >
			  	</form>
			  </div>
			  <!---top-header-search-box--->
						<div class="clearfix"> </div>
			</div>
		</div>
			<!--//top-header-nav---->
			<!----contact---->
			<div class="container">
				<div class="container-fluid mt-5" >
					<?php include "layout/stepper.php" ?>
				</div>
				<?php
						$total = 0; 
								include "config/connect.php"; 
								$sql = "SELECT * FROM dat_hang_details INNER JOIN dat_hang ON dat_hang_details.id_dathang = dat_hang.id INNER JOIN sanpham ON dat_hang_details.id_sanpham = sanpham.id WHERE dat_hang.user_dathang = ".$_SESSION['id'] ;
								$ketqua = mysqli_query($conn,$sql);
									$row1 = mysqli_fetch_assoc($ketqua);
							  ?>

				<div class="col-md-12 adress_order">
						<h3 style="color: #e61818;text-align: center">Địa chỉ nhận hàng</h3>
						<?php if(isset($row1)){  ?>
						<div>
							<p>Họ tên người nhận: <?=$row1['name']?></p>
							<p>Số điện thoại: <?='0'.$row1['phone']?></p>
							<p>Địa chỉ: 73 nguyễn Tạo, Đà nẵng</p>
						</div>
						<?php }  ?>
					</div>				

						

				<div class="table-responsive cart_info">
					<h3 style="margin-left: 20px;color: #e61818;text-align: center;">Đơn hàng</h3>
					<table class="table table-condensed">
						<thead>
							<tr>
								<th>Image</th>
								<th>Tên sản phẩm</th>
								<th>Giá</th>
								<th>Số lượng</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>	
						<?php
						$total = 0; 
								include "config/connect.php"; 
								$sql = "SELECT * FROM dat_hang_details INNER JOIN dat_hang ON dat_hang_details.id_dathang = dat_hang.id INNER JOIN sanpham ON dat_hang_details.id_sanpham = sanpham.id WHERE dat_hang.user_dathang = ".$_SESSION['id'] ;
								$ketqua = mysqli_query($conn,$sql);
								if(mysqli_num_rows($ketqua) > 0){
									while($row = mysqli_fetch_assoc($ketqua)){ 
							  ?>					
							<tr>
								<td>
									<a href=""><img src="<?= 'admin/'.$row['img'] ?>" width="150px" height="150px"></a>
								</td>
								<td >
									<h4><a href="<?='muahang.php?idsanpham='.$row['id_sanpham']?>"><?= $row['tensanpham']  ?></a></h4>
									<p>Web ID: <?= $row['id'] ?></p>
								</td>
								<td>
									<p><?= number_format($row['gia']) ?></p>
								</td>
								<td >
									<div class="cart_quantity_button">
										<p><?=$row['soluong']?></p>
									</div>
								</td>
								<td>
									<p class="cart_total_price"><?= number_format($row['total']) ?> VNĐ</p>
								</td>
							</tr>
							<?php 
						  	$total += $row['total'];	
						  } }  ?>
								<td colspan="4">&nbsp;</td>
								<td colspan="2">
									<table class="table table-condensed total-result">
										<tr>
											<td>Tổng tiền</td>
											<td><?=number_format($total)?> VNĐ</td>
										</tr>
										<tr>
											<td>Phí vận chuyển</td>
											<td><?=isset($row1['total']) ? '25,000' : '0'?> VNĐ</td>
										</tr>
										<tr class="shipping-cost">
											<td>Phí VAT </td>
											<td>Free</td>										
										</tr>
										<tr>
											<td>Tổng tiền phải trả</td>
											<td><span><?=isset($row1['total']) ? number_format($total+25000) : 0?> VNĐ</span></td>
										</tr>
										<tr>
											<form action="" method="POST">
											<td colspan="2">
												<?php 
												$statu = mysqli_query($conn,"SELECT * FROM dat_hang_details INNER JOIN dat_hang ON dat_hang_details.id_dathang = dat_hang.id WHERE dat_hang.user_dathang =".$_SESSION['id']);
												$status = mysqli_fetch_assoc($statu);
												$docvc = $status['status'];												
												?>
												<input type="submit" name="huydon" value="Hủy đơn" class="btn btn-danger" 
												<?=($docvc<'2') ? '' : 'disabled'?>>
												<input class="btn btn-info" value="Nhận hàng thành công" type="submit" name="thanhcong">
											</td>
											</form>
										</tr>
									</table>
								</td>
							</tr>					
						</tbody>
					</table>
				</div>
			</div>

			<!---//contact---->
			<!----footer--->
			<div class="footer">
				<div class="container">
					<div class="col-md-3 footer-logo">
						<a href="index.php"><img src="images/flogo.png" title="brand-logo" /></a>
					</div>
					<div class="col-md-7 footer-links">
						<ul class="unstyled-list list-inline">
							<li><a href="#"> Faq</a> <span> </span></li>
							<li><a href="#"> Terms and Conditions</a> <span> </span></li>
							<li><a href="#"> Secure Payments</a> <span> </span></li>
							<li><a href="#"> Shipping</a> <span> </span></li>
							<li><a href="contact.php"> Contact</a> </li>
							<div class="clearfix"> </div>
						</ul>
					</div>
					<div class="col-md-2 footer-social">
						<ul class="unstyled-list list-inline">
							<li><a class="pin" href="#"><span> </span></a></li>
							<li><a class="twitter" href="#"><span> </span></a></li>
							<li><a class="facebook" href="#"><span> </span></a></li>
							<div class="clearfix"> </div>
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>
			 </div>
			 <div class="clearfix"> </div>
			<!---//footer--->
			<!---copy-right--->
					<div class="copy-right">
						<div class="container">
							<p>Template by <a href="http://w3layouts.com/">W3layouts</a></p>
							<script type="text/javascript">
									$(document).ready(function() {
										/*
										var defaults = {
								  			containerID: 'toTop', // fading element id
											containerHoverID: 'toTopHover', // fading element hover id
											scrollSpeed: 1200,
											easingType: 'linear' 
								 		};
										*/
										
										$().UItoTop({ easingType: 'easeOutQuart' });
										
									});
								</script>
							<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
						</div>
					</div>
			<!--//copy-right--->
		</div>
		<!----container---->
	</body>
</html>

