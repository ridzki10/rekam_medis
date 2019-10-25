<link rel="stylesheet" href="include/kotak.css" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
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
<?php
include "admin/koneksi.php";
if (isset($_GET['no_pasien'])) $no_pasien = $_GET['no_pasien']; else $no_pasien = "";
$d = "SELECT no_pasien, nm_pasien, jenis_kelamin, agama, alamat, tgl_lahir, usia, no_telp, nm_kk, hub_kel FROM pasien WHERE no_pasien = '$_SESSION[no_pasien]'";
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
    	<td class="form-control" align="right">No Pasien</td>
        <td><input type="hidden" name="txtno_pasienx" value="<?php echo $f['no_pasien']; ?>" />
        <input type="text" name="txtno_pasien" value="<?php echo $f['no_pasien']; ?>" /></td>
    </tr>
    <tr>
    	<td align="right">Nama Pasien</td>
        <td><input type="text" name="txtnm_pasien" value="<?php echo $f['nm_pasien']; ?>" /></td>
    </tr>
   <tr>
    	<td align="right">Jenis Kelamin</td>
        <td><input type="text" name="txtkelamin" value="<?php echo $f['jenis_kelamin']; ?>" /></td>
    </tr>
    <tr>
    	<td align="right">Agama</td>
        <td><input type="text" name="txtagama" value="<?php echo $f['agama']; ?>" /></td>
    </tr>
    <tr>
    	<td align="right">Alamat</td>
        <td><input type="text" name="txtalamat" value="<?php echo $f['alamat']; ?>" /></td>
    </tr>
    <tr>
    	<td align="right">Tanggal Lahir</td>
        <td><input type="text" name="txttgl_lahir" id="datepicker" value="<?php echo $f['tgl_lahir']; ?>" /></td>
    </tr>
    <tr>
    	<td align="right">Usia</td>
        <td><input type="text" name="txtusia" id="umur" value="<?php echo $f['usia']; ?>" /></td>
    </tr>
    <tr>
    	<td align="right">No Telpon</td>
        <td><input type="text" name="txttelp" value="<?php echo $f['no_telp']; ?>" /></td>
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
    	<td colspan="2">
        
        <input class="btn btn-primary" type="submit" value="Update" />
        
        <input class="btn btn-danger" type="reset" value="Batal" />
        </td>
    </tr>
   
</table>
</form>
</fieldset>
</div>
<br />
<div id="tabel">
<fieldset>

<table align="left">
	<tr>
	  <td align="right">No Pasien</td>
    	<td align="left">:</td>
        <td><?php echo $f['no_pasien']; ?></td>
    </tr>
    <tr>
      <td align="right">Nama Pasien</td>
    	<td align="right">:</td>
        <td><?php echo $f['nm_pasien']; ?></td>
    </tr>
    <tr>
      <td align="right">Jenis Kelamin</td>
    	<td align="right">:</td>
        <td><?php echo $f['jenis_kelamin']; ?></td>
    </tr>
    <tr>
      <td align="right">Agama</td>
    	<td align="right">:</td>
        <td><?php echo $f['agama']; ?></td>
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
    <tr>
    	<td colspan="3">
        <input type="submit" value="Ganti Password" />
        </td>
    </tr>
</table>
</div>