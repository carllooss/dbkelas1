<?php

include_once __DIR__ . '../../../Model/Motor.php';

$id = $_REQUEST['id'];
$motor = Motor::getBy($id, "id");

if ($motor === null) {
    echo "<h2>Data Motor Tidak Di Temukan</h2>";
    echo "<a href='index.php'>Klik Link Ini Untuk Kembali</a>";
    die();
}else {
    $motor->delete();
    header('Location: ../../index.php?page=list-motor');
}
