
<?php
session_start();
$masp = $_POST['MaSP'];


if(isset($_SESSION['giohang']) && is_array($_SESSION['giohang'])){
	$count=count($_SESSION['giohang']);
	$flag = false;
	for($i=0;$i<$count;$i++){
		if($_SESSION['giohang'][$i]['id']==$masp){
			$_SESSION['giohang'][$i]['soluong'] +=1;
			
			$flag=true;
			break;		
		}
	}
	if($flag==false){
		$_SESSION['giohang'][$count]['id']=$masp;
		$_SESSION['giohang'][$count]['soluong'] = 1;

	}
}
else {
	$_SESSION['giohang']= array();
	$_SESSION['giohang'][0]['id']=$masp;
	$_SESSION['giohang'][0]['soluong'] = 1;

}

echo count($_SESSION['giohang']);

?>