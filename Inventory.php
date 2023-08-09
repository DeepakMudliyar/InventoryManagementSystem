<html>
<head>
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>

    <div class="panel panel-default">
    <div class="panel-heading"><h1>Inventory</h1></div>
<div class="table_margin">
<table class="table table-bordered">
        <thead>
            <tr>
            <th style="text-align: center;">ID</th>
            <th style="text-align: center;" colspan="2">Product / Code</th>
            <th style="text-align: center;">Starting Inventory</th>
            <th style="text-align: center;">Inventory Recieved</th>
            <th style="text-align: center;">Inventory Shipped / to ship</th>
            <th style="text-align: center;">Inventory on hand</th>
      	    </tr>
        </thead>    
        
         <?php
    		$sql_sel=mysqli_query($con, "SELECT * FROM `ims_product`");
			
			$i=0;
    while($row=mysqli_fetch_array($sql_sel)){
    $i++;

    $start_inv=$row['quantity'];

    $purc=$row['pid'];
    $sql_purc=mysqli_query($con, "SELECT * FROM `ims_purchase` WHERE `product_id`=$purc ");
    $rowp= mysqli_fetch_assoc($sql_purc);
    // if (empty($rowp)) {$rowp=0;}
    if ($rowp==Null) {$rowP=0;}
    else{
    $rowP=$rowp['quantity'];}
    // if ($rowP==Null) {$rowP=0;}


    $ord=$row['pid'];
    $sql_ord=mysqli_query($con, "SELECT * FROM `ims_order` WHERE `product_id`=$ord ");
    $rowo= mysqli_fetch_assoc($sql_ord);
    if (empty($rowo)) {$rowo=0;}
    $rowO=$rowo['total_shipped'];

    $final_inv= (($start_inv + $rowP)- $rowO);

    	?>
        <tr>
            <td align="center"><?php echo $i;?></td>
            <td align="center"><?php echo $row['pname'];?></td>
            <td style="font-weight: bold;" align="center"><?php echo $row['model'];?></td>
            <td align="center"><?php echo $start_inv;?></td>
            <td align="center"><?php echo $rowP;?></td> 
            <td align="center"><?php echo $rowO;?></td>               
            <td align="center" style="color: 
            <?php if($final_inv>0){echo "green;";} else{echo "red;";} ?>font-weight: bolder; font-size: 1.2em;">
                                            <?php echo $final_inv;?></td>
        </tr>
    <?php	    
    }
    
    ?>
   	</table>
       
</div>
</div><!--end of content_input -->
</body>
</html>