<?php mysql_connect("localhost","root","");
	mysql_select_db("greenleaf");
	mysql_query("set names 'utf8'"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

function stripUnicode($str){
  if(!$str) return false;
   $unicode = array(
     'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
     'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
     'd'=>'đ',
     'D'=>'Đ',
	  'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
	  'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
	  'i'=>'í|ì|ỉ|ĩ|ị',	  
	  'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
     'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
	  'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
     'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
	  'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
     'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
     'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
   );
foreach($unicode as $khongdau=>$codau) {
	$arr=explode("|",$codau);
	$str = str_replace($arr,$khongdau,$str);
}
return $str;
}
function changeTitle($str){
		$str = stripUnicode($str);
		$str = str_replace("?","",$str);
		$str = str_replace("&","",$str);
		$str = str_replace("'","",$str);
		$str = str_replace("+","",$str);		
		$str = str_replace(" - "," ",$str);
		$str = trim($str);
		$str = mb_convert_case($str,MB_CASE_TITLE,'utf-8');// MB_CASE_UPPER/MB_CASE_TITLE/MB_CASE_LOWER
		$str = str_replace(" ","-",$str);
		return $str;
	}

function GanBlog_KhongDau(){
	 $sql_add_column ="ALTER TABLE `tin` ADD `TinKhongDau` VARCHAR( 300 ) NOT NULL AFTER `TieuDe` ;";
	 $sp_add_column = mysql_query($sql_add_column);
	$sql = "select MaTin, TieuDe from tin";
	$loaisp = mysql_query($sql);
	while ($row_loaisp = mysql_fetch_assoc($loaisp)){
		$idLoai = $row_loaisp['MaTin'];
		$Ten = $row_loaisp['TieuDe'];
		$Ten_KhongDau = changeTitle($Ten);
		$sql = "update tin set TinKhongDau='{$Ten_KhongDau}' where MaTin='{$idLoai}'";
		mysql_query($sql) or die(mysql_error());
	} //while
}
// function GanTenSP_KhongDau(){
// 	 $sql_add_column ="ALTER TABLE `sanpham` ADD `TenKhongDau` VARCHAR( 300 ) NOT NULL AFTER `TenSP` ;";
// 	 $sp_add_column = mysql_query($sql_add_column);
// 	$sql = "select MaSP, TenSP from sanpham";
// 	$loaisp = mysql_query($sql);
// 	while ($row_loaisp = mysql_fetch_assoc($loaisp)){
// 		$idLoai = $row_loaisp['MaSP'];
// 		$Ten = $row_loaisp['TenSP'];
// 		$Ten_KhongDau = changeTitle($Ten);
// 		$sql = "update sanpham set TenKhongDau='{$Ten_KhongDau}' where MaSP='{$idLoai}'";
// 		mysql_query($sql) or die(mysql_error());
// 	} //while
// }



?>



<?php GanBlog_KhongDau();?>


</body>
</html>