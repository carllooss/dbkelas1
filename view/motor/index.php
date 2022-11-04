<?php

include_once __DIR__ . '../../../Model/Motor.php';

$listMotor = Motor::getAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motor</title>
</head>

<body>
    <h3>List Data Motor</h3>
    <a href="./formTambah.php">Tambah Motor</a>
    <table width='100%' border='1'>
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Plat No</th>
                <th>Merek</th>
                <th>Tipe</th>
                <th>Pemilik</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $nomor = 1;
            foreach ($listMotor as $motor) : ?>
                <tr>
                    <td><?= $nomor++ ?></td>
                    <td>
                        <img src="/DBKELAS1/images/<?=$motor->gambar ?>" height="75px" alt="">
                    </td>
                    <td><?= $motor->platNo ?></td>
                    <td><?= $motor->merek ?></td>
                    <td><?= $motor->tipe ?></td>
                    <td>
                        <?= $motor->mahasiswa->nama ?>/
                        <?= $motor->mahasiswa->nim ?>
                    </td>
                    <td>
                        <a href="./formUbah.php?plat_no=<?= $motor->platNo ?>">Edit</a>
                        <a href="./konfirmasiHapus.php?id=<?= $motor->id ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>