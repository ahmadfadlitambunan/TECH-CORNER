<?php
include("../_config/connect.php");
include("fpdf/pdf/fpdf.php");
include("../forum/funct/function.php");
$pdf = new FPDF('P', 'mm','Letter');

$pdf->AddPage();

$pdf->SetFont('Times','B',16);
$pdf->Cell(0,7,'Daftar User TechCorner',0,1,'C');

$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Times','B',10);

$pdf->Cell(8,6,'Id',1,0,'C');
$pdf->Cell(45,6,'Username',1,0,'C');
$pdf->Cell(55,6,'Email',1,0,'C');
$pdf->Cell(38,6,'Nama',1,0,'C');
$pdf->Cell(15,6,'Level',1,0,'C');

$pdf->Cell(40,6,'Tanggal Dibuat',1,1,'C');

$pdf->SetFont('Times','',8);

$sql="SELECT* FROM users ORDER BY id_user ASC";
//Query untuk mengambil data mahasiswa pada tabel mahasiswa
$hasil = query($sql);
foreach($hasil as $data){
     $pdf->Cell(8,6,$data['id_user'],1,0);
    $pdf->Cell(45,6,$data['username'],1,0);
    $pdf->Cell(55,6,$data['email'],1,0);
    $pdf->Cell(38,6,$data['name'],1,0);
    $pdf->Cell(15,6,$data['level'],1,0);
   
    $pdf->Cell(40,6,$data['created_at'],1,1);
}
   
  


$pdf->Output();
?>