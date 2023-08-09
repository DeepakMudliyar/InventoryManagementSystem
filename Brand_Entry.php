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
	$bname=$_POST['bname'];
	$status=$_POST['status'];


$sql_ins=mysqli_query($con, "INSERT INTO ims_brand 
						VALUES(
							NULL,
							'$category',
							'$bname',
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
	$bname=$_POST['bname'];
	$status=$_POST['status'];	
	
	$sql_update=mysqli_query($con, "UPDATE ims_brand SET
          					    categoryid='$category',
								bname='$bname',
								status='$status'
							WHERE
								id=$id
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
	$sql_upd=mysqli_query($con, "SELECT * FROM ims_brand WHERE id=$id");
	
	$rs_upd=mysqli_fetch_array($sql_upd);
?>

<!-- Customer Detials Upadte form-->

<div class="panel panel-default">
  		<div class="panel-heading"><h1> Brand Update Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you can update/edit Brand detail into database.</p>
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
				<span class="p_font">Brand name : </span>&nbsp;&nbsp;&nbsp;
					<input type="text" name="bname" class="form-control" value="<?php echo $rs_upd['bname'];?>" />
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
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-user"></span> Brand Entry Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you can add new Brand details into database.</p>
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
					<input type="text" name="bname" class="form-control" placeholder="Brand..." required />
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