<?php 
include_once('classsanpham.php');
$sp= new sanPham;
if(!isset($_SESSION['user'])){
	?>
	<script>
		alert('Bạn phải đăng nhập trước!');
		location.href="index.php?act=dn";
	</script>
	<?php
}
else {
	$user = $_SESSION['user'];
	$resultinfo= $sp->editinfo($user);
	$rowinfo = mysql_fetch_array($resultinfo);
	$passwordold = $rowinfo['Matkhau'];
	$password=$_POST['password'];
	$old=sha1(md5(md5(addslashes($_POST['old']))));
	$confirm=$_POST['confirm'];

	$save='';
	if(isset($_POST['save'])){
		if ($old == $passwordold ) {
			$passwordin=sha1(md5(md5($password)));
			$resultchangepassword=$sp->changepassword($passwordin,$user);
			$save = '<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Đổi mật khẩu thành công!</strong> 
			</div>';

		} 
		else {
			
			$save = '<div class="alert alert-danger alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Mật khẩu cũ chưa chính xác!</strong> 
			</div>';
			
			
		}
	}
}



?> 
<div class="loginform">
	<div class="container khunginfo">
		<div class="row">
			<div class="col-lg-4 col-md-4 hidden-sm hidden-xs">
				<?php include_once('php/infosidebar.php'); ?>

			</div>
			<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
				<?php echo $save ?>
				<div class="panel panel-success">

					<div class="panel-heading khungtieude">
						<h1 class="panel-title pull-left " style="font-size:30px;">Thay đổi mật khẩu</h1>
					</div>
				</div>
				<div class="panel panel-success">
					<div class="panel-body">
						<form class="form-horizontal" method="post"> 
							<label for="old">Mật khẩu cũ</label>
							<input id="old" name="old" type="password" placeholder="" class="form-control" required="">
							
							<label for="password">Mật khẩu mới</label>

							<input id="password" name="password" type="password" placeholder="" class="form-control" required="" >
							<div class="alert-danger text-center" id="pass_error"></div>

							<label for="confirm">Xác nhận mật khẩu mới</label>

							<input id="confirm" name="confirm" type="password" placeholder="" class="form-control" required="">
							<div class="alert-danger text-center" id="pass_error2"></div>

							<div class="control-group text-center">
								<label class="control-label" for="button1id"></label>
								<div class="controls">
									<input type="submit" class="btn btn-success btn-lg" name="save" id="save" value="Cập nhật" />
									<button id="cancel" name="cancel" class="btn btn-default">Huỷ</button>
								</div>
							</div>

						</form>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>
<script>
	
	$('#password, #confirm').on('keyup', function () {
		
		if ($('#password').val().length > 5) {
				$('#save').removeAttr('disabled');
				$('#pass_error').html('');
			} else {
				$('#pass_error').html('Mật khẩu quá yếu!');
				$('#save').attr({
					"disabled": ''
				});
			}
			if ($('#password').val() == $('#confirm').val()) {
				$('#save').removeAttr('disabled');
				$('#pass_error2').html('');
			} else {
				$('#pass_error2').html('Không khớp!');
				$('#save').attr({
					"disabled": ''
				});
			}
		
	});
	$('#password,#old').on('keyup', function () {
		if ($('#password').val() == $('#old').val()) {
			$('#save').attr({
				"disabled": ''
			});
			$('#pass_error').html('Không được giống mật khẩu cũ!');
		} else {
			$('#pass_error').html('');
			$('#save').removeAttr('disabled');	
			
		}
	});
</script>