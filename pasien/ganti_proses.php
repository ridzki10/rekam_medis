<?php
session_start();
?>

<?php
include "admin/koneksi.php";
if (isset ($_POST['action'])) $action = $_POST['action']; else $action = "";
$passwordlama 	= $_POST['txtpass_lama'];
$passwordbaru 	= $_POST['txtpass_baru'];
$konfirmasipassword = $_POST['txtkonfirmasi_pass'];
$a="SELECT no_pasien FROM pasien WHERE no_pasien = '".$_SESSION['no_pasien']."' AND password = MD5('".$passwordlama."')" or die (mysql_error());
$b = mysql_query($a) or die(mysql_error());
$user_ada = mysql_num_rows($b);
	if($user_ada == '1'){
	$d = "UPDATE pasien SET password = md5('".$passwordbaru."') where no_pasien = '".$_SESSION['no_pasien']."'";
	$e = mysql_query($d) or die (mysql_error());
if ($e == true){
	echo "<script>alert('UPDATE BERHASIL')</script>";
		}else{
		echo "<script>alert('UPDATE GAK BERHASIL')</script>";
		}
	}
?>

<meta http-equiv="refresh" content="0;URL=index.php?hal=profil" />