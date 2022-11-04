<?php

include_once __DIR__ . '../../../Model/Motor.php';
include_once __DIR__ . '../../../Model/Mahasiswa.php';

$listMahasiswa = Mahasiswa::getAll();
$platNo = urldecode($_REQUEST['plat_no']);
$motor = Motor::getBy($platNo);

if ($motor === null) {
    echo "<h2>Data Motor Tidak Di Temukan</h2>";
    echo "<a href='index.php'>Klik Link Ini Untuk Kembali</a>";
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ubah Motor</title>
</head>

<body>
    <h2>Ubah Motor</h2>
    <form method="POST" action="./prosesUbah.php">
        <input type="hidden" name="id" value="<?= $motor->id ?>">
        <input type="hidden" name="previous_plat_no" value="<?= $motor->platNo ?>">
        <p>Plat No <br> <input required value="<?= $motor->platNo ?>" type="text" name="plat_no"></p>
        <p>Merek <br> <input required value="<?= $motor->merek ?>" type="text" name="merek"></p>
        <p>Tipe <br> <input required value="<?= $motor->tipe ?>" type="text" name="tipe"></p>
        <p>Pemilik<br>
            <select name="mahasiswa_nim" id="">
                <option disabled selected>Pilih Mahasiswa</option>
                <?php foreach ($listMahasiswa as $mhs) : ?>
                    <option value="<?= $mhs->nim ?>" <?= $mhs->nim !== $motor->mahasiswaNim ?: "selected" ?>>
                        <?= "$mhs->nim / $mhs->nama" ?>
                    </option>
                <?php endforeach ?>
            </select>
        </p>
        <button type="submit">Simpan</button>
    </form>
</body>

</html>