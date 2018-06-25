<?php 
include('../php/ketnoidulieu.php');

class quanly extends db
{
	function nhacungcap()
	{
		$sql="Select  * from nhacungcap ";
		$kq= mysql_query($sql);
		return $kq;
	}
	function tintuc()
	{
		$sql="Select  * from tin ";
		$kq= mysql_query($sql);
		return $kq;
	}
	function loaisanpham()
	{
		$sql="Select  * from loaisanpham ";
		$kq= mysql_query($sql);
		return $kq;
	}
	function themsanpham($masp,$Ten,$ncc,$lsp,$mota,$sl,$gia,$hinh,$ngaynhap,$noibat,$sale){
		$sqlinsert="insert into sanpham(MaSP,TenSP,MaNCC,Maloai,Mota,Soluong,Dongia,Hinh,Ngaynhap,Noibat,giamgia) values('$masp','$Ten','$ncc','$lsp','$mota','$sl','$gia','$hinh','$ngaynhap','$noibat','$sale')";
		$kqinsert=mysql_query($sqlinsert);
		return $kqinsert;
	}
	function demsanpham(){
		$sqlproduct="select MaSP from sanpham";
		$resultproduct=mysql_num_rows(mysql_query($sqlproduct));
		return $resultproduct;
	}
	function phantrangsanpham($from,$sotin1trang){
		$sqlproduct="select MaSP,Soluong,Ngaynhap,Dongia,Giamgia,Hinh,TenSP from sanpham order by MaSP limit $from,$sotin1trang";
		$resultproduct=mysql_query($sqlproduct);
		return $resultproduct;
	}
	function xoasanpham($MaSP){
		$sql="delete from sanpham where MaSP='$MaSP' ";
		$result=mysql_query($sql);
		return $result;
	}
	function updatesanpham($masp,$Ten,$ncc,$lsp,$mota,$sl,$gia,$hinh,$ngaynhap,$noibat,$sale){
		$sqlinsert="update sanpham set TenSP='$Ten',MaNCC='$ncc' ,Maloai='$lsp',Mota='$mota',Soluong='$sl',Dongia='$gia',Hinh='$hinh',Ngaynhap='$ngaynhap',Noibat='$noibat',giamgia='$sale' where MaSP='$masp' ";
		$kqinsert=mysql_query($sqlinsert);
		return $kqinsert;
	}
	function sanpham($masp){
		$sql="Select * from sanpham where MaSP='$masp' ";
		$kq=mysql_query($sql);
		return $kq;
	}
	function demdonhang(){
		$sql="select idDH from donhang";
		$result=mysql_num_rows(mysql_query($sql));
		return $result;
	}
	function phantrangdh($from,$sotin1trang){
		$sql="select * from donhang order by idDH desc limit $from,$sotin1trang  ";
		$result=mysql_query($sql);
		return $result;
	}
	
	function dh($id){
		$sql="Select idDH,Ngaydat,Ngaygiao,tennguoinhan,donhang.dienthoai as dt,donhang.diachi as dc,donhang.email as email,ghichu,tinhtrang,user from donhang,khachhang where idDH='$id' and khachhang.Makhachhang=donhang.Makhachhang ";
		$kq=mysql_query($sql);
		return $kq;
	}
	function editorder($id,$ngaygiao,$tinhtrang,$tennguoinhan,$diachi,$dienthoai,$email,$ghichu){
		$sqlmyorder= "update donhang set ngaygiao='$ngaygiao',tinhtrang='$tinhtrang',tennguoinhan='$tennguoinhan',dienthoai='$dienthoai',email='$email',ghichu='$ghichu',diachi='$diachi' where idDH='$id' ";
		$kqmyorder= mysql_query($sqlmyorder);
		return $kqmyorder;
	}
	function detailorder($iddh){
		$sqldt= "Select chitietdonhang.Soluong as soluong,chitietdonhang.Dongia as dongia,Hinh,TenSP,idChiTiet,idDH from chitietdonhang,sanpham where idDH='$iddh' and chitietdonhang.MaSP=sanPham.MaSP";
		$kqdt= mysql_query($sqldt);
		return $kqdt;
	}
	function ctdh($id){
		$sql="Select * from chitietdonhang where idChiTiet='$id' ";
		$kq=mysql_query($sql);
		return $kq;
	}
	function editctdh($id,$MaSP,$Soluong,$Dongia){
		$sqlmyorder= "update chitietdonhang set MaSP='$MaSP',Soluong='$Soluong',dongia='$Dongia' where idChiTiet='$id' ";
		$kqmyorder= mysql_query($sqlmyorder);
		return $kqmyorder;
	}
	function delctdh($id){
		$sql="delete from chitietdonhang where idChiTiet='$id' ";
		$result=mysql_query($sql);
		return $result;
	}
	function deldh($id){
		$sql=" delete a.*, b.* FROM donhang a LEFT JOIN chitietdonhang b ON a.idDH = b.idDH WHERE a.idDH = '$id' ";
		$result=mysql_query($sql);
		return $result;
	}

	function demuser(){
		$sql="select user from khachhang";
		$result=mysql_num_rows(mysql_query($sql));
		return $result;
	}
	function phantranguser($from,$sotin1trang){
		$sql="select * from khachhang order by Makhachhang desc limit $from,$sotin1trang  ";
		$result=mysql_query($sql);
		return $result;
	}
	function user($Makhachhang){
		$sql="select * from khachhang where Makhachhang='$Makhachhang' ";
		$result=mysql_query($sql);
		return $result;
	}
	function edituser($Makhachhang,$Tenkhachhang,$Phai,$Diachi,$Dienthoai,$Matkhau,$Macv,$email){
		$sqlmyorder= "update khachhang set Tenkhachhang='$Tenkhachhang',Diachi='$Diachi',Dienthoai='$Dienthoai',Matkhau='$Matkhau',email='$email',Phai='$Phai' where Makhachhang='$Makhachhang' ";
		 $kqmyorder= mysql_query($sqlmyorder);
		return $kqmyorder;
	}
	function xoauser($id){
		$sql="delete from khachhang where Makhachhang='$id' ";
		$result=mysql_query($sql);
		return $result;
	}
	function insertuser($Ten,$phai,$diachi,$dienthoai,$user,$Matkhau,$email,$Macv){
		$sqlinsert="insert into khachhang(Tenkhachhang,Phai,Diachi,dienthoai,user,Matkhau,email,Macv) values('$Ten','$phai','$diachi','$dienthoai','$user','$Matkhau','$email','$Macv')";
		$kqinsert=mysql_query($sqlinsert);
		return $kqinsert;
	}
	function xoaloaisanpham($ma){
		$sql="delete from loaisanpham where Maloai='$ma' ";
		$result=mysql_query($sql);
		return $result;
	}
	function xoancc($ma){
		$sql="delete from nhacungcap where MaNCC='$ma' ";
		$result=mysql_query($sql);
		return $result;
	}
	function xoatin($ma){
		$sql="delete from tin where MaTin='$ma' ";
		$result=mysql_query($sql);
		return $result;
	}
	function insertlsp($Tenloai){
		$sqlinsert="insert into loaisanpham(Tenloai) values('$Tenloai')";
		$kqinsert=mysql_query($sqlinsert);
		return $kqinsert;
	}
	function showloai($Maloai){
		$sqlmyorder= "select * from loaisanpham where Maloai='$Maloai' ";
		 $kqmyorder= mysql_query($sqlmyorder);
		 return $kqmyorder;
	}
	function editloai($Tenloai,$Maloai){
		$sqlmyorder= "update loaisanpham set Tenloai='$Tenloai' where Maloai='$Maloai' ";
		 $kqmyorder= mysql_query($sqlmyorder);
		return $kqmyorder;
	}
	function masp($ma) {
		$sql= "select MaSP from sanpham where MaSP = '$ma' ";
		$result = mysql_fetch_row(mysql_query($sql));
		return $result;
	}
	function mancc($mancc){
		$sql = "select MaSP from nhacungcap where mancc = '$mancc' ";
		$result = mysql_fetch_row(mysql_query($sql));
		return $result;
	}
	function insertncc($MaNCC,$TenNCC,$Diachi,$Dienthoai,$Email){
		$sqlinsert="insert into nhacungcap(MaNCC,TenNCC,Diachi,Dienthoai,Email) values('$MaNCC','$TenNCC','$Diachi','$Dienthoai','$Email')";
		$kqinsert=mysql_query($sqlinsert);
		return $kqinsert;
	}
	function showncc($Ma){
		$sqlmyorder= "select * from nhacungcap where MaNCC='$Ma' ";
		 $kqmyorder= mysql_query($sqlmyorder);
		 return $kqmyorder;
	}
	function editncc($MaNCC,$TenNCC,$Diachi,$Dienthoai,$Email){
		$sqlmyorder= "update nhacungcap set TenNCC='$TenNCC',Diachi='$Diachi',Dienthoai='$Dienthoai',Email='$Email' where MaNCC='$MaNCC' ";
		 $kqmyorder= mysql_query($sqlmyorder);
		return $kqmyorder;
	}
	function edittin($Ma,$TieuDe,$TomTat,$Hinh,$Noidung,$Ngay){
		$sql = " update tin set TieuDe='$TieuDe',TomTat='$TomTat',Ngay='$Ngay',Noidung='$Noidung' where MaTin='$Ma' ";
		 $kqmyorder= mysql_query($sql);
		 return $kqmyorder;
	}
	function themtin($TieuDe,$TomTat,$Hinh,$Noidung,$Ngay){
		$sqlinsert="insert into tin(TieuDe,TomTat,Hinh,Noidung,Ngay) values('$TieuDe','$TomTat','$Hinh','$Noidung','$Ngay')";
		$kqinsert=mysql_query($sqlinsert);
		return $kqinsert;

	}
	function showtin($Ma){
		$sqlmyorder= "select * from tin where MaTin='$Ma' ";
		 $kqmyorder= mysql_query($sqlmyorder);
		 return $kqmyorder;
	}
	
}