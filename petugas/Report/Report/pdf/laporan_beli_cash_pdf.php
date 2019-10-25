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
$pdf->Cell(40,10,'Laporan beli cash', 0, 1);

//Judul Tabel
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(25, 5, "Kode Beli", 1, 0, 'C');
$pdf->Cell(20, 5, "Tanggal", 1, 0, 'C');
$pdf->Cell(25, 5, "Pembeli", 1, 0, 'C');
$pdf->Cell(25, 5, "Alamat", 1, 0, 'C');
$pdf->Cell(25, 5, "Motor", 1, 0, 'C');
$pdf->Cell(20, 5, "Harga", 1, 0, 'C');
$pdf->Cell(20, 5, "Jumlah", 1, 0, 'C');
$pdf->Cell(25, 5, "Keterangan", 1, 1, 'C');
$pdf->SetFont('Arial', '', 8);

//Tentukan query
$q = mysql_query("SELECT A.id_beli, A.tanggal_beli, B.nama, B.alamat, C.merk, C.tipe, C.harga, A.jumlah, A.keterangan FROM beli_cash AS A INNER JOIN pembeli AS B ON ( A.id_pembeli = B.id_pembeli ) INNER JOIN motor AS C ON ( A.id_motor = C.id_motor ) ");
while($h = mysql_fetch_array($q)){
	$pdf->Cell(25, 5, $h['id_beli'], 1, 0, 'L');
	$pdf->Cell(20, 5, $h['tanggal_beli'], 1, 0, 'L');
	$pdf->Cell(25, 5, $h['nama'], 1, 0, 'L');
	$pdf->Cell(25, 5, $h['alamat'], 1, 0, 'L');
	$pdf->Cell(25, 5, $h['merk'], 1, 0, 'L');
	$pdf->Cell(20, 5, $h['harga'], 1, 0, 'L');
	$pdf->Cell(20, 5, $h['jumlah'], 1, 0, 'L');
	$pdf->Cell(25, 5, $h['keterangan'], 1, 1, 'L');
}

//Tampilkan ke browser / Output
$pdf->Output();
?> 