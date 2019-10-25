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
$pdf->Cell(40,10,'Laporan motor', 0, 1);

//Judul Tabel
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(35, 5, "Kode Motor", 1, 0, 'C');
$pdf->Cell(40, 5, "Merk", 1, 0, 'C');
$pdf->Cell(45, 5, "Tipe", 1, 0, 'C');
$pdf->Cell(30, 5, "Warna", 1, 0, 'C');
$pdf->Cell(35, 5, "Harga ", 1, 1, 'C');

$pdf->SetFont('Arial', '', 8);

//Tentukan query
$q = mysql_query("SELECT * FROM motor");
while($h = mysql_fetch_array($q)){
	$pdf->Cell(35, 5, $h['id_motor'], 1, 0, 'L');
	$pdf->Cell(40, 5, $h['merk'], 1, 0, 'L');
	$pdf->Cell(45, 5, $h['tipe'], 1, 0, 'L');
	$pdf->Cell(30, 5, $h['warna'], 1, 0, 'L');
	$pdf->Cell(35, 5, $h['harga'], 1, 1, 'L');

}

//Tampilkan ke browser / Output
$pdf->Output();
?> 