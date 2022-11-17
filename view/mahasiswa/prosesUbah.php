<?php

include_once __DIR__ . '../../../Model/Mahasiswa.php';

$nim = $_REQUEST['nim'];
$mhs = Mahasiswa::getByPrimaryKey($nim);

if ($mhs === null) {
    echo "<h2>Data Mahasiswa Tidak Di Temukan</h2>";
    echo "<a href='index.php?page=list-mhs'>Klik Link Ini Untuk Kembali</a>";
    die();
} else {

    $nama = $_REQUEST['nama'];
    $alamat = $_REQUEST['alamat'];
    $tgl_lahir = $_REQUEST['tgl_lahir'];
    $jenis_kelamin = $_REQUEST['jenis_kelamin'];

    $mhs->nama = $nama;
    $mhs->alamat = $alamat;
    $mhs->tgl_lahir = $tgl_lahir;
    $mhs->jenis_kelamin = $jenis_kelamin;

    $mhs->update();
    header('Location: ../../index.php?page=list-mhs');
}
