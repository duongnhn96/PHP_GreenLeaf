<?php 
include_once('../php/classsanpham.php');
$t = new sanPham;
if(isset($_POST['username'])&&isset($_POST['password'])){
	$user = mysql_real_escape_string($_POST['username']);
	$pass =sha1(md5(md5(addslashes($_POST['password']))));
	$resultuser= $t->checkuser($user,$pass);
	$n=mysql_num_rows($resultuser);
	if($n==0){
		?>
		<script>
			alert('Tên đăng nhập hoặc mật khẩu chưa đúng!');
		</script>
		<?php	
	}
	else {

		$rowuser=mysql_fetch_array($resultuser);	
		$_SESSION['user']=$rowuser['user'];
		$_SESSION['Tenkhachhang']=$rowuser['Tenkhachhang'];
		$_SESSION['Macv']=$rowuser['Macv'];


		?>
		<script>
			alert('Đăng nhập thành công!');
			location.href='index.php';
		</script>
		<?php
	}



}

?> 



<div class="backg">
	<div class="container form-box" id="login-box">
		<div class="header">Sign In</div>
		<div class="body bg-gray">
			<img id="profile-img" class="profile-img-card" src="../img/design/avatar_2x.png" />
			
			<form class="login-form" name="form1" method="post" action="">
				<div class="form-group">
				<input type="text" class="form-control" placeholder="Tên Đăng Nhập" name='username' value="<?php echo $_POST['username'] ?>" required autofocus />
				</div>
				<div class="form-group">
				<input type="password" class="form-control" placeholder="Mật Khẩu" name='password' required/>
				</div>
				<div class="form-group">
				<input class="btn btn-lg  bg-olive btn-block btn-signin" type="submit" name="dangnhap" value="Đăng nhập" id="reg" />
			</div>
			</form><!-- /form -->
           <!--  <a href="#" class="forgot-password">
                Forgot the password?
            </a> -->
        </div><!-- /card-container -->
    </div><!-- /container -->

</div><!-- /.backg -->
