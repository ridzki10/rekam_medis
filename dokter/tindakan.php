<link rel="stylesheet" href="include/kotak.css" />
<?php
include "koneksi.php";
if (isset($_GET['kd_tindakan'])){
$d = "SELECT kd_tindakan, nm_tindakan, ket FROM tindakan WHERE kd_tindakan ='$_GET[kd_tindakan]'";
$e = mysql_query($d) or die (mysql_error());
$f = mysql_fetch_array($e);
}
?>
<div id="back">
<fieldset>
<h3Tambah Data Tindakan</h3>
<form method="post" class="form-horizontal invoice-form" action="tindakan_proses.php">
<?php
if (isset ($_GET['kd_tindakan'])){ 
?>
<input type="hidden" name="action" value="update"/>
<input type="hidden" name="txtkd_tindakanx" value='<?php echo $f ['kd_tindakan'];?>' />
<?php }else{?>
<input type="hidden" name="action" value="tambah"/>
<?php
}
?>
<h3>Tambah Data Tindakan</h3>
<table align="left">
	
    <tr>
    	<td align="right">Nama Tindakan</td>
        <td><input type="text" name="txtnm_tindakan" required value="<?php if (isset($_GET['kd_tindakan'])) echo $f['nm_tindakan'];?>"/></td>
    </tr>
    <tr>
    	<td align="right">Keterangan</td>
        <td><input type="text" name="txtket" required value="<?php if (isset($_GET['kd_tindakan'])) echo $f['ket'];?>"/></td>
    </tr>
 <tr>
    	<td colspan="2">
        <?php
		if (isset ($_GET['kd_tindakan'])){
		?>
        <input class="btn btn-primary" type="submit" value="Update" />
        <?php }else{ ?>
        <input class="btn btn-primary" type="submit" value="Simpan"/>
        <?php } ?>
        <input type="reset" class="btn btn-danger" value="Batal" />
        </td>
    </tr>
</table>
</form>
</fieldset>
</div>
<br />
<div id="tabel">
<fieldset>
<h2>LIST TINDAKAN</h2>
<table class="table table-striped table-bordered table-radmin";
 border-radius: 15px;">
  <tr>
  	<th>No.</th>
    <th>Kode Tindakan</th>
    <th>Nama Tindakan</th>
    <th>Ket</th>
    
    <th colspan="2">Aksi</th>
  </tr>
  <?php
  	$a = "SELECT kd_tindakan, nm_tindakan, ket FROM tindakan";
	$b = mysql_query ($a) or die (mysql_error());
	$jumlah = mysql_num_rows($b);
	if ($jumlah == 0){
		echo "<tr>
				<td colspan='6' align='center'>Data Belum Ada</td>
			  </tr>";
		} else {
		$no=1;
		
	while ($c = mysql_fetch_array($b)){
		
		echo "<tr>";
		echo "<td align='center'>$no</td>";
		echo "<td>$c[kd_tindakan]</td>";
		echo "<td>$c[nm_tindakan]</td>";
		echo "<td>$c[ket]</td>";
		
		echo "<td align='center' ><a class='btn btn-small' href='index.php?hal=tindakan&kd_tindakan=$c[kd_tindakan]'><i class='icon-edit' name='tambah' value='EDIT'></a></td>";
		echo "<td align='center' ><a class='disabled btn btn-small btn-danger' href='#' onclick=\"javascript:if(confirm('Anda Yakin Ingin Menghapus $c[kd_tindakan]')) window.location.href='tindakan_proses.php?action=hapus&kd_tindakan=$c[kd_tindakan]';\"><i class='icon-trash icon-white' name='tambah' value='HAPUS'></a></td>";
		echo "</tr>";
	$no++;
	}
		}
	?>
</table>
</fieldset>
</div>