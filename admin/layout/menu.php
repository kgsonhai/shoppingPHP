<?php 
 include "../function/phanquyen.php";
  $regetResult = checkPrivilege(); //kiem tra quyen
  if (empty($_SESSION['username'])) {
    echo "Bạn phải đăng nhập để truy cập chức năng này".'<a href="login.php"> Quay lại trang đăng nhập</a>';
    exit();
  }
 ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

  <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
  <style type="text/css">
    #accordionSidebar{
      background: #2450d0;
    }
  </style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Hi admin <sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
    
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Addons
      </div>


      <li class="nav-item">
        <a class="nav-link" href="../index.php">
          <i class="fas fa-fw fa-home"></i>
          <span>Trang chủ</span></a>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.php">Login</a>
            <a class="collapse-item" href="register.php">Register</a>
            <a class="collapse-item" href="forgot-password.php">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.php">404 Page</a>
          </div>
        </div>
      </li>


      <!-- Nav Item - Tables -->
      <?php if (checkPrivilege('tables.php')){   ?>
      <li class="nav-item">
        <a class="nav-link" href="tables.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Quản lý danh mục</span></a>
      </li>
     <?php } ?>

     <?php if (checkPrivilege('dssanpham.php')){   ?>
      <li class="nav-item">
        <a class="nav-link" href="dssanpham.php">
          <i class="fas fa-fw fa-tasks"></i>
          <span>Quản lý sản phẩm</span></a>
      </li>
     <?php } ?>

     <?php if (checkPrivilege('dssanpham.php')){   ?>
      <li class="nav-item">
        <a class="nav-link" href="maCoupon.php">
          <i class="fas fa-fw fa-book"></i>
          <span>Quản lý mã giảm giá</span></a>
      </li>
     <?php } ?>

     <?php if (checkPrivilege('donhang.php')){   ?>
      <li class="nav-item">
        <a class="nav-link" href="donhang.php">
          <i class="fas fa-fw fa-solar-panel"></i>
          <span>Danh sách đơn hàng</span></a>
      </li>
     <?php } ?>

      <?php if (checkPrivilege('khachhang.php')){   ?>
      <li class="nav-item">
        <a class="nav-link" href="khachhang.php">
          <i class="fas fa-fw fa-user"></i>
          <span>Quản lý người dùng</span></a>
      </li>
        <?php } ?>

        <?php if (checkPrivilege('khachhang.php')){   ?>
      <li class="nav-item">
        <a class="nav-link" href="managerComment.php">
          <i class="fas fa-fw fa-comments"></i>
          <span>Quản lý bình luận</span></a>
      </li>
        <?php } ?>

        <?php if (checkPrivilege('khachhang.php')){   ?>
      <li class="nav-item">
        <a class="nav-link" href="RecommendUser.php">
          <i class="fas fa-fw fa-comments"></i>
          <span>Recommend ý kiến KH</span></a>
      </li>
        <?php } ?>



      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>