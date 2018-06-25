<div class="container-fluid">
	<div class="navbar-header">
		<a class="navbar-brand" href="index.php">Chào mừng <?php echo $_SESSION['Tenkhachhang'] ?> đến với GreenLeaf!</a>
	</div>

	<ul class="nav navbar-nav navbar-right">
		<li><a href="<?php echo $url_host ?>Thong-tin-tai-khoan.html"><span class="glyphicon glyphicon-user"></span> Quản lý tài khoản</a></li>
		<li><a href="<?php echo $url_host ?>Dang-Xuat.html"><span class="glyphicon glyphicon-log-in"></span>Thoát </a></li>
	</ul>
</div>