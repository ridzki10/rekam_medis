<?php
  session_start();
  session_destroy();
  echo "<script>alert('LOGOUT Berhasil');</script>";
  header('location: ../index.php');
  ?>
