<?php
	session_start();
	require("conection/connect.php");
	$tag="";
	if (isset($_GET['tag']))
	$tag=$_GET['tag'];
?>

<html>
<head>
<title>Inventory</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="jquery-1.11.0.js"></script>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css"/>
<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body >


	<div>
    <div class="logout_btn">	
        	<a href="index.php" class="btn btn-primary btn-large">Logout <i class="icon-white icon-check"></i></a>

	</div>
	</div><br><br>
    <div class="title_container"> 
        <div class="titlee">
            <h1>Inventory Management System</h1>
        </div>
	</div><br><br>
                        
                        <div class="dropdownmenu_container">
                            <?php        
                            include './drop_down_menu.php';
                            ?>
                        </div><br><br>
		
		<div class="container_middle">		
			
			<div class="container_show_post">
				<?php
   						// if($tag=="home" or $tag=="")
						// 	include("main.php");
                        if($tag=="home" or $tag=="")
							include("Inventory.php");
                        elseif($tag=="customer_entry")
                            include("Customer_Entry.php");
                        elseif($tag=="view_customer")
                            include("View_Customer.php");
                        elseif($tag=="category_entry")
                            include("Category_Entry.php");
                        elseif($tag=="view_category")
                            include("View_Category.php");
                        elseif($tag=="brand_entry")
                            include("Brand_Entry.php");
                        elseif($tag=="view_brand")
                            include("View_Brand.php");
                        elseif($tag=="supplier_entry")
                            include("Supplier_Entry.php");
                        elseif($tag=="view_supplier")
                            include("View_Supplier.php");
                        elseif($tag=="product_entry")
                            include("Product_Entry.php");
                        elseif($tag=="view_product")
                            include("View_Product.php");
                        elseif($tag=="purchase_entry")
                            include("Purchase_Entry.php");
                        elseif($tag=="view_purchase")
                            include("View_Purchase.php");
                        elseif($tag=="order_entry")
                            include("Order_Entry.php");
                        elseif($tag=="view_order")
                            include("View_Order.php");
							
							/*if(empty($tag)){
								include ("Students_Entry.php");
							}
							else{
								include $tag;
							}*/
									
                        ?>
                    </div>
		</div>                
	</div>
        
</body>
</html>