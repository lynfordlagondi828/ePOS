<?php
	
  require_once 'sessions.php';
  $id = $_SESSION["id"];
  $fullname = $_SESSION["fullname"];

	require_once 'includes/DbFunctions.php';
	$database = new DbFunctions();



  if (isset($_GET["id"])) {
    
    $id =trim($_GET["id"]);
  }

  $id = intval($_GET['id']);

  $details = $database->get_item_details($id);

  $product_id = $details["product_id"];
  $quantity = $details["qty"];
  

  $stocks = $database->get_current_stock_by_product_id($product_id);

  $current_stocks = $stocks["stocks"];

  $final_stocks = $current_stocks + $quantity;


  $database->update_stock_after_deletion($product_id,$final_stocks);
  $database->delete_single_items_in_cart($id);
  header('location:point_of_sale.php');
  exit();
?>