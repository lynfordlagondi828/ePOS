<?php

 require_once 'sessions.php';
  $id = $_SESSION["id"];
  $user_type = $_SESSION["user_type"];
  $fullname = $_SESSION["fullname"];

  require_once 'includes/DbFunctions.php';
  $database = new DbFunctions();
  $prod_list = $database->get_all_products();
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
              <div class="container" style="background:coral; padding: 10px;" >

                <!-- Page Heading -->
                <h3 style="color:white;">Products</h3>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                  <div class="card-header py-3">

                      <?php

                        if ($user_type == 'admin') {

                            echo '
                            <a class="btn btn-success" href="add_new_products.php"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
                            ';
                            echo '
                            <a class="btn btn-info" href="print.php"><i class="fa fa-print" aria-hidden="true"></i> Print</a>
                            ';




                        }
                      ?>

                      <h6 class="m-0 font-weight-bold text-primary">Product List</h6>

                  </div>
                  <div class="card-body">
                      <table class="table table-bordered" id="dataTable">
                        <thead>
                          <tr>
                            <th>Product Code</th>
                            <th>Product Description</th>

                            <?php if ($user_type == 'admin') {?>
                            <th>Cost</th>
                            <?php } ?>

                            <th>Price</th>
                            <?php if($user_type == 'admin'){ ?>
                            <th>Total Cost</th>
                            <?php }?>
                            <th>Stocks</th>

                            <?php if($user_type == 'admin'){ ?>
                            <th>Action</th>
                            <?php }?>
                          </tr>
                        </thead>

                        <tbody>
                          <?php foreach($prod_list as $products): ?>
                            <tr>
                              <td><?php echo $products['code'] ?></td>
                              <td><?php echo $products['product_description'] ?></td>
                            <?php if($user_type == 'admin'){ ?>
                              <td><?php echo $products["cost"] ?></td>
                            <?php }?>

                              <td><?php echo $products['price'] ?></td>
                              <?php if($user_type == 'admin'){ ?>
                                <td><?php echo $products['total_cost'] ?></td>
                              <?php } ?>
                              <td><?php echo $products['stocks']; ?></td>
                              <?php if($user_type == 'admin'){ ?>
                                <td>
                                  <a class="btn btn-warning btn-sm" href="edit_products.php?id=<?php echo $products["id"]; ?>"><i class="fas fa-edit"></i></a>
                                  <a class="btn btn-danger btn-sm" href="delete_products.php?id=<?php echo $products["id"]; ?>" onclick="return confirm('Are you sure?');"><i class="fas fa-trash"></i></a>
                                </td>
                              <?php }?>

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
      <?php require 'footer.php'; ?>
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
