<?php
$dbserver = 'localhost';
$dbname = 'medicine';
$dbusername = 'root';
$dbpassword ='1234567';
$cost_effectiveness_array = array();
$con = mysqli_connect($dbserver,$dbusername,$dbpassword);
if(! $con){
	echo "server down";
}
 if(! get_magic_quotes_gpc())
		{
			$drug = addslashes($_REQUEST['drug']);
			$area = addslashes($_REQUEST['place']);
		}
		else
		{
			$drug = $_REQUEST['drug'];
			$area = $_REQUEST['place'];
		}
mysqli_select_db($con,$dbname);
  $sql = "SELECT shop_name,location,address FROM shop_detail WHERE (location='$area')";
   if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
    $i=1;
  while ($row=mysqli_fetch_row($result))
    {
    	     

             $shop_name = $row[0];
             $shop_name1=$row[0];
             $location = $row[1];
             $address = $row[2];

    $sql2 = "SELECT drug_name,company,quantity,rate FROM ". $row[0]. " WHERE (drug_name='$drug')";
   
    if ($result1 = mysqli_query($con,$sql2)) {
    	
    	while ($row1=mysqli_fetch_row($result1)){
						
						
						if($row1[2]>=10){
						$costeffectiveness = intval($row1['3']*5*5/1000);
						$cost_effectiveness_array[$i]=$costeffectiveness;
						$mydata->shop_number[]->$i=$shop_name;
						$mydata->$shop_name[]->drug_name=$row1[0];
						$mydata->$shop_name[]->company=$row1[1];
						$mydata->$shop_name[]->quantity=$row1[2];
						$mydata->$shop_name[]->cost_effectiveness=$costeffectiveness;
						$mydata->$shop_name[]->rate=$row1[3];
						}
					     
    					 $i++;
		    			 
    	}
     mysqli_free_result($result1);	

    }
    
    
    }
  // Free result set
  mysqli_free_result($result);
}

mysqli_close($con);

echo json_encode($mydata);

?>