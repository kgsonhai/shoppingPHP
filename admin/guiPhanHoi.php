<?php 
  session_start();
  include "../config/connect.php";

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

      if (isset($_GET['iduser'])) {

          $result = mysqli_query($conn,"SELECT * FROM `contact_reply` WHERE id=".$_GET['iduser']);
          $row = mysqli_fetch_assoc($result);


          require "../storage/PHPMailer-master/src/PHPMailer.php";
          require "../storage/PHPMailer-master/src/Exception.php";
          require "../storage/PHPMailer-master/src/OAuth.php";
          require "../storage/PHPMailer-master/src/POP3.php";
          require "../storage/PHPMailer-master/src/SMTP.php";


          $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
          try {
        //Server settings
        $mail->SMTPDebug = 0;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'kgsonhai@gmail.com';                 // SMTP username
        $mail->Password = 'sonhai123456789';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
        $mail->CharSet = 'UTF-8';
        //Recipients
        $mail->setFrom('kgsonhai@gmail.com', 'Julio-Store');
        $mail->addAddress('nshai.19it1@vku.udn.vn', 'Đơn hàng');     // Add a
        $mail->addReplyTo('kgsonhai@gmail.com', 'Information');
  

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Gửi Phản hồi tới khách hàng';
        $mail->Body    = 'Nội dung phản hồi: '.$row['contentReply'].'Cảm ơn về đóng góp ý kiến của bạn.Thân ái!';
        

        $mail->send();
        echo 'Gửi mail thành công.'.'<a href="RecommendUser.php">Quay lại</a>';
      } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
      }
    }

 ?>
