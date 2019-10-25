<?php
	session_start();
	include "admin/koneksi.php";
	$user = $_POST['txtnama'];
	$pass = $_POST['txtpass'];
	$a="SELECT no_pasien,nm_pasien FROM pasien WHERE nm_pasien = '$user' AND password = MD5('$pass')" or die (mysql_error());
	$b = mysql_query($a) or die(mysql_error());
	$user_ada = mysql_num_rows($b);
	if($user_ada == '0'){
		echo "<script>alert('USER dan PASSWORD tidak cocok');</script>";
	}else{
		$c = mysql_fetch_array($b);
		$_SESSION['no_pasien'] = $c['no_pasien'];
		$_SESSION['nm_pasien'] = $c['nm_pasien'];
		echo "<script>alert('LOGIN Berhasil');</script>";
	}
		
?>
<meta http-equiv="refresh" content="1;URL=index.php" />