<?php

  require_once 'sessions.php';
  $id = $_SESSION["id"];

  $user_type = $_SESSION["user_type"];
  $fullname = $_SESSION["fullname"];

   require_once 'includes/DbFunctions.php';
  $database = new DbFunctions();

  $prod_list = $database->get_all_products();

  $cart_list = $database->get_all_cart();

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>WebWonderPOS</title>
  <link rel="icon" href="ico/shopping_basket_green.ico" type="image/icon">
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">



    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        <?php require_once 'topbar.php'; ?>

        <div class="row">
  <div class="col-sm-6">
      <div class="card-body">
        <h1 class="h3 mb-2 text-gray-1000">Products</h1>
          <table  class="table table-responsive" id="dataTable">
            <thead>
              <tr>
                <th>Description</th>
                <th>Price</th>
                <th>Stocks</th>
                <th>Add</th>
              </tr>
            </thead>

              <tbody>
                <?php foreach($prod_list as $products): ?>
                  <tr>
                    <td><?php echo $products['product_description'] ?></td>
                    <td><?php echo $products['price'] ?></td>
                    <td><?php echo $products["stocks"]  ?></td>
                    <td>
                       <a  class="btn btn-danger btn-sm" href="add_items.php?id=<?php echo $products["id"]; ?>">Add
                    </td>
                  </tr>
              <?php endforeach; ?>
              </tbody>
          </table>
      
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <table>
                 <thead>
                    <tr>
                      <th>ITEM</th>
                      <th>QTY</th>
                      <th>Price</th>
                      <th>TOTAL</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($cart_list as $cart): ?>
                      <tr>
                        <td><?php echo $cart['product_description'] ?></td>
                        <td><?php echo $cart['qty'] ?></td>
                        <td><?php echo $cart['price'] ?></td>
                        <td><?php echo $cart['total'] ?></td>
                        <td>
                          <a class="btn btn-info btn-sm" href="edit_items.php?id=<?php echo $cart["id"]; ?>"><i class="fas fa-edit"></i></a>
                          <a class="btn btn-danger btn-sm" href="remove_items.php?id=<?php echo $cart["id"]; ?>"><i class="fas fa-trash-alt" onclick="return confirm('Remove Item?');"></i></a>
                        </td>
                      </tr>
                        <?php endforeach; ?>
                  </tbody>
              </table>
               <?php if(count($cart_list)>0): ?>

              <h1 style="color: #000"><strong>Total: <?php echo $database->get_total_in_cart();  ?></strong></h1>
                <!--
                  Payment Area
                -->
                <!---------------
                  PHP Method
                -->
               <?php


                  $err_logs = "";
                  if (isset($_POST["tender"])) {

                    echo '
                            <script>
                              setTimeout(function(){
                                window.location="sales_page_cart.php";
                              },500)
                            </script>
                          ';
                  }
                ?>
              <form method="post">

                <button class="form-control btn btn-success" name="tender">Tender</button>
              </form>

            <?php else: ?>
                <h1 style="color: #000"><strong>Total: 0.00</strong></h1>
            <?php endif ?>
      </div>
    </div>
  </div>
</div>

        


      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php require 'footer.php'; ?>
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

    <script type="text/javascript">

      $(document).ready(function(){

      });
    </script>

</body>

</html>
