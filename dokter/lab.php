<link rel="stylesheet" href="include/kotak.css" />
<?php
include "koneksi.php";
if (isset($_GET['kd_lab'])) {
$d = "SELECT kd_lab, no_rm, hasil_lab, ket FROM laboratorium WHERE kd_lab ='$_GET[kd_lab]'";
$e = mysql_query($d) or die (mysql_error());
$f = mysql_fetch_array($e);
}
?>
<div id="back">
<fieldset>
<h3>Tambah Data Laboratorium</h3>
<form method="post" class="form-horizontal invoice-form" action="lab_proses.php">
<?php
if (isset ($_GET['kd_lab'])){ 
?>
<input type="hidden" name="action" value="update"/>
<input type="hidden" name="txtkd_labx" value='<?php echo $f ['kd_lab'];?>' />
<?php }else{?>
<input type="hidden" name="action" value="tambah"/>
<?php
}
?>
<table align="left">
	
    <tr>
    	<td align="right">Rekam Medis</td>
        <td><select name="rekam">
			<option value="0">--Pilih Rekam Medis--</option>
            
			<?php
		$d = mysql_query("SELECT * FROM rekam_medis");
		while($e=mysql_fetch_array($d)){
		echo"<option value='$e[no_rm]' ";
		if(isset($_GET['kd_lab'])){
		if($f['no_rm']==$e['no_rm'])
		echo"selected";}
		echo">$e[tgl_pemeriksaan]</option>";
		}
		?>
            
		</select></td>
    </tr>
    <tr>
    	<td align="right">Hasil Laboratorium</td>
        <td><input type="text" name="txthasil_lab" required value="<?php if (isset($_GET['kd_lab'])) echo $f['hasil_lab'];?>"/></td>
    </tr>
    <tr>
    	<td align="right">Keterangan</td>
        <td><input type="text" name="txtket" required value="<?php if (isset($_GET['kd_lab'])) echo $f['ket'];?>"/></td>
    </tr>
 <tr>
    	<td colspan="2">
        <?php
		if (isset ($_GET['kd_lab'])){
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
<h3>LIST DATA LABORATORIUM</h3>
<table class="table table-striped table-bordered table-radmin";
 border-radius: 15px;">
  <tr>
  	<th>No.</th>
    <th>Kode Lab</th>
    <th>Rekam Medis</th>
    <th>Hasil Lab</th>
    <th>Ket</th>
    
    <th colspan="2">Aksi</th>
  </tr>
  <?php
  	$a = "SELECT A.kd_lab, B.diagnosa,B.resep,B.keluhan,B.tgl_pemeriksaan,B.ket, A.hasil_lab, A.ket FROM laboratorium AS A INNER JOIN rekam_medis AS B ON (A.no_rm=B.no_rm)";
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
		echo "<td>$c[kd_lab]</td>";
		echo "<td>$c[tgl_pemeriksaan]</td>";
		echo "<td>$c[hasil_lab]</td>";
		echo "<td>$c[ket]</td>";
		
		echo "<td align='center' ><a class='btn btn-small' href='index.php?hal=laboratorium&kd_lab=$c[0]'><i class='icon-edit' name='tambah' value='EDIT'></a></td>";
		echo "<td align='center' ><a class='disabled btn btn-small btn-danger' href='#' onclick=\"javascript:if(confirm('Anda Yakin Ingin Menghapus $c[0]')) window.location.href='lab_proses.php?action=hapus&kd_lab=$c[0]';\"><i class='icon-trash icon-white' name='tambah' value='HAPUS'></a></td>";
		echo "</tr>";
	$no++;
	}
		}
	?>
</table>
</fieldset>
</div>