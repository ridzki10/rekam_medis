<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="<a sl-processed="1" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
    <script src="<a sl-processed="1" href="http://code.jquery.com/jquery-1.9.1.js">http://code.jquery.com/jquery-1.9.1.js</a>"></script>
    <script src="<a sl-processed="1" href="http://code.jquery.com/ui/1.10.3/jquery-ui.js">http://code.jquery.com/ui/1.10.3/jquery-ui.js</a>"></script>
    <script>
        $(function() {
            $( "#datepicker" ).datepicker();
        });
 
        window.onload=function(){
            $('#datepicker').on('change', function() {
                var dob = new Date(this.value);
                var today = new Date();
                var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
                $('#umur').val(age);
            });
        }
 
    </script>
    </head>
<?php
include "koneksi.php";
if (isset($_GET['no_pasien'])) {
$d = "SELECT no_pasien, nm_pasien, jenis_kelamin, kd_agama, alamat, tgl_lahir, usia, no_telp, nm_kk, hub_kel FROM pasien WHERE no_pasien ='$_GET[no_pasien]'";
$e = mysql_query($d);
$f = mysql_fetch_array($e);
}
?>



<div id="back">
<fieldset>
<h3>Tambah Data Pasien</h3>
<form method="post" class="form-horizontal invoice-form" action="pasien_proses.php">
<?php
if (isset ($_GET['no_pasien'])){ 
?>
<input type="hidden" name="action" value="update"/>
<input type="hidden" name="txtkdx" value='<?php echo $f ['no_pasien'];?>' />
<?php }else{?>
<input type="hidden" name="action" value="tambah"/>
<?php
}
?>
<table align="left">

    <tr>
    	<td align="right">No Pasien</td>
        <td><input type="text" name="txtno_pasien" readonly="true"  required value="<?php if (isset($_GET['no_pasien'])) echo $f['no_pasien'];?>" />
		<input type="hidden" name="txtno_pasienx"  value="<?php if (isset($_GET['no_pasien'])) echo $f['no_pasien'];?>"/></td>
    </tr>
    <tr>
    	<td align="right">Nama Pasien</td>
        <td><input type="text" name="txtnm_pasien" required value="<?php if (isset($_GET['no_pasien'])) echo $f['nm_pasien'];?>"/></td>
    </tr>
    
   <tr>
    	<td align="right">Jenis Kelamin</td>
        <td><input name="txtkelamin" type="radio" value="Laki-Laki" />Laki-Laki
        <input name="txtkelamin" type="radio" value="Perempuan" />Perempuan</td>
    </tr>
    <tr>
    	<td align="right">Agama</td><td>
		<select name="cbagama">
		<option value="0">--Agama--</option>
		<?php
		$d = mysql_query("SELECT * FROM tb_agama");
		while($e=mysql_fetch_array($d)){
		echo"<option value='$e[kd_agama]' ";
		if(isset($_GET['no_pasien'])){
		if($f['kd_agama']==$e['kd_agama'])
		echo"selected";}
		echo">$e[agama]</option>";
		}
		?>
		

    </tr>
	
    <tr>
    	<td align="right">Alamat</td>
        <td><input type="text" name="txtalamat" required value="<?php if (isset($_GET['no_pasien'])) echo $f['alamat'];?>"/></td>
    </tr>
    <tr>
    	<td align="right">Tanggal Lahir (YYYY-MM-DD)</td>
        <td><input type="text" name="txttgl_lahir" id="datepicker" required value="<?php if (isset($_GET['no_pasien'])) echo $f['tgl_lahir'];?>"/></td>
    </tr>
   <tr>
    	<td align="right">Usia</td>
        <td><input type="text" name="txtusia" required value="<?php if (isset($_GET['no_pasien'])) echo $f['usia'];?>"/></td>
    </tr>
    <tr>
    	<td align="right">No Telpon</td>
        <td><input type="text" name="txttelp" onkeyup="javascrip: if(isNaN(this.value)){alert('harus mengunakan angka');this.value='';} "required value="<?php if (isset($_GET['no_pasien'])) echo $f['no_telp'];?>"/></td>
		
    </tr>
    <tr>
    	<td align="right">Nama KK</td>
        <td><input type="text" name="txtkk" required value="<?php if (isset($_GET['no_pasien'])) echo $f['nm_kk'];?>"/></td>
    </tr>
    <tr>
    	<td align="right">Hubungan Keluarga</td>
        <td><input type="text" name="txthub" required value="<?php if (isset($_GET['no_pasien'])) echo $f['hub_kel'];?>"/></td>
    </tr>
	<tr>
    	<td align="right">Password</td>
        <td><input type="password" name="txtpass"  /></td>
    </tr>
   <tr>
    	<td colspan="2">
        <?php
		if (isset ($_GET['no_pasien'])){
		?>
        <input class="btn btn-primary" type="submit" value="Update" />
        <?php }else{ ?>
        <input class="btn btn-primary" type="submit" value="Simpan"/>
        <?php } ?>
        <input style="width:60px;" class="btn btn-danger" "type="reset" value="Batal" />
        </td>
    </tr>
</table>
</form>
</fieldset>
</div>
<hr/>

<form method="POST" action="index.php?hal=pasien">
Pencarian : <input type="text" name="txtcari" placeholder="Ketiklah sesuatuu ...." />
<button type="submit" class="tombol-biru">Cari</button>
</form>

<?php
//Paging
//1.Cari banyak total data
$total=mysql_query("SELECT COUNT(*) AS jumlah FROM pasien");
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
<H2>LIST PASIEN</h2>
<table class="table table-striped table-bordered table-radmin";>
  <tr>
  	<TH>No</th>
  	<th>No.Pasien</th>
    <th>Nama</th>
    <th>Jenis Kelamin</th>
    <th>Agama</th>
    <th>Alamat</th>
    <th>Tgl Lahir</th>
    <th>USIA</th>
    <th>No. Telp</th>
    <th>Nama KK</th>
    <th>Hub Kel</th>
    
		`<th colspan="3">Aksi</th>
  </tr>
  <?php
if (isset($_POST['txtcari'])){
	$katakunci=$_POST['txtcari'];
}else{
	$katakunci="";  
} 
 //4. Batasi dengan limit
	$query = mysql_query("SELECT A.no_pasien,A.nm_pasien,A.jenis_kelamin,B.agama,A.alamat,A.tgl_lahir,A.usia,A.no_telp,A.nm_kk,A.hub_kel,A.password FROM pasien AS A INNER JOIN tb_agama AS B ON (A.kd_agama=B.kd_agama) WHERE A.nm_pasien LIKE '%$katakunci%'LIMIT $start,$hal");
	$jumlah = mysql_num_rows($query);
	if ($jumlah=='0'){
	echo "<tr><td colspan='11' align='center'>Data Belum Ada</td></tr>";
		}else{
	$no=1;
	while($hasil=mysql_fetch_array($query)){
		echo "<tr>";
		echo "<td align='center'>$no</td>";
		echo "<td>$hasil[no_pasien]</td>";
		echo "<td>".str_replace($katakunci, "<b>$katakunci</b>",$hasil['nm_pasien'])."</td>";
		echo "<td>$hasil[jenis_kelamin]</td>";
		echo "<td>$hasil[agama]</td>";
		echo "<td>$hasil[alamat]</td>";
		echo "<td>$hasil[tgl_lahir]</td>";
		echo "<td>$hasil[usia]</td>";
		echo "<td>$hasil[no_telp]</td>";
		echo "<td>$hasil[nm_kk]</td>";
		echo "<td>$hasil[hub_kel]</td>";
		echo "<td align='center' ><a class='btn btn-small' href='index.php?hal=pasien&no_pasien=$hasil[no_pasien]'><i class='icon-edit'name='tambah' value='EDIT'></a></td>";
		echo "<td align='center' ><a class='disabled btn btn-small btn-danger' href='#' onclick=\"javascript:if(confirm('Anda Yakin Ingin Menghapus $hasil[no_pasien]')) window.location.href='pasien_proses.php?action=hapus&no_pasien=$hasil[no_pasien]';\"><i class='icon-trash icon-white' name='tambah' value='HAPUS'></a></td>";
		echo "</tr>";
	$no++;
	}
	}
	?>
    </table>
	<?php
//5. Buat link untuk halaman pagingnya
if($start!=0){
	echo "<a href='index.php?hal=pasien&start=".($start-$hal)."'>Prev</a>";
	echo "&nbsp;";
}
echo "&nbsp;";
$x=0;
for ($i=0; $i<$jum_hal; $i++){
	$x = $i * $hal;
	if($start == $x){
		echo ($i+1);
	}else {
		echo "<a href='index.php?hal=pasien&start=$x'>".($i+1)."</a>";
	}
	echo "&nbsp;";
}
echo "&nbsp;";
if($start!=$x){
	echo "<a href='index.php?hal=pasien&start=".($start+$hal)."'>Next</a>";
}
?>
<p>
Ditampilkan halaman ke <b> <?php echo ($start/$hal)+1; ?> </b> dari <b><?php echo $total_data; ?></b> data.
</p>
</fieldset>
</div>
</html>