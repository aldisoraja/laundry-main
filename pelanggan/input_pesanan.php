<?php
require_once '../koneksi.php';
session_start();

if (isset($_POST['pesan'])) {
    $id_boking = htmlspecialchars($_POST['id_boking']);
    $id_daftar = htmlspecialchars($_SESSION['id']);
    $jenis = 'Kiloan';
    $jasa = htmlspecialchars($_POST['jasa']);
    $status = 'Boking';
    $tgl = htmlspecialchars($_POST['tgl']);
    $sql = "INSERT INTO tb_boking (id_boking, id_daftar, jenis, jasa, tgl_pemesanan, status) VALUES ('$id_boking', '$id_daftar', '$jenis', '$jasa', '$tgl', '$status')";
    mysqli_query ($koneksi, $sql);
    if($sql){
        echo "<script>alert('Pesanan Berhasil Ditambahkan!!');</script>";
    }else{
        echo "<script>alert('Pesanan Gagal Ditambahkan!!');</script>";
    }
    echo "<script>window.location='tabel_boking.php';</script>";
}

?>