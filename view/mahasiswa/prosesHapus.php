<?php

include_once __DIR__ . '../../../Model/Mahasiswa.php';

$nim = $_REQUEST['nim'];
$mhs = Mahasiswa::getByPrimaryKey($nim);

if ($mhs === null) {
    echo "<h2>Data Mahasiswa Tidak Di Temukan</h2>";
    echo "<a href='index.php'>Klik Link Ini Untuk Kembali</a>";
    die();
} else {
    $mhs->delete();
    header('Location: index.php');
}
