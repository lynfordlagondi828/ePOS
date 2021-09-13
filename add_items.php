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

  $get  = $database->get_single_item_for_billing_area($id);

  $product_description = $get["product_description"];
  $price = $get["price"];
  $number_of_stocks = $get["stocks"];

  $err_logs = "";

  if (isset($_POST['submit'])) {



    $qty = trim($_POST["qty"]);
    $total = $price * $qty;

    if ($number_of_stocks < $qty) {

      echo '
          <script>
            alert("Sorry! This Item is out of Stocks");
          </script>
      ';

      $err_logs = "<p class='alert alert-danger'>Sorry! This Item is out of Stocks</p>";

    } else {

      if($database->check_if_exists($id)) {

        # code...
        //Update if exists
        $current = $database->get_current_quantity($id);
        $my_qty = $current["qty"];
        $current_price = $current["price"];
        $current_total = $current["total"];

        //total quantity
        $val_qty = $my_qty + $qty;
        $final_total = $val_qty * $current_price;
        $database->update_quantity_if_exist($id,$val_qty,$final_total);
/////////---------------------------------------------///////////////////////
        //Update stocks from products
        $available_stocks = $get["stocks"];
        $update_stocks = $available_stocks - $qty;
        $database->update_stocks($id,$update_stocks);
         echo '
            <script>
              setTimeout(function(){
              window.location="point_of_sale.php";
                },500)
            </script>
          ';

      } else {
        $result = $database->addCart($id,$product_description,$qty,$price,$total);
        if (!$result) {

        //  $available_stocks = $database->get_single_item_for_billing_area($id);
          $available_stocks = $get["stocks"];
          $update_stocks = $available_stocks - $qty;
          $database->update_stocks($id,$update_stocks);

          echo '
            <script>
              setTimeout(function(){
              window.location="point_of_sale.php";
                },500)
            </script>
          ';
        } else{

        }
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

  <title>WebWonderPOS | Add Items</title>
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
          <h3 style="color:#000"><strong>ITEM: <?php echo $product_description; ?></strong></h3>
                <h3 style="color:#000"><strong>Price: <?php echo $price; ?></strong></h3>
                <h3 style="color:#000"><strong>Available Stocks: <?php echo $number_of_stocks; ?></strong></h3>
            <form method="post">
              <table>
                <tr>
                  <td><label>Enter Quantity</label><input type="number" class="form-control" name="qty" placeholder="QTY" value="1" required>
                  </td>
                </tr>
                <tr>
                  <td><?php echo $err_logs; ?></td>
                </tr>
                <tr>
                  <td> <button class=" form-control btn btn-primary" name="submit">Proceed</button></td>
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
