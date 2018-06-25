<?php 
include_once('classsanpham.php');
$sp= new sanPham;
if(!isset($_SESSION['user'])){
	?>
	<script>
		alert('Bạn phải đăng nhập trước!');
		location.href="<?php echo $url_host ?>Dang-nhap.html";
	</script>
	<?php
}
else {
	$user = $_SESSION['user'];
	$resultinfo= $sp->editinfo($user);
	$rowinfo = mysql_fetch_array($resultinfo);
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phai=$_POST['phai'];
	$sdt=$_POST['sdt'];
	$save='';
	$address=$_POST['address'];
	if(isset($_POST['save'])){
		$resultupdate=$sp->updateinfo($name,$phai,$address,$sdt,$email,$user);

		if ($resultupdate) {
			$save = '<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Thành công!</strong> 
			</div>';	
		} else {

			$save = '<div class="alert alert-danger alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Thất bại!</strong> 
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
						<h1 class="panel-title pull-left " style="font-size:30px;">Thông tin tài khoản</h1>
					</div>
				</div>
				<div class="panel panel-success">
					<div class="panel-body">
						<form class="form-horizontal" method="post"> 
							<label for="name">Họ và tên</label>
							<input id="name" name="name" type="text" placeholder="" class="form-control" required="" value="<?php if(isset($_POST['save'])){ echo $name;} else {echo $rowinfo['Tenkhachhang']; }?>">
							<div class="input-group">
								<label class="radi1"><span class="fas fa-transgender"></span></label>

								<?php if($rowinfo['Phai']==1) { ?>
								<label class="radi"><input type="radio" name="phai" value="1" checked>Nam</label>
								<label class="radi"><input type="radio" name="phai" value="0">Nữ</label>
								<?php } else { ?> 
								<label class="radi"><input type="radio" name="phai" value="1">Nam</label>
								<label class="radi"><input type="radio" name="phai" value="0" checked>Nữ</label>	
								<?php } ?>

							</div>

							<label for="email">Địa chỉ email</label>

							<input id="email" name="email" type="text" placeholder="" class="form-control" required="" value="<?php if(isset($_POST['save'])){ echo $email;} else {echo $rowinfo['email']; }?>" onblur="checkEmail(this.value)">
							<div class="alert-danger text-center" id="email_error"></div>
							<label for="email">Địa chỉ</label>

							<input id="address" name="address" type="text" placeholder="" class="form-control" required="" value="<?php if(isset($_POST['save'])){ echo $address;} else {echo $rowinfo['Diachi']; }?>">

							<label for="email">Số điện thoại</label>

							<input id="sdt" name="sdt" type="text" placeholder="" class="form-control" required="" value="<?php if(isset($_POST['save'])){ echo $sdt;} else {echo $rowinfo['Dienthoai']; }?>">
							<div class="alert-danger text-center" id="sdt_error"></div>
							<div class="control-group text-center">
								<label class="control-label" for="button1id"></label>
								<div class="controls">
									<input type="submit" class="btn btn-success btn-lg" name="save" id="save" value="Cập nhật"/>
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
	function checkEmail(email){
		$.post('php/checkmail.php', {'email': email}, function(data) {
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
	$('#sdt').on('keyup', function () {
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