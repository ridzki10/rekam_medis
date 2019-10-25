<html> 
	<head> 
	<title>:: Laporan Motor ::</title>
	<script type="text/javascript" src="jscharts.js"></script>
	</head>
<body>
<?php 
//Koneksi database
mysql_connect("localhost", "root", "");
mysql_select_db("kreditmotor");
?>
<center>
<div id="graph">Loading graph...</div>
<script type="text/javascript">		
	var myData = new Array(
	<?php
	//Tentukan data yang akan di jadikan grafik nya dari SQL
	$qSQL = mysql_query("SELECT motor_merk, motor_harga FROM motor ORDER BY motor_merk ASC");	
	$jumlah = mysql_num_rows($qSQL);
	$i=1;
	while($data = mysql_fetch_array($qSQL)){
	?>
	['<?php echo $data[0]; ?>', <?php echo $data[1]; ?>]
	<?php
		if($i<$jumlah) echo ",";
		$i++;
	}
	?>
	);	
	var colors = [
	<?php
	for($a=0;$a<$jumlah;$a++){
		echo "'#AF0202'";
		if($a<$jumlah-1) echo ",";
	}
	?>
	];	
	var myChart = new JSChart('graph', 'bar');
	myChart.setDataArray(myData);
	myChart.colorizeBars(colors);
	myChart.setTitle(':: LAPORAN HARGA MOTOR ::');
	myChart.setTitleColor('#8E8E8E');
	myChart.setAxisNameX('Merk Motor');
	myChart.setAxisNameY('Harga');
	myChart.setAxisColor('#C4C4C4');
	myChart.setAxisNameFontSize(20);
	myChart.setAxisNameColor('#999');
	myChart.setAxisValuesColor('#7E7E7E');
	myChart.setBarValuesColor('#7E7E7E');
	myChart.setAxisPaddingTop(60);
	myChart.setAxisPaddingRight(140);
	myChart.setAxisPaddingLeft(170);
	myChart.setAxisPaddingBottom(50);
	myChart.setTextPaddingLeft(90);
	myChart.setTitleFontSize(16);
	myChart.setBarBorderWidth(1);
	myChart.setBarBorderColor('#C4C4C4');
	myChart.setBarSpacingRatio(50);
	myChart.setGrid(false);
	myChart.setSize(616, 321);
	myChart.setBackgroundImage('chart_bg.jpg');
	myChart.draw();
</script>
</center>
<p style="line-height: 20px;">&nbsp;</p>
<center>
	<input type="button" value="cetak" onClick="javascript: window.print();" />

</center>
</body>
</html>