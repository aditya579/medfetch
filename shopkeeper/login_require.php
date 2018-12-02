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