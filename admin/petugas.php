<?php
include "koneksi.php";
if (isset($_GET['kd_user'])) {
$d = "SELECT kd_user, username FROM login WHERE kd_user ='$_GET[kd_user]'";
$e = mysql_query($d) or die (mysql_error());
$f = mysql_fetch_array($e);
}
?>
<div id="back">
<fieldset>
<h3>Tambah Data Petugas</H3>
<form method="post" class="form-horizontal invoice-form"  action="petugas_proses.php">
<?php
if (isset ($_GET['kd_user'])){ 
?>
<input type="hidden" name="action" value="update"/>
<input type="hidden" name="txtkd_userx" value='<?php echo $update ['kd_user'];?>' />
<?php }else{?>
<input type="hidden" name="action" value="tambah"/>
<?php
}
?>
<table align="left">
	<tr>
    	<td align="right">kode</td>
        <td><input  type="text" name="txtkode" readonly="true" placeholder="Otomatis" required value="<?php if (isset($_GET['kd_user'])) echo $f['kd_user'];?>" />
		<input type="hidden" name="txtkd_userx" required value="<?php if (isset($_GET['kd_user'])) echo $f['kd_user'];?>" />
		</tr>
    <tr>
    	<td align="right">Nama</td>
        <td><input  type="text" name="txtusername" required value="<?php if (isset($_GET['kd_user'])) echo $f['username'];?>" />
    </tr>
    <tr>
    	<td align="right">Password</td>
        <td><input type="password" name="txtpassword" /></td>
    </tr>
    <tr>
    	<td colspan="2">
        <?php
		if (isset ($_GET['kd_user'])){
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
<hr/>
<form method="POST" action="index.php?hal=petugas">
Pencarian : <input type="text" name="txtcari" placeholder="Ketiklah sesuatuu ...." />
<input class="btn btn-primary" type="submit" value="Cari"/>
</form>
<?php
//Paging
//1.Cari banyak total data
$total=mysql_query("SELECT COUNT(*) AS jumlah FROM login");
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
<h2>LIST PETUGAS</h2>
<table class="table table-striped table-bordered table-radmin">
<thead>
  <tr>
  	<th>No.</th>
    <th>Kode User</th>
    <th>Nama User</th>
    <th colspan="2">Aksi</th>
  </tr>
 <?php
if (isset($_POST['txtcari'])){
	$katakunci=$_POST['txtcari'];
}else{
	$katakunci="";
}
//4. Batasi dengan limit
	$query = mysql_query("SELECT*FROM petugas WHERE username LIKE '%$katakunci%' LIMIT $start,$hal");
	$jumlah = mysql_num_rows($query);
	if ($jumlah=='0'){
	echo "<tr><td colspan='3' align='center'>Data Belum Ada</td></tr>";
	}else{
	$no=1;
	while($hasil=mysql_fetch_array($query)){
	echo "<tr>";
	echo "<td align='center'>$no.</td>";
	echo "<td>$hasil[kd_petugas]</td>";
	echo "<td>".str_replace($katakunci, "<b>$katakunci</b>",$hasil['username'])."</td>";
	echo "<td align='center'><a href='index.php?hal=petugas&kd_user=$hasil[kd_petugas]'><i class='icon-edit'name='tambah' value='EDIT'></a></td>";
	echo "<td align='center'><a href='#' onclick=\"javascript:if(confirm('Yakin dihapus ?$hasil[kd_petugas]')){window.location.href='petugas_proses.php?action=hapus&kd_user=$hasil[kd_petugas]';}\"><i class='icon-trash icon-white' name='hapus' value='HAPUS'></a></td>";
	echo "</tr>";
	$no++;
	}
	}
	?>
</table>
<?php
//5. Buat link untuk halaman pagingnya
if($start!=0){
	echo "<a href='index.php?hal=petugas&start=".($start-$hal)."'>Prev</a>";
	echo "&nbsp;";
}
echo "&nbsp;";
for ($i=0; $i<$jum_hal; $i++){
	$x = $i * $hal;
	if($start == $x){
		echo ($i+1);
	}else {
		echo "<a href='index.php?hal=petugas&start=$x'>".($i+1)."</a>";
	}
	echo "&nbsp;";
}
echo "&nbsp;";
if($start!=$x){
	echo "<a href='index.php?hal=petugas&start=".($start+$hal)."'>Next</a>";
}
?>
<p>
Ditampilkan halaman ke <b> <?php echo ($start/$hal)+1; ?> </b> dari <b><?php echo $total_data; ?></b> data.
</p>
</fieldset>
</div>