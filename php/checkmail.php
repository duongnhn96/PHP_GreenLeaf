<?php
include_once('classsanpham.php');
$t = new sanPham;
$email = $_POST['email'];
$resultemail = $t->checkemail($email);
if($resultemail){
	echo 'true';
}
else echo 'false';

?>