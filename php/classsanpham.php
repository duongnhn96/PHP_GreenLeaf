<?php 
include('ketnoidulieu.php');

class sanPham extends db
{
	
	function hienchitiet($masp)
	{
		$sqlchitiet="Select MaSP,Soluong,Hinh,Dongia,TenSP,TenNCC,Mota from sanpham,nhacungcap where TenKhongDau='$masp' and  sanpham.MaNCC=nhacungcap.MaNCC ";
		$kqchitiet= mysql_query($sqlchitiet);
		return $kqchitiet;
	}
	function hienchitiettin($ma)
	{
		$sqlchitiet="Select * from tin where TinKhongDau='$ma' ";
		$kqchitiet= mysql_query($sqlchitiet);
		return $kqchitiet;
	}
	function hiensanphammoi(){
		$sqlnewproduct="Select MaSP,Hinh,TenSP,DonGia,GiamGia,TenKhongDau from sanpham order by ngaynhap desc limit 0,8 ";
		$resultnewproduct=mysql_query($sqlnewproduct);
		return $resultnewproduct;
	}
	function hiensanphamhot(){
		$sqlhotproduct="select sanpham.dongia as DonGia,TenKhongDau,GiamGia,Hinh,TenSP,sanpham.MaSP,sum(chitietdonhang.Soluong) as Soluong from sanpham,chitietdonhang where sanpham.masp = chitietdonhang.masp group by tensp,sanpham.masp order by soluong desc limit 0,8";
		$resulthotproduct=mysql_query($sqlhotproduct);
		return $resulthotproduct;
	}
	
	function hiendanhmuc(){
		$lenhdanhmuc = "Select Maloai,Tenloai,Tenloai_KhongDau from loaisanpham";
		$kqdanhmuc = mysql_query($lenhdanhmuc);
		return $kqdanhmuc;
	}
	function hiendanhmuc2(){
		$lenhdanhmuc = "Select Maloai,Tenloai,Tenloai_KhongDau from loaisanpham";
		$kqdanhmuc = mysql_query($lenhdanhmuc);
		return $kqdanhmuc;
	}
	function demsanpham(){
		$sqlproduct="select MaSP from sanpham";
		$resultproduct=mysql_num_rows(mysql_query($sqlproduct));
		return $resultproduct;

	}
	function phantrangsanpham($from,$sotin1trang){
		$sqlproduct="select MaSP, DonGia,GiamGia,Hinh,TenSP,TenKhongDau from sanpham order by MaSP limit $from,$sotin1trang";
		$resultproduct=mysql_query($sqlproduct);
		return $resultproduct;
	}

	function phantrangsanphamtheoloai($Maloai){
		$sqlproduct2="select MaSP, DonGia,GiamGia,Hinh,TenSP,TenKhongDau from sanpham where Maloai ='$Maloai' order by MaSP ";
		$resultproduct2=mysql_query($sqlproduct2);
		return $resultproduct2;
	}
	function checkuser($user,$pass){
		$sqluser = "select Tenkhachhang,user,Macv from khachhang where user='$user' and Matkhau='$pass' ";
		$resultuser = mysql_query($sqluser);
		return $resultuser;
	}
	function checkemail($email){
		$sqlemail = "select email from khachhang where email = '$email' ";
		$resultemail = mysql_fetch_row(mysql_query($sqlemail));
		return $resultemail;
	}
	function checkusername($user){
		$sqluser = "select user from khachhang where user = '$user' ";
		$resultuser = mysql_fetch_row(mysql_query($sqluser));
		return $resultuser;
	}
	function insertuser($Ten,$phai,$diachi,$dienthoai,$user,$Matkhau,$email){
		$sqlinsert="insert into khachhang(Tenkhachhang,Phai,Diachi,dienthoai,user,Matkhau,email) values('$Ten','$phai','$diachi','$dienthoai','$user','$Matkhau','$email')";
		$kqinsert=mysql_query($sqlinsert);
		return $kqinsert;
	}
	function editinfo($user){
		$sqleditinfo="select * from khachhang where user='$user' ";
		$kqeditinfo=mysql_query($sqleditinfo);
		return $kqeditinfo;
	}
	function updateinfo($Ten,$phai,$diachi,$dienthoai,$email,$user){
		$sqlupdateinfo="update khachhang set Tenkhachhang ='$Ten', Phai='$phai',dienthoai='$dienthoai',email='$email',diachi='$diachi' where user='$user' ";
		$resultupdateinfo=mysql_query($sqlupdateinfo);
		return $resultupdateinfo;
	}
	function changepassword($password,$user){
		$sqlchangepass="update khachhang set Matkhau='$password' where user='$user'";
		$resultchangpassword = mysql_query($sqlchangepass);
		return $resultchangpassword;
	}
	function addcart($idsanpham){
		$sqladdcart="select * from sanpham where MaSP='$idsanpham' ";
		$resultaddcart = mysql_query($sqladdcart);
		return $resultaddcart;
	}
	function tinhtongtien($idsanpham){
		$sqltongtien="select Dongia,GiamGia from sanpham where MaSP='$idsanpham' ";
		$resultongtien = mysql_query($sqltongtien);
		return $resultongtien;
	}

	function insertorder($MaKH,$Ten,$diachi,$dienthoai,$email,$ngaydat,$ngaygiao,$ghichu){
		$sqlinsertorder="insert into donhang(Makhachhang,Tennguoinhan,Diachi,dienthoai,email,Ngaydat,Ngaygiao,Ghichu) values('$MaKH','$Ten','$diachi','$dienthoai','$email','$ngaydat','$ngaygiao','$ghichu')";
		$kqinsert=mysql_query($sqlinsertorder);
		return $sqlinsertorder;
	}
	function getiddh(){
		$sqlgetid="Select max(idDH) as idDH from donhang";
		$resultgetid=mysql_query($sqlgetid);
		return $resultgetid;
	}
	function insertchitiet($MaSP,$Soluong,$Dongia,$idDH){
		$sqlinsertchitiet="insert into chitietdonhang(MaSP,Soluong,Dongia,idDH) values('$MaSP','$Soluong','$Dongia','$idDH')";
		$kqinsertchitiet=mysql_query($sqlinsertchitiet);
		return $kqinsertchitiet;
	}
	function myorder($iduser){
		$sqlmyorder= "Select ngaydat,ngaygiao,idDH,tinhtrang from donhang where Makhachhang='$iduser' order by idDH desc";
		$kqmyorder= mysql_query($sqlmyorder);
		return $kqmyorder;
	}
	function detailorder($iddh){
		$sqldt= "Select chitietdonhang.Soluong as soluong,chitietdonhang.Dongia as dongia,Hinh,TenSP from chitietdonhang,sanpham where idDH='$iddh' and chitietdonhang.MaSP=sanPham.MaSP";
		$kqdt= mysql_query($sqldt);
		return $kqdt;
	}
	function blog(){
		$sqlblog="Select * from tin order by MaTin desc ";
		$kqblog=mysql_query($sqlblog);
		return $kqblog;
	}
	function demtimkiem($ten){
		$sqlproduct="select * from sanpham where tensp like '%$ten%' ";
		$resultproduct=mysql_num_rows(mysql_query($sqlproduct));
		return $resultproduct;

	}
	function phantrangtimkiem($from,$sotin1trang,$ten){
		$sqlproduct="select * from sanpham where tensp like '%$ten%' order by MaSP limit $from,$sotin1trang";
		 $resultproduct=mysql_query($sqlproduct);
		return $resultproduct;
	}


}


?>
