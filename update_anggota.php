<?php

session_start();

if (!isset($_SESSION['login'])) {

    header("Location: login.php");
    exit();

}

include "koneksi.php";

$id = $_POST['id'];

$nama = $_POST['nama'];

$tempekan = $_POST['tempekan'];

$alamat = $_POST['alamat'];

$no_hp = $_POST['no_hp'];

$status = $_POST['status'];

$keterangan = $_POST['keterangan'];

mysqli_query($conn,

"UPDATE anggota SET

nama='$nama',

tempekan='$tempekan',

alamat='$alamat',

no_hp='$no_hp',

status='$status',

keterangan='$keterangan'

WHERE id='$id'

");

echo "<script>

alert('Data berhasil diperbarui.');

window.location='anggota.php';

</script>";

?>