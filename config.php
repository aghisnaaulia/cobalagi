<?php

$koneksi = mysqli_connect("localhost","root","","crudbukuaghis");

if (mysqli_connect_errno()){
    echo "Gagal melakukan koneksi ke MYSQL: " . mysqli_connect_error();
}

?>