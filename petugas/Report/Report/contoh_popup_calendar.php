<?php session_start(); ?>
<?php
if(isset($_SESSION['user'])){
?>
	<html>
		<head>
			<title>Halaman Admin &copy;</title>
			<link rel="stylesheet" href="../includes/miapah.css" ></link>
			<!-- popup calendar -->
			<link rel="stylesheet" href="../includes/popup-calendar/dhtmlgoodies_calendar.css" media="screen"></link>
			<script type="text/javascript" src="../includes/popup-calendar/dhtmlgoodies_calendar.js"></script>
			<!-- End of popup calendar -->
		</head>
		<body>
			<div id="atas">
				<div id="tulisan">Toko Baju</div>
			</div>
			<div id="kiri"><?php include "menu.php"; ?></div>
			<div id="kanan">
				<h3>Menu Admin</h3>
				<a href="admin.php">Kembali</a><br><br>
				<?php include "../includes/koneksi.php"; ?>
		<form method="POST" action="admin_proses.php">
			<input type="hidden" name="proses" value="tambah" />
			<table>
				<tr>
					<td>User</td>
					<td>:</td>
					<td><input type="text" name="txtuser" /></td>
				</tr>
				<tr>
					<td>Pass</td>
					<td>:</td>
					<td><input type="password" name="txtpass" /></td>
				</tr>
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td><input type="text" name="txtnama" id="txtnama" /><img src="../includes/popup-calendar/calendar.gif" width="24" height="12" onclick="displayCalendar(document.getElementById('txtnama'), 'yyyy-mm-dd', this)" style="cursor:pointer"></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" value="Simpan" /></td>
					<td><input type="reset" value="Bersih" /></td>
				</tr>
			</table>
		</form>
			</div>
		</body>
	</html>
<?php
}else{
	echo "<meta http-equiv='refresh' content='0;URL=login.php' />";
}
?>