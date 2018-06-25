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
else if(!isset($_SESSION['giohang']) && !is_array($_SESSION['giohang'])){
	?>
	<script>
		alert('Giỏ hàng rỗng, mời bạn đặt hàng!');
		location.href="index.php?act=sp";
	</script>
	<?php
}
else {
	$user = $_SESSION['user'];
	$resultinfo= $sp->editinfo($user);
	$rowinfo = mysql_fetch_array($resultinfo);
	$MaKH=$rowinfo['Makhachhang'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$sdt=$_POST['sdt'];
	$save='';
	$ngaygiao=$_POST['ngaygiao'];
	$ngaydat = date('Y-m-d');
	$ghichu=$_POST['ghichu'];
	$address=$_POST['address'];
	if(isset($_POST['save'])){
		$resultorder=$sp->insertorder($MaKH,$name,$address,$sdt,$email,$ngaydat,$ngaygiao,$ghichu);


		if ($resultorder) {
			for($i = 0 ;  $i<count($_SESSION['giohang']);$i++){
				$getiddh=$sp->getiddh();
				$rowiddh=mysql_fetch_array($getiddh);
				$iddh= $rowiddh['idDH'];
				$idsp = $_SESSION['giohang'][$i]['id'];
				$resultgia=$sp->tinhtongtien($idsp);
				$rowtongtien=mysql_fetch_array($resultgia);
				$gia=0;
				if($rowtongtien['GiamGia']!=0){ 
					$gia = ($rowtongtien['Dongia']*(100-$rowtongtien['GiamGia'])/100)*$_SESSION['giohang'][$i]['soluong'];
				}
				else{
					$gia =  $rowtongtien['Dongia']*$_SESSION['giohang'][$i]['soluong'];

				}
				$sl = $_SESSION['giohang'][$i]['soluong'];
				$resultinsert=$sp->insertchitiet($idsp,$sl,$gia,$iddh);
			}
			$save = '<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Đặt hành thành công!</strong> 
			</div> <a href="'.$url_host.'Danh-sach-don-hang.html" class="btn btn-warning text-center"><i class="fa fa-angle-left"></i> Danh sách đơn hàng</a>';
			unset($_SESSION['giohang']);

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

			<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
				<?php echo $save ?>
				<div class="panel panel-success">

					<div class="panel-heading khungtieude">
						<h1 class="panel-title pull-left " style="font-size:30px;">Thông tin đặt hàng</h1>
					</div>
				</div>
				<div class="panel panel-success">
					<div class="panel-body">
						<form class="form-horizontal" method="post"> 
							<label for="name">Họ và tên người nhận</label>
							<input id="name" name="name" type="text" placeholder="" class="form-control" required="" value="<?php if(isset($_POST['save'])){ echo $name;} else {echo $rowinfo['Tenkhachhang']; }?>">


							<label for="email">Địa chỉ email</label>

							<input id="email" name="email" type="text" placeholder="" class="form-control" required="" value="<?php if(isset($_POST['save'])){ echo $email;} else {echo $rowinfo['email']; }?>">
							<div class="alert-danger text-center" id="email_error"></div>
							<label for="address">Địa chỉ</label>

							<input id="address" name="address" type="text" placeholder="" class="form-control" required="" value="<?php if(isset($_POST['save'])){ echo $address;} else {echo $rowinfo['Diachi']; }?>">

							<label for="email">Số điện thoại</label>

							<input id="sdt" name="sdt" type="text" placeholder="" class="form-control" required="" value="<?php if(isset($_POST['save'])){ echo $sdt;} else {echo $rowinfo['Dienthoai']; }?>">
							<div class="alert-danger text-center" id="sdt_error"></div>

							<label for="ngaygiao">Ngày giao</label>
							<div class="form-group">
								<div class="col-xs-5 date">
									<div class="input-group input-append date" id="datePicker">
										<input type="text" class="form-control" id="ngaygiao" name="ngaygiao" required value="<?php echo date('Y-m-d');?> " />
										<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
									</div>
								</div>
							</div>
					



							<label for="ghichu">Ghi chú</label>

							<textarea name="ghichu" id="ghichu" class="form-control" rows="3"><?php if(isset($_POST['save'])){ echo $ghichu;}?></textarea>
							<div class="control-group text-center">
								<label class="control-label" for="button1id"></label>
								<div class="controls">
									<input type="submit" class="btn btn-success btn-lg" name="save" id="save" value="Đặt hàng"/>
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

<script>
	$(document).ready(function() {
		$('#datePicker')
		.datepicker({
			format: 'yyyy-mm-dd'
		})
	});
</script>