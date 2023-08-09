<?php
$id="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
//--------------add data-----------------	
if(isset($_POST['btn_sub'])){
	$customer=$_POST['customer'];
	$product=$_POST['product'];
	$quantity=$_POST['quantity'];


$sql_ins=mysqli_query($con, "INSERT INTO ims_order
						VALUES(
					        NULL,
							'$product',
							'$quantity',
                            '$customer',
							NULL
							)
					");
if($sql_ins==true)
	// $msg="1 Row Inserted";
	echo "<div style='background-color: white;color: green; padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
				. "<span class='p_font'>"
				. "1 Row Inserted Sucessfully"
				. "</span>"
				. "</div>";
else
	// $msg="Insert Error:".mysql_error();
	echo "<div style='background-color: white;color: red; padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
				. "<span class='p_font'>"
				. "Insert Error:". "mysqli_error();"
				. "</span>"
				. "</div>";
	
}
//------------------update data----------
if(isset($_POST['btn_upd'])){
	$customer=$_POST['customer'];
	$product=$_POST['product'];
	$quantity=$_POST['quantity'];	
	
	$sql_update=mysqli_query($con, "UPDATE ims_order SET
          					    product_id='$product',
								total_shipped='$quantity',
                                customer_id='$customer'
							WHERE
								order_id=$id
							");
	if($sql_update=='true')
		echo "<div style='background-color: white; color: green; padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                . "<span class='p_font'>"
                . "Record Updated Successfully... !"
                . "</span>"
                . "</div>";
	else
		// $msg="Update Failed...!";
		echo "<div style='background-color: white; color: red; padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                . "<span class='p_font'>"
                . "Update Failed...!" . mysqli_error($con)
                . "</span>"
                . "</div>";
	}
?>


<html>
<head>
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
<?php

if($opr=="upd")
{
	$sql_upd=mysqli_query($con, "SELECT * FROM ims_order WHERE order_id=$id");
	
	$rs_upd=mysqli_fetch_array($sql_upd);
?>

<!-- Product Detials Upadte form-->

<div class="panel panel-default">
  		<div class="panel-heading"><h1> Order Update Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you can update/edit Order detail into database.</p>
			</div> 

 
<div class="container_form">
    <form method="post">
            <div class="form_input_box">
                <span class="p_font">Product Name : </span>&nbsp;&nbsp;&nbsp;
                    <select name="product" required="required" style="width: 300px; height:30px;">
							<option selected disabled value="">-- select --</option>
                            <?php
                               $prod_name=mysqli_query($con,"SELECT * FROM ims_product");
							   while($row=mysqli_fetch_array($prod_name)){
                                if($row['pid']==$rs_upd['product_id'])
								   		$iselect="selected";
									else
										$iselect="";
								?>
                        		<option value="<?php echo $row['pid'];?>" <?php echo $iselect ?>> <?php echo $row['pname'];?> </option>
                                <?php 
							   }
                            ?>
                    </select>
            </div>


                <div class="form_input_box">
				<span class="p_font">Quantity : </span>&nbsp;&nbsp;&nbsp;
					<input type="number" name="quantity" class="form-control" value="<?php echo $rs_upd['quantity'];?>" />&nbsp;&nbsp;&nbsp;
                </div><br>

                <div class="form_input_box">
                    <span class="p_font">Customer Name : </span>&nbsp;&nbsp;&nbsp;
                    <select name="customer" required="required" style="width: 300px; height:30px;">
							<option selected disabled value="">-- select --</option>
                            <?php
                               $s_name=mysqli_query($con,"SELECT * FROM ims_customer");
							   while($row=mysqli_fetch_array($s_name)){
                                if($row['id']==$rs_upd['customer_id'])
								   		$iselect="selected";
									else
										$iselect="";
								?>
                        		<option value="<?php echo $row['id'];?>" <?php echo $iselect ?>> <?php echo $row['name'];?> </option>
                                <?php 
							   }
                            ?>
                    </select>
              	</div>

								
				<div class="form_btn_pos">
					<input type="submit" name="btn_upd" href="#" class="btn btn-primary btn-large" value="Update" />&nbsp;&nbsp;&nbsp;
					<input type="reset"  href="#" class="btn btn-primary btn-large" value="Cancel" />
				</div>
            </form>
			</div>
		</div>
	</div><!-- end of style_informatios -->

<?php	
}
else
{
?>
<!-- Products Entry Form-->
	
<div class="panel panel-default">
  		<div class="panel-heading"><h1> Order Entry Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you can add new Order details into database.</p>
			</div>

<div class="container_form">
    <form method="post">
				<div class="form_input_box">
                <span class="p_font">Product Name : </span>&nbsp;&nbsp;&nbsp;
                    <select name="product" required="required" style="width: 300px; height:30px;">
							<option selected disabled value="">-- select --</option>
                            <?php	
                               $prod_name=mysqli_query($con,"SELECT * FROM ims_product");
							   while($row=mysqli_fetch_array($prod_name)){
								?>
                        		<option value="<?php echo $row['pid'];?>"> <?php echo $row['pname'];?> </option>
                                <?php 
							   }
                            ?>
                    </select>
              	</div>

                <div class="form_input_box">
				<span class="p_font">Quantity : </span>&nbsp;&nbsp;&nbsp;
					<input type="number" name="quantity" class="form-control" placeholder="Quantity..." required />&nbsp;&nbsp;&nbsp;
				</div><br>	   
                
                <div class="form_input_box">
                <span class="p_font">Customer Name : </span>&nbsp;&nbsp;&nbsp;
                    <select name="customer" required="required" style="width: 300px; height:30px;">
							<option selected disabled value="">-- select --</option>
                            <?php
                               $s_name=mysqli_query($con,"SELECT * FROM ims_customer");
							   while($row=mysqli_fetch_array($s_name)){
								?>
                        		<option value="<?php echo $row['id'];?>"> <?php echo $row['name'];?> </option>
                                <?php 
							   }
                            ?>
                    </select>
              	</div>

				<div class="form_btn_pos">
					<input type="submit" name="btn_sub" href="#" class="btn btn-primary btn-large" value="Register" />&nbsp;&nbsp;&nbsp;
					<input type="reset"  href="#" class="btn btn-primary btn-large" value="Cancel" />
				</div>
	</form>
			</div>
		</div>
	</div>
<?php
}
?>
</body>
</html>