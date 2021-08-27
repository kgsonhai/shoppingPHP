<?php 
  session_start();
  ob_start();
 ?>
  <?php 
        include "../config/connect.php";
        $username = $password = $err ="";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
          $username = $_POST["username"];
          $password = $_POST["password"];
        if(!empty($username) && !empty($password)){
          $sql = "SELECT * FROM `user` WHERE username='$username' AND password=md5($password)";
          $ketqua = mysqli_query($conn,$sql);
        if (mysqli_num_rows($ketqua) > 0){
          $row = mysqli_fetch_array($ketqua);                   
          $userPrivilege = mysqli_query($conn,"SELECT * FROM `user_privillege`INNER JOIN `privillege` ON user_privillege.privillege_id = privillege.id WHERE user_privillege.user_id=".$row['id']);          
          $userPrivilege = mysqli_fetch_all($userPrivilege,MYSQLI_ASSOC);
          if (!empty($userPrivilege)) {
            foreach ($userPrivilege as $value) {
              $row['privilege'] = array();
              foreach ($userPrivilege as $privilege) {
                $row['privilege'][] = $privilege['url_match'];
              }    
            }
          }
  //         $row['privilege'] = array(
  //             "index\.php$",
  //             "login\.php$",
  //             "register\.php$",
  //             "charts\.php$",
  //             "tables\.php$",
  //             "themdanhmuc\.php$",
  //             "suadanhmuc\.php\?iddanhmuc=\d+$",
  //             "xoadanhmuc\.php\?iddanhmuc=\d+$",
  //             "phanloaigiay\.php\?idsphot=\d+&iddanhmuc=\d+$",
  //             "sanpham\.php\?iddanhmuc=\d+$",
  //             "themsanpham\.php$",
  //             "themsanpham\.php\?iddanhmuc=\d+$",
  //             "suasanpham.php\?idsp=\d+$",
  //             "xoasanpham.php\?idsp=\d+$",
  //             "khachhang\.php$",
  //             "themuser\.php$",
  //             "suauser\.php\?iduser=\d+$",
  //             "xoauser\.php\?iduser=\d+$"
    
  // );        
              $_SESSION['name'] = $row['fullname'];
              $_SESSION['username'] = $row;
              $_SESSION['id'] = $row['id'];
              }
              header('location:index.php');    
          }
        else{
          $err =  "No isset username of password";
            }

      }
     ?>
     <?php 
        if (!empty($_SESSION['username'])) {
          header('location:index.php');
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

  <title>SB Admin 2 - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form class="user" action="login.php" method="POST">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" placeholder="Username" name="username">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" placeholder="Password" name="password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <input type="submit" value="Login" class="btn btn-primary btn-user btn-block"><br>
                     <?php echo $err;?>
                    </a>
                    <hr>
                    <a href="index.php" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="index.php" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.php">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.php">Create an Account!</a>                    
                  </div>
                 
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
<?php
ob_end_flush();
?>

