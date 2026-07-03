<?php

session_start();

if(!isset($_SESSION['login'])){

header("Location: login.php");
exit();

}

include "koneksi.php";

$id=$_GET['id'];

mysqli_query($conn,"DELETE FROM anggota WHERE id='$id'");

echo "<script>

alert('Data berhasil dihapus.');

window.location='anggota.php';

</script>";

?>