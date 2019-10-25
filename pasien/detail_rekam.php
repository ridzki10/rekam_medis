<link rel="stylesheet" href="include/kotak.css" />

<body onLoad="windows.print()">
<?php
include "admin/koneksi.php";
if (isset($_GET['no_rm'])) $no_rm = $_GET['no_rm']; else $no_rm = "";
$d = "SELECT A.no_rm, B.nm_tindakan, B.ket, C.nm_obat, C.jml_obat, C.ukuran, C.harga, D.username, E.nm_pasien, E.jenis_kelamin, E.alamat, A.diagnosa, A.resep, A.keluhan, A.tgl_pemeriksaan, A.tgl_kesembuhan, A.ket FROM rekam_medis AS A INNER JOIN tindakan AS B ON (A.kd_tindakan=B.kd_tindakan) INNER JOIN obat AS C ON (A.kd_obat=C.kd_obat) INNER JOIN login AS D ON (A.kd_user=D.kd_user) INNER JOIN pasien AS E ON (A.no_pasien=E.no_pasien) WHERE no_rm = '$no_rm'";
$e = mysql_query($d) or die (mysql_error());
$f = mysql_fetch_array($e);
?>
<script type="text/javascript">
var s5_taf_parent = window.location;
function popup_print() {
window.open('detail_rekam.php?no_rm=<?php echo $f['0'];?>','page','toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=750,height=600,left=50,top=50,titlebar=yes')
}
</script>
<a class="radmin-printer" width="25" height="20" onClick="popup_print()">Preview</a>
<a class="radmin-download" width="25" height="20" onClick="window.print()">Print</a>
<div id="back">
<fieldset> 

<form method="post" action="">

<div id="cetak">
<table class="table table-striped table-bordered table-radmin">
	<th align="center" colspan="4">REKAM MEDIS</th>
    
    <tr>
    	<td align="left" style="border-right:1px solid #000;">No Rekam Medis</td>
    	<td>:</td>
        <td colspan="2"><?php echo $f['0']; ?></td>
    </tr>
	<tr>
    	<td align="left" rowspan="2" style="border-right:1px solid #000;">Tindakan</td>
    	<td align="right">:</td>
        <td>Nama Tindakan</td>
        <td>: <?php echo $f['1'];?></td>
        
        </tr>
        <tr>
        <td>:</td>
        
        <td>Keterangan</td>
        <td>: <?php echo $f['2']; ?></td>
        </tr>
        <tr>
    	<td align="left" rowspan="4" style="border-right:1px solid #000;">Obat</td>
        <td align="left">:</td>
        <td>Nama Obat</td>
    	<td>: <?php echo $f['3'];?></td>
        </tr>
        <tr>
        <td>:</td>
        <td>Jumlah</td>
        <td>: <?php echo $f['4'];?></td>
        
        </tr>
        <tr>
        <td>:</td>
        <td>Ukuran</td>
        <td>: <?php echo $f['5'];?></td>
    	</tr>
        <tr>
        <td>:</td>
        <td>Harga</td>
        <td>: <?php echo $f['6'];?></td>
    	</tr>
    </tr>
    <tr>
    	<td align="left" style="border-right:1px solid #000;">Petugas</td>
    	
        <td>:</td>
        <td colspan="2"><?php echo $f['7'];?></td>
        
    </tr>
    <tr>
    	<td align="left" rowspan="3" style="border-right:1px solid #000;">Pasien</td>
    	<td>:</td>
        <td>Nama</td>
        <td>: <?php echo $f['8']; ?></td>
      </tr>
        <tr>
        <td>:</td>
        <td>Jenis Kelamin</td>
 		<td>: <?php echo $f['9'];?></td>
        </tr>
        <tr>
        <td>:</td>
        <td>Alamat</td>
        <td>: <?php echo $f['10'];?></td>
        </tr>   
    </tr>
    <tr>
    	<td align="left" style="border-right:1px solid #000;">Diagnosa</td>
    	<td>:</td>
        <td colspan="2"><?php echo $f['11']; ?></td>
    </tr>
    <tr>
    	<td align="left" style="border-right:1px solid #000;">Resep</td>
    	<td>:</td>
        <td colspan="2"><?php echo $f['12']; ?></td>
    </tr>
    <tr>
    	<td align="left" style="border-right:1px solid #000;">Keluhan</td>
    	<td>:</td>
        <td colspan="2"><?php echo $f['13']; ?></td>
    </tr>
    <tr>
    	<td align="left" style="border-right:1px solid #000;">Tanggal Pemeriksaan</td>
    	<td>:</td>
        <td colspan="2"><?php echo $f['14']; ?></td>
    </tr>
	<td align="left" style="border-right:1px solid #000;">Tanggal Kepulangan</td>
    	<td>:</td>
        <td colspan="2"><?php echo $f['15']; ?></td>
    </tr>
    <tr>
    	<td align="left" style="border-right:1px solid #000;">Keterangan</td>
    	<td>:</td>
        <td colspan="2"><?php echo $f['16']; ?></td>
    </tr>
    
 
</table>
</form>
</fieldset>
</div>
</div>
