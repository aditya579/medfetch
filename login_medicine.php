<?php
if(isset($_POST['username']) && isset($_POST['password'])){
		define("DB_SERVER", "localhost");
    define("DB_USERNAME", "root");
    define("DB_PASSWORD", "1234567");
    define("DB_DATABASE", "medicine");




		$user_name = 'root';
		$password = '1234567';
		$db_name = 'medicine';
		$con= mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD);
		if(!$con){
			echo'<script language = javascript>';
			echo'alert("server is down")';
			echo'</script>';
		}
		if(! get_magic_quotes_gpc())
		{
			$un = addslashes($_POST['username']);
			$pass = addslashes($_POST['password']);
		}
		else
		{
			$un = $_POST['username'];
			$pass = $_POST['password'];
		}
		mysqli_select_db($con,$db_name);
		$sql = "SELECT id FROM shop_detail WHERE (shop_name = '$un') AND (password = '$pass')";
		$result = mysqli_query($con,$sql);
		$row=mysqli_fetch_row($result);
		if ($row[0] != 0){
			echo'<script language= "javascript">';
			echo'
        window.location.href = "shop_page.php";';
			echo'</script>';
			setcookie("name", $_POST['username'], time()+36000, "/","", 0);
			

		}
		else{
			echo'<script language="javascript">';
			echo'alert("EMAIL OR PASSWORD IS WRONG");';
			echo'</script>';
		}

}
?>
<!DOCTYPE html>
<html>
<head>
<style type="text/css">
.login{
    width: 300px;
    border: 2px solid green;
    padding-left: 3%;
    padding-top: 5%;
    padding-bottom: 5%;
    margin-top: 10px;
    margin-left: 69%;
    border-radius: 25px; 

    }
.submit{
	margin-left: 12%;
}
.essentials{
	margin-left: -5%;
	color: blue;
	font-size: 11px;
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
</script>

	<title>LOGIN PAGE</title>
	
</head>
<body>
<div class="image">
	<img src="logo.jpg" width="250px" height="200px">
</div>
<div class="login">
<form method="post" action="<?php $_PHP_SELF ?>">
USERNAME<br>	<input type="text" name="username" placeholder="username"><br><br>
PASSWORD<br>    <input type="password" name="password" placeholder="password"><br><br>
<input type="submit" name="submit" class="submit" value="LOGIN" id="login" >
<br>
<p class="essentials"><a href="forget_password.php">FORGOT PASSWORD</a> &nbsp &nbsp <a href="shop_registration.php">NEW USER</a> </p>
</form>
</div>

</body>
</html>