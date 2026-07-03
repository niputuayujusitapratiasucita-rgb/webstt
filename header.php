<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistem Informasi Pendataan Anggota STT Widyatmika</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">

</head>

<body>

<!-- =====================================
     NAVBAR
===================================== -->

<nav class="navbar navbar-expand-lg navbar-dark shadow-sm">

    <div class="container">

        <a class="navbar-brand fw-bold" href="index.php">

            <i class="fa-solid fa-users me-2"></i>

            STT Widyatmika

        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarMenu"
            aria-controls="navbarMenu"
            aria-expanded="false"
            aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">

            <ul class="navbar-nav ms-auto align-items-lg-center">

                <li class="nav-item">

                    <a class="nav-link" href="index.php">

                        <i class="fa-solid fa-house me-1"></i>

                        Beranda

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link" href="anggota.php">

                        <i class="fa-solid fa-address-book me-1"></i>

                        Data Anggota

                    </a>

                </li>

                <?php if(isset($_SESSION['login'])) { ?>

                    <li class="nav-item">

                        <a class="nav-link" href="dashboard.php">

                            <i class="fa-solid fa-gauge-high me-1"></i>

                            Dashboard

                        </a>

                    </li>

                    <li class="nav-item ms-lg-2">

                        <a class="btn btn-warning px-3"
                            href="logout.php"
                            onclick="return konfirmasiLogout();">

                            <i class="fa-solid fa-right-from-bracket me-1"></i>

                            Logout

                        </a>

                    </li>

                <?php } else { ?>

                    <li class="nav-item ms-lg-2">

                        <a class="btn btn-warning px-3" href="login.php">

                            <i class="fa-solid fa-user-lock me-1"></i>

                            Login Admin

                        </a>

                    </li>

                <?php } ?>

            </ul>

        </div>

    </div>

</nav>