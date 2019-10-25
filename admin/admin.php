<?php
include "koneksi.php";
if (isset($_GET['kd_admin'])) {
$d = "SELECT kd_admin, username FROM admin WHERE kd_admin ='$_GET[kd_admin]'";
$e = mysql_query($d) or die (mysql_error());
$f = mysql_fetch_array($e);
}
?>
<div id="back">
<fieldset>
<h3>Tambah Data Admin</H3>
<form method="post" class="form-horizontal invoice-form"  action="admin_proses.php">
<?php
if (isset ($_GET['kd_admin'])){ 
?>
<input type="hidden" name="action" value="update"/>
<input type="hidden" name="txtkd_adminx" value='<?php echo $f ['kd_admin'];?>' />
<?php }else{?>
<input type="hidden" name="action" value="tambah"/>
<?php
}
?>
<table align="left">
	<tr>
    	<td align="right">kode</td>
        <td><input  type="text" name="txtkd_admin" readonly="true" placeholder="Otomatis"  required value="<?php if (isset($_GET['kd_admin'])) echo $f['kd_admin'];?>" />
		<input type="hidden" name="txtkd_adminx"  required value="<?php if (isset($_GET['kd_admin'])) echo $f['kd_admin'];?>" />
		</tr>
    <tr>
    	<td align="right">Nama</td>
        <td><input  type="text" name="txtusername"  required value="<?php if (isset($_GET['kd_admin'])) echo $f['username'];?>" />
    </tr>
    <tr>
    	<td align="right">Password</td>
        <td><input type="password" name="txtpassword" /></td>
    </tr>
    <tr>
    	<td colspan="2">
        <?php
		if (isset ($_GET['kd_admin'])){
		?>
        <input class="btn btn-primary" type="submit" value="Update" />
        <?php }else{ ?>
        <input class="btn btn-primary" type="submit" value="Simpan"/>
        <?php } ?>
        <input class="btn btn-danger" type="reset" value="Batal" />
        </td>
    </tr>
</table>
</form>
</fieldset>
</div>
<br />
<div id="tabel">
<fieldset>
<h2>LIST ADMIN</h2>
<table class="table table-striped table-bordered table-radmin">
<thead>
  <tr>
  	<th>No.</th>
    <th>Kode Admin</th>
    <th>Nama User</th>
    <th colspan="2">Aksi</th>
  </tr>
  <thead>

  <?php
  	 
  	$a = "SELECT kd_admin, username FROM admin";
	$b = mysql_query ($a) or die (mysql_error());
	$jumlah = mysql_num_rows($b);
	if ($jumlah == 0){
		echo "<tr>
				<td colspan='3' align='center'>Data Belum Ada</td>
			  </tr>";
		} else {
		$no=1;
		
	while ($c = mysql_fetch_array($b)){
		echo "<tr>";
		echo "<td align='center'>$no.</td>";
		echo "<td>$c[kd_admin]</td>";
		echo "<td>$c[username]</td>";
		echo "<td align='center' ><a class='btn btn-small' href='index.php?hal=admin&kd_admin=$c[kd_admin]'><i class='icon-edit'name='tambah' value='EDIT'></a></td>";
		echo "<td align='center' ><a class='disabled btn btn-small btn-danger' href='#' onclick=\"javascript:if(confirm('Anda Yakin Ingin Menghapus $c[kd_admin]')) window.location.href='admin_proses.php?action=hapus&kd_admin=$c[kd_admin]';\"><i class='icon-trash icon-white' name='hapus' value='HAPUS'></a></td>";
		echo "</tr>";
	$no++;
	}
	}
	?>
</table>
</fieldset>
</div>