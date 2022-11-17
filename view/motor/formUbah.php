<?php

include_once __DIR__ . '../../../Model/Motor.php';
include_once __DIR__ . '../../../Model/Mahasiswa.php';

$listMahasiswa = Mahasiswa::getAll();
$platNo = ($_REQUEST['plat_no']);
$motor = Motor::getBy($platNo);

if ($motor === null) {
    echo "<h2>Data Motor Tidak Di Temukan</h2>";
    echo "<a href='index.php'>Klik Link Ini Untuk Kembali</a>";
    die();
}
?>
<h2>Ubah Motor</h2>
<form method="POST" action="view/motor/prosesUbah.php">
    <input type="hidden" name="id" value="<?= $motor->id ?>">
    <input type="hidden" name="previous_plat_no" value="<?= $motor->platNo ?>">
    <div class="form-group">
        <label for="">Plat No</label>
        <input required class="form-control" value="<?= $motor->platNo ?>" type="text" name="plat_no" />
    </div>
    <div class="form-group">
        <label for="">Merek</label>
        <input required class="form-control" value="<?= $motor->merek ?>" type="text" name="merek" />
    </div>
    <div class="form-group">
        <label for="">Tipe</label>
        <input required class="form-control" value="<?= $motor->tipe ?>" type="text" name="tipe" />
    </div>
    <div class="form-group">
        <label for="">Pemilik</label>
        <select class="form-control" name="mahasiswa_nim" id="">
            <option disabled selected>Pilih Mahasiswa</option>
            <?php foreach ($listMahasiswa as $mhs) : ?>
                <option value="<?= $mhs->nim ?>" <?= $mhs->nim !== $motor->mahasiswaNim ?: "selected" ?>>
                    <?= "$mhs->nim / $mhs->nama" ?>
                </option>
            <?php endforeach ?>
        </select>
    </div>
    <button class="btn btn-primary" type="submit">Simpan</button>
</form>
</body>

</html>