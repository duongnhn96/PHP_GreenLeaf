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
	$MaKH=$rowinfo['Makhachhang'];
	$resultorder = $sp->myorder($MaKH);

}




?> 
<div class="loginform">
	<div class="container khunginfo">
		<div class="row">
			<div class="col-lg-4 col-md-4 hidden-sm hidden-xs">
				<?php include_once('php/infosidebar.php'); ?>

			</div>
			<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
				
				<div class="panel panel-success">

					<div class="panel-heading khungtieude">
						<h1 class="panel-title pull-left " style="font-size:30px;">Đơn hàng đã đặt</h1>
					</div>
				</div>
				<div class="panel panel-success">
					<div class="panel-body">
						<div class="panel panel-default">
							<div class="panel-body">
								<?php
								$n = mysql_num_rows($resultorder);
								if($n==0) echo "<h4 class='text-center'>Không có đơn hàng nào!</h4>";
								else{ ?>
									<table class="table table-striped">
									<thead>
									<tr>
									<th>Mã đơn hàng</th>
									<th>Ngày đặt</th>
									<th>Ngày nhận</th>
									<th>Tình trạng</th>
									<th>Tuỳ chọn</th>
									</tr>
									</thead>
									<tbody>
									<?php

									while($roworder=mysql_fetch_array($resultorder)){ ?>
									<tr>
										<td><?php echo "#".$roworder['idDH'] ?></td>
										<td><?php echo $roworder['ngaydat'] ?></td>
										<td><?php echo $roworder['ngaygiao'] ?></td>
										<td>
											<?php 
											if($roworder['tinhtrang']!=0) echo "Hoàn tất!";
											else echo "Đang xữ lý";		
											?>

										</td>

										<td><a class="btn btn-sm btn-warning" href="<?php echo $url_host ?>Chi-tiet-don-hang-<?php echo $roworder['idDH'] ?>.html" >Xem chi tiết</a></td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
</div>
