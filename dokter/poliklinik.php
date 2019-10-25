<link rel="stylesheet" href="include/kotak.css" />
<?php
include "koneksi.php";
if (isset($_GET['kd_poli'])) {
$d = "SELECT kd_poli, nm_poli, lantai FROM poliklinik WHERE kd_poli ='$_GET[kd_poli]'";
$e = mysql_query($d) or die (mysql_error());
$f = mysql_fetch_array($e);
}
?>
<hr/>

<form method="POST" action="index.php?hal=poliklinik">
Pencarian : <input type="text" name="txtcari" placeholder="Ketiklah sesuatuu ...." />
<input class="btn btn-primary" type="submit" value="Cari"/>
</form>

<?php
//Paging
//1.Cari banyak total data
$total=mysql_query("SELECT COUNT(*) AS jumlah FROM poliklinik");
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
<h2>LIST POLIKLINIK</h2>
<table  class="table table-striped table-bordered table-radmin";
 border-radius: 15px;">
  <tr>
  	<th>No.</th>
    <th>Kode Poliklinik</th>
    <th>Nama Poliklinik</th>
    <th>Lantai</th>
    
    <!-- <th colspan="2">Aksi</th> -->
  </tr>
  <?php
if (isset($_POST['txtcari'])){
	$katakunci=$_POST['txtcari'];
}else{
	$katakunci="";  
} 
 //4. Batasi dengan limit
  	$a = ("SELECT kd_poli, nm_poli, lantai FROM poliklinik WHERE nm_poli LIKE '%$katakunci%'LIMIT $start,$hal");
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
		echo "<td>$c[kd_poli]</td>";
		echo "<td>".str_replace($katakunci, "<b>$katakunci</b>",$c['nm_poli'])."</td>";
		echo "<td>$c[lantai]</td>";
		echo "</tr>";
	$no++;
	}
		}
	?>
</table>
<?php
//5. Buat link untuk halaman pagingnya
if($start!=0){
	echo "<a href='index.php?hal=poliklinik&start=".($start-$hal)."'>Prev</a>";
	echo "&nbsp;";
}
echo "&nbsp;";
$x=0;
for ($i=0; $i<$jum_hal; $i++){
	$x = $i * $hal;
	if($start == $x){
		echo ($i+1);
	}else {
		echo "<a href='index.php?hal=poliklinik&start=$x'>".($i+1)."</a>";
	}
	echo "&nbsp;";
}
echo "&nbsp;";
if($start!=$x){
	echo "<a href='index.php?hal=poliklinik&start=".($start+$hal)."'>Next</a>";
}
?>
<p>
Ditampilkan halaman ke <b> <?php echo ($start/$hal)+1; ?> </b> dari <b><?php echo $total_data; ?></b> data.
</p>
</fieldset>
</div>