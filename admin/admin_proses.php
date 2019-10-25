<?php
include "koneksi.php";
if (isset ($_POST['action']))$action = $_POST['action']; else $action = "";

switch ($action){
	case 'tambah' :
		$kd_admin        =$_POST['txtkd_admin'];
		$username 		= $_POST ['txtusername'];
		$password		= $_POST ['txtpassword'];
		$a = "INSERT INTO admin VALUES ('$kd_admin','$username',MD5('$password'))";
		$b = mysql_query($a) or die (mysql_error());
		if ($b==true){
		echo "<script>alert('tambah sukses')</script>";
		}else{
		echo "<script>alert('tambah gagal')</script>";
		}
		break;
	case 'update' :
	$kd_admin=$_POST['txtkd_admin'];
	$kd_adminx=$_POST['txtkd_adminx'];
	$username=$_POST['txtusername'];
	$password=$_POST['txtpassword'];
	$query=mysql_query("UPDATE admin SET kd_admin='$kd_admin',  username= '$username' WHERE kd_admin='$kd_adminx' ");
	if ($query==true)
	echo "<script>alert('Update Berhasil');</script>";
	else
	echo "<script>alert('Update Gagal');</script>";
	break;
	default:
$kd_admin=$_GET['kd_admin'];
	$query=mysql_query("DELETE FROM admin WHERE kd_admin='$kd_admin' ");
if ($query==true)
echo "<script>alert('Hapus Berhasil');</script>";
else
echo "<script>alert('Hapus Gagal');</script>";
break;
}
?>

<meta http-equiv="refresh" content="0;URL=index.php?hal=admin" />