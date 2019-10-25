<?php
if (isset($_GET['hal'])) $hal = $_GET['hal']; else $hal = "";
switch ($hal){
case 'beranda' 	:include "home.php"; break;
case 'profil'	:include "profil.php"; break;
case 'rekam'	:include "rekam.php"; break;
case 'info'	:include "info.php"; break;
case 'ganti' :include "ganti.php"; break;
case 'detail_rekam' :include "detail_rekam.php"; break; 
default : include "home.php"; break;
}
?>