<?php
  session_start();
  unset($_SESSION["js_username"]);
  unset($_SESSION["cl_username"]);
  header("Location: home.php");
?>
