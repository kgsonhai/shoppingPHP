<?php 
	session_start();
	include "config/connect.php";					
				if (isset($_GET['action']) && $_GET['action']=="search" && isset($_POST)) {
								$_SESSION['product_filter'] = $_POST;
								// var_dump($_SESSION['product_filter']);exit();
								 // header('location:products.php'); 
							}
							$where = "";
						if (isset($_SESSION['product_filter'])){							
							foreach ($_SESSION['product_filter'] as $key => $value) {	
								if (!empty($value)) {
									// $where .= empty($where) ? "" : " AND ";
												switch ($key) {									
													case 'tensanpham': 
														$where .= (!empty($where)) ? " AND "."`".$key."` LIKE '%".$value."%'" : "`".$key."` LIKE '%".$value."%'";
														break;									
													case 'gia': 
														$where .= (!empty($where)) ? " AND "."`".$key."` < ".$value."" : "`".$key."` < ".$value."" ;
														break;
													case 'color': 
														$where .= (!empty($where)) ? " AND "."`".$key."` LIKE '%".$value."%'" : "`".$key."` LIKE '%".$value."%'" ;
														break;
													case 'size': 
														$where .= (!empty($where)) ? " AND "."`".$key."` = ".$value."" : "`".$key."` = ".$value."";
														break;
													case 'iddanhmuc': 
														$where .= (!empty($where)) ? " AND "."`".$key."` = ".$value."" : "`".$key."` = ".$value."";
														break;
													case 'xuatxu': 
														$where .= (!empty($where)) ? " AND "."`".$key."` LIKE '%".$value."%'" : "`".$key."` LIKE '%".$value."%'" ;
														break;												
													default:
														$where .= (!empty($where)) ? " AND "."`".$key."` LIKE '%".$value."%'" : "`".$key."` LIKE '%".$value."%'";
														break;												
												}


											}			
										}

										
										// var_dump($where);exit();
										extract($_SESSION['product_filter']);										
								}
						if (isset($_POST['delete'])) {
								unset($_SESSION['product_filter']);
								header('location:products.php');					
													}							
									?>
			<?php
			if(!empty($_POST['logout'])){
				unset($_SESSION['username']);	
				!empty($_POST['logout']=='logout')? header('refresh:0') : "";
			}			
			?>						
<!DOCTYPE>
<html>
	<head>
		<title>Brnd-logo Website Template | Products :: w3layouts</title>
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery.min.js"></script>
		 <!-- Custom Theme files -->
		<link href="css/style.css" rel="stylesheet" type="text/css">
   		 <!-- Custom Theme files -->
   		 <!---- start-smoth-scrolling---->
		<script type="text/javascript" src="js/move-top.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>
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
		<link href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic" rel="stylesheet" type="text/css">
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
			body{
				background-color: #F2F2F2 !important;
				}
			#nike .text-center{
				margin-bottom: 40px;
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
							<a class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['name']; ?></a>
										<ul class="dropdown-menu">
											<li><a href="donhang.php"> Đơn hàng</a></li>
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
			<!----content---->
				<div class="content">
					<div class="container">
				<!--- products ---->
				<div class="products">
					<div class="product-filter">
						<h1><a href="#">Filter</a></h1>
						<div class="product-filter-grids"> 
							<div class="col-md-12 product-filter-grid1-brands">
								<?php include "layout/filter.php";  ?>
								<div class="clearfix"> </div>
							</div>

						<div class="clearfix"> </div>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>  
				<!-- //products ---->
				<!----speical-products---->
				<div class="special-products">				
					<div class="s-products-head">
						<div class="s-products-head-left">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle ml-4 mb-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span style="font-size: 18px;font-weight: bold;">
										Danh mục sản phẩm
									</span>
								</button>				
								<div class="dropdown-menu">
									<a class="dropdown-item" href="?iddm=1">Giày Nike</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="?iddm=2">Giày Adidas</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="?iddm=9">Giày Biti's</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="?iddm=5">Giày Ananas</a>
								</div>					
										<?php 
								if (isset($_GET['iddm'])) { ?>
								<button type="button" class="btn btn-danger ml-4 mb-3">
									<span style="font-size: 14px;font-weight: bold;">	
								<?php	
					      		$ketqua = mysqli_query($conn,"SELECT * FROM `danhmuc` WHERE `id` =".$_GET['iddm']);
					      		$row = mysqli_fetch_assoc($ketqua);
					      		echo $row['hangsx'];				      		
										 ?>
									</span>
								</button>
								<?php } ?>
							</div>
						</div>
						<div class="s-products-head-right">
							<a href="products.php"><span> </span>view all products</a>
						</div>
						<div class="clearfix"> </div>
					</div>					
					<!----special-products-grids---->
					<div class="special-products-grids ">
						<?php	
						$item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:16;
						$current_page = !empty($_GET['page'])?$_GET['page']:1;
						$offset = ($current_page-1)*$item_per_page;
						if (!empty($where)){
							$ketqua = mysqli_query($conn,"SELECT * FROM `sanpham` WHERE ".$where." LIMIT ".$item_per_page." OFFSET ".$offset."");
						}elseif (isset($_GET['iddm'])) {
					      $ketqua = mysqli_query($conn,"SELECT * FROM `sanpham` WHERE `iddanhmuc` =".$_GET['iddm']);				      
								}
						else {
							$ketqua = mysqli_query($conn,"SELECT * FROM `sanpham` LIMIT ".$item_per_page." OFFSET ".$offset."");	
						}			
						$totalSP = mysqli_query($conn,"SELECT * FROM `sanpham`");
						$totalSP = $totalSP -> num_rows;
						$totalPage = ceil($totalSP/$item_per_page);
						if(mysqli_num_rows($ketqua) > 0){
                        while($row = mysqli_fetch_assoc($ketqua)){                 
                     ?>
					<div class="col-md-3 mb-5 text-center">
						<a class="product-here" href="<?php echo 'muahang.php?idsanpham='.$row['id']; ?>">
						<img src="<?php echo 'admin/'.$row['img'] ?>" title="product-name" /></a>
							<h4><a href="<?php echo 'muahang.php?idsanpham='.$row['id']; ?>"><?php echo $row['tensanpham'] ?></a></h4>
							<a class="product-btn" href="<?php echo 'muahang.php?idsanpham='.$row['id']; ?>"><span>
								<?php echo number_format($row['gia'], 0, ",",".") ?>
							</span><small>GET NOW</small><label> </label></a>
						</div>	
						<?php  } }
						else{
							echo '<h3>Không có kết quả nào tìm thấy</h3>';
						}?>					
						<div class="clearfix"> </div>
					</div>
					<!---//special-products-grids---->
									<?php include "layout/pagination.php";  ?>	
				</div>
				<!----->		
				<!---//speical-products---->
				</div>
			<!----content---->
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
			 <div class="clearfix"></div>
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

