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
    <title>Ubah Mahasiswa</title>
</head>

<body>
    <h2>Ubah Mahasiswa</h2>
    <form method="POST" action="./prosesUbah.php">

        <p>Nim <br> <input required value="<?= $mhs->nim ?>" type="text" name="nim"></p>
        <p>Nama <br> <input required value="<?= $mhs->nama ?>" type="text" name="nama"></p>
        <p>Tanggal Lahir<br> <input required value="<?= $mhs->tgl_lahir ?>" type="date" name="tgl_lahir"></p>
        <p>Alamat <br> <input required value="<?= $mhs->alamat ?>" type="text" name="alamat"></p>
        <p>Jenis Kelamin <br>
            <input required <?= $mhs->jenis_kelamin == 'L' ? 'checked' : ""  ?> type="radio" name="jenis_kelamin" value="L">Laki Laki
            <input required <?= $mhs->jenis_kelamin == 'P' ? 'checked' : "" ?> type="radio" name="jenis_kelamin" value="P">Perempuan
        </p>

        <button type="submit">Simpan</button>
    </form>
</body>

</html>