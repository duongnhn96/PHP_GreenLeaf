<?php
include_once("classadmin.php");
$ql= new quanly;
$xoa=$ql->xoatin($_GET['id']);
echo "<script>window.history.back();</script>";
?>
