<?php 
if(isset($_POST['submit'])){
	if ($_POST['password']==$_POST['rpassword']){
		$user_name = 'root';
		$password = '1234567';
		$db_name = 'medicine';
		$con = mysqli_connect('localhost',$user_name,$password);
		if(!$con){
			echo'<script language = javascript>';
			echo'alert("server is down")';
			echo'</script>';
		}
		if(!get_magic_quotes_gpc()){
			$shop_name = addslashes($_POST['shop_name']);
			$email = addslashes($_POST['email']);
			$password = addslashes($_POST['password']);
			$location = addslashes($_POST['location']);
			$address = addslashes($_POST['address']);

			
		}
		else{
			$shop_name = $_POST['shop_name'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$location = $_POST['location'];
			$address = $_POST['address'];
		}
		$db = mysqli_select_db($con,$db_name);
		if(!$db){
			die("cannot reach database");
		}
		
		
	$sql1=	"CREATE TABLE `medicine`.`".$_POST['shop_name']."` ( `id` INT NOT NULL AUTO_INCREMENT , `drug_name` VARCHAR(100) NOT NULL , `company` VARCHAR(100) NOT NULL , `quantity` INT NOT NULL , `rate` INT NOT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB";
		$entry = mysqli_query($con,$sql1);
	$sql2= "INSERT INTO `shop_detail` (`id`, `shop_name`, `password`, `location`,`address`) VALUES (NULL, '$shop_name', '$password', '$location','$address')";	
		$entry2= mysqli_query($con,$sql2);
		if (! $entry && ! $entry2){
			echo ("data is wrong");
			
		}
		echo '<script language="javascript">';
		echo 'window.location.href="login_medicine.php";';
		echo '</script>';

	}
		else{
			die("could not connect");
		}
	}	
	else{
		echo '<script language="javascript">';
		echo 'alert("password not same")';
		echo '</script>';
	}


?>
<!DOCTYPE html>
<html>
<head>
<style type="text/css">
	.new_user{
    width: 500px;
    border: 2px solid green;
    padding-left: 3%;
    padding-top: 5%;
    padding-bottom: 5%;
    margin-top: 10px;
    margin-left: 50%;
    border-radius: 25px; 

    }
	.name{

		text-transform: uppercase;
		background: transparent;
		border:none;
		border-bottom: 1px solid black;
		
	}
	.email{
		text-transform: uppercase;
		background: transparent;
		border:none;
		border-bottom: 1px solid black;
		width: 200px;
	}
	.loc{
		background: transparent;
		border:none;
		border-bottom: 1px solid black;
		width: 200px;
	}
	
	
	.image{
	margin-top: 0px;
	width: 10%;
	height: 120px;
}
body
{
    background-image: url("bg.jpg");
   
   background-size:1000px 700px;
}
</style>
	<title>USER REGISTRATION</title>
</head>
<body>
<div class="image">
	<img src="logo.jpg" width="250px" height="200px">
</div>
<div class="new_user">
	<form method="post" action="<?php $_PHP_SELF ?>">
		SHOP NAME  <input type="text" name="shop_name" class="name" placeholder="shop_name"><br><br>
		EMAIL <input type="text" name="email" class="email" placeholder="email"><br> <br>
		PASSWORD <input type="password" name="password" class= "name" placeholder="password" id="password"><br><br>
		RE-ENTER PASSWORD <input type="password" name="rpassword" class="name" placeholder="re-enter password" id="rpassword"><br><br>
		LOCATION <input type="text" name="location" class="loc" placeholder="location"><br><br>
		ADDRESS <input type="text" name="address" class="loc" placeholder="address"><br><br>
		<input type="submit" name="submit" value="REGISTER">
	</form>
</div>
</body>
</html>