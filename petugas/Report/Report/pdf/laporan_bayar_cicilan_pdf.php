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
$pdf->Cell(40,10,'Laporan bayar cicilan', 0, 1);

//Judul Tabel
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(23, 5, "Kode Cicilan", 1, 0, 'C');
$pdf->Cell(23, 5, "Kode Kredit", 1, 0, 'C');
$pdf->Cell(25, 5, "Pembeli", 1, 0, 'C');
$pdf->Cell(18, 5, "Tanggal", 1, 0, 'C');
$pdf->Cell(20, 5, "Bayar", 1, 0, 'C');
$pdf->Cell(15, 5, "Cicilan ke", 1, 0, 'C');
$pdf->Cell(18, 5, "Telah Bayar", 1, 0, 'C');
$pdf->Cell(10, 5, "Sisa", 1, 0, 'C');
$pdf->Cell(30, 5, "Keterangan", 1, 1, 'C');

$pdf->SetFont('Arial', '', 8);

//Tentukan query
$q = mysql_query("SELECT A.no_bayar, B.id_kredit, C.id_pembeli, C.nama, A.tanggal_bayar, A.bayar, A.cicilan, B.telah_bayar, B.sisa, A.keterangan FROM bayar_cicilan AS A INNER JOIN beli_kredit AS B ON ( A.id_kredit = B.id_kredit ) INNER JOIN pembeli AS C ON ( B.id_pembeli = C.id_pembeli )");
while($h = mysql_fetch_array($q)){
	$pdf->Cell(23, 5, $h['no_bayar'], 1, 0, 'L');
	$pdf->Cell(23, 5, $h['id_kredit'], 1, 0, 'L');
	$pdf->Cell(25, 5, $h['nama'], 1, 0, 'L');
	$pdf->Cell(18, 5, $h['tanggal_bayar'], 1, 0, 'L');
	$pdf->Cell(20, 5, $h['bayar'], 1, 0, 'L');
	$pdf->Cell(15, 5, $h['cicilan'], 1, 0, 'L');
	$pdf->Cell(18, 5, $h['telah_bayar'], 1, 0, 'L');
	$pdf->Cell(10, 5, $h['sisa'], 1, 0, 'L');
	$pdf->Cell(30, 5, $h['keterangan'], 1, 1, 'L');
}

//Tampilkan ke browser / Output
$pdf->Output();
?> 