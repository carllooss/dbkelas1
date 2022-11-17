<h2>Tambah Mahasiswa</h2>
<form method="POST" action="view/mahasiswa/prosesTambah.php">
    <div class="form-group">
        <label for="">Nim</label>
        <input required class="form-control" type="text" name="nim" />
    </div>
    <div class="form-group">
        <label for="">Nama</label>
        <input required class="form-control" type="text" name="nama" />
    </div>
    <div class="form-group">
        <label for="">Tanggal Lahir</label>
        <input required class="form-control" type="date" name="tgl_lahir" />
    </div>
    <div class="form-group">
        <label for="">Alamat</label>
        <input required class="form-control" type="text" name="alamat" />
    </div>
    <div class="form-group">
        <label for="">Jenis Kelamin</label> <br>
        <input type="radio" name="jenis_kelamin" value="L">Laki Laki
        <input type="radio" name="jenis_kelamin" value="P">Perempuan
    </div>
    <button class="btn btn-primary" type="submit">Simpan</button>
</form>
</body>

</html>