 <meta charset="UTF-8">
<?php
session_start();
ini_set('display_errors',0);
if($_SESSION['user'])
{
	unset($_SESSION['user']);
	unset($_SESSION['Tenkhachhang']);
	unset($_SESSION['Macv']);
	unset($_SESSION['giohang']);
	?>
    <script>
    alert('Đăng xuất thành công!');
	location.href='../index.php';
	</script>
    <?php

}
else {

	?>
    <script>
	location.href='../index.php';
	</script>
    <?php
}

?>