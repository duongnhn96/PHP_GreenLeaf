<?php
	$act = $_GET['act'];
	$iddh = $_GET['iddh'];
	$idct = $_GET['idct'];
	if($act==""&&$iddh==""&&$idct=="") include('listsanpham.php') ;
	else if ($iddh) {
		include('listchitietdh.php');
	}
	else if($idct) include('editchitietdh.php');
	else if($act=="addsp") include('themsanpham.php');
	else if($act=="listsp") include('listsanpham.php');
	else if($act=="delsp") include('delsp.php');
	else if($act=="editsp") include('editsp.php');
	else if($act=="listdh") include('listdonhang.php');
	else if($act=="detailorder") include('detailorder.php');
	else if($act=="listcart") include('listcart.php');
	else if($act=="deldh") include('deldh.php');
	else if($act=="delctdh") include('delctdh.php');
	else if($act=="editdh") include('editdh.php');
	else if($act=="listuser") include('listuser.php');
	else if($act=="edituser") include('edituser.php');
	else if($act=="adduser") include('themuser.php');
	else if($act=="listloaisp") include('listloaisp.php');
	else if($act=="addlsp") include('themlsp.php');
	else if($act=="delloaisp") include('delloaisp.php');
	else if($act=="editlsp") include('editlsp.php');
	else if($act=="listncc") include('listncc.php');
	else if($act=="editncc") include('editncc.php');
	else if($act=="delncc") include('delncc.php');
	else if($act=="addncc") include('themncc.php');
	else if($act=="addtin") include('addblog.php');
	else if($act=="listblog") include('listblog.php');
	else if($act=="editblog") include('editblog.php');
	else if($act=="deltin") include('deltin.php');


?>