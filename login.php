<?php
  require_once 'includes/DbFunctions.php';
  $database = new DbFunctions();
  $print_message= "";

  //POST method
  if (isset($_POST['username']) && isset($_POST['password'])) {

    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $user_type = trim($_POST["user_type"]);

    $user = $database->user_login($username,$password,$user_type);
    if ($user) {

      echo '
          <div class="loader">
              <img src="load.gif" alt="Loading..." />
          </div>
        ';

        $print_message = '<p class="text-info">Login success...</p>';

            session_start();

            $_SESSION["isloggedin"] = TRUE;
            $_SESSION["id"] = $user["id"];
            $_SESSION["user_type"] = $user["user_type"];
            $_SESSION["username"] = $user["username"];
            $_SESSION["fullname"] = $user["fullname"];

            echo '
              <script>
                setTimeout(function(){
                  window.location="index.php";
                },500)
              </script>
            ';


    } else {

      echo '
        <div class="loader">
            <img src="load.gif" alt="Loading..." />
        </div>
      ';
      $print_message = '<p class="alert-danger">Incorrect Email or Password</p>';
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

  <title>Authentication | WebWonderPOS</title>

  <link rel="icon" href="ico/shopping_basket_green.ico" type="image/icon">
  <link href="login_loader.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-light">

  <div class="container">

    <!-- Outer Row -->
    <div align="center">
      <div class="col-lg-6">
        <div class="p-3">
          <div class="text-center">
              <p><img src="ico/shopping_basket_green.ico" width="100" height="100"></p>
              <h3 style="color:#000"><u><strong>WebWonderPOS</strong></u></h3>
               <h4 style="color:#000"><strong>Authentication</strong></h4>
              <hr>

                <h5> <?php echo $print_message; ?></h5>
          </div>



          <form method="post">
            <div class="form-group">
              <input type="text" class="form-control form-control-user" name="username" aria-describedby="emailHelp" placeholder="Enter Username..." required>
            </div>
            <div class="form-group">
              <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Password" required>
            </div>

            <div class="form-group">
                <select class="form-control" name="user_type" required>
                    <option value="">Select User Type</option>
                    <option value="cashier">Cashier</option>
                    <option value="admin">Administrator</option>
                </select>
            </div>

            <button class=" form-control btn btn-danger" name="submit">Login</button>

          </form>
          <hr>

        </div>
      </div>
    </div>

    <!-- Footer -->
      <?php require 'footer.php'; ?>
      <!-- End of Footer -->
  </div>


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script type="text/javascript">
          window.addEventListener("load", function () {
          const loader = document.querySelector(".loader");
          loader.className += " hidden"; // class "loader hidden"
          });

        </script>
</body>

</html>
