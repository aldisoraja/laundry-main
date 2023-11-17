<?php 
include '../../koneksi.php';

    if (isset($_POST['ubah'])) {
        $level = htmlspecialchars($_POST['level']);
        $id_boking = htmlspecialchars ($_POST['id_boking']);
        $sql = "UPDATE tb_boking SET status='$level' WHERE id_boking = '$id_boking'";
        $result =mysqli_query($koneksi, $sql);
        if($sql){
            echo "<script>alert('Status Pesanan Berhasil Diubah!!');</script>";
        }else{
            echo "<script>alert('Status Pesanan Gagal Diubah!!');</script>";
        }
        echo "<script>window.location='../tabel_pesanan.php';</script>";
    }
   

 ?>