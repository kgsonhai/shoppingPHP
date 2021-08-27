<?php 
	session_start();
	include "config/connect.php";

			if(!empty($_POST['logout'])){
				unset($_SESSION['username']);	
				!empty($_POST['logout']=='logout')? header('refresh:0') : "";
			}			
 ?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Brnd-logo Website Template | Details :: w3layouts</title>
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" >
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		 <!-- Custom Theme files -->
		<link href="css/style.css" rel="stylesheet" type="text/css" >
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
						<h1><a href="#">FILTER</a></h1>
						<div class="product-filter-grids"> 
							<div class="col-md-3 product-filter-grid1-brands">
								<h3>BRANDS</h3>
								<ul class="col-md-6 unstyled-list b-list1">
									<li><a href="#">adidas</a></li>
									<li><a href="#">nike</a></li>
									<li><a href="#">camper</a></li>
									<li><a href="#">superga</a></li>
									<li><a href="#">timberland</a></li>
									<li><a href="#">new balance</a></li>
									<li><a href="#">converse</a></li>
									<li><a href="#">puma</a></li>
									<li><a href="#">kinetix</a></li>
									<div class="clearfix"> </div>
								</ul>
								<ul class="col-md-6 unstyled-list b-list2">
									<li><a href="#">tiger</a></li>
									<li><a href="#">lacoste</a></li>
									<li><a href="#">eebok</a></li>
									<li><a href="#">cat</a></li>
									<li><a href="#">dockers</a></li>
									<div class="clearfix"> </div>
								</ul>
								<div class="clearfix"> </div>
							</div>
							<!---->
							<div class="col-md-6 product-filter-grid1-brands-col2">
									<div class="producst-cate-grids">
										<div class="col-md-4 producst-cate-grid text-center">
											<h2>WOMAN</h2>
											<img class="r-img text-center img-responsive" src="images/img-w.jpg" title="name">
											<span><img src="images/objs1.png" title="name"></span>
											<h4>TOTAL</h4>
											<label>357 PRODUCTS</label>
											<a class="r-list-w" href="#"><img src="images/list-icon.png" title="list"></a>
										</div>
										<div class="col-md-4 producst-cate-grid text-center">
											<h2>MAN</h2>
											<img class="r-img text-center img-responsive" src="images/man-r-img.jpg" title="name">
											<span><img src="images/objs2.png" title="name"></span>
											<h4>TOTAL</h4>
											<label>357 PRODUCTS</label>
											<a class="r-list-w" href="#"><img src="images/list-icon.png" title="list"></a>
										</div>
										<div class="col-md-4 producst-cate-grid text-center">
											<h2>KIDS</h2>
											<img class="r-img text-center img-responsive" src="images/kid-r-img.jpg" title="name">
											<span><img src="images/objs3.png" title="name"></span>
											<h4>TOTAL</h4>
											<label>357 PRODUCTS</label>
											<a class="r-list-w" href="#"><img src="images/list-icon.png" title="list"></a>
										</div>
									</div>
							</div>
							<!---->
							<div class="product-filter-grid1-brands-col3">
								<div class="products-colors">
									<h3>SELECT COLOR </h3>
									<li><a href="#"><span class="color1"> </span></a></li>
									<li><a href="#"><span class="color2"> </span></a></li>
									<li><a href="#"><span class="color3"> </span></a></li>
									<li><a href="#"><span class="color4"> </span></a></li>
									<li><a href="#"><span class="color5"> </span></a></li>
									<li><a href="#"><span class="color6"> </span></a></li>
									<li><a href="#"><span class="color7"> </span></a></li>
									<li><a href="#"><span class="color8"> </span></a></li>
									<li><a href="#"><span class="color9"> </span></a></li>
									<li><a href="#"><span class="color10"> </span></a></li>
									<li><a href="#"><span class="color11"> </span></a></li>
									<li><a href="#"><span class="color12"> </span></a></li>
									<li><a href="#"><span class="color13"> </span></a></li>
									<li><a href="#"><span class="color14"> </span></a></li>
									<li><a href="#"><span class="color15"> </span></a></li>
									<li><a href="#"><span class="color16"> </span></a></li>
									<li><a href="#"><span class="color17"> </span></a></li>
									<li><a href="#"><span class="color18"> </span></a></li>
									<li><a href="#"><span class="color19"> </span></a></li>
									<li><a href="#"><span class="color20"> </span></a></li>
									<div class="clearfix"> </div>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
				</div>
				<div class="clearfix"> </div>
				<!-- //products ---->
				<!----product-details--->
				<div class="product-details">
					<div class="container">
					<div class="product-details-row1">
						<div class="product-details-row1-head">
							<h2>Men'sFootwear</h2>
							<p>Hookset Handcrafted Fabric Chukka</p>
						</div>
						<div class="col-md-4 product-details-row1-col1">
							<!----details-product-slider--->
						<!-- Include the Etalage files -->
							<link rel="stylesheet" href="css/etalage.css">
							<script src="js/jquery.etalage.min.js"></script>
						<!-- Include the Etalage files -->
						<script>
								jQuery(document).ready(function($){
					
									$('#etalage').etalage({
										thumb_image_width: 300,
										thumb_image_height: 400,
										source_image_width: 900,
										source_image_height: 1000,
										show_hint: true,
										click_callback: function(image_anchor, instance_id){
											alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
										}
									});
									// This is for the dropdown list example:
									$('.dropdownlist').change(function(){
										etalage_show( $(this).find('option:selected').attr('class') );
									});
		
							});
						</script>
						<!----//details-product-slider--->
						<?php
							              
							 ?>
						<div class="details-left">
							<div class="details-left-slider">
								<ul id="etalage">
									<li>
										<a href="optionallink.php">

				<?php 
					if (isset($_GET['idsanpham'])) { 
							$sql2 = "SELECT * FROM `sanpham` WHERE id = ".$_GET['idsanpham'];
                   			$ketqua2 = mysqli_query($conn,$sql2);
                   			$row2 = mysqli_fetch_assoc($ketqua2);	
                   			?>
						<img class="etalage_thumb_image" src="<?php echo 'admin/'.$row2['img'] ?>" />
						<img class="etalage_source_image" src="<?php echo 'admin/'.$row2['img'] ?>" />

				<?php }else { 
							$sql1 = "SELECT * FROM `sanpham` WHERE id = 40";
                   			$ketqua1 = mysqli_query($conn,$sql1);
                   			$row1 = mysqli_fetch_assoc($ketqua1);
					?>

						<img class="etalage_thumb_image" src="<?php echo 'admin/'.$row1['img'] ?>" />
						<img class="etalage_source_image" src="<?php echo 'admin/'.$row1['img'] ?>" />
				<?php }  ?>		
										</a>
									</li>
									
								</ul>
							</div>
						</div>
					</div>			
					<div class="col-md-8 product-details-row1-col2">
						<form action="giohang.php?action=add" method="POST">
						<?php  
                        $sql = "SELECT * FROM `sanpham` WHERE id = ".$_GET['idsanpham'] ;
                        $ketqua = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($ketqua) > 0){
                            while($row = mysqli_fetch_assoc($ketqua)){                        
                     	?>
						<div class="product-rating">
							<a class="rate" href="#"><span> </span></a>
							<label><a href="#">Read <b>8</b> Reviews</a></label>
						</div>
						<div class="product-price">
							<div class="product-price-left text-right">
								<span>8.174.000</span>
								<h5><?php echo number_format($row['gia'],0,",",".")  ?></h5>
							</div>
							<div class="product-price-right">
								<a href="#"><span> </span></a>
								<label> save <b>40%</b></label>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="product-price-details">
							<p class="text-right">This is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here,e </p>
							<a class="shipping" href="#"><span></span>Free shipping</a>
							<div class="clearfix"> </div>
							<div class="product-size-qty">
								<div class=" pro-qty col-md-6">
									<div style="font-size:12px;font-weight:bold;">
										<?php
											 $disabled = ''; 
              								 $SLsanpham = mysqli_query($conn,"SELECT * FROM `sanpham` WHERE id=".$_GET['idsanpham']);
              								 $SL = mysqli_fetch_assoc($SLsanpham);
              								 if ($SL['SLsanpham']==0) {
              								 	$disabled = 'disabled';
              								 	echo 'Hết hàng';
              								 }else{
              								 	echo 'Còn lại: '.$SL['SLsanpham'].' sản phẩm';
              								 }
										  ?>
									</div>
									<br>
								</div>				
								<div class="pro-qty">
									<span style="font-size:15px;font-weight:bold">Số lượng</span>
									<input type="text" value="1" name="soluong[<?=$row['id']?>]">
								</div> 
								<div class="clearfix"> </div>
							</div>
							<div class="clearfix"> </div>
							<div class="product-cart-share">
									<input type="submit" value="Add to cart" 
									class="btn btn-success" <?=$disabled?>/>
								</div>
								<br><br>
								<ul class="product-share text-right">
									<h3>Share This:</h3>
									<ul>
										<li><a class="share-face" href="#"><span> </span> </a></li>
										<li><a class="share-twitter" href="#"><span> </span> </a></li>
										<li><a class="share-google" href="#"><span> </span> </a></li>
										<li><a class="share-rss" href="#"><span> </span> </a></li>
										<div class="clear"> </div>
									</ul>
								</ul>
							</div>
						</div>
					</div>
				</form>
						<div class="clearfix"> </div>
					<?php } }  ?>
				<!--//product-details--->
				</div>
				<!---- product-details ---->
				<div class="product-tabs container">
					<!--Horizontal Tab-->
				    <div id="horizontalTab">
				        <ul>
				            <li><a href="#tab-1">Product overwiev</a></li>
				            <li><a href="#tab-2">Features</a></li>
				            <li><a href="#tab-3">Customer reviews</a></li>
				        </ul>
				        <div id="tab-1" class="product-complete-info">
				        	<h3>DESCRIPTION:</h3>
				        	<p>With its beautiful premium leather, lace-up oxford styling, recycled rubber outsoles and 9-inch height, this Earthkeepers City Premium style is an undeniably handsome boot. To complement its rustic, commanding outer appearance, we've paid attention to the inside as well - by adding SmartWool® faux shearling to the linings and crafting the footbed using our exclusive anti-fatigue comfort foam technology to absorb shock. Imported.</p>
				       		<span>DETAILS:</span>
				       		<div class="product-fea">
				       			<p>Premium burnished full-grain leather and suede upper</p>
				       			<p>Leather is from a tannery rated Silver for its water, energy and waste-management practices</p>
				       			<p>Leather lining and footbed for a premium feel and optimal comfort</p>
				       			<p>SmartWool® faux shearling lining is made with 60% merino wool and 40% PET</p>
				       			<p>Reflective insole board for additional warmth under foot</p>
				       			<p>100% organic cotton laces</p>
				       			<p>SmartWool® fabric-lined anti-fatigue footbed provides superior, all-day comfort and climate control</p>
				       			<p>Timberland® exclusive Gripstick™ and Green Rubber™ outsole is made with 42% recycled rubber</p>
				       		</div>
				        </div>
				        <div id="tab-2" class="product-complete-info">
				        	<h3>DESCRIPTION:</h3>
				        	<p>With its beautiful premium leather, lace-up oxford styling, recycled rubber outsoles and 9-inch height, this Earthkeepers City Premium style is an undeniably handsome boot. To complement its rustic, commanding outer appearance, we've paid attention to the inside as well - by adding SmartWool® faux shearling to the linings and crafting the footbed using our exclusive anti-fatigue comfort foam technology to absorb shock. Imported.</p>
				       		<p>lace-up oxford styling, recycled rubber outsoles and 9-inch height, this Earthkeepers City Premium style is an undeniably handsome boot. To complement its rustic, commanding outer appearance,</p>
				       		<span>DETAILS:</span>
				       		<div class="product-fea">
				       			<p>Premium burnished full-grain leather and suede upper</p>
				       			<p>Leather is from a tannery rated Silver for its water, energy and waste-management practices</p>
				       			<p>Leather lining and footbed for a premium feel and optimal comfort</p>
				       			<p>SmartWool® faux shearling lining is made with 60% merino wool and 40% PET</p>
				       			<p>Reflective insole board for additional warmth under foot</p>
				       		</div>
				        </div>
				        <div id="tab-3"  class="product-complete-info">
				        	<h3>DESCRIPTION:</h3>
				        	<p>With its beautiful premium leather, lace-up oxford styling, recycled rubber outsoles and 9-inch height, this Earthkeepers City Premium style is an undeniably handsome boot. To complement its rustic, commanding outer appearance, we've paid attention to the inside as well - by adding SmartWool® faux shearling to the linings and crafting the footbed using our exclusive anti-fatigue comfort foam technology to absorb shock. Imported.</p>
				       		<span>DETAILS:</span>
				       		<div class="product-fea">
				       			<p>100% organic cotton laces</p>
				       			<p>SmartWool® fabric-lined anti-fatigue footbed provides superior, all-day comfort and climate control</p>
				       			<p>Timberland® exclusive Gripstick™ and Green Rubber™ outsole is made with 42% recycled rubber</p>
				       			<p>Premium burnished full-grain leather and suede upper</p>
				       			<p>Leather is from a tannery rated Silver for its water, energy and waste-management practices</p>
				       			<p>Leather lining and footbed for a premium feel and optimal comfort</p>
				       			<p>SmartWool® faux shearling lining is made with 60% merino wool and 40% PET</p>
				       			<p>Reflective insole board for additional warmth under foot</p>
				       			<p>100% organic cotton laces</p>
				       			<p>SmartWool® fabric-lined anti-fatigue footbed provides superior, all-day comfort and climate control</p>
				       			<p>Timberland® exclusive Gripstick™ and Green Rubber™ outsole is made with 42% recycled rubber</p>
				       		</div>
				        </div>
				    </div>

				    <hr><hr>

				<div class="table-bordered">
				<div class="container-fluid">	
				   	<h2 class="text-left ">BÌNH LUẬN</h2>
				   	<?php if (isset($_SESSION['username'])) { ?>
				   	<textarea id="ndbinhluan" class="form-control" cols="30" rows="2"></textarea><br>			   
				    <button id="guibinhluan" class="btn btn-primary" onclick="isReply=false;">SEND</button>
						<?php }  ?>
				    <div class="clearfix"></div>				    			
				    	<div id="dsbinhluan">
				    		<?php 
				    		$comment = mysqli_query($conn,"SELECT binhluan.id,binhluan.noidung,user.fullname,binhluan.createdtime FROM binhluan AS binhluan INNER JOIN user AS user ON binhluan.iduser = user.id WHERE idsanpham =".$_GET['idsanpham']);				    		    		
				    		while ($rows = mysqli_fetch_assoc($comment)) {
				    			$replies = mysqli_query($conn,"SELECT * FROM replies INNER JOIN USER ON replies.userid = USER.id INNER JOIN binhluan ON replies.commentID = binhluan.id");
				    		echo '<br><br>';	
				    		echo '<div><span style="font-weight:bold;color:red">'.$rows['fullname'].'</span>:    <span style="font-size:8px">'.$rows['createdtime'].'</span></div>';
				    		echo '<div>'.$rows['noidung'].'</div>';
				    		echo '<a style="color:blue;cursor:pointer;font-weight:bold" data-commentID="'.$rows['id'].'" href="javascript:void(0)" onclick="reply(this)">REPLY</a>';
				    		while ($repliesRow = mysqli_fetch_assoc($replies)) {			
				    					if ($rows['id']==$repliesRow['commentID']) {
				    				echo '<div style="margin-left:20px">'; 
						    		echo '<div><span style="font-weight:bold;color:red">'.$repliesRow['fullname'].'</span>:    <span style="font-size:8px">'.$repliesRow['createdtime'].'</span></div>';
						    		echo '<div>'.$repliesRow['comment'].'</div>';
						    		echo '<a style="color:blue;cursor:pointer;font-weight:bold" data-commentID="'.$repliesRow['id'].'" href="javascript:void(0)" onclick="reply(this)">REPLY</a>';
						    		echo '</div>';		
				    					}
				    						}	
				    	}
				    					    	?>			    	
				    	<?php if (isset($_SESSION['username'])) { ?>
				    		<div class="Replyrow" style="display: none">
					    		<textarea id="replyComment" class="form-control" placeholder="Add reply comment" cols="30" rows="2"></textarea><br>
					    		<button class="btn default text-center" onclick="$('.Replyrow').hide();">Close</button>
					    		<button class="btn btn-primary text-center" onclick="isReply=true;" id="addReply">Add Reply</button>
				    		</div>
				    	<?php }  ?>
				    	</div>	
				    	<div id="comment"></div>			    	
				   </div>
				   </div>

				    <!-- Responsive Tabs JS -->
				  <script type="text/javascript">
				  	var commentID = "";				  	
				  	function reply(caller)
				   	{	

				   		$(".Replyrow").insertAfter($(caller));
				   		$('.Replyrow').show();
						commentID = $(caller).attr('data-commentID');
				   	}
				   	var isReply = false;	
				   	$(document).ready(function() {
				   		$('#guibinhluan,#addReply').click(function(){ 
				   			var txt;
				   			if (!isReply) {
				   				 txt = $("#ndbinhluan").val();
				   			}
				   			else{
				   				 txt = $("#replyComment").val();
				   			}
				    			var url_string = window.location.href;
				    			var url = new URL(url_string);
				    			var idsanpham = url.searchParams.get("idsanpham");
				    			if (txt == "") {
				    				return false;
				    				}
				    		$.post("function/xulybinhluan.php",{
				    			noidung: txt,
				    			commentid:commentID,
				    			idsp: idsanpham,
				    			isreply:isReply,
				    							    			
				    		}, function(result){
				    			if (!isReply) {
				    				$("#comment").prepend('<br>'+result+'<br>');
				    				$("#ndbinhluan").val("");
				    			}else{
				    				commentID = 0;
				    				$("#replyComment").val("");
				    				$(".Replyrow").hide();
				    				$(".Replyrow").parent().next().append(result).css('margin-left','20px');
				    			}				    			
				    			
				    			});				    		
				    		});			    		
				    	});
				    </script>

							  	

				    <script src="js/jquery.responsiveTabs.js" type="text/javascript"></script>			
				    <script type="text/javascript">
				        $(document).ready(function () {
				            $('#horizontalTab').responsiveTabs({
				                rotate: false,
				                startCollapsed: 'accordion',
				                collapsible: 'accordion',
				                setHash: true,
				                disabled: [3,4],
				                activate: function(e, tab) {
				                    $('.info').php('Tab <strong>' + tab.id + '</strong> activated!');
				                }
				            });
				
				            $('#start-rotation').on('click', function() {
				                $('#horizontalTab').responsiveTabs('active');
				            });
				            $('#stop-rotation').on('click', function() {
				                $('#horizontalTab').responsiveTabs('stopRotation');
				            });
				            $('#start-rotation').on('click', function() {
				                $('#horizontalTab').responsiveTabs('active');
				            });
				            $('.select-tab').on('click', function() {
				                $('#horizontalTab').responsiveTabs('activate', $(this).val());
				            });
				
				        });
				    </script>
				</div>
				<!-- //product-details ---->
				</div>
				</div>
			<!----content---->
			<div class="clearfix"> </div>
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

