<?php
include_once __DIR__ . '/../../Model/Mahasiswa.php';
$listMahasiswa = Mahasiswa::getAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>Tambah Motor Mahasiswa</h3>
    <form action="prosesTambah.php" method="POST" enctype="multipart/form-data">
        <p>
            Pilih Mahasiswa <br>
            <select name="mahasiswaNim" id="">
                <option value="" disabled selected>Pilih Mahasiswa</option>
                <?php
                foreach ($listMahasiswa as $mhs) {
                    echo "<option value='$mhs->nim'>$mhs->nim / $mhs->nama</option>";
                }
                ?>
            </select>
        </p>
        <p>Plat No : <br> <input type="text" name="platNo" required /> </p>
        <p>Merek : <br> <input type="text" name="merek" required /> </p>
        <p>Tipe : <br> <input type="text" name="tipe" required /> </p>
        <p>Gambar <br> <input type="file" name="gambar" alt="" /> </p>
        <button type="submit">Simpan</button>
    </form>
</body>

</html>
