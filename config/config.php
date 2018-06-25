<?php

$connect = mysql_connect("localhost","root","");
if(!$connect)
{
	echo "Không thể kết nối!";
	exit;	
}
mysql_select_db("greenleaf",$connect);
mysql_query("set names 'utf8'");


?>