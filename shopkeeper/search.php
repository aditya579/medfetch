<?php
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
    $query = $db->query("SELECT * FROM siddharth WHERE drug_name LIKE '%".$searchTerm."%' ORDER BY drug_name ASC");
    if (!$query) {
    throw new Exception("Database Error [{$db->errno}] {$db->error}");
}
    while ($row = $query->fetch_assoc()) {
        $data[] = $row['drug_name'];
    }
    
    //return json data
    echo json_encode($data);
?>

