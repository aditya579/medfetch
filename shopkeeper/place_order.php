
<html>
<head>
<title>Place order</title>
<style>
body {
    font-family: "Lato", sans-serif;
    background-image: url("bg.jpg");
   
   background-size:1000px 700px;
}

#logo{

  margin-left: 60px;

	} 

	#tableid{
		margin-left: 100px;
		margin-top: 30px;
		float :left;
		font-size: 30px;
		line-height: 50px;

	
}
#myTable{
        
        margin-top:48px;
        margin-right: 200px;
        float: right;
        
        }
#data{
	font-size:  25px;
	border-width: 1px;
	border-radius : 1px;



}        
#th{
	width: 10px;
}
#id{
	margin-left: 10px;
}
       
	</style>

<script>
    var table;

    function check() {
        debugger;
        var name = document.myForm.name.value;
       
            document.getElementById("span1").innerHTML = "";
            document.getElementById("name").style.border = "1px solid green";
        

        var brand = document.myForm.brand_name.value;
            document.getElementById("span2").innerHTML = "";
            document.getElementById("brand").style.border = "1px solid green";
        
        var quantity = document.myForm.quantity.value;
        
            document.getElementById("span3").innerHTML = "";
            document.getElementById("quant").style.border = "1px solid green";

        var rate = document.myForm.rate.value;

            document.getElementById("span3").innerHTML = "";
            document.getElementById("rate").style.border = "1px solid green";
        

        if (document.getElementById("data") == null)
            createTable();
        else {
            appendRow();
        }
        return true;
    }






    function createTable() {

        var myTableDiv = document.getElementById("myTable");  //indiv
        table = document.createElement("TABLE");   //TABLE??
        table.setAttribute("id", "data");
        table.border = '1';
        myTableDiv.appendChild(table);  //appendChild() insert it in the document (table --> myTableDiv)
        debugger;

        var header = table.createTHead();

        var th0 = table.tHead.appendChild(document.createElement("th"));
        th0.innerHTML = "Drug";
        var th1 = table.tHead.appendChild(document.createElement("th"));
        th1.innerHTML = "Brand Name";
        var th2 = table.tHead.appendChild(document.createElement("th"));
        th2.innerHTML = "Quantity";
        var th3 = table.tHead.appendChild(document.createElement("th"));
        th3.innerHTML = "Rate";
        var th4 = table.tHead.appendChild(document.createElement("th"));
        th4.innerHTML = "total";
        th0.setAttribute("id","th");
        appendRow(); 

    }

    function appendRow() {
        var name = document.myForm.name.value;
        var brand = document.myForm.brand.value;
        var quantity = document.myForm.quantity.value;
        var rate = document.myForm.rate.value;
        var total = "Rs" +quantity*rate;
        var rowCount = table.rows.length;
        var row = table.insertRow(rowCount);

        row.insertCell(0).innerHTML = name;
        row.insertCell(1).innerHTML = brand;
        row.insertCell(2).innerHTML = quantity;
        row.insertCell(3).innerHTML = rate;
        row.insertCell(4).innerHTML = total;



        clearForm();


    }


    function clearForm() {
        debugger;

        document.myForm.name.value = "";
        document.myForm.brand_name.value = "";
        document.myForm.quantity.value = "";
        document.myForm.rate.value ="";
        



    }
    

</script>
</head>

<body>


<div>
    <form name="myForm" method="post" action="<?php $_PHP_SELF ?>">

        <table id="tableid">

            <tr class="ab"> 
                <th>
                Drug Name</th>
                <td>
                    
                    <input type="text" name="name" placeholder="Name of Drug" id="name"  /></td>
                <td><span id="span1"></span></td>
            </tr>

            <tr class="ab">
                <th>Brand Name</th>

                <td>
                    <input type="text"  placeholder="Brand Name" name="brand_name" id="brand" /></td>
                <td><span id="span2"></span></td>
            </tr>

            <tr class="ab">
                <th>Quantity</th>
                <td>
                    <input type="text" name="quantity" id="quant" placeholder="Quantity" /></td>
                <td><span id="span3"></span></td>
               
            </tr>
            

            <tr>
                
                <td>
                    <input width="20px" name="add" id="add" type="button" value="ADD" onclick="check();" /></td>
            
                   
            </tr>

        </table>
    </form>

   
   <span id="myTable">
    </span>

</div></body>
</html>