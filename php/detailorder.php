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
	
	$MaDH=$_GET['iddh'];
	$resultdetailorder = $sp->detailorder($MaDH);
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
						<h1 class="panel-title pull-left " style="font-size:30px;">Chi tiết đơn hàng #<?php echo $MaDH ?></h1>
					</div>
				</div>
				<div class="panel panel-success">
					<div class="panel-body">
						<div class="panel panel-default">
							<div class="panel-body">
								<?php
								$n = mysql_num_rows($resultdetailorder);
								if($n==0) echo "<h4 class='text-center'>Không có sản phẩm nào!</h4>";
								else{ ?>
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Stt</th>
											<th>Tên sản phẩm</th>
											<th>Hình ảnh</th>
											<th>Số lượng</th>
											<th>Đơn giá</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$i=1;
										$tongtien=0;
										while($rowdetailorder=mysql_fetch_array($resultdetailorder)){
										 ?>
										<tr>
											<td><?php echo $i; ?></td>
											<td><?php echo $rowdetailorder['TenSP'] ?></td>
											<td><img width="40px" height="40px" src="img/sanpham/<?php echo $rowdetailorder['Hinh'];?>" /></td>
											<td><?php echo $rowdetailorder['soluong'] ?></td>
											<td><?php echo number_format($rowdetailorder['dongia'] )."₫";?></td>
											
										</tr>
										<?php
											$tongtien+=$rowdetailorder['dongia'];
											$i++; }
										?>
									</tbody>
									<tfoot>
										<tr>
											<td></td>
											<td></td>
											<td></td>
											<td>Tổng cộng: </td>
											<td><?php echo number_format($tongtien)."₫";?></td>
										</tr>
									</tfoot>
								</table>
								<?php } ?>
								<a href="javascript:history.back()" class="btn btn-warning btn-sm text-left"><i class="fa fa-angle-left"></i> Quay lại</a>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
