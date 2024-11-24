<?php

include('config.php');

if(isset($_GET['id_buku'])) {
    $id_buku = $_GET['id_buku'];

    $cek = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku='$id_buku'") or die(mysqli_error($koneksi));

    if(mysqli_num_rows($cek) > 0) {
        $del = mysqli_query($koneksi, "DELETE FROM buku WHERE id_buku='$id_buku'") or die(mysqli_error($koneksi));
        if($del) {
            echo '<script>alert("Berhasil menghapus data."); document.location="tampil.php";</script>';
        }else {
            echo '<script>alert("Gagal menghapus data."); document.location="tampil.php";</script>';
        }
    }else {
        echo '<script>alert("ID tidak ditemukan di database."); document.location="tampil.php";</script>';
    }
}else {
    echo '<script>alert("ID tidak ditemukan di database."); document.location="tampil.php";</script>';
}

?>