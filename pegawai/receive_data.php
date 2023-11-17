<?php 
include '../koneksi.php';

// // baca data yang dikirim pada data esp32
// $berat = $_GET('berat');
// // simpan ke tb_sensor

mysqli_query($koneksi, "ALTER TABLE tb_sensor AUTO_INCREMENT = 1");
$sql = mysqli_query($koneksi, "INSERT INTO tb_sensor(berat)VALUES('$berat')");

if($sql)
    echo "Data Berhasil Terkirim";
else
    echo "Data Gagal Terkirim";

 ?>
