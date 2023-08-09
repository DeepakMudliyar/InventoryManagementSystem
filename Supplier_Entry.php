<?php
$id="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
//--------------add data-----------------	
if(isset($_POST['btn_sub'])){
	$sname=$_POST['sname'];
	$mobile=$_POST['mobile'];
    $address=$_POST['address'];
	$status=$_POST['status'];


$sql_ins=mysqli_query($con, "INSERT INTO ims_supplier 
						VALUES(
							NULL,
							'$sname',
							'$mobile',
                            '$address',
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
	$sname=$_POST['sname'];
	$mobile=$_POST['mobile'];
    $address=$_POST['address'];
	$status=$_POST['status'];
	
	$sql_update=mysqli_query($con, "UPDATE ims_supplier SET
          					    supplier_name='$sname',
								mobile='$mobile',
                                address='$address',
								status='$status'
							WHERE
								supplier_id=$id
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
	$sql_upd=mysqli_query($con, "SELECT * FROM ims_supplier WHERE supplier_id=$id");
	
	$rs_upd=mysqli_fetch_array($sql_upd);
?>

<!-- Customer Detials Upadte form-->

<div class="panel panel-default">
  		<div class="panel-heading"><h1> Suppliers' Update Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you can update/edit Supplier detail into database.</p>
			</div> 

 
<div class="container_form">
    <form method="post">

				<div class="form_input_box">
				<span class="p_font">Supplier name : </span>&nbsp;&nbsp;&nbsp;
					<input type="text" name="sname" class="form-control" value="<?php echo $rs_upd['supplier_name'];?>" />
				</div><br>

                <div class="form_input_box">
				<span class="p_font">Mobile : </span>&nbsp;&nbsp;&nbsp;
					<input type="text" name="mobile" pattern="[0-9]{10}" class="form-control" value="<?php echo $rs_upd['mobile'];?>" />
				</div><br>

                <div class="form_input_box">
				<span class="p_font">Address : </span>&nbsp;&nbsp;&nbsp;
					<input type="text" name="address" class="form-control" value="<?php echo $rs_upd['address'];?>" />
				</div><br>

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
<!-- Students Entry Form-->
	
<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-user"></span> Supplier Entry Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you can add new Suppliers' details into database.</p>
			</div>

<div class="container_form">
    <form method="post">

				<div class="form_input_box">
				<span class="p_font">Supplier Name : </span>&nbsp;&nbsp;&nbsp;
					<input type="text" name="sname" class="form-control" placeholder="Supplier Name..." required />
				</div><br>	
                
                <div class="form_input_box">
				<span class="p_font">Mobile : </span>&nbsp;&nbsp;&nbsp;
					<input type="text" name="mobile" class="form-control" placeholder="Mobile No...." required />
				</div><br>	

                <div class="form_input_box">
				<span class="p_font">Address : </span>&nbsp;&nbsp;&nbsp;
					<input type="text" name="address" class="form-control" placeholder="Address..." required />
				</div><br>	

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