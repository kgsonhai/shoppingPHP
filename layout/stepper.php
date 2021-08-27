
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

</head>
<body>

  <!-- Steps form -->
<div class="card">
    <div class="card-body mb-4">

        <h2 class="text-center font-weight-bold pt-4 pb-5"><strong>Trạng thái đơn hàng</strong></h2>

        <!-- Stepper -->
        <div class="steps-form">
            <div class="steps-row setup-panel">
              <?php 
                  include "config/connect.php";
                  
                  $ketqua1 = mysqli_query($conn,"SELECT * FROM dat_hang WHERE user_dathang=".$_SESSION['id']);
                    $row1 = mysqli_fetch_assoc($ketqua1);
                  $ketqua2 = mysqli_query($conn,"SELECT * FROM tinhtrang_donhang");
                  $num = 1;
                    while ($row2 = mysqli_fetch_assoc($ketqua2)) {
                        $btn = 'btn btn-default';
                        $style = '';
                      if ($row2['id']==$row1['status']) {
                        $btn = 'btn btn-danger';
                        $style = 'bold';
                      }
                ?>
                <div class="steps-step">
                    <a href="#step-<?=$row2['status']?>" type="button" 
                      class="<?=$btn?> btn-circle">
                      <?=$num++?>                   
                    </a>
                    <p style="font-weight:<?=$style?>"><?=$row2['tinhtrang']?></p>
                </div>
              <?php } ?>
            </div>
        </div>


    </div>
</div>
<!-- Steps form -->

</body>
</html>