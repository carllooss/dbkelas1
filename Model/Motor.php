<?php

include_once __DIR__ . "../../Config/Koneksi.php";
include_once __DIR__ . "../../Model/Mahasiswa.php";

class Motor
{
    public $id;
    public $platNo;
    public $merek;
    public $tipe;
    public $mahasiswaNim;
    public $gambar;
    public $mahasiswa;

    public static function getAll(): array
    {
        $query = "select * from motor";
        $conn = new Koneksi();
        $mq = mysqli_query($conn->koneksi, $query);
        $result = [];
        while ($motorDB = mysqli_fetch_object($mq)) {
            $result[] = self::setFields($motorDB);
        }
        return $result;
    }

    /**
     * @return ?Motor|array
     */
    public static function getBy($search, $id = "plat_no")
    {
        $query = "select * from motor where $id = '$search'";
        $conn = new Koneksi();
        $mq = mysqli_query($conn->koneksi, $query);
        $result = $id == "mahasiswa_nim" ? [] : null;
        while ($motorDB = mysqli_fetch_object($mq)) {
            if ($id !== "mahasiswa_nim") {
                $result = self::setFields($motorDB);
                continue;
            }
            $result[] = self::setFields($motorDB);
        }
        return $result;
    }

    private static function setFields($motorDB, $withMahasiswa = TRUE): ?Motor
    {
        $motor = new Motor();
        $motor->id = $motorDB->id;
        $motor->platNo = $motorDB->plat_no;
        $motor->merek = $motorDB->merek;
        $motor->tipe = $motorDB->tipe;
        $motor->gambar = $motorDB->gambar;
        $motor->mahasiswaNim = $motorDB->mahasiswa_nim;
        if ($withMahasiswa)
            $motor->mahasiswa = Mahasiswa::getByPrimaryKey($motorDB->mahasiswa_nim);
        return $motor;
    }

    public function insert()
    {
        $query = "insert into motor(plat_no,merek,tipe,mahasiswa_nim,gambar) values ("
            . "'$this->platNo',"
            . "'$this->merek',"
            . "'$this->tipe',"
            . "'$this->mahasiswaNim',"
            . "'$this->gambar' "
            . ")";
        $conn = new Koneksi();
        return mysqli_query($conn->koneksi, $query);
    }

    public function update()
    {
        $query = "update motor set "
            . "plat_no = '$this->platNo',"
            . "merek = '$this->merek',"
            . "tipe = '$this->tipe',"
            . "mahasiswa_nim = '$this->mahasiswaNIM' "
            . "where id = '$this->id'";
        $conn = new Koneksi();
        return mysqli_query($conn->koneksi, $query);
    }

    public function delete()
    {
        $query = "delete from motor where id = '$this->id'";
        $conn = new Koneksi();
        return mysqli_query($conn->koneksi, $query);
    }
}
