<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		<span style="color:#000000;"><span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;">@import url(https://fonts.googleapis.com/css?family=Lato:300,400,700);
@import url(https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css);
*, *:before, *:after {
  box-sizing: border-box;
}
  
.lighter-text {
  color: #ABB0BE;
}
  
.main-color-text {
  color: #6394F8;
}
  
nav {
  padding: 20px 0 40px 0;
  background: #F8F8F8;
  font-size: 16px;
}
nav .navbar-left {
  float: left;
}
nav .navbar-right {
  float: right;
}
nav ul li {
  display: inline;
  padding-left: 20px;
}
nav ul li a {
  color: #777777;
  text-decoration: none;
}
nav ul li a:hover {
  color: black;
}
  
.container {
  margin: auto;
  width: 80%;
}
  
.badge {
  background-color: #6394F8;
  border-radius: 10px;
  color: white;
  display: inline-block;
  font-size: 12px;
  line-height: 1;
  padding: 3px 7px;
  text-align: center;
  vertical-align: middle;
  white-space: nowrap;
}
  
.shopping-cart {
  margin: 20px 0;
  float: right;
  background: white;
  width: 320px;
  position: relative;
  border-radius: 3px;
  padding: 20px;
}
.shopping-cart .shopping-cart-header {
  border-bottom: 1px solid #E8E8E8;
  padding-bottom: 15px;
}
.shopping-cart .shopping-cart-header .shopping-cart-total {
  float: right;
}
.shopping-cart .shopping-cart-items {
  padding-top: 20px;
}
.shopping-cart .shopping-cart-items li {
  margin-bottom: 18px;
}
.shopping-cart .shopping-cart-items img {
  float: left;
  margin-right: 12px;
}
.shopping-cart .shopping-cart-items .item-name {
  display: block;
  padding-top: 10px;
  font-size: 16px;
}
.shopping-cart .shopping-cart-items .item-price {
  color: #6394F8;
  margin-right: 8px;
}
.shopping-cart .shopping-cart-items .item-quantity {
  color: #ABB0BE;
}
  
.shopping-cart:after {
  bottom: 100%;
  left: 89%;
  border: solid transparent;
  content: " ";
  height: 0;
  width: 0;
  position: absolute;
  pointer-events: none;
  border-bottom-color: white;
  border-width: 8px;
  margin-left: -8px;
}
  
.cart-icon {
  color: #515783;
  font-size: 24px;
  margin-right: 7px;
  float: left;
}
  
.button {
  background: #0099aa;
  color: white;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  display: block;
  border-radius: 3px;
  font-size: 16px;
  margin: 25px 0 15px 0;
}
.button:hover {
  background: #729ef9;
}
  
.clearfix:after {
  content: "";
  display: table;
  clear: both;
}</span></span></span>
	</style>
</head>
<body>
  <div class="shopping-cart" style="display: none">
    <div class="shopping-cart-header">
      <div class="shopping-cart-total">
        <span class="lighter-text">Total:</span>
        <span class="main-color-text">$2,229.97</span>
      </div>
    </div> <!--end shopping-cart-header -->
    <?php
            $total = 0; 
                $sql = "SELECT * FROM dat_hang_details INNER JOIN dat_hang ON dat_hang_details.id_dathang = dat_hang.id INNER JOIN sanpham ON dat_hang_details.id_sanpham = sanpham.id WHERE dat_hang.user_dathang = ".$_SESSION['id'] ;
                $ketqua = mysqli_query($conn,$sql);
                if(mysqli_num_rows($ketqua) > 0){
                  while($row = mysqli_fetch_assoc($ketqua)){ 
                ?>    
    <ul class="shopping-cart-items">
      <li class="clearfix">
        <img src="<?='./admin/'.$row['img']?>" alt="item1" height="50px" width="50px">
        <span class="item-name"><?=$row['tensanpham']?></span>
        <span class="item-price"><?=number_format($row['gia'])?> VNĐ</span>
        <span class="item-quantity">Quantity: <?=$row['soluong']?></span>
      </li>
    </ul>
        <?php 

            } } ?>
    <a href="#" class="button">Xem đơn hàng</a>
  </div> <!--end shopping-cart -->
</div> <!--end container --></span></span></span>
<span style="color:#000000;"><span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;"><script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script>
(function(){
   
  $("#cart").hover(function() {
    $(".shopping-cart").fadeToggle( "fast");
  });
    
})();
</script></span></span></span>
</body>
</html>