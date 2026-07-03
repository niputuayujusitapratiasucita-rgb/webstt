<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "stt_widyatmika"
);

if(!$conn){
    die("Koneksi Database Gagal");
}

?>

<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "stt_widyatmika"
);

if (!$conn) {
    die("Koneksi gagal : " . mysqli_connect_error());
}

?>