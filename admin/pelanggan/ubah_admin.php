<?php 
include '../../koneksi.php';


    if (isset($_POST['ubah'])) {
        $id_daftar = htmlspecialchars($_POST['id_daftar']);
        $nama = htmlspecialchars($_POST['nama']);
        $username = htmlspecialchars($_POST['username']);
        $pass = htmlspecialchars($_POST['pass']);
        $kontak = htmlspecialchars($_POST['kontak']);
        $alamat = htmlspecialchars ($_POST['alamat']);
        $level = htmlspecialchars ($_POST['level']);
        $sql = "UPDATE tb_daftar SET nama_pelanggan = '$nama', username = '$username', password_pelanggan = '$pass', kontak_pelanggan = '$kontak', alamat_pelanggan = '$alamat', level = '$level' WHERE id_daftar = '$id_daftar'";
        $result =mysqli_query($koneksi, $sql);// die (mysqli_error($koneksi);
        if($sql){
            echo "<script>alert('Data User Berhasil Diubah!!');</script>";
        }else{
            echo "<script>alert('Data User Gagal Diubah!!');</script>";
        }
        echo "<script>window.location='../tabel_admin.php';</script>";
    }
   

 ?>