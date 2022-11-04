<?php

include_once __DIR__ . '../../../Model/Motor.php';

$id = $_REQUEST['id'];
$motor = Motor::getBy($id, "id");

if ($motor === null) {
    echo "<h2>Data Motor Tidak Di Temukan</h2>";
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
    <h2>Anda Yakin Hapus Data Ini ?</h2>
    <p>Plat No : <?= $motor->platNo ?></p>
    <p>Merek : <?= $motor->merek ?></p>
    <p>Tipe : <?= $motor->tipe ?></p>
    <p>Pemilik : <?= $motor->mahasiswa->nim ?>&nbsp;/&nbsp;<?= $motor->mahasiswa->nama ?></p>
    <a href="./index.php">batal</a>
    <a href="./prosesHapus.php?id=<?= $motor->id ?>">Hapus</a>
</body>

</html>