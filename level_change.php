<?
$level=$_POST[level];
if ( $level=="admin" )
	{ header('location:admin/index.php'); }
else { header('location:dokter/index.php'); }
?>