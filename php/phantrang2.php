<?php
include_once('classsanpham.php');
$sotin1trang=12;
if(!$_GET['trang']) $trang = 1;
else $trang = $_GET['trang'];
settype($trang, 'int');
$from = ($trang-1)*$sotin1trang;
$sp = new sanPham;
$resultdanhmuc2 = $sp->hiendanhmuc2();
$tongsptheoloai = $sp->demsanphamtheoloai();
$sotrangtheoloai= ceil($tongsptheoloai/$sotin1trang);
	
	while($rowdanhmuc2 = mysql_fetch_array($resultdanhmuc2)){ 
						echo $rowdanhmuc2["Tenloai"]."<br/>";	
	$Maloai = $rowdanhmuc2["Maloai"];
	$resulttheoloai = $sp->phantrangsanphamtheoloai($from,$sotin1trang,$Maloai);
	while($rowd= mysql_fetch_array($resulttheoloai)){
		echo $rowd["Hinh"];
	} 
	}
?>