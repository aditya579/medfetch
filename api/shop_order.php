<?php
$host = 'localhost';
$user = 'root';
$pass = '1234567';
$db_name = 'medicine' ;
$shop_name = $_REQUEST['shop_name'];
$quantity =  $_REQUEST['quantity'];

$con = mysqli_connect($host,$user,$pass);

if($con){

			

			if (! get_magic_quotes_gpc()) {
				
						$drug = addslashes($_REQUEST['drug']);
						$company = addslashes($_REQUEST['company']);
						$uuid = addslashes($_REQUEST['uuid']);
						
						
			}else{
				
						$drug = $_REQUEST['drug'];
						$company = $_REQUEST['company'];
						$uuid = $_REQUEST['uuid'];
						
						

			}
			mysqli_select_db($con,$db_name);

			$sql1 = "SELECT quantity FROM ".$shop_name." WHERE (drug_name = '$drug') AND (company = '$company')";
			$result1 = mysqli_query($con,$sql1);
			$row = mysqli_fetch_row($result1);

			if($row[0]!=0){
						$quantity1 = $row[0]-$quantity;
						$sql2 = "UPDATE `".$shop_name."` SET `quantity`=".$quantity1." WHERE (drug_name = '$drug') AND (company = '$company')";
						$sql3="INSERT INTO `order`(`shop_name`, `drug`, `company`, `quantity`, `order_id`) VALUES ('".$shop_name."','$drug','$company','".$quantity."','$uuid')";
						$result2 = mysqli_query($con,$sql2);
						$result3 = mysqli_query($con,$sql3);
									if($result2&&$result3){
										$status  = array('status' => "success" );
										echo json_encode($status);
									}
			}else{
						echo json_encode("no record found");
			}

}else{
	echo json_encode("server down");
}

?>
