<?php
$con = mysqli_connect("localhost","root", "") or die("No Connection");
mysqli_select_db($con, "ims_db") or die("No Database connected!");
?>