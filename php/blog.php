<?php 
include_once('classsanpham.php');
$sp= new sanPham;
$tin=$sp->blog();

?>

<div class="blog-section paddingTB60 ">
	<div class="container">
		<div class="row">
			<div class="site-heading text-center">
				<h3 class="jumbotron jumbotron-sm">Blog GreenLeaf!</h3>
				<div class="border"></div>
			</div>
		</div>
		<div class="row text-center">
			<?php while($rowtin=mysql_fetch_array($tin)){ ?>
			<div class="col-sm-6 col-md-4">
				<div class="blog-box">
					<div class="blog-box-image">
						<img src="<?php echo $url_host ?>img/tintuc/<?php echo $rowtin['Hinh']?>" class="img-responsive" alt="">
					</div>
					<div class="blog-box-content">
						<h4><a href="<?php echo $url_host ?>Blog/<?php echo $rowtin['TinKhongDau']?>.html"><?php echo $rowtin['TieuDe']?></a></h4>
						<p><?php echo substr($rowtin['TomTat'],0,150)."..."; ?></p>
						<a href="<?php echo $url_host ?>Blog/<?php echo $rowtin['TinKhongDau']?>.html" class="btn btn-default site-btn">Đọc thêm</a>
					</div>
				</div>
			</div> <!-- End Col -->					
			<?php } ?>
		</div>
	</div>
</div>