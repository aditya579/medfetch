
<!DOCTYPE html>
<html>
<head>
  <title>MEDICINE FIND</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
    body{
      background-image: url("logo1.jpg");
      background-repeat: no-repeat;
      height: 300px;
      width: 300px;
      background-position: center;
      
      width:100%;
    }
    #tab{

      
      border-width: 1px;
      border-radius: 1px;

    }
    #span1{
      border: 1px solid green;
      
    }
    h1{
    
      margin-top: 50px;
      font-family: "Lato", sans-serif;
    }
    .col-xs-9{
      font-size: 20px;

    }
    .col-xs-10{
      
      font-size: 15px;
    }
    #submit{
      
    }
    </style>
</head>
<body id="team_image">

<div class="container">
<div class="row">

<div class="col-xs-12" >
<h1><b>SEARCH YOUR MEDICINE HERE</b></h1>
  </div>
</div>
<div class="row">
<br>
<br>

<div class="col-xs-9">
<form method="post" action="<?php $_PHP_SELF ?>">
  <b>Place:</b>&nbsp&nbsp<input type="text" name="place">
  <b>Drug name:</b>&nbsp&nbsp <input type="text" name="drug"><br><br>
  <input type="submit" id="submit" name="submit" value="FIND">
</form>
<div class="col-xs-3"></div>
</div>
</div>
</div>
<br>
<div class="row">

<div class="col-xs-12">
<table id="tab">
<tr>
  <th>SHOP NAME&nbsp&nbsp </th>
  
  <th>DRUG NAME&nbsp</th>
  
  <th>COMPANY&nbsp </th>
  
  <th>QUANTITY&nbsp</th>
  
  <th>RATE&nbsp</th>
  
  <th>LOCATION&nbsp</th>
  <th>ADDRESS</th>
</tr>
<?php
if(isset($_POST['submit'])){
   $usrname = 'root';
   $pass ='1234567';
   $db_name = 'medicine';
   $con = mysqli_connect('localhost',$usrname,$pass);
   if(!$con){
    echo '<script language="javascript">';
    echo 'alert("cannot connect to server")';
    echo '</script>';
   }
   if(! get_magic_quotes_gpc())
    {
      $drug = addslashes($_POST['drug']);
      $area = addslashes($_POST['place']);
    }
    else
    {
      $drug = $_POST['drug'];
      $area = $_POST['place'];
    }
   mysqli_select_db($con,$db_name);
   $sql = "SELECT shop_name,location,address FROM shop_detail WHERE (location='$area')";
   if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    {
      
             $shop_name = $row[0];
             $location = $row[1];
             $address = $row[2];

    $sql2 = "SELECT drug_name,company,quantity,rate FROM ". $row[0]. " WHERE (drug_name='$drug')";
   
    if ($result1 = mysqli_query($con,$sql2)) {
      
      while ($row1=mysqli_fetch_row($result1)) {
            
            if($row1[2]>=10){
             echo '<tr>';
             echo '<td>'.$shop_name.'&nbsp'.'</td>';      
               
               echo '<td>'.$row1[0].'&nbsp'.'</td>';
               
               echo '<td>'.$row1[1].'&nbsp'.'</td>';
               
               echo '<td>'.$row1[2].'&nbsp'.'</td>';
               
               echo '<td>'.$row1[3].'&nbsp'.'</td>';
               echo '<td>'.$location.'&nbsp'.'</td>';
               echo '<td>'.$address.'</td>';
               echo '</tr>';
            }
               
               
      }
     mysqli_free_result($result1);  
    }
    else{
      echo "no shop in your area";
    }
    
    }
  // Free result set
  mysqli_free_result($result);
}

mysqli_close($con);
}
?>  
</table>
</div>
<div class="col-xs-3"></div>
</div>
</div>
</body>
</html>