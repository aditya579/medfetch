<?php
$host = 'localhost';
$user = 'root';
$pass = '1234567';
$db_name = 'medicine';
$shop_name = $_REQUEST['shop_name'];
$quantity =  $_REQUEST['quantity'];

$con = mysqli_connect($host,$user,$pass);

if($con){
	if(! get_magic_quotes_gpc()){
		$drug = addslashes($_REQUEST['drug']);
		$company = addslashes($_REQUEST['company']);
		$uuid = addslashes($_REQUEST['uuid']);
	}
	else{
		$drug = $_REQUEST['drug'];
		$company = $_REQUEST['comapny'];
		$uuid = $_REQUEST['uuid'];
	}

	mysqli_select_db($con,$db_name);
	$sql1="INSERT INTO `order`(`shop_name`, `drug`, `company`, `quantity`, `order_id`) VALUES ('".$shop_name."','$drug','$company','".$quantity."','$uuid')";
	$result = mysqli_query($con,$sql1);
	if($result){
		$result1  = array('status' => "success" );
		echo json_encode($result1);
	}

}
else{
	echo "server down";
}


?>