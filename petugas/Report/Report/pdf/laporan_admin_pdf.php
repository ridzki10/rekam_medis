<?php 
//Ambil class fpdf
require('fpdf/fpdf.php');

//Koneksi database
mysql_connect("localhost", "root", "") or die (mysql_error());
mysql_select_db("baju_ukk") or die (mysql_error());

//Mulai bikin PDF
$pdf=new FPDF();
//Tambahkan halaman
$pdf->AddPage();
//Setting Font = SetFont( FontStyle, TypeFont, Ukuran )
$pdf->SetFont('Arial','B',16);
//Bikin Cell = Cell( Panjang, Tinggi, Text, Border, Berikutnya )
$pdf->Cell(40,10,'Laporan Motor', 0, 1);

//Judul Tabel
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(20, 5, "Nama", 1, 0, 'C');
$pdf->Cell(20, 5, "Ukuran", 1, 0, 'C');
$pdf->Cell(20, 5, "Warna", 1, 0, 'C');
$pdf->Cell(25, 5, "Harga", 1, 0, 'C');
$pdf->Cell(25, 5, "Stock", 1, 1, 'C');

$pdf->SetFont('Arial', '', 10);

//Tentukan query
$q = mysql_query("SELECT * FROM baju");
while($h = mysql_fetch_array($q)){
	$pdf->Cell(20, 5, $h['nama_baju'], 1, 0, 'L');
	$pdf->Cell(20, 5, $h['ukuran'], 1, 0, 'L');
	$pdf->Cell(20, 5, $h['warna'], 1, 0, 'L');
	$pdf->Cell(25, 5, "Rp. ".number_format($h['harga']), 1, 0, 'L');
	$pdf->Cell(25, 5, $h['stock'], 1, 1, 'C');
}

//Tampilkan ke browser / Output
$pdf->Output();
?> 