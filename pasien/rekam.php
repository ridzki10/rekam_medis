<link rel="stylesheet" href="include/kotak.css" />
<?php
include "admin/koneksi.php";
$d = "SELECT no_pasien, nm_pasien, jenis_kelamin, agama, alamat, tgl_lahir, usia, no_telp, nm_kk, hub_kel FROM pasien WHERE no_pasien = '$_SESSION[no_pasien]'";
$e = mysql_query($d) or die (mysql_error());
$f = mysql_fetch_array($e);
?>
<div id="back">
<fieldset>
<legend>Profil Anda</legend>
<form method="post" action="index.php?hal=ganti">
<table align="left">
	<tr>
	  <td align="right">No Pasien</td>
    	<td align="left">:</td>
        <td><?php echo $f['no_pasien']; ?></td>
        <td></td>
    </tr>
    <tr>
      <td align="right">Nama Pasien</td>
    	<td align="right">:</td>
        <td><?php echo $f['nm_pasien']; ?></td>
        <td></td>
    </tr>
    <tr>
      <td align="right">Jenis Kelamin</td>
    	<td align="right">:</td>
        <td><?php echo $f['jenis_kelamin']; ?></td>
        <td></td>
    </tr>
    <tr>
      <td align="right">Agama</td>
    	<td align="right">:</td>
        <td><?php echo $f['agama']; ?></td>
        <td></td>
    </tr>
    <tr>
      <td align="right">Alamat</td>
    	<td align="right">:</td>
        <td><?php echo $f['alamat']; ?></td>
    </tr>
    <tr>
      <td align="right">Tanggal Lahir</td>
    	<td align="right">:</td>
        <td><?php echo $f['tgl_lahir']; ?></td>
    </tr>
    <tr>
      <td align="right">Usia</td>
    	<td align="right">:</td>
        <td><?php echo $f['usia']; ?></td>
    </tr>
    <tr>
      <td align="right">No Telpon</td>
    	<td align="right">:</td>
        <td><?php echo $f['no_telp']; ?></td>
    </tr>
    <tr>
      <td align="right">Nama KK</td>
    	<td align="right">:</td>
        <td><?php echo $f['nm_kk']; ?></td>
    </tr>
    <tr>
      <td align="right">Hubungan Keluarga</td>
    	<td align="right">:</td>
        <td><?php echo $f['hub_kel']; ?></td>
    </tr>
    
</table>
</form>
</fieldset>
</div>
</br>
<div id="tabel">
<fieldset>


<h2>LIST KUNJUNGAN</h3>
<table class="table table-striped table-bordered table-radmin";
 border-radius: 15px;">
  <tr>
  	<th>No.</th>
    <th>No Rekam Medis</th>
    <th>Tindakan</th>
    <th>Obat</th>
    
    <th colspan="2">Aksi</th>
  </tr>
  <?php
  
  
  	$a = "SELECT A.no_rm, B.nm_tindakan, B.ket, C.nm_obat, C.jml_obat, C.ukuran, C.harga, D.username, E.nm_pasien, E.jenis_kelamin, E.alamat, A.diagnosa, A.resep, A.keluhan, A.tgl_pemeriksaan, A.ket FROM rekam_medis AS A INNER JOIN tindakan AS B ON (A.kd_tindakan=B.kd_tindakan) INNER JOIN obat AS C ON (A.kd_obat=C.kd_obat) INNER JOIN login AS D ON (A.kd_user=D.kd_user) INNER JOIN pasien AS E ON (A.no_pasien=E.no_pasien) WHERE E.no_pasien = '$_SESSION[no_pasien]'";
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
		echo "<td>$c[0]</td>";
		echo "<td>$c[1] - $c[2]</td>";
		echo "<td>$c[3] - $c[4] - $c[5] - $c[6]</td>";
		
		
		echo "<td align='center' ><a href='index.php?hal=detail_rekam&no_rm=$c[0]'><i class='icon-print' name='tambah' value='DETAIL'></a></td>";
		echo "</tr>";
	$no++;
	}
		}
	?>
</table>
</fieldset>
</div>
