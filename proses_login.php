<?php

session_start();

include "koneksi.php";

// ===============================
// CEK AKSES HALAMAN
// ===============================

if ($_SERVER["REQUEST_METHOD"] != "POST") {

    header("Location: login.php");
    exit();

}

// ===============================
// AMBIL DATA FORM
// ===============================

$username = mysqli_real_escape_string($conn, trim($_POST['username']));
$password = mysqli_real_escape_string($conn, trim($_POST['password']));

// ===============================
// VALIDASI INPUT
// ===============================

if ($username == "" || $password == "") {

    echo "<script>

            alert('Username dan Password harus diisi!');

            window.location='login.php';

          </script>";

    exit();

}

// ===============================
// CEK DATA ADMIN
// ===============================

$query = mysqli_query($conn, "

    SELECT *

    FROM admin

    WHERE username='$username'

    AND password='$password'

");

// ===============================
// JIKA LOGIN BERHASIL
// ===============================

if (mysqli_num_rows($query) == 1) {

    $admin = mysqli_fetch_assoc($query);

    $_SESSION['login'] = true;
    $_SESSION['id_admin'] = $admin['id'];
    $_SESSION['username'] = $admin['username'];

    echo "<script>

            alert('Login berhasil.');

            window.location='dashboard.php';

          </script>";

    exit();

}

// ===============================
// JIKA LOGIN GAGAL
// ===============================

echo "<script>

        alert('Username atau Password salah!');

        window.location='login.php';

      </script>";

exit();

?>