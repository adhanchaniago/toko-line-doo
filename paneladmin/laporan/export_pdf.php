<?php
require('../assets/fpdf182/fpdf.php');

//membuat objek baru bernama pdf dari class FPDF
//dan melakukan setting kertas l : landscape, A5 : ukuran kertas
$pdf = new FPDF('l','mm','A5');
// membuat halaman baru
$pdf->AddPage();
// menyetel font yang digunakan, font yang digunakan adalah arial, bold dengan ukuran 16
$pdf->SetFont('Arial','B',16);
// judul
$pdf->Cell(190,7,'TOKOLINEDOO | Website Toko Online',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'DAFTAR BARANG TOKOLINEDOO',0,1,'C');
 
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,6,'NO',1,0);
$pdf->Cell(76,6,'NAMA BARANG',1,0);
$pdf->Cell(18,6,'JUMLAH',1,0);
$pdf->Cell(25,6,'HARGA JUAL',1,0);
$pdf->Cell(18,6,'TERJUAL',1,0);
$pdf->Cell(20,6,'MASUK',1,1);
 
$pdf->SetFont('Arial','',10);
 
//koneksi ke database
$conn = new mysqli("localhost", "root", "", "tokoline");
$no = 1;
$tampil = mysqli_query($conn, "SELECT * FROM tb_barang");
while ($hasil = mysqli_fetch_array($tampil)){
    $pdf->Cell(10,6,$no++,1,0);
    $pdf->Cell(76,6,$hasil['nama'],1,0);
    $pdf->Cell(18,6,$hasil['jumlah'],1,0);
    $pdf->Cell(25,6,$hasil['hrg_jual'],1,0); 
    $pdf->Cell(18,6,$hasil['terjual'],1,0); 
    $pdf->Cell(20,6,$hasil['tgl_masuk'],1,1); 
}
 
$pdf->Output();