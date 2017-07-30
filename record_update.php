<?php
if(isset($_POST['update'])){
	$username='root';
	$pass = '1234567';
	$dbname = 'medicine';
	$con = mysqli_connect('localhost',$username,$pass);
	if(! $con){
		echo '<script language="javascript">';
		echo 'alert("server is down")';
		echo '</script>';
	}
	if(! get_magic_quotes_gpc()){
		$dname = addslashes($_POST['drug_name']);
		$company = addslashes($_POST['company']);
		$quantity = addslashes($_POST['quantity']);
		$rate = addslashes($_POST['rate']);
	}
	else{
		$dname = $_POST['drug_name'];
		$company = $_POST['company'];
		$quantity = $_POST['quantity'];
		$rate  = $_POST['rate'];
	}
	mysqli_select_db($con,$dbname);
	$sql = "SELECT id FROM  ".$_COOKIE["name"]."  WHERE (drug_name='$dname') AND (company = '$company')";
	
	$result = mysqli_query($con,$sql);
	$row=mysqli_fetch_row($result);
	
	if($row[0]!=0){
		$sql2="UPDATE `".$_COOKIE["name"]."` SET `quantity`='$quantity', `rate`='$rate' WHERE  (drug_name='$dname') AND (company = '$company')";
		
		$result2=mysqli_query($con,$sql2);
		if( ! $result2 ){
			echo '<script language="javascript">';
		echo 'alert("cannot update try again")';
		echo '</script>';
		}
	}
	else{
		
	$sql1 = "INSERT INTO `".$_COOKIE["name"]."` ( `drug_name`, `company`, `quantity`,`rate`) VALUES ('$dname','$company','$quantity','$rate')";
		
		$result1 = mysqli_query($con,$sql1);
		if(! $result1){
			echo '<script language="javascript">';
		echo 'alert("cannot update try again 1")';
		echo '</script>';
		}
	}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Stock Update</title>
<style type="text/css">
	#update{
		border: 1px solid black;
		border-radius: 25px;
		margin-left: 200px;
		margin-top: 50px;
		width: 500px;
		align-content: center;
		padding-left: 3%;
    padding-top: 5%;
    padding-bottom: 5%;
	}
</style>
</head>
<body>
<div id="update">
<form method="post" action="<?php $_PHP_SELF?>">
	Drug name:&nbsp<input type="text" name="drug_name"><br><br>
	Company  :&nbsp<input type="text" name="company"><br><br>
	Quantity :&nbsp&nbsp&nbsp<input type="text" name="quantity"><br><br>
	Rate     :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="rate"><br><br>
	<input type="submit" name="update" value="UPDATE STOCK">
</form>
</div>
</body>
</html>