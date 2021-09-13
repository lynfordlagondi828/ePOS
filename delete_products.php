<?php
  require_once 'sessions.php';
  $id = $_SESSION["id"];
  $fullname = $_SESSION["fullname"];

  require_once 'includes/DbFunctions.php';
  $database = new DbFunctions();



  if (isset($_GET["id"])) {

    $id =trim($_GET["id"]);
  }

  $id = intval($_GET['id']);

  $database->delete_single_products($id);
  header('location:products.php');
  exit();
?>
