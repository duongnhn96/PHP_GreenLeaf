<?php
include_once('classsanpham.php');
$t = new sanPham;
$user = $_POST['username'];
$resultuser = $t->checkusername($user);
if($resultuser){
	echo 'true';
}
else echo 'false';

?>