
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		#record{
			margin-left: 100px;
			border: 1px solid black;
			border-radius: 25px;
			padding-left: 3%;
    padding-top: 5%;
    padding-bottom: 5%;
		}
	</style>
</head>
<body>
<div id="record">
	<table>
		<tr>
			<th>S.No</th>
			<th>DRUG NAME</th>
			<th>COMAPNY NAME</th>
			<th>QUANTITY</th>
		</tr>
		<?php
		$user_name = 'root';
		$password = '1234567';
		$db_name = 'medicine';
		$con= mysqli_connect('localhost',$user_name,$password);
		if(!$con){
			echo'<script language = javascript>';
			echo'alert("server is down")';
			echo'</script>';
		}
		mysqli_select_db($con,$db_name);
   		$sql = "SELECT * FROM ".$_COOKIE["name"];
   		if ($result=mysqli_query($con,$sql))
  			{
				  // Fetch one and one row
				  while ($row=mysqli_fetch_row($result))
				    {
				    	 echo '<tr>';
		    			 echo '<td>'.$row[0].'</td>';
		    			 echo '<td>'.$row[1].'</td>';
		    			 echo '<td>'.$row[2].'</td>';
		    			 echo '<td>'.$row[3].'</td>';
		    			 echo '</tr>';
				    }
				mysqli_free_result($result);
				}
				    else{
				    	echo "no shop in your area";
				    
		    }
		    
		?>
	</table>
</div>
</body>
</html>