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
<!DOCTYPE html>
<html>
<head>
<style type="text/css">
	.new_user{
    width: 700px;
    border: 2px solid green;
    padding-left: 3%;
    padding-top: 5%;
    padding-bottom: 5%;
    margin-top: 10%;
    margin-left: 21%;
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
		width: 470px;
	}
	.hques{
		background: transparent;
		border:none;
		border-bottom: 1px solid black;
		width: 470px;
	}
	.hans{
		background: transparent;
		border:none;
		border-bottom: 1px solid black;
		width:470px;
	}
</style>
	<title>USER REGISTRATION</title>
</head>
<body>
<div class="new_user">
	<form method="post" action="<?php $_PHP_SELF ?>">
		FIRST NAME  <input type="text" name="first_name" class="name" placeholder="first name">&nbsp &nbsp
		LAST NAME   <input type="text" name="last_name" class="name" placeholder="last name"><br><br>
		EMAIL <input type="text" name="email" class="email" placeholder="email"><br> <br>
		PASSWORD <input type="password" name="password" class= "name" placeholder="password" id="password">&nbsp &nbsp
		RE-ENTER PASSWORD <input type="password" name="rpassword" class="name" placeholder="re-enter password" id="rpassword"><br><br>
		HINT QUESTION <input type="text" name="question" class="hques" placeholder="hint question"><br><br>
		ANSWER TO QUESTION <input type="text" name="answer" class="hans" placeholder="answer"><br><br>
		<input type="submit" name="submit" value="REGISTER">
	</form>
</div>
</body>
</html>