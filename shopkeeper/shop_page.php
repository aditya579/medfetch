<!DOCTYPE html>
<html>
<head>
<style>
body {
    font-family: "Lato", sans-serif;
    background-image: url("bg.jpg");
   
   background-size:1000px 700px;
}
.functions{
  margin-left: 40px;
  color: white;

}
.sidenav {
    margin-top: 189px;
    margin-left: 10px;
    margin-bottom: 10px;
    height: 600px;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}


.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover, .offcanvas a:focus{
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}
#unique_id{
  margin-left: 600px;
  margin-top: 20px;
}
.browser1{
  margin-left: 300px;
  margin-top: -29px;
  width: 70%;
  height: 350px;
  border:0px;
}
#logo{
  margin-left: 60px;
}
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

</style>
<script type="text/javascript">
  function update_stock(){
      document.querySelector(".browser1").setAttribute("src", "record_update.php");
  }
  function logout(){
    window.location.href="login_medicine.php";
  }
  function see_stock(){
    document.querySelector(".browser1").setAttribute("src","display_record.php");
  }
  function bill(){
    document.querySelector(".browser1").setAttribute("src","autocomplete_test.html");
  }
</script>
</head>
<body>
<div id="unique_id">
<div id="logo">
  <img src="logo.jpg" width="150px" height="100px" >
</div>

<?php
         if( isset($_COOKIE["name"]))
          

            echo  '<span style="color: black ; margin-left: 60px; font-size: 20px;">Welcome ' . $_COOKIE["name"];
         
         else
            echo "Sorry... Not recognized" . "<br />";
      ?>
      
</div>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" >&times;</a>
  <h3 class="functions">FUNCTIONS </h3>
  <a href="#" onclick="update_stock()">Update Stock</a>
  <a href="#" onclick="see_stock()">See Stock</a>
  <a href="#" onclick="bill()">Bill</a>
  <a href="#">Place Order</a>
  <a href="#" onclick= "logout()">Logout</a>
</div>
<br>
<br>
<span style="font-size:30px;cursor:pointer; margin-top: 192px" onclick="openNav()" >&#9776; </span>
<br>
<script>
function openNav() {
    
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    
    document.getElementById("mySidenav").style.width = "0";
}
</script>
<iframe class="browser1" ></iframe>     
</body>
</html> 
