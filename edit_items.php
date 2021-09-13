<?php

  require_once 'sessions.php';
  $id = $_SESSION["id"];

  $user_type = $_SESSION["user_type"];
  $fullname = $_SESSION["fullname"];

	require_once 'includes/DbFunctions.php';
	$database = new DbFunctions();



  if (isset($_GET["id"])) {

    $id =trim($_GET["id"]);
  }

  $id = intval($_GET['id']);


  //get single item from cart
  $get = $database->get_item_details($id);
  $product_id = $get["product_id"];
  $product_description = $get["product_description"];
  $cur_qty = $get["qty"];
  $price = $get["price"];

  //get current no. of stocks

  $stocks  = $database->get_single_item_for_billing_area($product_id);
  $current_stocks = $stocks["stocks"];


  $err_logs = "";
  //post method
  if (isset($_POST["update"])) {

  	$qty  = trim($_POST["qty"]);
  	$final_total = $qty * $price;

  	# code...
  	if ($current_stocks < $qty){
	   	echo '
	          <script>
	            alert("Sorry! This Item is out of Stocks");
	          </script>
	      ';

	      $err_logs = "<p class='alert alert-danger'>Sorry! This Item is out of Stocks</p>";

   } else {

   			if ($qty == $cur_qty) {
   				# code...
   				$database->update_cart($id,$qty,$final_total);
   				echo '
		            <script>
		              setTimeout(function(){
		              window.location="point_of_sale.php";
		                },500)
		            </script>
		          ';

   			}elseif ($qty < $cur_qty) {


   				$available_stocks = $stocks["stocks"];
   				$my_quantity = $cur_qty + $available_stocks;
   				$update_stocks = $my_quantity - $qty;
		        $database->update_stocks($product_id,$update_stocks);
		         $database->update_cart($id,$qty,$final_total);
		         echo '
		            <script>
		              setTimeout(function(){
		              window.location="point_of_sale.php";
		                },500)
		            </script>
		          ';



   			} elseif ($qty > $cur_qty) {
   				# code...
   				$available_stocks = $stocks["stocks"];
   				$my_quantity = $cur_qty + $available_stocks;
   				$update_stocks = $my_quantity - $qty;
		        $database->update_stocks($product_id,$update_stocks);
		         $database->update_cart($id,$qty,$final_total);
		         echo '
		            <script>
		              setTimeout(function(){
		              window.location="point_of_sale.php";
		                },500)
		            </script>
		          ';
   			} else {

   			}




   }

  }

?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>WebWonderPOS | Edit Items</title>
  <link rel="icon" href="ico/shopping_basket_green.ico" type="image/icon">
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <style>
      .div1 {
        width: 500px;
        height: 100px;
        border: 1px solid blue;
        background: #fff;
        margin-left: 100px;
      }
  </style>
</head>
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        <?php require_once 'topbar.php'; ?>
        <div align="center">
        <h1 style="color: blue">Update Quantity</h1>
          <h3 style="color:#000"><strong>ITEM: <?php echo $product_description; ?></strong></h3>
          <h3 style="color:#000"><strong>Price: <?php echo $price; ?></strong></h3>
          <h3 style="color:#000"><strong>Stocks: <?php echo $current_stocks; ?></strong></h3>

            <form method="post">
              <table>
                <tr>
                  <td><label>Change Quantity</label><input type="number" class="form-control" name="qty" placeholder="QTY" value="<?php echo $cur_qty; ?>">
                  </td>
                </tr>
                <tr>
                	<td>
                		<?php echo $err_logs;  ?>
                	</td>
                </tr>

                <tr>
                  <td> <button class=" form-control btn btn-info" name="update">Update</button></td>
                </tr>
                <tr>
                  <td><a class="form-control btn btn-danger" href="index.php">Cancel</a></td>
                </tr>

              </table>
            </form>
              <hr>

            </div>
        </div>

        </div>
      </div>
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->

      <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Bootstrap core JavaScript-->

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>



</html>
