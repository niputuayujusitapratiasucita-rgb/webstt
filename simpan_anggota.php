<?php

session_start();

if (!isset($_SESSION['login'])) {

    header("Location: login.php");
    exit();

}

include "koneksi.php";

$nama      = mysqli_real_escape_string($conn, $_POST['nama']);
$tempekan  = mysqli_real_escape_string($conn, $_POST['tempekan']);
$alamat    = mysqli_real_escape_string($conn, $_POST['alamat']);
$no_hp     = mysqli_real_escape_string($conn, $_POST['no_hp']);
$status    = mysqli_real_escape_string($conn, $_POST['status']);

$sql = "INSERT INTO anggota
(
nama,
tempekan,
alamat,
no_hp,
status
)

VALUES
(
'$nama',
'$tempekan',
'$alamat',
'$no_hp',
'$status'
)";

if(mysqli_query($conn,$sql)){

    echo "<script>

    alert('Data berhasil disimpan.');

    window.location='anggota.php';

    </script>";

}else{

    echo "<script>

    alert('Data gagal disimpan.');

    window.location='tambah_anggota.php';

    </script>";

}

?>