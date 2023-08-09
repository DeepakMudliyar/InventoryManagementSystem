<?php
require("conection/connect.php");
if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];

    $sql_sel=mysqli_query($con, "SELECT * FROM ims_order WHERE order_id=$id");
    $row=mysqli_fetch_array($sql_sel);
	

?>

<html>
<head>
<!-- <link rel="stylesheet" type="text/css" href="css/home.css" /> -->
<!-- <link rel="stylesheet" type="text/css" href="css/style.css" /> -->
</head>
<style> 
body{
    background-color: white;
    text-align: center;
    margin: 5%;
}

#title,#add{
    margin: 0px;
    padding: 0px;
}

.cust-detials_container{
    /* display: block; */
    width: 100%;
    height: 30px;
    /* float: left; */
    font: 1em sans-serif;
    text-align: left;
    margin: 0px;
    padding: 0px;
    white-space: nowrap;
}

.cust-detials{
   height: 30px;
   margin: 0;
}

.cust-add{
    float: left;
}

.cust-phone{
    float: right;
}
.table{
    width: 98%;
    margin: auto;
    border: 1px solid black;
}
.table_data{
    height: 500px;
    text-align: center;
    vertical-align: top;
    padding: 100px;
}

td{
    padding: 15px;
}

.tableBoldText{
    font-size: 1.2em;
    font-weight: bold;
    text-align: right;
}

.invoiceFooter1{
    float: left;
    font-size: 1.2em;
    font-weight: bold;
    margin-left: 100px;
}

.invoiceFooter2{
    float: right;
    font-size: 1.2em;
    font-weight: bold;
    margin-right: 100px;
}

.printButton{
    margin-top: 15px;
}
</style>
<body >
    
    
<h2>Invoice</h2>
<h1 id="title">Deepak Mobiles and Accessories</h1>
<p id="add">Mumbai, MH</p> <hr>

<div class="cust-detials_container"> 
<p class="cust-detials"> <strong>Customer Name:</strong>
    <?php
        $cust=$row['customer_id'];
        $c_name=mysqli_query($con,"SELECT * FROM `ims_customer` WHERE `id`=$cust");
        $name=mysqli_fetch_assoc($c_name);
        echo $name['name'];
    ?></p> </div>

<div class="cust-detials_container">
<p class="cust-add"> <strong>Customer Address: </strong>  <?php echo $name['address']; ?> </p>
<!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
<p class="cust-phone"><strong> Mobile:</strong>  <?php echo $name['mobile']; ?> </p></div><br><hr>


<table class="table" border="1">
        <thead>
            <tr>
            <th style="text-align: center;">Sr no.</th>
            <th style="text-align: center;">Product Name</th>
            <th style="text-align: center;">Price</th>
            <th style="text-align: center;">Quantity</th>
            <th style="text-align: center;">Total Amount</th>
      	    </tr>
        </thead>
         
        <?php
        $i=0;
        $sql_sel=mysqli_query($con, "SELECT * FROM ims_order WHERE order_id=$id");
        while($row=mysqli_fetch_array($sql_sel)){
        $i++;

        $prod=$row['product_id'];
        $sql_prod=mysqli_query($con, "SELECT * FROM `ims_product` WHERE `pid`=$prod ");
        $rowp= mysqli_fetch_assoc($sql_prod);

        $price=$rowp['base_price'];
        $quantity=$row['total_shipped'];


        ?> 
        <tr class="table_data" >
            <td><?php echo $i;?></td>
            <td><?php echo $rowp['pname'];?></td>  
            <td><?php echo $price;?></td> 
            <td><?php echo $quantity;?></td>        
            <td><?php echo $price*$quantity;?></td>
        </tr>
        <tr class="tableBoldText">
            <td colspan="4" >Total : </td>
            <td><?php echo $price*$quantity;?></td>
        </tr>


        
<?php } ?>
</table><br><br>

<div class="invoiceFooter">
    <p class="invoicefooter1">
        Customer's Signature
    </p>
    <p class="invoicefooter2">
        Seller's Signature
    </p>
</div><br>
<!-- <div class="printButton">
<input type="button" value="Print">
</div> -->
</body>
</html>