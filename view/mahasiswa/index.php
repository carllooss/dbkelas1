<?php

include_once __DIR__ . '../../../Model/Mahasiswa.php';
include_once __DIR__ . '../../../Model/Motor.php';

$listMahasiswa = Mahasiswa::getAll();
?>
    <h3>List Data Mahasiswa</h3>
    <a href="./formTambah.php">Tambah Mahasiswa</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Motor</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $nomor = 1;
            foreach ($listMahasiswa as $mhs) {
            ?>
                <tr>
                    <td><?= $nomor++ ?></td>
                    <td><?= $mhs->nim ?></td>
                    <td><?= $mhs->nama ?></td>
                    <td><?= $mhs->tgl_lahir ?></td>
                    <td><?= $mhs->jenis_kelamin ?></td>
                    <td><?= $mhs->alamat ?></td>
                    <td>
                        Memiliki <?= count(Motor::getBy($mhs->nim, "mahasiswa_nim")) ?>
                        <div>Motor:</div>
                        <ol>
                            <?php foreach (Motor::getBy($mhs->nim, "mahasiswa_nim") as $motor) : ?>
                                <li><?= "$motor->merek $motor->tipe($motor->platNo)" ?></li>
                            <?php endforeach ?>
                        </ol>
                    </td>
                    <td>
                        <a href="./formUbah.php?nim=<?= $mhs->nim ?>">Edit</a>
                        <a href="./konfirmasiHapus.php?nim=<?= $mhs->nim ?>">Delete</a>
                    </td>
                </tr>
            <?php
            }
            ?>

        </tbody>
    </table>
</body>

</html>