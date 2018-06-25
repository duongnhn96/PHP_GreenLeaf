<?php 
include_once('classsanpham.php');
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

<div class="loginform">
	<div class="container" id='login'>
		<div class="row text-center main">		
			<div class="main-login main-center">
			<h1 class="title">Đăng nhập</h1>
			<h5>Nếu bạn chưa có tài khoản, vui lòng <a href="<?php echo $url_host ?>Dang-ky.html">Đăng kí </a> . </h5>
			<div class="login-page ">
				<div class="form">
					<form class="login-form" name="form1" method="post" action="">
						<input type="text" placeholder="Tên Đăng Nhập" name='username' value="<?php echo $_POST['username'] ?>"  />
						<input type="password" placeholder="Mật Khẩu" name='password' />
						<p class="mess text-left"><a href="#">Quên Mật Khẩu? </a></p>
						<input class="btn btn-success btn-md btn-block login-button" type="submit" name="dangnhap" value="Đăng nhập" id="reg" />

					</form>
				</div>
			</div>
	</div><!-- /.main-login -->
	</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div><!-- /.loginform -->