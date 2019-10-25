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
$pdf->Cell(40,10,'Laporan beli kredit', 0, 1);

//Judul Tabel
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(20, 5, "Kredit Kode", 1, 0, 'C');
$pdf->Cell(17, 5, "Tanggal", 1, 0, 'C');
$pdf->Cell(24, 5, "Pembeli", 1, 0, 'C');
$pdf->Cell(12, 5, "Merk", 1, 0, 'C');
$pdf->Cell(25, 5, "Tipe", 1, 0, 'C');
$pdf->Cell(17, 5, "Uang Muka", 1, 0, 'C');
$pdf->Cell(12, 5, "Cicilan", 1, 0, 'C');
$pdf->Cell(12, 5, "Bunga", 1, 0, 'C');
$pdf->Cell(17, 5, "Harga", 1, 0, 'C');
$pdf->Cell(35, 5, "Keterangan ", 1, 1, 'C');

$pdf->SetFont('Arial', '', 8);

//Tentukan query
$q = mysql_query("SELECT A.id_kredit, A.tanggal_kredit, B.nama, C.merk, C.tipe, A.uang_muka, A.lama_cicilan, A.bunga, A.harga, A.keterangan FROM beli_kredit AS A INNER JOIN pembeli AS B ON ( A.id_pembeli = B.id_pembeli ) INNER JOIN motor AS C ON (A.id_motor = C.id_motor)");
while($h = mysql_fetch_array($q)){
	$pdf->Cell(20, 5, $h['id_kredit'], 1, 0, 'L');
	$pdf->Cell(17, 5, $h['tanggal_kredit'], 1, 0, 'L');
	$pdf->Cell(24, 5, $h['nama'], 1, 0, 'L');
	$pdf->Cell(12, 5, $h['merk'], 1, 0, 'L');
	$pdf->Cell(25, 5, $h['tipe'], 1, 0, 'L');
	$pdf->Cell(17, 5, $h['uang_muka'], 1, 0, 'L');
	$pdf->Cell(12, 5, $h['lama_cicilan'], 1, 0, 'L');
	$pdf->Cell(12, 5, $h['bunga'], 1, 0, 'L');
	$pdf->Cell(17, 5, $h['harga'], 1, 0, 'L');
	$pdf->Cell(35, 5, $h['keterangan'], 1, 1, 'L');
}

//Tampilkan ke browser / Output
$pdf->Output();
?> _