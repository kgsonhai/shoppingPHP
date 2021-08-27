<?php 
	session_start();
	include "config/connect.php";
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
		<title>Brnd-logo Website Template | Home :: w3layouts</title>
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" >
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous">		
		</script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
		 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery.min.js"></script>
		 <!-- Custom Theme files -->
		<link rel="stylesheet" type="text/css" href="css/index1.css">
   		 <!-- Custom Theme files -->
   		     <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
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
		<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
		<style type="text/css">
			@media (min-width: 992px){
			.col-md-3 {
				width: 30%;
			}

		}
		</style>

		<!----//End-top-nav-script---->
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
							<li><span class="mail"> </span><a href="#">nshai.19it1@vku.com</a></li>
							<div class="clearfix"> </div>
						</ul>
					</div>
					<div class="cart-details">
						<div class="add-to-cart"  style="position:absolute">
							<ul class="unstyled-list list-inline">
								<a href="giohang.php">
									<li>
										<span class="cart" <?=isset($_SESSION['username']) ? 'id="cart"' : ''?>></span>							
										<ul class="cart-sub">
											<li><p><?php echo isset($_SESSION['SLgiohang']) ?  $_SESSION['SLgiohang'] : '0';  ?></p></li>
										</ul>
									</li>									
									<li style="position: absolute; z-index:2">
										<?php include "layout/list_cart.php" ?>
									</li>
								
							</a>
							</ul>
							 <!--  --> 
									
						</div>
						<div class="login-rigister" style="display: block;margin-left: 60px">
							<?php  if(empty($_SESSION['username'])){  ?>
							<ul class="unstyled-list list-inline" style="margin-left:15px">
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
											<li><a href="donhang.php"> Đơn hàng</a></li>
											<li><a href="#"> Profile</a></li>
											<li><a href="#">Settings</a></li>
										<li><a><input  type="submit" name="logout" value="Logout"></a></li>
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
			<div class="top-header-nav" style="z-index: 1;margin-bottom:25px;margin-top: 30px"> 
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
			<!----start-slider-script---->
			<script src="js/responsiveslides.min.js"></script>
			 <script>
			    // You can also use "$(window).load(function() {"
			    $(function () {
			      // Slideshow 4
			      $("#slider4").responsiveSlides({
			        auto: true,
			        pager: true,
			        nav: true,
			        speed: 500,
			        namespace: "callbacks",
			        before: function () {
			          $('.events').append("<li>before event fired.</li>");
			        },
			        after: function () {
			          $('.events').append("<li>after event fired.</li>");
			        }
			      });
			
			    });
			  </script>
			<!----//End-slider-script---->
			<!-- Slideshow 4 -->
			    <div  id="top" class="callbacks_container" style="z-index: 1">
			      <ul class="rslides" id="slider4">
			        <li>
			          <img src="images/slide1.png" alt="">
			          <div class="caption">
			          	<div class="slide-text-info">
			          		<h1>WILL HELM</h1>
			          		<label>WINTER</label>
			          		<a class="slide-btn" href="#"><span>99.90$</span> <small>GET NOW</small><label> </label></a>
			          	</div>
			          </div>
			        </li>
			        <li>
			          <img src="images/slide2.png" alt="">
			          <div class="caption">
			          	<div class="slide-text-info">
			          		<h1>FAST NER2</h1>
			          		<label>Dress Shoe</label>
			          		<a class="slide-btn" href="#"><span>99.90$</span> <small>GET NOW</small><label> </label></a>
			          	</div>
			          </div>
			        </li>
			        <li>
			          <img src="images/slide1.png" alt="">
			           <div class="caption">
			           	<div class="slide-text-info">
			          		<h1>WILL HELM</h1>
			          		<label>WINTER</label>
			          		<a class="slide-btn" href="#"><span>99.90$</span> <small>GET NOW</small><label> </label></a>
			          	</div>
			          </div>
			        </li>
			      </ul>
			    </div>
			    <div class="clearfix"></div>
			<!----- //End-slider---->
			<!----content---->
		<div class="content">
			<div class="container-fuild">
				<!---top-row--->
				<div class="top-row">
					<div class="col-xs-3">
						<div class="top-row-col1 text-center">
							<h2><b>NIKE</b></h2>
							<img class="r-img text-center" src="images/LOGONIKE.png" title="name" />
							<span><img src="images/obj1.png" title="name" /></span>
							<h4>TOTAL</h4>
							<label>357 PRODUCTS</label>
							<a class="r-list-w" href="muahang.php"><img src="images/list-icon.png" title="list" /></a>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="top-row-col1 text-center">
							<h2><b>ADIDAS</b></h2>
							<img class="r-img text-center" src="images/logoadidas.jpg" title="name" />
							<span><img src="images/obj2.png" title="name" /></span>
							<h4>TOTAL</h4>
							<label>357 PRODUCTS</label>
							<a class="r-list-w" href="muahang.php"><img src="images/list-icon.png" title="list" /></a>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="top-row-col1 text-center">
							<h2><b>BITI'S</b></h2>
							<img class="r-img text-center" src="images/LOGOBITIS.png" title="name" />
							<span><img src="images/obj3.png" title="name" /></span>
							<h4>TOTAL</h4>
							<label>357 PRODUCTS</label>
							<a class="r-list-w" href="muahang.php"><img src="images/list-icon.png" title="list" /></a>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="top-row-col1 text-center">
							<h2><b>ANANAS</b></h2>
							<img class="r-img text-center" src="images/LOGOANANAS.jpg" title="name" />
							<span><img src="images/obj3.png" title="name" /></span>
							<h4>TOTAL</h4>
							<label>357 PRODUCTS</label>
							<a class="r-list-w" href="muahang.php"><img src="images/list-icon.png" title="list" /></a>
						</div>
					</div>
					<vdi class="clearfix"> </div>
				</div>
				<br><br>

				<!---top-row--->
				<div class="container-fluid"> 
				<!----speical-products---->
				<div class="row">
					<?php include 'layout/contentIndex.php'; ?>
					<div class="col-sm-9 padding-right">
						<h2 class="title text-center">Features Items</h2>
						<div class="special-products">										
							<div class="s-products-head">
								<div class="s-products-head-left">
									<h3>SẢN PHẨM HOT</h3>
								</div>
								<div class="clearfix"> </div>
							</div>					
							<!----special-products-grids---->
							<div class="special-products-grids OwlCarousel2">
								<?php 
								$ketqua = mysqli_query($conn,"SELECT * FROM `sanpham` LIMIT 6");
								if(mysqli_num_rows($ketqua) > 0){
									while($row = mysqli_fetch_assoc($ketqua)){   ?>
										<div class="col-md-3 special-products-grid text-center">
											<a class="product-here" href="<?php echo 'muahang.php?idsanpham='.$row['id']; ?>">
												<img src="<?php echo 'admin/'.$row['img'] ?>" title="product-name" /></a>
												<h4><a href="<?php echo 'muahang.php?idsanpham='.$row['id']; ?>"><?php echo $row['tensanpham'] ?></a></h4>
												<a class="product-btn" href="<?php echo 'muahang.php?idsanpham='.$row['id']; ?>"><span>
													<?php echo number_format($row['gia'], 0, ",",".") ?>
												</span><small>GET NOW</small><label> </label></a>
											</div>	
										<?php  } } ?>					
										<div class="clearfix"></div>
									</div>
									<!---//special-products-grids---->
								</div>
								<!---//speical-products---->
								<div class="special-products">
									<div class="s-products-head">
										<div class="s-products-head-left">
											<h3>SẢN PHẨM BÁN CHẠY</h3>
										</div>
										<div class="clearfix"> </div>
									</div>
									<!----special-products-grids---->
									<div class="special-products-grids">
										<?php 
										$sql = "SELECT * FROM `sanpham` LIMIT 6 OFFSET 7";
										$ketqua = mysqli_query($conn,$sql);
										if(mysqli_num_rows($ketqua) > 0){
											while($row = mysqli_fetch_assoc($ketqua)){                 
												?>					
												<div class="col-md-3 special-products-grid text-center">
													<a class="product-here" href="muahang.php">
														<img src="<?php echo 'admin/'.$row['img'] ?>" title="product-name" /></a>
														<h4><a href="muahang.php"><?php echo $row['tensanpham'] ?></a></h4>
														<a class="product-btn" href="muahang.php"><span>
															<?php echo number_format($row['gia']) ?>
														</span><small>GET NOW</small><label> </label></a>
													</div>	
												<?php  } } ?>					
												<div class="clearfix"> </div>
											</div>
											<!---//special-products-grids---->
										</div>
										<div class="special-products">
											<div class="s-products-head">
												<div class="s-products-head-left">
													<h3>SẢN PHẨM THƯỜNG</h3>
												</div>
												<div class="clearfix"> </div>
											</div>
											<!----special-products-grids---->
											<div class="special-products-grids">
												<?php 
												$sql = "SELECT * FROM `sanpham` LIMIT 6 OFFSET 7";
												$ketqua = mysqli_query($conn,$sql);
												if(mysqli_num_rows($ketqua) > 0){
													while($row = mysqli_fetch_assoc($ketqua)){                 
														?>					
														<div class="col-md-3 special-products-grid text-center">
															<a class="product-here" href="muahang.php">
																<img src="<?php echo 'admin/'.$row['img'] ?>" title="product-name" /></a>
																<h4><a href="muahang.php"><?php echo $row['tensanpham'] ?></a></h4>
																<a class="product-btn" href="muahang.php"><span>
																	<?php echo number_format($row['gia']) ?>
																</span><small>GET NOW</small><label> </label></a>
															</div>	
														<?php  } } ?>					
														<div class="clearfix"> </div>
													</div>
													<!---//special-products-grids---->
												</div>
											</div>
										</div>



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
							<!-- <script type="text/javascript">
									$(document).ready(function() {
										$(".").OwlCarousel({
											loop:true;
											autoplay:true;
											autoplayTimeout:1000;
											autoplayHoverpause:true;
										});
										
										$().UItoTop({ easingType: 'easeOutQuart' });
										 										
									});
								</script> -->
							<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
						</div>
					</div>
			<!--//copy-right--->
		</div>
		<!----container---->

	</body>
</html>

