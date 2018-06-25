<?php

include_once("classadmin.php");
$sp= new quanly;

$name=$_POST['name'];
$username=$_POST['username'];
$email=$_POST['email'];
$phai=$_POST['phai'];
$password=sha1(md5(md5($_POST['password'])));
$confirm=$_POST['confirm'];
$sdt=$_POST['sdt'];
$address=$_POST['address'];
$Macv=$_POST['Macv'];

if (isset($_POST['dangky'])) {
	$resultreg=$sp->insertuser($name,$phai,$address,$sdt,$username,$password,$email,$Macv);

	if($resultreg){
		?>		<script>
			alert('Tạo thành công!');
			window.history.back();
		</script>
		<?php	
	} else { 
		?>  	<script>
			alert('Tạo không thành công!');
			window.history.back();
		</script>
		<?php
	} 
}
?>
<aside class="right-side">
	<!-- Content Header (Page header) -->


	<!-- Main content -->
	<section class="content">
		<div class="row col-sm-9 text-center">

			<!-- right column -->

			<!-- general form elements disabled -->
			<div class="box box-warning">
				<div class="box-header">
					<div class="box-header">
						<h3 class="text-center">Thêm khách hàng</h3>
					</div><!-- /.box-header -->
					<div class="box-body" style="padding-left: 100px;">

						<form class="form-horizontal" method="post" name="dangki" id="dangki" action="">
							<div class="col-sm-9">
								<div class="form-group">

									<div class="cols-sm-8">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
											<input type="text" class="form-control" name="username" id="username"  maxlength="15" placeholder="Nhập tên tài khoản" required  onblur="checkUser(this.value)" value="<?php echo $_POST['username'];    ?>"/>
										</div>

									</div>
									<div class="alert-danger text-center" id="user_error"></div>
								</div>
								<div class="form-group">

									<div class="cols-sm-8">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
											<input type="text" class="form-control" name="name" id="name"  placeholder="Nhập tên của bạn" value="<?php echo $_POST['name'];    ?>" required/>
										</div>
										<div class="name_error"></div>
									</div>
								</div>
								<div class="form-group gioitinh">
									<div class="cols-sm-8">
										<div class="input-group">
											<label class="radi1"><span class="fas fa-transgender"></span></label>
											<?php if(isset($_POST['phai'])==1) { ?>
											<label class="radi"><input type="radio" name="phai" value="1" checked>Nam</label>
											<label class="radi"><input type="radio" name="phai" value="0">Nữ</label>
											<?php } else { ?> 
											<label class="radi"><input type="radio" name="phai" value="1">Nam</label>
											<label class="radi"><input type="radio" name="phai" value="0" checked>Nữ</label>	
											<?php } ?>

										</div>

									</div>
								</div>
								<div class="form-group Macv">
									<div class="cols-sm-8">
										<div class="input-group">
											<label class="radi1"><span class="fas fa-transgender"></span></label>
											<?php if(isset($_POST['Macv'])==1) { ?>
											<label class="radi"><input type="radio" name="Macv" value="1" checked>Admin</label>
											<label class="radi"><input type="radio" name="Macv" value="0">Khách hàng</label>
											<?php } else { ?> 
											<label class="radi"><input type="radio" name="Macv" value="1">Admin</label>
											<label class="radi"><input type="radio" name="Macv" value="0" checked>Khách hàng</label>	
											<?php } ?>

										</div>

									</div>
								</div>

								<div class="form-group">

									<div class="cols-sm-8">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
											<input type="email" class="form-control" name="email" id="email"  placeholder="Nhập địa chỉ email" required onblur="checkEmail(this.value)" value="<?php echo $_POST['email'];    ?>" />

										</div>


										<div class="alert-danger text-center" id="email_error"></div>
									</div>
								</div>
								<div class="form-group">

									<div class="cols-sm-8">
										<div class="input-group">
											<span class="input-group-addon"><i class="fas fa-phone" aria-hidden="true"></i></span>
											<input type="tel" class="form-control" name="sdt" id="sdt"  placeholder="Nhập số điện thoại" required value="<?php echo $_POST['sdt'];    ?>"  maxlength="13"  minlength="10" />
										</div>
										<div class="alert-danger text-center" id="sdt_error"></div>
									</div>
								</div>
								<div class="form-group">

									<div class="cols-sm-8">
										<div class="input-group">
											<span class="input-group-addon"><i class="fas fa-address-card" aria-hidden="true"></i></span>
											<input type="text" class="form-control" name="address" id="address"  placeholder="Nhập địa chỉ" required value="<?php echo $_POST['address'];    ?>"/>
										</div>
										<div class="addr_error"></div>
									</div>
								</div>


								<div class="form-group">

									<div class="cols-sm-8">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
											<input type="password" class="form-control" name="password" id="password"  placeholder="Nhập mật khẩu" required/>
										</div>
										<div class="alert-danger text-center" id="pass_error"></div>
									</div>
								</div>

								<div class="form-group">

									<div class="cols-sm-8">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
											<input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Xác nhận mật khẩu" required/>
										</div>
										<div class="alert-danger text-center" id="pass_error2"></div>
									</div>
								</div>

								<div class="form-group ">
									<input class="btn btn-success btn-lg btn-block login-button" type="submit" name="dangky" value="Tạo" id="reg" />
								</div>
							</div>

						</form>
					</div><!--/.col (right) -->
				</div>
			</div>
		</div>   <!-- /.row -->
	</section><!-- /.content -->
</aside><!-- /.right-side -->			<script type="text/javascript">
	function checkEmail(email){
		$.post('../php/checkmail.php', {'email': email}, function(data) {
			if(data=="true"){
				$("#email_error").text("email đã tồn tại");
				$('#reg').attr({
					"disabled": ''
				});

			}
			else{ $("#email_error").text("");
			$('#reg').removeAttr('disabled');
		}
	});
	}
	function checkUser(username){
		$.post('../php/checkuser.php', {'username': username}, function(data) {
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
	$('#sdt').on('keyup change', function () {
		$("#sdt").val($(this).val().split(' ').join(''));
		if ($('#sdt').val().match(/([0-9])/)) {
			$('#reg').removeAttr('disabled');
			$('#sdt_error').html('');
		} else {
			$('#sdt_error').html('Số điện chưa đúng!');
			$('#reg').attr({
				"disabled": ''
			});
		}
	});
</script>
