<?php

include_once __DIR__ . '../../../Model/Motor.php';

$listMotor = Motor::getAll();
?>
<div class="car">
    <div class="card-header">
        <h3>Data Motor Mahasiswa</h3>
    </div>
    <div class="card-body">
        <h3>List Data Motor</h3>
        <table id="table-motor" class="table table-stripped">
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
                            <img class="image-thumbanail" src="/DBKELAS1/images/<?= $motor->gambar ?>" height="75px" alt="">
                        </td>
                        <td><?= $motor->platNo ?></td>
                        <td><?= $motor->merek ?></td>
                        <td><?= $motor->tipe ?></td>
                        <td>
                            <?= $motor->mahasiswa->nama ?>/
                            <?= $motor->mahasiswa->nim ?>
                        </td>
                        <td>
                            <a class="btn btn-warning btn-sm" href="index.php?page=update-motor&plat_no=<?= $motor->platNo ?>">Edit</a>
                            <a class="btn btn-danger btn-sm" href="index.php?page=delete-motor&id=<?= $motor->id ?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    $(function() {
        $('#table-motor').DataTable();
    });
</script>