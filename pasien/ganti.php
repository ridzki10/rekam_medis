<div id="back">
<fieldset>
<legend>Silahkan Ganti Password</legend>
<form method="post" action="ganti_proses.php">
<?php
if (isset ($_GET['$_SESSION[no_pasien]'])){ 
?>
<input type="hidden" name="action" value="Ganti"/>
<?php }?>

<table align="left" >
	<tr>
	  <td align="left">Password Lama</td>
    	<td align="left">:</td>
        <td><input type="password" name="txtpass_lama" value="" /></td>
    </tr>
    
    <tr>
      <td align="left">Password Baru</td>
    	<td align="right">:</td>
        <td><input type="password" name="txtpass_baru" value="" /></td>
    </tr>
    <tr>
      <td align="left">Konfirmasi Password </td>
    	<td align="right">:</td>
        <td><input type="password" name="txtkonfirmasi_pass" value="" /></td>
    </tr>
    
    	<td colspan="3">
        
        <input type="submit"  class="btn btn-primary" value="Ganti Password" />
        </td>
    </tr>
</table>
</form>
</fieldset>
</div>
