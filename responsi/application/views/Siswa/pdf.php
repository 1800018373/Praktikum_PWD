<?php
// memanggil library FPDF 
require('fpdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l', 'mm', 'A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial', 'B', 16);
// mencetak string
$pdf->Cell(190, 7, 'SMA NEGERI 1 WAKANDA', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(190, 7, 'DAFTAR NILAI SISWA', 0, 1, 'C');
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10, 7, '', 0, 1);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(23, 6, 'NIK', 1, 0);
$pdf->Cell(70, 6, 'Pelajaran', 1, 0);
$pdf->Cell(25, 6, 'SEMESTER', 1, 0);
$pdf->Cell(50, 6, 'TAHUN AJARAN', 1, 0);
$pdf->Cell(20, 6, 'NILAI', 1, 1);
$pdf->SetFont('Arial', '', 10);
include 'koneksi.php';

// $mahasiswa = mysqli_query($con, "SELECT siswa.nik, pelajaran.pelajaran, semester.semester, semester.tahun_ajaran, nilai.nilai FROM siswa JOIN nilai ON nilai.nik=siswa.nik JOIN semester ON semester.kd_semester=semester.kd_semester JOIN pelajaran ON pelajaran.kd_pelajaran=nilai.kd_pelajaran where nilai.nik =$nik");

// while ($row = mysqli_fetch_array($mahasiswa)) {
foreach ($nilai as $ni) :
    $pdf->Cell(23, 6, $ni->nik, 1, 0);
    $pdf->Cell(70, 6, $ni->pelajaran, 1, 0);
    $pdf->Cell(25, 6, $ni->semester, 1, 0);
    $pdf->Cell(50, 6, $ni->tahun_ajaran, 1, 0);
    $pdf->Cell(20, 6, $ni->nilai, 1, 1);
endforeach;
// }
$pdf->Output();
