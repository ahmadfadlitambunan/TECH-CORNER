<?php
include("../_config/connect.php");
include("fpdf/pdf/fpdf.php");
include("../forum/funct/function.php");
$pdf = new FPDF('P', 'mm','Letter'); 
   $pdf->AddPage();


    if(isset($_GET['btnuser']))
    {
        

    

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
        //Query untuk mengambil data userspada tabel users
        $hasil = query($sql);
        foreach($hasil as $data){
        $pdf->Cell(8,6,$data['id_user'],1,0);
        $pdf->Cell(45,6,$data['username'],1,0);
         $pdf->Cell(55,6,$data['email'],1,0);
        $pdf->Cell(38,6,$data['name'],1,0);
        $pdf->Cell(15,6,$data['level'],1,0);
   
         $pdf->Cell(40,6,$data['created_at'],1,1);
        }
    }
    elseif(isset($_GET['btnkom']))
    {
        $pdf = new FPDF('P', 'mm','Letter');

        $pdf->AddPage();
        
        $pdf->SetFont('Times','B',16);
        $pdf->Cell(0,7,'Daftar Komentar TechCorner',0,1,'C');
        
        $pdf->Cell(10,7,'',0,1);
        
        $pdf->SetFont('Times','B',10);
        
        $pdf->Cell(8,6,'Id',1,0,'C');
        $pdf->Cell(45,6,'Konten',1,0,'C');
        $pdf->Cell(50,6,'Username',1,0,'C');
        $pdf->Cell(50,6,'Judul Thread',1,0,'C');
        $pdf->Cell(12,6,'Parent',1,0,'C');
        
        $pdf->Cell(40,6,'Tanggal Dibuat',1,1,'C');
        
        $pdf->SetFont('Times','',8);
        $sql="SELECT* FROM komentar ORDER BY id ASC";
        //Query untuk mengambil data mahasiswa pada tabel mahasiswa
        $hasil = query($sql);
        foreach($hasil as $data){
            $resUname = mysqli_query($conn, "SELECT username FROM users WHERE id_user = " . $data['id_user'] . " LIMIT 1;");
            $dataUname = mysqli_fetch_assoc($resUname);
             $pdf->Cell(8,6,$data['id'],1,0);
            $pdf->Cell(45,6,$data['konten'],1,0);
            $pdf->Cell(50,6,$dataUname['username'],1,0);
            $resThread = mysqli_query($conn, "SELECT judul FROM posting WHERE id_thread = " . $data['thread_id'] . " LIMIT 1;");
            $dataThread = mysqli_fetch_assoc($resThread);
            $pdf->Cell(50,6,$dataThread['judul'],1,0);
            $pdf->Cell(12,6,$data['parent'],1,0);
           
            $pdf->Cell(40,6,$data['created_at'],1,1);
        }
    }
    elseif(isset($_GET['btnpost']))
    {
        $pdf = new FPDF('P', 'mm','Letter');

        $pdf->AddPage();
        
        $pdf->SetFont('Times','B',16);
        $pdf->Cell(0,7,'Daftar Posting TechCorner',0,1,'C');
        
        $pdf->Cell(10,7,'',0,1);
        
        $pdf->SetFont('Times','B',10);
        
        $pdf->Cell(8,6,'Id',1,0,'C');
        $pdf->Cell(45,6,'Username',1,0,'C');
        $pdf->Cell(55,6,'Judul',1,0,'C');
        $pdf->Cell(38,6,'Kategori',1,0,'C');
       
        
        $pdf->Cell(40,6,'Tanggal Dibuat',1,1,'C');
        
        $pdf->SetFont('Times','',8);
        $sql="SELECT* FROM posting ORDER BY id_thread ASC";
        //Query untuk mengambil data mahasiswa pada tabel mahasiswa
        $hasil = query($sql);
        foreach($hasil as $data){
             $pdf->Cell(8,6,$data['id_thread'],1,0);
             $resUname = mysqli_query($conn, "SELECT username FROM users WHERE id_user = " . $data['user_id'] . " LIMIT 1;");
            $dataUname = mysqli_fetch_assoc($resUname);
            $pdf->Cell(45,6,$dataUname['username'],1,0);
            $pdf->Cell(55,6,$data['judul'],1,0);
            $pdf->Cell(38,6,$data['kategori'],1,0);
            $pdf->Cell(40,6,$data['tanggal_posting'],1,1);
        }
    }



   
  


$pdf->Output();
?>