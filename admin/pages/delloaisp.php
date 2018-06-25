<?php
include_once("classadmin.php");
$ql= new quanly;
$xoa=$ql->xoaloaisanpham($_GET['id']);
echo "<script>window.history.back();</script>";

?>