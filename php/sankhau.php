<?php
	$act = $_GET['act'];
	$idsp = $_GET['idsp'];
	$idtin = $_GET['idtin'];

	if($act==""&&$idsp==""&&$idtin=='') include('slider.php');
	else if ($idsp) {
		include('chitietsanpham.php');
	}
	else if ($idtin) {
		include('chitiettin.php');
	}
	else if($act=="dn") include('login.php');
	else if($act=="dk") include('register.php');
	else if($act=="info") include('thongtintaikhoan.php');
	else if($act=="changepass") include('changepassword.php');
	else if($act=="myorder") include('myorder.php');
	else if($act=="detailorder") include('detailorder.php');
	else if($act=="listcart") include('listcart.php');
	else if($act=="gioithieu") include('gioithieu.php');
	else if($act=="checkout") include('thongtindathang.php');
	else if($act=="lienhe") include('lienhe.php');
	else if($act=="sp") include('sanpham.php');
	else if($act=="blog") include('blog.php');
	else if($act=="tim") include('timkiem.php');

?>