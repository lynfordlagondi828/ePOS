
<?php

  require_once 'sessions.php';
  $id = $_SESSION["id"];

  $user_type = $_SESSION["user_type"];
  $fullname = $_SESSION["fullname"];

   require_once 'includes/DbFunctions.php';
  $database = new DbFunctions();

  $total_in_cart = $database->get_total_in_cart();
  $list = $database->get_sales_in_cart();

  $cart_list = $database->get_sales_in_cart();


$change_amount = "";
  /**
  * Place Order Confirmation
  **/
  $err_logs = "";
  $loader = "";


  if (isset($_POST["pay_confirm"])) {


      $payment_method = trim($_POST["payment_method"]);

      if ($payment_method == 2) {
        //credit
        //generate invoice no
        $customer_id = trim($_POST["customer_id"]);

        $invoice_no = $database->generate_invoice_no();

        $count_invoice = $invoice_no + 1;

        $year = date("Y");

        $generate_invoice = $year . ''.$count_invoice;

        if ($database->check_invoice($generate_invoice)) {

          echo "invoice number exists.";

        }
        else {

           $cash = 0;
           $change_amount = 0;

            $res = $database->insert_into_invoice($generate_invoice,$cash,
                          $total_in_cart,$change_amount,$id);

          //if invoice is inserted insert also in sales
          if (!$res) {

              foreach ($cart_list as $key) {

                 $product_description = $key["product_description"];
                 $qty = $key["qty"];
                 $price = $key["price"];
                 $total = $key["total"];

                 $payment_method = "Credit";
                 $sales = $database->insert_sales($generate_invoice,$product_description,
                  $qty,$price,$total,$payment_method);

                 if ($sales) {
                   # code...
                    $err_logs = "<p class='alert alert-danger'>Something went wrong in
                    sales...</p>";

                 } else {
                    //delete all cart
                   $database->delete_all_cart();
                       $loader = "
                      <div class='loader'>
                          <img src='load.gif' alt='Loading...' />
                      </div>
                    ";

                    echo '
                      <script>
                        setTimeout(function(){
                          window.location="sales_invoice.php";
                        },500)
                      </script>
                    ';

                    header('location:sales_invoice.php?invoice_number='.$generate_invoice);


                 }

              }

          } else {
            $err_logs = "<p class='alert alert-danger'>Something went wrong in invoicing...</p>";
          }

       }

      } else {
          $cash = trim($_POST['cash']);

          if ($cash < $total_in_cart) {

            $err_logs = "<p class='alert alert-danger'>Unable to Pay.<br> Cash must be greater than total</p>";

          } else {

            //generate invoice no
            $invoice_no = $database->generate_invoice_no();

            $count_invoice = $invoice_no + 1;

            $year = date("Y");

            $generate_invoice = $year . ''.$count_invoice;

            if ($database->check_invoice($generate_invoice)) {

              echo "invoice number exists.";

            } else {

                $change_amount =  $cash - $total_in_cart;

                 $res = $database->insert_into_invoice($generate_invoice,$cash,
                               $total_in_cart,$change_amount,$id);

               //if invoice is inserted insert also in sales
               if (!$res) {

                   foreach ($cart_list as $key) {

                      $product_description = $key["product_description"];
                      $qty = $key["qty"];
                      $price = $key["price"];
                      $total = $key["total"];


                      $payment_method = "Cash";
                      $sales = $database->insert_sales($generate_invoice,$product_description,
                       $qty,$price,$total,$payment_method);

                      if ($sales) {
                        # code...
                         $err_logs = "<p class='alert alert-danger'>Something went wrong in
                         sales...</p>";

                      } else {
                         //delete all cart
                        $database->delete_all_cart();
                            $loader = "
                           <div class='loader'>
                               <img src='load.gif' alt='Loading...' />
                           </div>
                         ";

                         echo '
                           <script>
                             setTimeout(function(){
                               window.location="sales_invoice.php";
                             },500)
                           </script>
                         ';

                         header('location:sales_invoice.php?invoice_number='.$generate_invoice);


                      }

                   }

               } else {
                 $err_logs = "<p class='alert alert-danger'>Something went wrong in invoicing...</p>";
               }

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

  <title>WebWonderPOS</title>
  <link rel="icon" href="ico/shopping_basket_green.ico" type="image/icon">
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>


  <!-- Page Wrapper -->
  <div id="wrapper">



    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        <?php require_once 'topbar.php'; ?>
        <div class="row" >
          <div class="column">
            <div style="margin-left: 10px;" class="container-fluid">
              <div class="column">
                <div class="container-fluid" style="background: ">
                  <h1 class="h3 mb-2 text-gray-800">BILLING</h1>
                    <?php if(count($list)>0): ?>
                       <table class="table table-bordered">
                           <thead>
                              <tr>
                                <th>ITEM</th>
                                <th>QTY</th>
                                <th>Price</th>
                                <th>TOTAL</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach($list as $sales): ?>
                                <tr>
                                  <td><?php echo $sales['product_description'] ?></td>
                                  <td><?php echo $sales['qty'] ?></td>
                                  <td><?php echo $sales['price'] ?></td>
                                  <td><?php echo $sales['total'] ?></td>

                                </tr>
                                  <?php endforeach; ?>
                            </tbody>

                        </table>
                    <?php else: ?>
                        <?php
                          echo '
                            <script>
                              setTimeout(function(){
                                window.location="point_of_sale.php";
                              },500)
                            </script>
                          ';
                        ?>
                    <?php endif ?>
                 <p></p>
                </div>
              </div>
            </div>
          </div>

          <div class="column">
            <div class="container-fluid">
              <div class="column">
                <div class="container-fluid">
                  <h3 style="color: #000"><strong>Total: <?php echo $total_in_cart; ?></strong></h3>
                  <p><?php echo $err_logs; ?></p>

                   <form method="post">
                        <table>
                          <div class="form-group">
                            <strong>Payment Method</strong>
                            <select class="form-control" id="pmMethod" name="payment_method" onchange="EnableDisableTextBox(this)" required>
                                <option value="1">Cash</option>
                                <option value="2">Credit</option>
                            </select>
                          </div>

                          <label style="color: #000"></label>Enter Cash: </h4><input class="form-control" type="number" name="cash"  id="cash" placeholder="0.00" required>

                         <br>

                         <p><?php echo $loader; ?></p>

                          <p><button  class=" form-control btn btn-danger" name="pay_confirm">Place Order</button></p>

                        </table>
                    </form>

                </div>
              </div>
            </div>
          </div>

          <div class="column">
            <div class="container-fluid">
              <div class="column">
                <div class="container-fluid">
                  <h3 style="color: #000"><strong>Customer Details</strong></h3>

                  <select name="customer_id" id="customer_id" class="form-control" required>
                                <option value="">Select Customer</option>
                                    <?php
                                        echo $database->feed_customer();
                                    ?>
                            </select>



                </div>
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

    <script type="text/javascript">
          window.addEventListener("load", function () {
          const loader = document.querySelector(".loader");
          loader.className += " hidden"; // class "loader hidden"
          });

          function EnableDisableTextBox(pmMethod) {
              var selectedValue = pmMethod.options[pmMethod.selectedIndex].value;
              var cash = document.getElementById("cash");
              cash.disabled = selectedValue == 2 ? true : false;
              if (!cash.disabled) {
                  cash.focus();
              }
          }

          function displayResult(str){
      			if (str.length == 0) {

      				document.getElementById("result").innerHTML = "";
      				return;

      			} else {

      				var xmlhttp = new XMLHttpRequest();
      				xmlhttp.onreadystatechange = function(){
      					if (this.readyState == 4 && this.status == 200) {
      						document.getElementById("result").innerHTML = this.responseText;
      					}
      				};

      				xmlhttp.open("GET", "search_list.php?q=" + str, true);
      				xmlhttp.send();
      			}
      		}

    </script>



</html>
