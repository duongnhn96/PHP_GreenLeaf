<?php 
include_once("classadmin.php");
$ql= new quanly;


$MaDH=$_GET['iddh'];
$resultdetailorder = $ql->detailorder($MaDH);

?> 
<div class="box">
	<div class="box-header">
		<h2 class="text-center">Chi tiết đơn hàng #<?php echo $MaDH ; ?></h2>                                    
	</div><!-- /.box-header -->
	<div class="box-body table-responsive">

		<?php
		$n = mysql_num_rows($resultdetailorder);
		if($n==0) echo "<h4 class='text-center'>Không có sản phẩm nào!</h4>";
		else{ ?>
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Stt</th>
					<th>Tên sản phẩm</th>
					<th>Hình ảnh</th>
					<th>Số lượng</th>
					<th>Đơn giá</th>
					<th>Tuỳ chỉnh</th>
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
						<td><img width="40px" height="40px" src="../img/sanpham/<?php echo $rowdetailorder['Hinh'];?>" /></td>
						<td><?php echo $rowdetailorder['soluong'] ?></td>
						<td><?php echo $rowdetailorder['dongia'] ?></td>
						<td><a href="index.php?idct=<?php echo $rowdetailorder['idChiTiet'];?>" class="btn btn-info refresh"><span  class="fa fa-fw fa-edit"></span></a>
							<a href="index.php?act=delctdh&id=<?php echo $rowdetailorder['idChiTiet'];?>"  class="btn btn-danger "><span class="fa fa-fw fa-times"></span></a> 
						</td>	
					</tr>
					<?php
					$tongtien+=$rowdetailorder['dongia'];
					$i++; }
					?>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="3">			<a href="javascript:history.back()" class="btn btn-warning btn-sm text-left"><i class="fa fa-angle-left"></i> Quay lại</a></td>
						
						<td>Tổng cộng: </td>
						<td><?php echo $tongtien; ?></td>
					</tr>
				</tfoot>
			</table>
			<?php } ?>

			
		</div>
	</div>
