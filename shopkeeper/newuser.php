<?php 
if(isset($_POST['email']) && isset($_POST['first_name']) && isset($_POST['password'])){
	if ($_POST['password']==$_POST['rpassword']){
		$user_name = 'root';
		$password = '1234567';
		$db_name = 'hotel_management';
		$con = mysqli_connect('localhost',user_name,password);
		if( con){
		if(!get_magic_quotes_gpc()){
			$first_name = addslashes($_POST['first_name']);
			$last_name = addslashes($_POST['last_name']);
			$email = addslashes($_POST['email']);
			$password = addslashes($_POST['password']);
			$hques = addslashes($_POST['question']);
			$hans = addslashes($_POST['answer']);
		}
		else{
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$hques = $_POST['question'];
			$hans = $_POST['answer'];
		}
		$db = mysqli_select_db('hotel_management',$con);
		if(!db){
			die("cannot reach database");
		}
		$sql = "INSET INTO USER"."(FIRST_NAME,LAST_NAME,EMAIL,PASSWORD,question,answer)"."VALUES('$first_name','$last_name','$email','$password','$hques','$hans')";
		$entry = mysqli_query($sql,$con);
		if (! entry){
			die ("data is wrong");
		}

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

}
?>
