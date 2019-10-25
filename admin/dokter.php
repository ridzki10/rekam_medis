
<?php
include "koneksi.php";
if (isset($_GET['kd_dokter'])) {
$d = "SELECT kd_dokter, kd_poli, kd_kunjungan, kd_user, nm_dokter, SIP, tempat_lahir, no_telp, alamat FROM dokter WHERE kd_dokter ='$_GET[kd_dokter]'";
$e = mysql_query($d);
$f = mysql_fetch_array($e);
}
?>

<fieldset>
<h3>Tambah Data Dokter</H3>
<form method="post" class="form-horizontal invoice-form" action="dokter_proses.php">
<?php
if (isset ($_GET['kd_dokter'])){ 
?>
<input type="hidden" name="action" value="update"/>
<input type="hidden" name="txtkd_dokterx" value='<?php echo $f ['kd_dokter'];?>' />
<?php }else{?>
<input type="hidden" name="action" value="tambah"/>
<?php
}
?>
<table align="left">
	<tr>
    	<td align="right">Kode Dokter</td>
        <td><input type="text" name="txtkd_dokter" readonly="true"  required value="<?php if (isset($_GET['kd_dokter'])) echo $f['kd_dokter'];?>" />
		<input type="hidden" name="txtkd_dokterx"  value="<?php if (isset($_GET['kd_dokter'])) echo $f['kd_dokter'];?>"/></td>
    </tr>
	<tr>
    	<td align="right">Poliklinik</td>
        <td><select class="form-control" name="txtpoliklinik">
			<option value="0">--Pilih Poliklinik--</option>
            
			<?php
		$d = mysql_query("SELECT * FROM poliklinik");
		while($e=mysql_fetch_array($d)){
		echo"<option value='$e[kd_poli]' ";
		if(isset($_GET['kd_dokter'])){
		if($f['kd_poli']==$e['kd_poli'])
		echo"selected";}
		echo">$e[nm_poli]</option>";
		}
		?>
            
		</select></td>
    </tr>
    <tr>
    	<td align="right">Kunjungan</td>
        <td><select class="form-control" name="txtkunjungan">
			<option value="0">--Pilih Tanggal Kunjungan--</option>
            
			<?php
		$d = mysql_query("SELECT * FROM kunjungan");
		while($e=mysql_fetch_array($d)){
		echo"<option value='$e[kd_kunjungan]' ";
		if(isset($_GET['kd_dokter'])){
		if($f['kd_kunjungan']==$e['kd_kunjungan'])
		echo"selected";}
		echo">$e[tgl_kunjungan]</option>";
		}
		?>
            
		</select></td>
    </tr>
    <tr>
    	<td align="right">Petugas</td>
        <td><select class="form-control" name="txtpetugas">
			<option value="0">--Pilih Petugas</option>
            
			<?php
		$d = mysql_query("SELECT * FROM login");
		while($e=mysql_fetch_array($d)){
		echo"<option value='$e[kd_user]' ";
		if(isset($_GET['kd_dokter'])){
		if($f['kd_user']==$e['kd_user'])
		echo"selected";}
		echo">$e[username]</option>";
		}
		?>
		</select></td>
    </tr>
    
    <tr>
    	<td align="right">Nama Dokter</td>
        <td><input type="text" class="form-control" name="txtnm_dokter" required value="<?php if (isset($_GET['kd_dokter'])) echo $f['nm_dokter'];?>"/></td>
    </tr>
    <tr>
    	<td align="right">SIP</td>
       
        <td><input type="text" name="txtsip" required value="<?php if (isset($_GET['kd_dokter'])) echo $f['SIP'];?>"/></td>
    </tr>
    <tr>
    	<td align="right">Tempat Lahir</td>
        <td><input type="text" class="form-control" name="txttmp_lahir" required value="<?php if (isset($_GET['kd_dokter'])) echo $f['tempat_lahir'];?>"/></td>
    </tr>
	
    <tr>
    	<td align="right">No Telpon</td>
        <td><input type="text" name="txttelp" onkeyup="javascrip: if(isNaN(this.value)){alert('harus mengunakan angka');this.value='';} "required value="<?php if (isset($_GET['kd_dokter'])) echo $f['no_telp'];?>"/></td>
		
    </tr>
	
	<tr>
    	<td align="right">Alamat</td>
        <td><input type="text" class="form-control" name="txtalamat" required value="<?php if (isset($_GET['kd_dokter'])) echo $f['alamat'];?>"/></td>
    </tr>
	<tr>
    	<td align="right">Password</td>
        <td><input type="password" name="txtpass"  /></td>
    </tr>
    <tr>
    	<td colspan="2">
        <?php
		if (isset ($_GET['kd_dokter'])){
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

<form method="POST" action="index.php?hal=dokter">
Pencarian : <input type="text" name="txtcari" placeholder="Ketiklah sesuatuu ...." />
<input class="btn btn-primary" type="submit" value="Cari"/>
</form>

<?php
//Paging
//1.Cari banyak total data
$total=mysql_query("SELECT COUNT(*) AS jumlah FROM dokter");
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


<H2>LIST DOKTER</h2>
<table class="table table-striped table-bordered table-radmin";>
  <tr>
  	<th>No.</th>
    <th>Kode Dokter</th>
    <th>Poliklinik</th>
    <th>Kunjungan</th>
    <th>Petugas</th>
    <th>Nama Dokter</th>
    <th>SIP</th>
    <th>Tempat Lahir</th>
    <th>No Telpon</th>
    <th>Alamat</th>
    <th colspan="2">Aksi</th>
  </tr>
  <?php
if (isset($_POST['txtcari'])){
	$katakunci=$_POST['txtcari'];
}else{
	$katakunci="";  
} 
  
  
  	$a = ("SELECT A.kd_dokter, B.nm_poli,B.lantai , C.tgl_kunjungan, D.username, A.nm_dokter, A.SIP, A.tempat_lahir, A.no_telp, A.alamat FROM dokter AS A INNER JOIN poliklinik AS B ON (A.kd_poli=B.kd_poli) INNER JOIN kunjungan AS C ON (A.kd_kunjungan=C.kd_kunjungan) INNER JOIN login AS D ON(A.kd_user=D.kd_user) WHERE A.nm_dokter LIKE '%$katakunci%'LIMIT $start,$hal");
	$b = mysql_query ($a) or die (mysql_error());
	$jumlah = mysql_num_rows($b);
	if ($jumlah == 0){
		echo "<tr>
				<td colspan='11' align='center'>Data Belum Ada</td>
			  </tr>";
		} else {
		$no=1;
		
	while ($c = mysql_fetch_array($b)){
		
		echo "<tr>";
		echo "<td align='center'>$no</td>";
		echo "<td>$c[kd_dokter]</td>";
		echo "<td>$c[nm_poli]</td>";
		echo "<td>$c[tgl_kunjungan]</td>";
		echo "<td>$c[username]</td>";
		echo "<td>".str_replace($katakunci, "<b>$katakunci</b>",$c['nm_dokter'])."</td>";
		echo "<td>$c[SIP]</td>";
		echo "<td>$c[tempat_lahir]</td>";
		echo "<td>$c[no_telp]</td>";
		echo "<td>$c[alamat]</td>";
		
		echo "<td align='center' ><a class='btn btn-small' href='index.php?hal=dokter&kd_dokter=$c[kd_dokter]'><i class='icon-edit'name='tambah' value='EDIT'></a></td>";
		echo "<td align='center' ><a class='disabled btn btn-small btn-danger' href='#' onclick=\"javascript:if(confirm('Anda Yakin Ingin Menghapus $c[kd_dokter]')) window.location.href='dokter_proses.php?action=hapus&kd_dokter=$c[kd_dokter]';\"><i class='icon-trash icon-white' name='tambah' value='HAPUS'></a></td>";
		echo "</tr>";
	$no++;
	}
		}
	?>
</table>
<?php
//5. Buat link untuk halaman pagingnya
if($start!=0){
	echo "<a href='index.php?hal=dokter&start=".($start-$hal)."'>Prev</a>";
	echo "&nbsp;";
}
echo "&nbsp;";
$x=0;
for ($i=0; $i<$jum_hal; $i++){
	$x = $i * $hal;
	if($start == $x){
		echo ($i+1);
	}else {
		echo "<a href='index.php?hal=dokter&start=$x'>".($i+1)."</a>";
	}
	echo "&nbsp;";
}
echo "&nbsp;";
if($start!=$x){
	echo "<a href='index.php?hal=dokter&start=".($start+$hal)."'>Next</a>";
}
?>
<p>
Ditampilkan halaman ke <b> <?php echo ($start/$hal)+1; ?> </b> dari <b><?php echo $total_data; ?></b> data.
</p>
</fieldset>
</div>