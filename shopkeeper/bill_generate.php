<?php

/**
the following document is to REQUEST the drug name and company corresponding to the drug to be billed 
and generate a bill with required quantity.

when editing the code maintaing one line gap between each module.
**/


//login credentials

$host     = 'localhost';
$username = 'root';
$password = '1234567';
$database = 'medicine';

//initialising connection
$con = new mysqli($host,$username,$password,$database);

if (!$con) {

    echo '<script language="javascript">';
    echo 'alert("server down")';
    echo '</script>';

}

if(! get_magic_quotes_gpc()){

	$dname    = addslashes($_REQUEST['dname']);
	$company  = addslashes($_REQUEST['company']);
	$quantity = addslashes($_REQUEST['quantity']);

}
else{

	$dname    = $_REQUEST['dname'];
	$company  = $_REQUEST['company'];
	$quantity = $_REQUEST['quantity'];

}

//main part of program
$sql1 = "SELECT rate,quantity FROM  ".$_COOKIE["name"]."  WHERE (drug_name='$dname') AND (company = '$company')";


//generating query
$query1 = $con->query($sql1);

if (!$query1) {

    echo '<script language="javascript">';
    echo 'alert("query 1 failed")';
    echo '</script>';

}

$row1 = $query1->fetch_assoc();

$qr   = (int)$row1['quantity'];

//proceed only if stock is there
if($qr>0 && $qr>=(int)$_REQUEST['quantity']){

       $url  = fopen("data.txt", 'r+')  or die('Cannot open file:  ');
       
       $price = (int)$row1['rate']*(int)$_REQUEST['quantity'];
       $data1 = $_REQUEST['dname'].",".$_REQUEST['company'].",".$row1['rate'].",".$_REQUEST['quantity'] ;

       fwrite($url, $data1);
       fclose($url);
    
    echo '<script language="javascript">';
    echo 'alert("success")';
    echo '</script>';

     


$quantity2 = (int)$qr - (int)$_REQUEST['quantity'];


if(! get_magic_quotes_gpc()){

	$qunt = addslashes($quantity2);

}
else{

	$quant = $quantity2;

}

//update statement: this decrements quantity in database
$sql2 = "UPDATE `".$_COOKIE["name"]."` SET `quantity`='$quantity2' WHERE  (drug_name='$dname') AND (company = '$company')";    

$query2 = $con->query($sql2);

if (!$query2) {

	    echo '<script language="javascript">';
	    echo 'alert("query 2 failed")';
	    echo '</script>';

	}
}
 



?>