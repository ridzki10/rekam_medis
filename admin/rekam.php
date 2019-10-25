<link rel="stylesheet" href="include/kotak.css" />
<?php
include "koneksi.php";
if (isset($_GET['no_rm'])){
$d = "SELECT no_rm, kd_tindakan, kd_obat, kd_dokter, no_pasien, diagnosa, resep, keluhan, tgl_pemeriksaan, tgl_kesembuhan, ket FROM rekam_medis WHERE no_rm ='$_GET[no_rm]'";
$e = mysql_query($d) or die (mysql_error());
$f = mysql_fetch_array($e);
}
?>
<div id="back">
<fieldset>
<h3>Tambah Data Rekam Medis</h3>
<form method="post"  class="form-horizontal invoice-form" action="rekam_proses.php">
<?php
if (isset ($_GET['no_rm'])){ 
?>
<input type="hidden" name="action" value="update"/>
<?php }else{?>
<input type="hidden" name="action" value="tambah"/>
<?php
}
?>
<table align="left">
	 <tr>
    	<td align="right">No Rekam</td>
        <td><input type="text" name="txtno_rm" readonly="true"  required value="<?php if (isset($_GET['no_rm'])) echo $f['no_rm'];?>" />
		<input type="hidden" name="txtno_rmx"  value="<?php if (isset($_GET['no_rm'])) echo $f['no_rm'];?>"/></td>
    </tr>
	<tr>
    	<td align="right">Tindakan</td>
        <td><select name="tindakan">
			<option value="0">--Pilih Tindakan--</option>
            
			<?php
		$d = mysql_query("SELECT * FROM tindakan");
		while($e=mysql_fetch_array($d)){
		echo"<option value='$e[kd_tindakan]' ";
		if(isset($_GET['no_rm'])){
		if($f['kd_tindakan']==$e['kd_tindakan'])
		echo"selected";}
		echo">$e[nm_tindakan]</option>";
		}
		?>
            
		</select></td>
        </tr>
    <tr>
    	<td align="right">Obat</td>
        <td><select name="obat">
			<option value="0">--Pilih Obat--</option>
            
		<?php
		$d = mysql_query("SELECT * FROM obat");
		while($e=mysql_fetch_array($d)){
		echo"<option value='$e[kd_obat]' ";
		if(isset($_GET['no_rm'])){
		if($f['kd_obat']==$e['kd_obat'])
		echo"selected";}
		echo">$e[nm_obat]</option>";
		}
		?>
            
		</select></td>
    </tr>
    <tr>
    	<td align="right">Dokter</td>
        <td><select name="dokter">
			<option value="0">--Pilih Dokter--</option>
			<?php
		$d = mysql_query("SELECT * FROM dokter");
		while($e=mysql_fetch_array($d)){
		echo"<option value='$e[kd_dokter]' ";
		if(isset($_GET['no_rm'])){
		if($f['kd_dokter']==$e['kd_dokter'])
		echo"selected";}
		echo">$e[nm_dokter]</option>";
		}
		?>
		</select></td>
    </tr>
    <tr>
    	<td align="right">Pasien</td>
        <td><select name="pasien">
			<option value="0">--Pilih Pasien--</option>
            
		<?php
		$d = mysql_query("SELECT * FROM pasien");
		while($e=mysql_fetch_array($d)){
		echo"<option value='$e[no_pasien]' ";
		if(isset($_GET['no_rm'])){
		if($f['no_pasien']==$e['no_pasien'])
		echo"selected";}
		echo">$e[nm_pasien]</option>";
		}
		?>
            
		</select></td>
    </tr>
	 
    <tr>
    	<td align="right">Diagnosa</td>
        <td><input type="text" name="txtdiagnosa" required value="<?php if (isset($_GET['no_rm'])) echo $f['diagnosa'];?>"/></td>
    </tr>
    <tr>
    	<td align="right">Resep</td>
        <td><input type="text" name="txtresep" required value="<?php if (isset($_GET['no_rm'])) echo $f['resep'];?>"/></td>
    </tr>
    <tr>
    	<td align="right">Keluhan</td>
        <td><input type="text" name="txtkeluhan" required value="<?php if (isset($_GET['no_rm'])) echo $f['keluhan'];?>"/></td>
    </tr>
    <tr>
    	<td align="right">&nbsp;</td>
        <td><input type="text" style="display:none" name="txttgl_pemeriksaan" value=<?php $tgl=date('Y-m-d'); echo $tgl; ?>" /></td>
    </tr>
	<tr>
    	<td align="right">Tanggal Pulang</td>
        <td><input type="text" name="txttgl_pulang" id="tgl" required value="<?php if (isset($_GET['no_rm'])) echo $f['tgl_kesembuhan'];?>"/></td>
    </tr>
    <tr>
    	<td align="right">Keterangan</td>
        <td><input type="text" name="txtket" required value="<?php if (isset($_GET['no_rm'])) echo $f['ket'];?>"/></td>
    </tr>

    <tr>
    	<td colspan="2">
        <?php
		if (isset ($_GET['no_rm'])){
		?>
        <input class="btn btn-primary" type="submit" value="Update" />
        <?php }else{ ?>
        <input class="btn btn-primary" type="submit" value="Simpan"/>
        <?php } ?>
        <input style="width:60px;" class="btn btn-danger" type="reset" value="Batal" />
        </td>
    </tr>
</table>
</form>
</fieldset>
</div>
<hr/>

<form method="POST" action="index.php?hal=rekam">
Pencarian : <input type="text" name="txtcari" placeholder="Ketiklah sesuatuu ...." />
<input class="btn btn-primary" type="submit" value="Cari"/>
</form>

<?php
//Paging
//1.Cari banyak total data
$total=mysql_query("SELECT COUNT(*) AS jumlah FROM rekam_medis");
$totalnya=mysql_fetch_array($total);
$total_data=$totalnya['jumlah'];

//2.Tentukan banyak data yg diinginkan per halaman
$hal=3;

//3.Cari jumlah banyak halaman
$jum_hal=ceil($total_data / $hal);
if(isset($_GET['start'])) $start=$_GET['start'];
else $start=0;

?>

<div id="tabel">
<fieldset>
<h2>Data Rekam Medis</h2>
<table class="table table-striped table-bordered table-radmin";
 border-radius: 15px;">
  <tr>
  	<th>No.</th>
    <th>No Rekam Medis</th>
    <th>Tindakan</th>
    <th>Obat</th>
    <th>Dokter</th>
    <th>Pasien</th>
    <th>Diagnosa</th>
    <th>Resep</th>
    <th>Keluhan</th>
    <th>Tanggal Pemeriksaan</th>
	<th>Tanggal Kepulangan</th>
    <th>Keterangan</th>
    
    <th colspan="2">Aksi</th>
  </tr>
  <?php
if (isset($_POST['txtcari'])){
	$katakunci=$_POST['txtcari'];
}else{
	$katakunci="";  
} 
 //4. Batasi dengan limit
  	$a = ("SELECT A.no_rm, B.nm_tindakan, B.ket, C.nm_obat, C.jml_obat, C.ukuran, C.harga, D.nm_dokter, E.nm_pasien, E.jenis_kelamin, E.alamat, A.diagnosa, A.resep, A.keluhan, A.tgl_pemeriksaan, A.tgl_kesembuhan , A.ket FROM rekam_medis AS A INNER JOIN tindakan AS B ON (A.kd_tindakan=B.kd_tindakan) INNER JOIN obat AS C ON (A.kd_obat=C.kd_obat) INNER JOIN dokter AS D ON (A.kd_dokter=D.kd_dokter) INNER JOIN pasien AS E ON (A.no_pasien=E.no_pasien) WHERE E.nm_pasien LIKE '%$katakunci%'LIMIT $start,$hal");
	$b = mysql_query ($a) or die (mysql_error());
	$jumlah = mysql_num_rows($b);
	if ($jumlah == 0){
		echo "<tr>
				<td colspan='12' align='center'>Data Belum Ada</td>
			  </tr>";
		} else {
		$no=1;
		
	while ($c = mysql_fetch_array($b)){
		
		echo "<tr>";
		echo "<td align='center'>$no</td>";
		echo "<td>$c[no_rm]</td>";
		echo "<td>$c[nm_tindakan]</td>";
		echo "<td>$c[nm_obat]</td>";
		echo "<td>$c[nm_dokter]</td>";
		echo "<td>".str_replace($katakunci, "<b>$katakunci</b>",$c['nm_pasien'])."</td>";
		echo "<td>$c[diagnosa]</td>";
		echo "<td>$c[resep]</td>";
		echo "<td>$c[keluhan]</td>";
		echo "<td>$c[tgl_pemeriksaan]</td>";
		echo "<td>$c[tgl_kesembuhan]</td>";
		echo "<td>$c[ket]</td>";
		echo "<td align='center' ><a class='btn btn-small' href='index.php?hal=rekam&no_rm=$c[0]'><i class='icon-edit' name='tambah' value='EDIT'></a></td>";
		echo "<td align='center' ><a class='disabled btn btn-small btn-danger' href='#' onclick=\"javascript:if(confirm('Anda Yakin Ingin Menghapus $c[0]')) window.location.href='rekam_proses.php?action=hapus&no_rm=$c[0]';\"><i class='icon-trash icon-white' name='tambah' value='HAPUS'></a></td>";
		echo "</tr>";
	$no++;
	}
	}
	?>
</table>

<?php
//5. Buat link untuk halaman pagingnya
if($start!=0){
	echo "<a href='index.php?hal=rekam&start=".($start-$hal)."'>Prev</a>";
	echo "&nbsp;";
}
echo "&nbsp;";
$x=0;
for ($i=0; $i<$jum_hal; $i++){
	$x = $i * $hal;
	if($start == $x){
		echo ($i+1);
	}else {
		echo "<a href='index.php?hal=rekam&start=$x'>".($i+1)."</a>";
	}
	echo "&nbsp;";
}
echo "&nbsp;";
if($start!=$x){
	echo "<a href='index.php?hal=rekam&start=".($start+$hal)."'>Next</a>";
}
?>
<p>
Ditampilkan halaman ke <b> <?php echo ($start/$hal)+1; ?> </b> dari <b><?php echo $total_data; ?></b> data.
</p>
</fieldset>
</div>