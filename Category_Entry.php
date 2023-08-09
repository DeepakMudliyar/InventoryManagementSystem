<?php
$id="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
//--------------add data-----------------	
if(isset($_POST['btn_sub'])){
	$name=$_POST['name'];
	$status=$_POST['status'];


$sql_ins=mysqli_query($con, "INSERT INTO ims_category 
						VALUES(
							NULL,
							'$name',
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
    $name=$_POST['name'];
	$status=$_POST['status'];	
	
	$sql_update=mysqli_query($con, "UPDATE ims_category SET
								name='$name',
								status='$status'
							WHERE
								categoryid=$id
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
	$sql_upd=mysqli_query($con, "SELECT * FROM ims_category WHERE categoryid=$id");
	
	$rs_upd=mysqli_fetch_array($sql_upd);
?>

<!-- Customer Detials Upadte form-->

<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-user"></span> Category Update Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you can update/edit Categorys' into database.</p>
			</div> 

 
<div class="container_form">
    <form method="post">
				<div class="form_input_box">
				<span class="p_font">Category Name : </span>&nbsp;&nbsp;&nbsp;
					<input type="text" name="name" class="form-control" value="<?php echo $rs_upd['name'];?>" />
				</div><br>

				<!-- <div class="form_input_box"> -->
				<!-- <span class="p_font">Status : </span>&nbsp;&nbsp;&nbsp; -->
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
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-user"></span> Category Entry Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you can add new Categories into database.</p>
			</div>

<div class="container_form">
    <form method="post">
				<div class="form_input_box">
				<span class="p_font">Name : </span>&nbsp;&nbsp;&nbsp;
					<input type="text" name="name" class="form-control" placeholder="Category name..." required />
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