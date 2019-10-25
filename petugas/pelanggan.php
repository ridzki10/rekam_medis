<link rel="stylesheet" href="include/kotak.css" />
<?php
include "koneksi.php";
if (isset($_GET['kd_tindakan'])) $kd_tindakan = $_GET['kd_tindakan']; else $kd_tindakan = "";
$d = "SELECT kd_tindakan, nm_tindakan, ket FROM tindakan WHERE kd_tindakan = '$kd_tindakan'";
$e = mysql_query($d) or die (mysql_error());
$f = mysql_fetch_array($e);
?>

<h2>Data Pasien</h2>
<table class="table table-striped table-bordered table-radmin";
 border-radius: 15px;">
  <tr>
  	<th>No.</th>
    <th>Poliklinik</th>
    <th>Jumlah Pasien</th>
    
  </tr>
  <?php
  	$a = "SELECT A.nm_poli,count( B.no_pasien )
FROM poliklinik as A INNER JOIN kunjungan as B ON (A.kd_poli=b.kd_poli)
GROUP BY B.kd_poli";
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
		echo "<td>$c[0]</td>";
		echo "<td>$c[1]</td>";
		echo "</tr>";
	$no++;
	}
		}
		$q = "SELECT COUNT( no_pasien ) AS JumlahPasien
FROM kunjungan ";
			$g = mysql_query($q) or die (mysql_error());
			while($hasil = mysql_fetch_array($g)){
			echo "<b>Jumlah Seluruh pasien</b> $hasil[0]";
			}
	?>
</table>
</fieldset>
</div>