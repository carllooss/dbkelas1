<?php

include_once __DIR__ . '../../../Model/Mahasiswa.php';

$nim = $_REQUEST['nim'];
$mhs = Mahasiswa::getByPrimaryKey($nim);

if ($mhs === null) {
    echo "<h2>Data Mahasiswa Tidak Di Temukan</h2>";
    echo "<a href='index.php'>Klik Link Ini Untuk Kembali</a>";
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
</head>

<body>
    <h2>Anda Yankin Hapus Data Ini ?</h2>
    <p>Nim : <?= $mhs->nim ?></p>
    <p>Nama : <?= $mhs->nama ?></p>
    <p>Tamggal Lahir : <?= $mhs->tgl_lahir ?></p>
    <p>Jenis Kelamin : <?= $mhs->jenis_kelamin ?></p>
    <p>Alamat : <?= $mhs->alamat ?></p>
    <a href="./index.php">batal</a>
    <a href="view/mahasiswa/prosesHapus.php?nim=<?= $mhs->nim ?>">Hapus</a>
</body>

</html>