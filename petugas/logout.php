<?php
  session_start();
  session_destroy();
  echo "<script>alert('LOGOUT Berhasil');</script>";
  header('location: ../index.php');
  ?>
<!-- <meta http-equiv='refresh' content='1; url=index.php'> -->
