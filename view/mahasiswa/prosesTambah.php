<?php

include_once __DIR__ . '../../../Model/Mahasiswa.php';

$nim = $_REQUEST['nim'];
$nama = $_REQUEST['nama'];
$alamat = $_REQUEST['alamat'];
$tgl_lahir = $_REQUEST['tgl_lahir'];
$jenis_kelamin = $_REQUEST['jenis_kelamin'];

$mhs = new Mahasiswa();

$mhs->nim = $nim;
$mhs->nama = $nama;
$mhs->alamat = $alamat;
$mhs->tgl_lahir = $tgl_lahir;
$mhs->jenis_kelamin = $jenis_kelamin;

$mhs->insert();

header('Location: ../../index.php?page=list-mhs');
die();
