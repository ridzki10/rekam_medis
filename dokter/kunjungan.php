<link rel="stylesheet" href="include/kotak.css" />
<?php
include "koneksi.php";
if (isset($_GET['kd_kunjungan'])) {
$d = "SELECT kd_kunjungan, tgl_kunjungan, no_pasien, kd_poli, jam_kunjungan FROM kunjungan WHERE kd_kunjungan ='$_GET[kd_kunjungan]'";
$e = mysql_query($d) or die (mysql_error());
$f = mysql_fetch_array($e);
}
?>

<form method="POST" action="index.php?hal=kunjungan">
Pencarian : <input type="text" name="txtcari" placeholder="Ketiklah sesuatuu ...." />
<input class="btn btn-primary" type="submit" value="Cari"/>
</form>

<?php
//Paging
//1.Cari banyak total data
$total=mysql_query("SELECT COUNT(*) AS jumlah FROM kunjungan");
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
<h2>Data KUNJUNGAN</h2>
<table class="table table-striped table-bordered table-radmin";
 border-radius: 15px;">
  <tr>
  	<th>No.</th>
    <th>Kode Kunjungan</th>
    <th>Tanggal Kunjungan</th>
    <th>Pasien</th>
    <th>Poliklinik</th>
    <th>Jam Kunjungan</th>
    
    <th colspan="2">Aksi</th>
  </tr>
 <?php
if (isset($_POST['txtcari'])){
	$katakunci=$_POST['txtcari'];
}else{
	$katakunci="";  
} 
  
  	$a = ("SELECT A.kd_kunjungan, A.tgl_kunjungan, B.nm_pasien, B.jenis_kelamin, B.alamat, C.nm_poli, C.lantai,A.jam_kunjungan FROM kunjungan AS A INNER JOIN pasien AS B ON (A.no_pasien=B.no_pasien) INNER JOIN poliklinik AS C ON (A.kd_poli=C.kd_poli) WHERE B.nm_pasien LIKE '%$katakunci%'LIMIT $start,$hal");
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
		echo "<td>$c[kd_kunjungan]</td>";
		echo "<td>$c[tgl_kunjungan]</td>";
		echo "<td>".str_replace($katakunci, "<b>$katakunci</b>",$c['nm_pasien'])."</td>";
		echo "<td>$c[nm_poli]</td>";
		echo "<td>$c[jam_kunjungan]</td>";
		echo "<td align='center' ><a class='btn btn-small' href='index.php?hal=kunjungan&kd_kunjungan=$c[kd_kunjungan]'><i class='icon-edit' name='tambah' value='EDIT'></a></td>";
		echo "<td align='center' ><a class='disabled btn btn-small btn-danger' href='#' onclick=\"javascript:if(confirm('Anda Yakin Ingin Menghapus $c[kd_kunjungan]')) window.location.href='kunjungan_proses.php?action=hapus&kd_kunjungan=$c[kd_kunjungan]';\"><i class='icon-trash icon-white' name='tambah' value='HAPUS'></a></td>";
		echo "</tr>";
	$no++;
	}
		}
	?>
</table>
	<?php
//5. Buat link untuk halaman pagingnya
if($start!=0){
	echo "<a href='index.php?hal=kunjungan&start=".($start-$hal)."'>Prev</a>";
	echo "&nbsp;";
}
echo "&nbsp;";
$x=0;
for ($i=0; $i<$jum_hal; $i++){
	$x = $i * $hal;
	if($start == $x){
		echo ($i+1);
	}else {
		echo "<a href='index.php?hal=kunjungan&start=$x'>".($i+1)."</a>";
	}
	echo "&nbsp;";
}
echo "&nbsp;";
if($start!=$x){
	echo "<a href='index.php?hal=kunjungan&start=".($start+$hal)."'>Next</a>";
}
?>
<p>
Ditampilkan halaman ke <b> <?php echo ($start/$hal)+1; ?> </b> dari <b><?php echo $total_data; ?></b> data.
</p>
</fieldset>
</div>