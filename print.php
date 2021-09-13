<?php

 require_once 'sessions.php';
  $id = $_SESSION["id"];
  $user_type = $_SESSION["user_type"];
  $fullname = $_SESSION["fullname"];

  require_once 'includes/DbFunctions.php';
  $database = new DbFunctions();
  $prod_list = $database->print_all_products();
  echo '
    <script>
        window.print();
    </script>
  ';
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
              <div class="container" style="padding: 10px;" >

                <!-- Page Heading -->
                <h3 style="color:white;">Products</h3>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                  <div class="card-header py-3">



                      <h6 class="m-0 font-weight-bold text-primary">Product List</h6>

                  </div>
                  <div class="card-body">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Product Code</th>
                            <th>Product Description</th>
                            <th>Price</th>


                          </tr>
                        </thead>

                        <tbody>
                          <?php foreach($prod_list as $products): ?>
                            <tr>
                              <td><?php echo $products['code'] ?></td>
                              <td><?php echo $products['product_description'] ?></td>
                              <td><?php echo $products['price'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                      </table>
                      <strong><h3 style="color:#000" align="right">Final Cost:<?php echo  $database->get_final_cost_overall(); ?></h3></strong>
                  </div>
                </div>

              </div>
              <!-- /.container-fluid -->
      </div>

      <!-- Footer -->
      <!-- End of Footer -->
    </div>
  </div>



</body>

</html>
