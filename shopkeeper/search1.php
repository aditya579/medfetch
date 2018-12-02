<?php
    
/**
This page is developed by aditya pandey on date 26 january 2018 at 2:03 am.
This page is meant to complement autofill function on the bill page for the 
search term "company".
**/


    //database configuration
    $dbHost     = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '1234567';
    $dbName     = 'medicine';
    
    //connect with the database
    $db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
    
    //get search term
    $searchTerm = $_GET['term'];
    
    //get matched data from skills table
     $query = $db->query("SELECT * FROM ".$_COOKIE["name"]." WHERE company LIKE '%".$searchTerm."%' ORDER BY company ASC");
   
    if (!$query) {
    throw new Exception("Database Error [{$db->errno}] {$db->error}");
    }
    
    while ($row = $query->fetch_assoc()) {
    
        $data[] = $row['company'];
    
    }
    
    //return json data
    echo json_encode($data);


    
?>

