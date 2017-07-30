<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
	#span1{
		margin-left: 830px;
	}
	#bill1{
		border: 1px solid black;
		border-radius: 25px;
		padding-left: 3%;
	    padding-top: 5%;
	    padding-bottom: 5%;
	    width: 500px;
	}
	#bill{
		font-size: 17px;
	}
</style>
<body>
<div id="bill">
<form method="post" action="<?php $_PHP_SELF ?>">
DRUG NAME <input type="text" name="dname">
COMPANY   <input type="text" name="company">
QUANTITY <input type="text" name="quantity"><br><br>
<input type="submit" name="submit" id="span1">
</div><br><br>
<div id="bill1">
<table>
<tr>
	<th>DRUG NAME</th>
	<th>COMPANY</th>
	<th>QUANTITY</th>
	<th>RATE</th>
	<th>TOTAL</th>
</tr>	
<?php
	if(isset($_POST['submit'])){
		echo'<tr>';
		echo '<td>';
		echo $_POST['dname'];
		echo '</td>';
		echo '<td>';
		echo $_POST['company'];
		echo '</td>';
		echo '<td>';
		echo $_POST['quantity'];
		echo '</td>';
		
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
		$dname = addslashes($_POST['dname']);
		$company = addslashes($_POST['company']);
		$quantity = addslashes($_POST['quantity']);
	}
	else{
		$dname = $_POST['drug_name'];
		$company = $_POST['company'];
		$quantity = $_POST['quantity'];
	}
	mysqli_select_db($con,$dbname);
	}    
	$sql = "SELECT rate,quantity FROM  ".$_COOKIE["name"]."  WHERE (drug_name='$dname') AND (company = '$company')";
	
	$result = mysqli_query($con,$sql);
	$row=mysqli_fetch_row($result);
	echo '<td>';
		echo $row[0];
		echo '</td>';
	echo '<td>';
		echo $_POST['quantity']* $row[0];
		echo '</td>';
		echo '</tr>';
		$quantity1= $row[1]-$_POST['quantity'];
		
	$sql2="UPDATE `".$_COOKIE["name"]."` SET `quantity`='$quantity1' WHERE  (drug_name='$dname') AND (company = '$company')";
		
		$result2=mysqli_query($con,$sql2);
		
?>
    </table>
</div>
</form>
</body>
</html>