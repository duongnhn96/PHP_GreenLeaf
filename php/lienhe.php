<?php
if(isset($_POST['send'])){
    include_once("lib/PHPMailerAutoload.php");
    $mail = new PHPMailer;
    $mail->IsSMTP();
//    $mail->SMTPDebug = 1;
    $mail->Host = "smtp.gmail.com"; 
    $mail->SMTPSecure = 'ssl';  
    $mail->Port = 465; 
    $mail->SMTPAuth   = true; //Xác thực SMTP
    $mail->Username   = "web357ns@gmail.com"; // Tên đăng nhập tài khoản Gmail
    $mail->Password   = "abc123!@#"; //Mật khẩu của gmail
    $mail->setFrom('testweb357@gmai.com', 'Mailer');
    $mail->addAddress($_POST['email'], $_POST['name']);   
    $mail->Subject = $_POST['chude']; 
    $mail->Body    = $_POST['noidung'];
   
    if(!$mail->Send()) {
      echo "Có lỗi khi gửi mail: " . $mail->ErrorInfo;
  } else {
      echo "Đã gửi thư thành công!";
  }
}
?>

<div class="container">
    <div class="jumbotron jumbotron-sm">

        <div class="row">
            <div class="col-sm-10 text-center">
                <h3 class="h1">
                Liên hệ với chúng tôi </h3>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
                <form method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">
                                Tên của bạn</label>
                                <input type="text" class="form-control" id="name" placeholder="Nhập tên" required="required" />
                            </div>
                            <div class="form-group">
                                <label for="email">
                                Địa chỉ email</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Nhập email" required="required" /></div>
                            </div>
                            <div class="form-group">
                               <label for="chude">
                               Chủ đề</label>
                               <input type="text" class="form-control" id="chude" name='chude' placeholder="Nhập chủ đề" required="required" />
                           </div>
                       </div>
                       <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                            Nội dung</label>
                            <textarea name="noidung" id="noidung" class="form-control" rows="9" cols="25" required="required"
                            placeholder="Nội dung"></textarea>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <input value="Gửi thông tin" type="submit" class="btn btn-primary btn-lg pull-right" id="send" name="send">
                    </input>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="col-md-4">
    <form>
        <legend><span class="glyphicon glyphicon-globe"></span>Công ty chúng tôi</legend>
        <address>
            <strong>Công ty GreenLeaf.</strong><br>
            240 Võ Văn Ngân, P.Bình Thọ,<br>
            Thủ Đức, TPHCM (Cổng vào đường Bác Ái)<br>

            Điện thoại:
            0948726712
        </address>
        <address>
            <strong>Nguyễn Hoàn Nam Dương</strong><br>
            <a href="mailto:#">pinosociu@gmail.com</a>
        </address>
    </form>
</div>
</div>
</div>