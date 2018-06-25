<?php
include_once("classsanpham.php");
$sp= new sanPham;
$username=$_POST['username'];
$password=sha1(md5(md5($_POST['password'])));
$confirm=$_POST['confirm'];


if (isset($_POST['dangky'])) {
	$resultreg=$sp->insertuser($username,$password);

	if($resultreg){
		?>		<script>
			alert('Đăng ký thành công!');
			location.href='index.php?act=dn';
		</script>
		<?php	
	} else { 
		?>  	<script>
			alert('Đăng ký không thành công!');
			location.href='index.php?act=dn';
		</script>
		<?php
	} 
}
?>
<div class="loginform">
	<div class="container">
		<div class="row main">
			<div class="main-login main-center">
				<h1 class="title text-center">Đăng kí thành viên</h1>

				<form class="form-horizontal" method="post" name="dangki" id="dangki" action="">


					<div class="form-group">

						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="username" id="username"  maxlength="15" placeholder="Nhập tên tài khoản" required  onblur="checkUser(this.value)" value="<?php echo $_POST['username'];    ?>"/>
							</div>

						</div>
						<div class="alert-danger text-center" id="user_error"></div>
					</div>
					
					<div class="form-group">

						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
								<input type="password" class="form-control" name="password" id="password"  placeholder="Nhập mật khẩu" required/>
							</div>
							<div class="alert-danger text-center" id="pass_error"></div>
						</div>
					</div>

					<div class="form-group">

						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
								<input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Xác nhận mật khẩu" required/>
							</div>
							<div class="alert-danger text-center" id="pass_error2"></div>
						</div>
					</div>

					<div class="form-group ">
						<input class="btn btn-success btn-lg btn-block login-button" type="submit" name="dangky" value="Đăng kí" id="reg" />
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">

	function checkUser(username){
		$.post('php/checkuser.php', {'username': username}, function(data) {
			if(data=="true"){
				$("#user_error").text("Tên tài khoản đã tồn tại");
				$('#reg').attr({
					"disabled": ''
				});

			}
			else{ $("#user_error").text("");
			$('#reg').removeAttr('disabled');
		}
	});
	}
	$('#username').on('keyup change', function () {
		$("#username").val($(this).val().split(' ').join(''));
	});
	$('#password, #confirm').on('keyup', function () {
		if ($('#password').val().length > 5) {
			$('#reg').removeAttr('disabled');
			$('#pass_error').html('');
		} else {
			$('#pass_error').html('Mật khẩu quá yếu!');
			$('#reg').attr({
				"disabled": ''
			});
		}
		if ($('#password').val() == $('#confirm').val()) {
			$('#reg').removeAttr('disabled');
			$('#pass_error2').html('');
		} else {
			$('#pass_error2').html('Không khớp!');
			$('#reg').attr({
				"disabled": ''
			});
		}
	});
	
</script>
