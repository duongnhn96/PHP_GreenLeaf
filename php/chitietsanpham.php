<?php

$idsp=$_GET['idsp'];
include_once('classsanpham.php');
$t = new sanPham;
$resultlenhchitiet= $t->hienchitiet($idsp);
$rowchitiet=mysql_fetch_array($resultlenhchitiet);

?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.11&appId=732692213587537';
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="container">
	<div class="card">
		<div class="container-fluid">
			<div class="wrapper row product-item">
				<div class="preview col-md-4 ">

					<div class="preview-pic tab-content">
						<div class="tab-pane active" id="pic-1"><img class="img-circle" src="<?php echo $url_host ?>img/sanpham/<?php echo $rowchitiet['Hinh']?>" /></div>
					</div>		
				</div>
				<div class="details col-md-4">
					<h3 class="product-title"><?php echo $rowchitiet['TenSP']?></h3>
					<div class="rating">
						<div class="stars">
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
						</div>
					</div>
					<p class="product-description"> 
						<?php 
						echo substr($rowchitiet['Mota'], 0, 200)."..." ;
						?>
						
					</p>
					<h4 class="price">Tình trạng: <span>
						<?php $tinhtrang =  $rowchitiet['Soluong'];
						if($tinhtrang>0) {
							echo "Còn hàng!";
						} else echo "Hết hàng!";
						?>

					</span>
				</h4>
				<h4 class="price">Giá bán: <span><?php echo $rowchitiet['Dongia']?></span></h4>
				<h4 class="price">Nhà cung cấp: <span><?php echo $rowchitiet['TenNCC']?></span></h4>

				<div class="">
					<a href="#" class="add-to-cart btn btn-default" id="btn-buy" "><span id="<?php echo $rowchitiet['MaSP'];?>" onclick="xulygiohang2(this)" >Thêm vào giỏ hàng</span></a>							
				</div>
			</div>
		</div>
	</div>
</div> <!--end cart-->
<div class="info">
	<div class="container-fluid">
		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#info">Thông tin sản phẩm</a></li>
			<li><a data-toggle="tab" href="#binhluan">Ý kiến của khách hàng</a></li>
		</ul>

		<div class="tab-content">
			<div id="info" class="tab-pane fade in active">
				<h3><?php echo $rowchitiet['TenSP']?></h3>
				<p><?php echo $rowchitiet['Mota']?></p>
			</div>
			<div id="binhluan" class="tab-pane fade in">
				<div class="fb-comments" data-href="http://greenleaf.com/" data-numposts="5"></div>
			</div>

		</div>
	</div>

</div> <!--end info-->
</div>
<script>
	function xulygiohang2(obj) {
		var MaSP = obj.id;

		$.post("../php/xulyaddcart.php",{'MaSP': MaSP}, function(data){

			setTimeout(function(){
				var cart= $(document).find('.cart-shop');
				var count = parseInt(cart.find('#item-count').data('count'))+1;
				cart.find('#item-count').text('(' + count + ')').data('count',count);
			},1000);

		});
	}
</script>