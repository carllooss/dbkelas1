<?php

include_once __DIR__ . '../../../Model/Motor.php';
include_once __DIR__ . '../../../Model/Mahasiswa.php';

$id = $_REQUEST["id"];
if (empty(Motor::getBy($id, "id"))) {
    echo "<h2>Data Motor Tidak Di Temukan</h2>";
    echo "<a href='view/motor/index.php'>Klik Link Ini Untuk Kembali</a>";
    die();
}

// Check jika plat nomer dirubah dan sudah ada di database
$platNo = $_REQUEST['plat_no'];
$prevPlatNo = $_REQUEST['previous_plat_no'];
if ($platNo !== $prevPlatNo && !empty(Motor::getBy($platNo))) {
    echo "<h2>Plat sudah ada</h2>";
    echo "<a href='view/motor/index.php'>Klik Link Ini Untuk Kembali</a>";
    die();
}

$tipe = $_REQUEST['tipe'];
$merek = $_REQUEST['merek'];
$mahasiswaNIM = $_REQUEST['mahasiswa_nim'];

$motor = new Motor();
$motor->id = $id;
$motor->platNo = $platNo;
$motor->tipe = $tipe;
$motor->merek = $merek;
$motor->mahasiswaNIM = $mahasiswaNIM;

$res = $motor->update();

if ($res) {
    header('Location: ../../index.php?page=list-motor');
    exit();
} else {
    die();
}
