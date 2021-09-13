<?php

 require_once 'sessions.php';
  $id = $_SESSION["id"];
  $user_type = $_SESSION["user_type"];
  $fullname = $_SESSION["fullname"];

  require_once 'includes/DbFunctions.php';
  $database = new DbFunctions();

  $err_logs = '';

  if (isset($_GET["id"])) {
    // code...
    $id = trim($_GET["id"]);
  }

  $id = intval($_GET["id"]);

  $singleProduct = $database->get_single_products($id);

  $pdesc = $singleProduct['product_description'];
  $cost = $singleProduct["cost"];
  $price = $singleProduct["price"];
  $stocks = $singleProduct["stocks"];


  if (isset($_POST['save_changes'])) {

    $product_description = trim($_POST["product_description"]);
    $cost = trim($_POST["cost"]);
    $price = trim($_POST["price"]);
    $stocks = trim($_POST["stocks"]);
    $total_cost = $cost * $stocks;

    $database->editProducts($id,$product_description,$cost,$price,$total_cost,$stocks);
    header('location:products.php');

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
              <div class="container" style="background: #FFBBBB; padding: 10px;" >

                <!-- Page Heading -->
                <h3 style="color:white;">Edit Products</h3>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 > Edit Product Details</h6>
                  </div>
                  <div class="card-body">
                      <form method="post">
                        <table id="table1"; cellspacing="5px" cellpadding="5%";>
                          <tr>
                            <td  align="right" class="style1"></td>
                            <td class="style1">
                            <?php echo $err_logs; ?>
                            </td>
                          </tr>
                          <tr>
                            <td  align="right" class="style1">Product Description:</td>
                            <td class="style1">
                              <textarea class="form-control" name="product_description" rows="4" cols="40" required><?php echo $pdesc; ?></textarea>
                            </td>
                          </tr>

                          <tr>
                            <td  align="right" class="style1">Cost:</td>
                            <td class="style1">
                              <input class="form-control" type="text" name="cost" placeholder="Cost" value="<?php echo $cost; ?>">
                            </td>
                          </tr>

                          <tr>
                            <td  align="right" class="style1">Price:</td>
                            <td class="style1">
                              <input class="form-control" type="text" name="price" placeholder="Price" value="<?php echo $price; ?>">
                            </td>
                          </tr>

                          <tr>
                            <td  align="right" class="style1">Stocks:</td>
                            <td class="style1">
                              <input class="form-control" type="number" name="stocks" placeholder="Stocks" value="<?php echo $stocks; ?>">
                            </td>
                          </tr>

                          <tr>
                            <td  align="right" class="style1"></td>
                            <td class="style1">
                              <button  class="form-control btn btn-success"  name="save_changes">Save Changes</button>
                            </td>
                          </tr>
                        <table>
                      </form>

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
