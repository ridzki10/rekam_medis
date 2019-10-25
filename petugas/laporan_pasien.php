<?php 
//Ambil class fpdf
require('fpdf/fpdf.php');

//Koneksi database
mysql_connect("localhost", "root", "") or die (mysql_error());
mysql_select_db("rekam_medis") or die (mysql_error());

//Mulai bikin PDF
$pdf=new FPDF();
//Tambahkan halaman
$pdf->AddPage();
//Setting Font = SetFont( FontStyle, TypeFont, Ukuran )
$pdf->SetFont('Arial','B',16);
//Bikin Cell = Cell( Panjang, Tinggi, Text, Border, Berikutnya )
$pdf->Cell(40,10,'Laporan Pasien', 0, 1);

//Judul Tabel
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(20, 5, "Nama Pasien", 1, 0, 'C');
$pdf->Cell(20, 5, "Jenis Kelamin", 1, 0, 'C');
$pdf->Cell(20, 5, "Agama", 1, 0, 'C');
$pdf->Cell(25, 5, "Alamat", 1, 0, 'C');
$pdf->Cell(25, 5, "Tanggal Lahir", 1, 0, 'C');
$pdf->Cell(25, 5, "Usia", 1, 0, 'C');
$pdf->Cell(25, 5, "No Telephone", 1, 0, 'C');
$pdf->Cell(25, 5, "Kepala Keluarga", 1, 0, 'C');
$pdf->Cell(25, 5, "Hubungan Keluarga", 1, 0, 'C');

$pdf->SetFont('Arial', '', 10);

//Tentukan query
$q = mysql_query("SELECT * FROM pasien");
while($h = mysql_fetch_array($q)){
	$pdf->Cell(20, 5, $h['nm_pasien'], 1, 0, 'L');
	$pdf->Cell(20, 5, $h['jenis_kelamin'], 1, 0, 'L');
	$pdf->Cell(20, 5, $h['kd_agama'], 1, 0, 'L');
	$pdf->Cell(20, 5, $h['alamat'], 1, 0, 'L');
	$pdf->Cell(20, 5, $h['tgl_lahir'], 1, 0, 'L');
	$pdf->Cell(20, 5, $h['usia'], 1, 0, 'L');
	$pdf->Cell(20, 5, $h['no_telp'], 1, 0, 'L');
	$pdf->Cell(20, 5, $h['nm_kk'], 1, 0, 'L');
	$pdf->Cell(20, 5, $h['hub_kel'], 1, 0, 'L');
	}

//Tampilkan ke browser / Output
$pdf->Output();
?> 