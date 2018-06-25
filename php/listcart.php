<?php

$masp = $_GET['Masp'];
include_once('classsanpham.php');
$sp = new sanPham;

if(isset($_GET['id'])&&isset($_GET['sl'])){
	// update gio hang
	if($_GET['sl'] >0){
		
		$_SESSION['giohang'][$_GET['id']]['soluong']=$_GET['sl'];

	}
	else{
		// nhap bang 0 : xoa
		unset($_SESSION['giohang'][$_GET['id']]);
	}
}
if(isset($_GET['id'])&&isset($_GET['action'])){
	unset($_SESSION['giohang'][$_GET['id']]);
}
?>



<div class="shopping-cart">

	<div class="container">
		<div class="panel-group">
			<div class="panel panel-success">
				<div class="panel-heading"><h2 class="text-center">Giỏ hàng của bạn</h2></div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-body">
				<table width="550" align="center" class="table table-hover">
					<thead>
						<tr>
							<th width="21">#</th>
							<th width="66">Tên sản phẩm</th>
							<th width="95">Hình ảnh</th>
							<th width="72">Giá</th>

							<th width="76">Số lượng</th>
							<th width="70">Thành tiền</th>
							<th width="70">Tuỳ chỉnh</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$stt = 0;
							 for($i=0;$i<$count=count($_SESSION['giohang']);$i++){ 
							$idsp = $_SESSION['giohang'][$i]['id'];
							if( $_SESSION['giohang'][$i]['soluong']>0){
							$resultaddcart = $sp->addcart($idsp); 
							$rowaddcart = mysql_fetch_array($resultaddcart);
							$stt+=1;
							?>
							<tr>	

								<td><?php echo $stt; ?></td>
								<td><?php echo $rowaddcart['TenSP'] ?></td>
								<td>
									<img src="img/sanpham/<?php echo $rowaddcart['Hinh'] ?>"  class="cart-img"/>

								</td>
								<td >
									<?php 

									if($rowaddcart['GiamGia']!=0){ 
										echo  "<span class='giagoc'>".$rowaddcart['Dongia']."</span><br/>";
										
										echo ($rowaddcart['Dongia']*(100-$rowaddcart['GiamGia'])/100);
										
									}
									else{
										echo  $rowaddcart['Dongia'];
									}
									?>
								</td>
								<td>

									<?php $soluong = $_SESSION['giohang'][$i]['soluong']; ?>
									<label class="soluong">
										<input type="number"  id="sl_<?php echo $i;?>" class="form-control" value="<?php echo $soluong ?>" min="0" max="300" step="1" required="required" name="sl_<?php echo $i;?>" style="max-width: 70px;">
									</label>

									</td>

									<?php 
									if($rowaddcart['GiamGia']!=0){ 
										$thanhtien =($rowaddcart['Dongia']*(100-$rowaddcart['GiamGia'])/100)*$_SESSION['giohang'][$i]['soluong'];

									}
									else{
										$thanhtien =  $rowaddcart['Dongia']*$_SESSION['giohang'][$i]['soluong'];
									}
									?>
									<td><?php echo $thanhtien ?> </td>
									<td class="actions">
										<a href="javascript:void(0)" onclick="updateItem(<?php echo $i?>)" class="btn btn-info btn-sm refresh"><span  class="fas fa-sync"></span></a>
										<a href="javascript:void(0)" onclick="deleteItem(<?php echo $i?>)" class="btn btn-danger btn-sm"><span class="far fa-trash-alt"></span></a>								
									</td>
								</tr>
								<?php } } ?>

							</tbody>
							<tfoot>
								<?php 
								$tongtien = 0;

								$thanhtien=0;
								for($i = 0 ;  $i<count($_SESSION['giohang']);$i++){
									$idsp = $_SESSION['giohang'][$i]['id'];
									$resulttongtien=$sp->tinhtongtien($idsp);
									$rowtongtien=mysql_fetch_array($resulttongtien);
									if($rowtongtien['GiamGia']!=0){ 
										$thanhtien = $thanhtien + ($rowtongtien['Dongia']*(100-$rowtongtien['GiamGia'])/100)*$_SESSION['giohang'][$i]['soluong'];
										$_SESSION['giohang'][$i]['gia']= ($rowtongtien['Dongia']*(100-$rowtongtien['GiamGia'])/100)*$_SESSION['giohang'][$i]['soluong'];

									}
									else{
										$thanhtien = $thanhtien + $rowtongtien['Dongia']*$_SESSION['giohang'][$i]['soluong'];
										$_SESSION['giohang'][$i]['gia']= $rowtongtien['Dongia']*$_SESSION['giohang'][$i]['soluong'];

									}



									$tongtien += $rowtongtien['Dongia']*$_SESSION['giohang'][$i]['soluong'];

								}
								?>
								<tr>
									<td colspan="3"><a href="javascript:history.back()" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a></td>
									<td colspan="2" class="hidden-xs"></td>

									<td colspan="1" class="hidden-xs ">
										<strong>Tổng cộng: <?php echo number_format($tongtien)."₫" ;?> </strong><br/>
										<strong>Giảm giá:   -<?php echo number_format($tongtien-$thanhtien)."₫" ;?> </strong><br/>
										<strong>Thành tiền: <?php echo number_format($thanhtien)."₫" ;?> </strong>

									</td>
									<td colspan="1" class="hidden-xs"><a href="<?php echo $url_host ?>Dat-hang.html" class="btn btn-success btn-block">Đặt hàng <i class="fa fa-angle-right"></i></a></td>
								</tr>
							</tfoot>

						</table>
					</div>
				</div>
			</div>
		</div><!-- /.shoppingcart -->
		<script>
		  function updateItem(id){
		  	var sl = $('#sl_'+id).val();
		  	$.get('index.php?act=listcart',{'id':id,'sl':sl}, function(data) {
		  		location.reload();
		  	});
		  }
		  function deleteItem(id){
		  	$.get('index.php?act=listcart&id='+id+'&action=del', function(data) {
		  		location.reload();
		  	});
		  }
</script>
