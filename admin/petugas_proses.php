<?php
include "koneksi.php";
if (isset ($_POST['action']))$action = $_POST['action']; else $action = "";

switch ($action){
	case 'tambah' :
		$kd_user        =$_POST['txtkode'];
		$username 		= $_POST ['txtusername'];
		$password		= $_POST ['txtpassword'];  
		$a = "INSERT INTO petugas VALUES ('$kd_user','$username',MD5('$password'))";
		$b = mysql_query($a) or die (mysql_error());
		if ($b==true){
		echo "<script>alert('tambah sukses')</script>";
		}else{
		echo "<script>alert('tambah gagal')</script>";
		}
		break;
	case 'update' :
	$kd_user=$_POST['txtkode'];
	$kd_userx=$_POST['txtkd_userx'];
	$username=$_POST['txtusername'];
	$password=$_POST['txtpassword'];
	$query=mysql_query("UPDATE petugas SET kd_petugas='$kd_user',  username= '$username' WHERE kd_petugas='$kd_userx' ");
if ($query==true)
echo "<script>alert('Update Berhasil');</script>";
else
echo "<script>alert('Update Gagal');</script>";

break;
default :
$kd_user=$_GET['kd_user'];
	$query=mysql_query("DELETE FROM petugas WHERE kd_petugas='$kd_user' ");
if ($query==true)
echo "<script>alert('Hapus Berhasil');</script>";
else
echo "<script>alert('Hapus Gagal');</script>";
break;
}
?>

<meta http-equiv="refresh" content="0;URL=index.php?hal=petugas" />