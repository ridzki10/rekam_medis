<?php

$host = "localhost";
$user = "root";
$pass= "";
$db = "rekam_medis";
mysql_connect($host,$user,$pass) or die ("Koneksi Gagal");
mysql_select_db($db) or die ("Database $db tidak ada");

?>