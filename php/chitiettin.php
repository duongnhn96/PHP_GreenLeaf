<?php

$idtin=$_GET['idtin'];
include_once('classsanpham.php');
$t = new sanPham;
$resultlenhchitiet= $t->hienchitiettin($idtin);
$rowchitiet=mysql_fetch_array($resultlenhchitiet);

?>




<div class="info" style="margin-top: 50px; font-size: 18px;">
	<div class="container">
		<div class="panel panel-success">
			<div class="panel-heading text-center"><h3><?php echo $rowchitiet['TieuDe']?></h3></div>
			<div class="panel-body text-center"><img src="<?php echo $url_host ?>img/tintuc/<?php echo $rowchitiet['Hinh']?>" width="650px" height="400px" alt="<?php echo $rowchitiet['TieuDe']?>"></div>
			<div class="panel-body"><?php echo $rowchitiet['Noidung']?></div>
		</div>


	</div> <!--end info-->
</div>
