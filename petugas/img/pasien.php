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
if (isset($_GET['no_pasien'])) $no_pasien = $_GET['no_pasien']; else $no_pasien = "";
$d = "SELECT no_pasien, nm_pasien, jenis_kelamin, agama, alamat, tgl_lahir, usia, no_telp, nm_kk, hub_kel FROM pasien WHERE no_pasien = '$no_pasien'";
$e = mysql_query($d) or die (mysql_error());
$f = mysql_fetch_array($e);
?>



<div id="back">
<fieldset>
<h3>Tambah Data Pasien</h3>
<form method="post" class="form-horizontal invoice-form" action="pasien_proses.php">
<?php
if (isset ($_GET['no_pasien'])){ 
?>
<input type="hidden" name="action" value="update"/>
<?php }else{?>
<input type="hidden" name="action" value="tambah"/>
<?php
}
?>
<table align="left">

    <tr>
    	<td align="right">No.Pasien</td>
        <td><input type="text" name="txtno_pasien" readonly="true" value="<?php echo $f['0']; ?>" /></td>
    </tr>
    <tr>
    	<td align="right">Nama Pasien</td>
        <td><input type="text" name="txtnm_pasien" value="<?php echo $f['nm_pasien']; ?>" /></td>
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
		$a = mysql_query("SELECT * FROM tb_agama");
		while($b=mysql_fetch_array($a)){
		echo"<option value='$b[kd_agama]' ";
		if(isset($_GET['id'])){
		if($edit['kd_agama']==$b['kd_agama'])
		echo"selected";}
		echo">$b[agama]</option>";
		}
		?>
		

    </tr>
    <tr>
    	<td align="right">Alamat</td>
        <td><input type="text" name="txtalamat" value="<?php echo $f['alamat']; ?>" /></td>
    </tr>
    <tr>
    	<td align="right">Tanggal Lahir (YYYY-MM-DD)</td>
        <td><input type="text" name="txttgl_lahir" id="datepicker" value="<?php echo $f['tgl_lahir']; ?>" /></td>
    </tr>
    <tr>
    	<td align="right">Usia</td>
        <td><input type="text" name="txtusia" readonly="true" value="<?php echo $f['tgl_lahir']; ?>" /></td>
    </tr>
    <tr>
    	<td align="right">No Telpon</td>
        <td><input type="text" name="txttelp" onkeyup="javascrip: if(isNaN(this.value)){alert('harus mengunakan angka');this.value='';} "required" value="<?php
		if(isset($GET['id']))
		echo $edit['no_telp'];
		?>"/></td>
		
    </tr>
    <tr>
    	<td align="right">Nama KK</td>
        <td><input type="text" name="txtkk" value="<?php echo $f['nm_kk']; ?>" /></td>
    </tr>
    <tr>
    	<td align="right">Hubungan Keluarga</td>
        <td><input type="text" name="txthub" value="<?php echo $f['hub_kel']; ?>" /></td>
    </tr>
	<tr>
    	<td align="right">Password</td>
        <td><input type="password" name="txtpass" value="<?php echo $f['password']; ?>" /></td>
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
<br />
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
  
  
  	$a = "SELECT no_pasien,nm_pasien,jenis_kelamin,agama,alamat,tgl_lahir,usia,no_telp,nm_kk,hub_kel from pasien";
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
		echo "<td>$c[0]</td>";
		echo "<td>$c[1]</td>";
		echo "<td>$c[2]</td>";
		echo "<td>$c[agama]</td>";
		echo "<td>$c[4]</td>";
		echo "<td>$c[5]</td>";
		echo "<td>$c[6]</td>";
		echo "<td>$c[7]</td>";
		echo "<td>$c[9]</td>";
		
		
		echo "<td align='center' ><a class='btn btn-small' href='index.php?hal=pasien&no_pasien=$c[no_pasien]'><i class='icon-edit'name='tambah' value='EDIT'></a></td>";
		echo "<td align='center' ><a class='disabled btn btn-small btn-danger' href='#' onclick=\"javascript:if(confirm('Anda Yakin Ingin Menghapus $c[no_pasien]')) window.location.href='pasien_proses.php?action=hapus&no_pasien=$c[no_pasien]';\"><i class='icon-trash icon-white' name='tambah' value='HAPUS'></a></td>";
		echo "</tr>";
	$no++;
	}
		}
	?>
    </table>
</fieldset>
</div>
</html>