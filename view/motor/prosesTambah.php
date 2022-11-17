<?php
include_once __DIR__ . '/../../Model/Motor.php';
include_once __DIR__ . '/../../Model/Upload.php';

#1.Ambil semua parameter form
$platNo = $_REQUEST['platNo'];
$merek = $_REQUEST['merek'];
$tipe = $_REQUEST['tipe'];
$mahasiswaNim = $_REQUEST['mahasiswaNim'];


#2. Buat Objek dari Motor
$motor = new Motor();
$motor->platNo = $platNo;
$motor->merek = $merek;
$motor->tipe = $tipe;
$motor->mahasiswaNim = $mahasiswaNim;

#2.1 Proses Upload Gambar
$fileName = Upload::image();
if ($fileName == false) {
    echo "Terjadi Kesalahan Ketika Upload <br>";
    echo "<a href='index.php'>Klik Link Ini Untuk Kembali</a>";
    die();
}

$motor->gambar = $fileName;

#3. Panggil function insert via objek
$motor->insert();

#4. Redirect ke halaman list motor
header('Location: ../../index.php?page=list-motor');
