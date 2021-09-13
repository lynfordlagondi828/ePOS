<?php

  require_once 'sessions.php';
  $id = $_SESSION["id"];
  $user_type = $_SESSION["user_type"];
  $fullname = $_SESSION["fullname"];


   require_once 'includes/DbFunctions.php';
  $database = new DbFunctions();

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



  <link rel="stylesheet" href="main/css/font-awesome.min.css">
    <style type="text/css">

      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="main/css/bootstrap-responsive.css" rel="stylesheet">
<link href="style.css" media="screen" rel="stylesheet" type="text/css" />
<link href="main/src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="main/lib/jquery.js" type="text/javascript"></script>
<script src="main/src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">



    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        <?php require_once 'topbar.php'; ?>

        <div id="mainmain">
            <h1 style="color:#000"><strong>WebWonderPOS Menu</strong></h1><br>
                  <a  href="point_of_sale.php"><i clWebWonderPOS Menuass="fas fa-cash-register"></i> </i><br> Point of Sale</a>
                  <a  href="products.php"><i class="fab fa-product-hunt"></i><br> Products</a>
                  <a href="invoice.php"><i class="fa fa-list-alt"></i><br> Invoice</a>
                  <a href="sales.php"><i class="fas fa-money-bill"></i><br> Sales</a>
                  <a href="total_sales.php"><i class="fab fa fa-bug"></i><br> Total Sales</a>

                  <a href="customer.php"><i class="fa fa-users"></i><br> Customer</a>

                  <a href="expenses.php"><i class="fa fa-users"></i><br> Expenses</a>

                  <a href="credits.php"><i class="fa fa-users"></i><br> Credits</a>

                  <a href="employee.php"><i class="fa fa-users"></i><br> Employee</a>



                  </div>
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php require_once 'footer.php'; ?>
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
