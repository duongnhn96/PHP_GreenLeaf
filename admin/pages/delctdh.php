<?php
include_once("classadmin.php");
$ql= new quanly;
echo $xoa=$ql->delctdh($_GET['id']);

if($xoa){
	?>
	<script>alert('Xoá thành công!');
	window.history.back();
	</script>
	<?php
}else{

?>
	<script>alert('Không xoá được!');
	window.history.back();
	</script>
	<?php

}
?>