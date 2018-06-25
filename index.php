<?php session_start(); 
$url_host = "http://localhost:8080/greenleaf/";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="keywords" content="Mua thuc pham sach,thuc pham dam bao chat luong,thuc pham sach gia re" />
	<meta name="description" content="Mua thuc pham sach,thuc pham dam bao chat luong,thuc pham sach gia re">
	<meta name="robots" content="index,follow,all">
	<meta name ="language" content="vietnamese"/>
	<meta name="revisit-after" content="1day"/>

	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo $url_host ?>css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo $url_host ?>css/mycss.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo $url_host ?>css/datepicker.css"/>
	<script type="text/javascript" src="<?php echo $url_host ?>js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="<?php echo $url_host ?>js/tether.min.js"></script>
	<script type="text/javascript" src="<?php echo $url_host ?>js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo $url_host ?>fonts/svg-with-js/js/fontawesome-all.min.js"></script>
	<script src="<?php echo $url_host ?>js/jquery.validate.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo $url_host ?>js/bootstrap-datepicker.min.js"></script>



	<title>GreenLeaf - Website cung cấp thực phẩm sạch hàng đầu Việt Nam</title>
</head>
<?php 
ini_set("display_errors",0);
include_once("/config/config.php");

?>
<body>
	<div class="khung">
		<div class="header">
			<div class="topbar">
				<nav class="navbar navbar-inverse">
					<?php 
					if(!isset($_SESSION['user'])) include_once('php/formlogin.php'); 
					else include_once('php/formhello.php');
					?>
				</nav> <!-- thanh nav--> 

				<div class="container">
					
					<div class="row">
						<div class="col-lg-2">
							<img src="<?php echo $url_host ?>img/design/logo.png" alt="Green Leaf" width="130px" height="120px" />
						</div>
						<div class="col-lg-3" id="icontop">
							<div class="icon_top">
								<i class="fas fa-phone"></i>
							</div>
							<div id="text_top">
								<p>Giao hàng miễn phí</p>
								<h5> Với đơn hàng trên 150k</h5>
							</div>
							
						</div>
						<div class="col-lg-3" id="icontop">
							<div class="icon_top">
								<i class="fas fa-exchange-alt"></i>
							</div>
							<div id="text_top">
								<p>Đổi trả miễn phí </p>
								<h5>Trong vòng 2 ngày</h5>
							</div>
							
						</div>
						<div class="col-lg-3" id="icontop">
							<div class="icon_top">
								<i class="far fa-calendar-check"></i>
							</div>
							<div id="text_top">
								<p>Đảm bảo chất lượng</p>
								<h5>Cho tất cả sản phẩm</h5>
							</div>
							
						</div>
					</div>

				</div> <!-- logo -->
				
			</div> <!-- topbar -->
			<div class="mainbar">
				<div class="container">
					<nav class="navbar navbar-inverse">
						<ul class="nav navbar-nav">
							<li class="active" id="itembar">
								<a href="<?php echo $url_host ?>index.php">TRANG CHỦ 	<i class="fab fa-pagelines"></i></a>
							</li>
							<li id="itembar">
								<a href="<?php echo $url_host ?>San-Pham.html">SẢN PHẨM<i class="fab fa-pagelines"></i></a>
							</li>
							<li id="itembar">
								<a href="<?php echo $url_host ?>Blog.html">BLOG ẨM THỰC<i class="fab fa-pagelines"></i></a>
							</li>
							<li id="itembar">
								<a href="<?php echo $url_host ?>Gioi-thieu.html">GIỚI THIỆU <i class="fab fa-pagelines"></i></a>
							</li>
							<li id="itembar">
								<a href="<?php echo $url_host ?>Lien-he.html">LIÊN HỆ <i class="fab fa-pagelines"></i></a>
							</li>
						</ul>
						<ul class="nav navbar-nav navbar-right noborder">

							<li id="itembar3">
								<form action="<?php echo $url_host ?>index.php?act=tim" menthod="GET"  class="navbar-form">
									<div class="input-group">
										<input type="hidden" name="act" value="tim" />
										<input type="text" class="form-control" placeholder="Nhập sản phẩm cần tìm" name="tukhoa" id="searchtext">
										<div class="input-group-btn">
											<button type="submit" id="search" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
										</div>
									</div>
								</form>								
							</li>
							<li id="itembar2" class="cart-shop" >
								<a href="<?php echo $url_host ?>Gio-hang.html"><i class="fas fa-cart-plus"></i>
									<span id="item-count" data-count="<?php echo count($_SESSION['giohang']); ?>"> (<?php if(isset( $_SESSION['giohang'])) echo count($_SESSION['giohang']); else echo 0;?>) </span>
								</a>
							</li>
						</ul>

					</nav>
				</div>
			</div> <!-- mainbar -->


		</div><!-- header -->
		<div class="content">
			<div class="sankhau">
				<div class="home_slide">
					<?php include('php/sankhau.php'); ?>
				</div>


			</div> <!--SanKhau-->
		</div> <!-- content -->
		<div class="footer">

			<?php
			
			include('php/footer_home.php'); ?>
		</div><!-- footer -->
	</div>
	<!-- load page -->

	<script>
		$('#formtimkiem').submit(function() {
			if ($.trim($("#searchtext").val()) === "") {
				alert('Bạn chưa nhập từ khoá cần tìm!');
				return false;
			}
		});
		$(document).ready(function(){
		  // Add smooth scrolling to all links in navbar + footer link
		  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
		  	
		  	if (this.hash !== "") {
		  		event.preventDefault();
		  		var hash = this.hash;
		  		$('html, body').animate({
		  			scrollTop: $(hash).offset().top
		  		}, 900, function(){
		  			window.location.hash = hash;
		  		});
		  	}
		  });
		  
		  $(window).scroll(function() {
		  	$(".slideanim").each(function(){
		  		var pos = $(this).offset().top;
		  		var winTop = $(window).scrollTop();
		  		if (pos < winTop + 600) {
		  			$(this).addClass("slide_home");
		  		}
		  	});
		  });
		})
	</script>
	<!-- giohang -->
	<script>
		$(document).on('click','#btn-buy',function(e){
			e.preventDefault();
			if ($(this).hasClass('disable')) {
				return false;
			}
			$(document).find('#btn-buy').addClass('disable');

			var parent = $(this).parents(".product-item");
			var cart= $(document).find('.cart-shop');
			var src=parent.find('img').attr('src');

			var partop= parent.offset().top;
			var parleft= parent.offset().left;
			$('<img />',{
				class: 'img-fly',
				src: src

			}).appendTo('body').css({
				'top': partop,
				'left': parseInt(parleft) + parseInt(parent.width()) - 20
			});
    setTimeout(function(){ // doi vi tri
    	$(document).find('.img-fly').css({
    		'top': cart.offset().top,
    		'left': cart.offset().left,
    	});
    	setTimeout(function(){
    		$(document).find('.img-fly').remove();

    		$(document).find('#btn-buy').removeClass('disable');
    	},500);
    },500);
});
		function xulygiohang(obj) {
			var MaSP = obj.id;

			$.post("php/xulyaddcart.php",{'MaSP': MaSP}, function(data){

				setTimeout(function(){
					var cart= $(document).find('.cart-shop');
					var count = parseInt(cart.find('#item-count').data('count'))+1;
					cart.find('#item-count').text('(' + count + ')').data('count',count);
				},1000);

			});
		}
	</script>
	<!-- end giohang -->

</body>
</html>
