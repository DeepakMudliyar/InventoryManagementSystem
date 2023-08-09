<!--for delete Record -->
<?php
	$msg="";
	$opr="";
     
	if(isset($_GET['opr']))
	$opr=$_GET['opr'];
	
if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
	if($opr=="del")
{
	$del_sql=mysqli_query($con, "DELETE FROM ims_product WHERE pid=$id");
	if($del_sql)
		echo "<div style='background-color: white; color:green; padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                . "<span class='p_font'>"
                . "1 Record Deleted... !"
                . "</span>"
                . "</div>";
	
	else
		// $msg="Could not Delete :".mysql_error();
        echo "<div style='background-color: white; color:red; padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
        . "<span class='p_font'>"
        . "Could not Delete..."
        . "</span>"
        . "</div>";
			
}
	// echo $msg;
?>

<html>
<head>
<!-- <link rel="stylesheet" type="text/css" href="css/home.css" /> -->
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>
<div class="btn_pos" >
        <form method="post" style="width:95%; display: inherit;">
            <input type="text" name="searchtxt" class="input_box_pos form-control" placeholder="Search Product Name.." style="width:20%;" />&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="btn_pos_search">
            <input type="submit" class="btn btn-primary btn-large" name="btnsearch" value="Search" />&nbsp;&nbsp;
            <a href="?tag=product_entry"><input type="button" class="btn btn-large btn-primary" value="Add New Product" name="butAdd"style="margin-left:70%;"/></a>
            </div>
        </form>
    </div><br><br>

    <div class="panel panel-default">
    <div class="panel-heading"><h1></span>List of Products</h1></div>
<div class="table_margin">
<table class="table table-bordered">
        <thead>
            <tr>
            <th style="text-align: center;">ID</th>
            <th style="text-align: center;">Category Name</th>
            <th style="text-align: center;">Brand Name</th>
            <th style="text-align: center;">Product Name</th>
            <th style="text-align: center;">Product Model</th>
            <th style="text-align: center;">Quantity</th>
            <th style="text-align: center;">Supplier Name</th>
            <th style="text-align: center;">Status</th>
            <th style="text-align: center;" colspan="2">Operation</th>
      	    </tr>
        </thead>    
        
         <?php
		 $key="";
	if(isset($_POST['searchtxt']))
		$key=$_POST['searchtxt'];
	
	if($key !="")
		$sql_sel=mysqli_query($con, "SELECT * FROM `ims_product` WHERE `pname` LIKE '%$key%' ");
	else
    		$sql_sel=mysqli_query($con, "SELECT * FROM `ims_product`");
			
			$i=0;
    while($row=mysqli_fetch_array($sql_sel)){
    $i++;

    $catt=$row['categoryid'];
    $sql_cat=mysqli_query($con, "SELECT * FROM `ims_category` WHERE `categoryid`=$catt ");
    $rowc= mysqli_fetch_assoc($sql_cat);

    $brandd=$row['brandid'];
    $sql_brandd=mysqli_query($con, "SELECT * FROM `ims_brand` WHERE `id`=$brandd ");
    $rowb= mysqli_fetch_assoc($sql_brandd);

    $supp=$row['supplier'];
    $sql_supp=mysqli_query($con, "SELECT * FROM `ims_supplier` WHERE `supplier_id`=$supp ");
    $rows= mysqli_fetch_assoc($sql_supp);
    	?>
        <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $rowc['name'];?></td>
            <td><?php echo $rowb['bname'];?></td>
            <td><?php echo $row['pname'];?></td>
            <td><?php echo $row['model'];?></td>
            <td><?php echo $row['quantity'];?></td>        
            <td><?php echo $rows['supplier_name'];?></td>
            <td><?php echo $row['status'];?></td>
            <td align="center"><a href="?tag=product_entry&opr=upd&rs_id=<?php echo $row['pid'];?>" title="Update"><img style="-webkit-box-shadow: 0px 0px 0px 0px rgba(50, 50, 50, 0.75);-moz-box-shadow:    0px 0px 0px 0px rgba(50, 50, 50, 0.75);box-shadow:         0px 0px 0px 0px rgba(50, 50, 50, 0.75);" src="picture/update.png" height="20" alt="Update" /></a></td>
            <td align="center"><a href="?tag=view_product&opr=del&rs_id=<?php echo $row['pid'];?>" title="Delete"><img style="-webkit-box-shadow: 0px 0px 0px 0px rgba(50, 50, 50, 0.75);-moz-box-shadow:    0px 0px 0px 0px rgba(50, 50, 50, 0.75);box-shadow:         0px 0px 0px 0px rgba(50, 50, 50, 0.75);" src="picture/delete.jpg" height="20" alt="Delete" /></a></td>
        </tr>
    <?php	
    }
    
    ?>
   	</table>
       

</div><!--end of content_input -->
</body>
</html>