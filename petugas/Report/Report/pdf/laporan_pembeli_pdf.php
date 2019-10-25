<?php 
//Ambil class fpdf
require('fpdf/fpdf.php');

//Koneksi database
mysql_connect("localhost", "root", "") or die (mysql_error());
mysql_select_db("kredit_motor") or die (mysql_error());

//Mulai bikin PDF
$pdf=new FPDF();
//Tambahkan halaman
$pdf->AddPage();
//Setting Font = SetFont( FontStyle, TypeFont, Ukuran )
$pdf->SetFont('Arial','B',16);
//Bikin Cell = Cell( Panjang, Tinggi, Text, Border, Berikutnya )
$pdf->Cell(40,10,'Laporan pembeli', 0, 1);

//Judul Tabel
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(20, 5, "Kode Pembeli", 1, 0, 'C');
$pdf->Cell(18, 5, "No KTP", 1, 0, 'C');
$pdf->Cell(30, 5, "Nama", 1, 0, 'C');
$pdf->Cell(30, 5, "Alamat", 1, 0, 'C');
$pdf->Cell(20, 5, "Telepon", 1, 0, 'C');
$pdf->Cell(22, 5, "HP", 1, 0, 'C');
$pdf->Cell(7, 5, "KK", 1, 0, 'C');
$pdf->Cell(14, 5, "Slip Gaji", 1, 0, 'C');
$pdf->Cell(30, 5, "Keteranagn", 1, 1, 'C');

$pdf->SetFont('Arial', '', 8);

//Tentukan query
$q = mysql_query("SELECT * FROM pembeli");
while($h = mysql_fetch_array($q)){
	$pdf->Cell(20, 5, $h['id_pembeli'], 1, 0, 'L');
	$pdf->Cell(18, 5, $h['no_ktp'], 1, 0, 'L');
	$pdf->Cell(30, 5, $h['nama'], 1, 0, 'L');
	$pdf->Cell(30, 5, $h['alamat'], 1, 0, 'L');
	$pdf->Cell(20, 5, $h['telepon'], 1, 0, 'L');
	$pdf->Cell(22, 5, $h['hp'], 1, 0, 'L');
	$pdf->Cell(7, 5, $h['kk'], 1, 0, 'L');
	$pdf->Cell(14, 5, $h['slip_gaji'], 1, 0, 'L');
	$pdf->Cell(30, 5, $h['keterangan'], 1, 1, 'L');
}

//Tampilkan ke browser / Output
$pdf->Output();
?> 