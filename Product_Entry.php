<?php
$id="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
//--------------add data-----------------	
if(isset($_POST['btn_sub'])){
	$category=$_POST['category'];
	$brand=$_POST['brand'];
    $pname=$_POST['pname'];
	$model=$_POST['model'];
	$description=$_POST['description'];
	$quantity=$_POST['quantity'];
	$unit=$_POST['unit'];
	$base_price=$_POST['base_price'];
	$tax=$_POST['tax'];
	$min_order=$_POST['min_order'];
	$supplier=$_POST['supplier'];
	$status=$_POST['status'];


$sql_ins=mysqli_query($con, "INSERT INTO ims_product
						VALUES(
					        NULL,
							'$category',
							'$brand',
                            '$pname',
                            '$model',
                            '$description',
                            '$quantity',
                            '$unit',
                            '$base_price',
                            '$tax',
                            '$min_order',
                            '$supplier',
							'$status'   
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
	$category=$_POST['category'];
	$brand=$_POST['brand'];
    $pname=$_POST['pname'];
	$model=$_POST['model'];
	$description=$_POST['description'];
	$quantity=$_POST['quantity'];
	$unit=$_POST['unit'];
	$base_price=$_POST['base_price'];
	$tax=$_POST['tax'];
	$min_order=$_POST['min_order'];
	$supplier=$_POST['supplier'];
	$status=$_POST['status'];	
	
	$sql_update=mysqli_query($con, "UPDATE ims_product SET
          					    categoryid='$category',
								brandid='$brand',
                                pname='$pname',
								model='$model',
								description='$description',
								quantity='$quantity',
								unit='$unit',
								base_price='$base_price',
								tax='$tax',
								minimum_order='$min_order',
								supplier='$supplier',
								status='$status'
							WHERE
								pid=$id
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
	$sql_upd=mysqli_query($con, "SELECT * FROM ims_product WHERE pid=$id");
	
	$rs_upd=mysqli_fetch_array($sql_upd);
?>

<!-- Product Detials Upadte form-->

<div class="panel panel-default">
  		<div class="panel-heading"><h1> Product Update Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you can update/edit Products' detail into database.</p>
			</div> 

 
<div class="container_form">
    <form method="post">
            <div class="form_input_box">
                <span class="p_font">Category Name : </span>&nbsp;&nbsp;&nbsp;
                    <select name="category" required="required" style="width: 300px; height:30px;">
							<option selected disabled value="">-- select --</option>
                            <?php
                               $category_name=mysqli_query($con,"SELECT * FROM ims_category");
							   while($row=mysqli_fetch_array($category_name)){
                                if($row['categoryid']==$rs_upd['categoryid'])
								   		$iselect="selected";
									else
										$iselect="";
								?>
                        		<option value="<?php echo $row['categoryid'];?>" <?php echo $iselect ?>> <?php echo $row['name'];?> </option>
                                <?php 
							   }
                            ?>
                    </select>
            </div>

            <div class="form_input_box">
                <span class="p_font">Brand Name : </span>&nbsp;&nbsp;&nbsp;
                    <select name="brand" required="required" style="width: 300px; height:30px;">
							<option selected disabled value="">-- select --</option>
                            <?php
                               $b_name=mysqli_query($con,"SELECT * FROM ims_brand");
							   while($row=mysqli_fetch_array($b_name)){
                                if($row['id']==$rs_upd['brandid'])
								   		$iselect="selected";
									else
										$iselect="";
								?>
                        		<option value="<?php echo $row['id'];?>" <?php echo $iselect ?>> <?php echo $row['bname'];?> </option>
                                <?php 
							   }
                            ?>
                    </select>
              	</div>

				<!-- <div class="form_input_box">
				<span class="p_font">Brand name : </span>&nbsp;&nbsp;&nbsp;
					<input type="text" name="bname" class="form-control" value="<?php echo $rs_upd['bname'];?>" />
				</div><br> -->

                <div class="form_input_box">
				<span class="p_font">Product Name : </span>&nbsp;&nbsp;&nbsp;
					<input type="text" name="pname" class="form-control" value="<?php echo $rs_upd['pname'];?>" />
				</div><br>

                <div class="form_input_box"> 
				<span class="p_font">Product Model : </span>&nbsp;&nbsp;&nbsp;
					<input type="text" name="model" class="form-control" value="<?php echo $rs_upd['model'];?>" />
				</div><br>

                <div class="form_input_box">
				<span class="p_font">Description : </span>&nbsp;&nbsp;&nbsp;
					<input type="text" name="description" class="form-control" value="<?php echo $rs_upd['description'];?>" />
				</div><br>

                <div class="form_input_box">
				<span class="p_font">Quantity : </span>&nbsp;&nbsp;&nbsp;
					<input type="number" name="quantity" class="form-control" value="<?php echo $rs_upd['quantity'];?>" />&nbsp;&nbsp;&nbsp;
					<input type="text" name="unit" class="form-control" value="Nos.";?>

                </div><br>

                <div class="form_input_box">
				<span class="p_font">Base Price : </span>&nbsp;&nbsp;&nbsp;
					<input type="text" name="base_price"  class="form-control" value="<?php echo $rs_upd['base_price'];?>" />
				</div><br>

                <div class="form_input_box">
				<span class="p_font">Tax : </span>&nbsp;&nbsp;&nbsp;
					<input type="number" name="tax" class="form-control" value="<?php echo $rs_upd['tax'];?>" />
				</div><br>

                <div class="form_input_box">
				<span class="p_font">Minimum Order : </span>&nbsp;&nbsp;&nbsp;
					<input type="number" name="min_order" class="form-control" value="<?php echo $rs_upd['minimum_order'];?>" />
				</div><br>

                <div class="form_input_box">
                    <span class="p_font">Supplier Name : </span>&nbsp;&nbsp;&nbsp;
                    <select name="supplier" required="required" style="width: 300px; height:30px;">
							<option selected disabled value="">-- select --</option>
                            <?php
                               $s_name=mysqli_query($con,"SELECT * FROM ims_supplier");
							   while($row=mysqli_fetch_array($s_name)){
                                if($row['supplier_id']==$rs_upd['supplier'])
								   		$iselect="selected";
									else
										$iselect="";
								?>
                        		<option value="<?php echo $row['supplier_id'];?>" <?php echo $iselect ?>> <?php echo $row['supplier_name'];?> </option>
                                <?php 
							   }
                            ?>
                    </select>
              	</div>

                  <!-- <div class="form_input_box">
                    <span class="p_font">Status : </span>&nbsp;&nbsp;&nbsp;
                    <select name="status" required="required" style="width: 300px; height:30px;">
							<option  disabled value="">-- select --</option>

                        		<option value="Active" <?php if ($row['status']=="Active")  echo "selected";?>> Active </option>
                                <option value="Notactive" <?php if ( $row['status']=="Notactive")  echo "selected";?>> Not Active </option>
                             
                    </select>
              	</div> -->

                <input type="hidden" name="status" value="Active"/>

								
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
  		<div class="panel-heading"><h1> Products Entry Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you can add new Products' details into database.</p>
			</div>

<div class="container_form">
    <form method="post">
				<div class="form_input_box">
                <span class="p_font">Category Name : </span>&nbsp;&nbsp;&nbsp;
                    <select name="category" required="required" style="width: 300px; height:30px;">
							<option selected disabled value="">-- select --</option>
                            <?php
                               $category_name=mysqli_query($con,"SELECT * FROM ims_category");
							   while($row=mysqli_fetch_array($category_name)){
								?>
                        		<option value="<?php echo $row['categoryid'];?>"> <?php echo $row['name'];?> </option>
                                <?php 
							   }
                            ?>
                    </select>
              	</div>

                <div class="form_input_box">
                <span class="p_font">Brand Name : </span>&nbsp;&nbsp;&nbsp;
                    <select name="brand" required="required" style="width: 300px; height:30px;">
							<option selected disabled value="">-- select --</option>
                            <?php
                               $b_name=mysqli_query($con,"SELECT * FROM ims_brand");
							   while($row=mysqli_fetch_array($b_name)){
								?>
                        		<option value="<?php echo $row['id'];?>"> <?php echo $row['bname'];?> </option>
                                <?php 
							   }
                            ?>
                    </select>
              	</div>

				<div class="form_input_box">
				<span class="p_font">Product Name : </span>&nbsp;&nbsp;&nbsp;
					<input type="text" name="pname" class="form-control" placeholder="Product Name..." required />
				</div><br>	

                <div class="form_input_box">
				<span class="p_font">Product Model : </span>&nbsp;&nbsp;&nbsp;
					<input type="text" name="model" class="form-control" placeholder="Model..." required />
				</div><br>	

                <div class="form_input_box">
				<span class="p_font">Description : </span>&nbsp;&nbsp;&nbsp;
					<input type="text" name="description" class="form-control" placeholder="Description..." required />
				</div><br>	

                <div class="form_input_box">
				<span class="p_font">Quantity : </span>&nbsp;&nbsp;&nbsp;
					<input type="number" name="quantity" class="form-control" placeholder="Quantity..." required />&nbsp;&nbsp;&nbsp;
                    <input type="text" name="unit" class="form-control" value="Nos." />
				</div><br>	

                <div class="form_input_box">
				<span class="p_font">Base Price : </span>&nbsp;&nbsp;&nbsp;
					<input type="number" name="base_price" pattern=[0-9] class="form-control" placeholder="Base Price..." required />
				</div><br>	

                <div class="form_input_box">
				<span class="p_font">Tax : </span>&nbsp;&nbsp;&nbsp;
					<input type="number" name="tax" class="form-control" placeholder="Tax..." required />
				</div><br>	 

                <div class="form_input_box">
				<span class="p_font">Minimum Order : </span>&nbsp;&nbsp;&nbsp;
					<input type="number" name="min_order" class="form-control" placeholder="Minimum Order..." required />
				</div><br>	   
                
                <div class="form_input_box">
                <span class="p_font">Supplier Name : </span>&nbsp;&nbsp;&nbsp;
                    <select name="supplier" required="required" style="width: 300px; height:30px;">
							<option selected disabled value="">-- select --</option>
                            <?php
                               $s_name=mysqli_query($con,"SELECT * FROM ims_supplier");
							   while($row=mysqli_fetch_array($s_name)){
								?>
                        		<option value="<?php echo $row['supplier_id'];?>"> <?php echo $row['supplier_name'];?> </option>
                                <?php 
							   }
                            ?>
                    </select>
              	</div>

                <input type="hidden" name="status" value="Active"/>

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