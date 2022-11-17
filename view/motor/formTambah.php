<?php
include_once __DIR__ . '/../../Model/Mahasiswa.php';
$listMahasiswa = Mahasiswa::getAll();
?>
<!DOCTYPE html>
<html lang="en">

<h3>Tambah Motor Mahasiswa</h3>
<form action="view/motor/prosesTambah.php" method="POST" enctype="multipart/form-data">
<div class="form-group">
        <label for="">Pilih Mahasiswa</label> <br>
        <select class="form-control" name="mahasiswaNim" id="">
            <option value="" disabled selected>Pilih Mahasiswa</option>
            <?php
            foreach ($listMahasiswa as $mhs) {
                echo "<option value='$mhs->nim'>$mhs->nim / $mhs->nama</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="">Plat No : </label>
        <input required class="form-control" type="text" name="platNo" required />
    </div>
    <div class="form-group">
        <label for="">Merek : </label>
        <input required class="form-control" type="text" name="merek" required />
    </div>
    <div class="form-group">
        <label for="">Tipe : </label>
        <input required class="form-control" type="text" name="tipe" required />
    </div>
    <div class="form-group">
        <label for="">Gambar : </label> <br>
        <input required type="file" name="gambar" alt="" />
    </div>
    <button class="btn btn-primary" type="submit">Simpan</button>
</form>
</body>

</html>