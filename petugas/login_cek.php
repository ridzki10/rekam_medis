<?php
	session_start();
	include "koneksi.php";
	$user = $_POST['txtuser'];
	$pass = $_POST['txtpass'];
	$a="SELECT kd_petugas, username FROM petugas WHERE username = '$user' AND password = MD5('$pass')" or die (mysql_error());
	$b = mysql_query($a) or die(mysql_error());
	$user_ada = mysql_num_rows($b);
	if($user_ada == '0'){
		echo "<script>alert('USER dan PASSWORD tidak cocok');</script>";
	}else{
		$c = mysql_fetch_array($b);
		$_SESSION['kd_petugas'] = $c['kd_petugas'];
		$_SESSION['username'] = $c['username'];
		echo "<script>alert('LOGIN Berhasil');</script>";
	}
		
?>
<meta http-equiv="refresh" content="1;URL=index.php" />