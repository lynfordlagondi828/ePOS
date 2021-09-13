<?php

 require_once 'sessions.php';
  $id = $_SESSION["id"];
  $user_type = $_SESSION["user_type"];
  $fullname = $_SESSION["fullname"];

  require_once 'includes/DbFunctions.php';
  $database = new DbFunctions();
  $invoice_list = $database->get_all_invoice();
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
  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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

              <!-- Begin Page Container Fluid -->
              <div class="container" style="background:#d0d0d0; padding: 10px;" >

                <!-- Page Heading -->
                <h3 style="color:white;">Invoice</h3>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                  <div class="card-header py-3">


                      <h6 class="m-0 font-weight-bold text-primary">Invoice List</h6>

                  </div>
                  <div class="card-body">
                      <table class="table table-bordered" id="dataTable">
                        <thead>
                          <tr>
                            <th>Invoice Number</th>
                            <th>Cash</th>
                            <th>Total</th>
                            <th>Change</th>
                            <th>Date</th>
                            <th>View</th>

                          </tr>
                        </thead>

                        <tbody>
                          <?php foreach($invoice_list as $invoice): ?>
                            <tr>
                                <td><?php echo $invoice["invoice_no"]; ?></td>
                                <td><?php echo $invoice["cash"]; ?></td>
                                <td><?php echo $invoice["total"]; ?></td>
                                <td><?php echo $invoice["change_amount"]; ?></td>
                                <td><?php echo $invoice["created_at"]; ?></td>
                                <td>
                                  <a class="btn btn-warning btn-sm" href="sales_invoice.php?invoice_number=<?php echo $invoice["invoice_no"]; ?>"><i class="fas fa-list"></i> View</a>

                                </td>


                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                      </table>
                  </div>
                </div>

              </div>
              <!-- /.container-fluid -->
      </div>

      <!-- Footer -->
      <?php //require 'footer.php'; ?>
      <!-- End of Footer -->
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
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
