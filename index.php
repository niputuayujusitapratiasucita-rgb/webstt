<?php include 'header.php'; ?>
<?php
include "koneksi.php";

// Total anggota
$totalAnggota = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM anggota")
);

// Total tempekan
$totalTempekan = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(DISTINCT tempekan) AS total FROM anggota")
);

// Total anggota aktif
$totalAktif = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM anggota WHERE status='Aktif'")
);
?>
<!-- HERO -->
<section class="pt-0 pb-5">

    <div class="container">

        <div class="row align-items-center g-5">

            <!-- Kiri -->
            <div class="col-lg-6">

                <span class="badge bg-warning text-dark px-3 py-2 mb-3">
                    Website Resmi
                </span>

                <h1 class="fw-bold display-5 mb-4">

                    Sistem Informasi Pendataan Anggota
                    <span class="text-danger">
                        STT Widyatmika
                    </span>

                </h1>

                <p class="text-muted fs-5 mb-4">

 Selamat Datang di Sistem Informasi Anggota STT Widyatmika. Website ini menyediakan informasi mengenai anggota aktif STT Widyatmika yang dapat diakses dengan mudah sebagai media informasi bagi seluruh masyarakat.
                </p>

                <a href="login.php" class="btn btn-warning btn-lg px-4 py-2">

                    <i class="fa-solid fa-right-to-bracket me-2"></i>

                    Login Admin

                </a>

            </div>

            <!-- Kanan -->
            <div class="col-lg-6 text-center">

                <img
                    src="logo.png"
                    class="simg-fluid"
                    style="max-width:550px;"
                    alt="Logo STT Widyatmika">

            </div>

        </div>

    </div>

</section>


<!-- STATISTIK -->

<section>

    <div class="container">

        <div class="row g-4">

            <div class="col-md-4">

                <div class="info-box">

                    <i class="fa-solid fa-users fa-3x text-danger mb-3"></i>

                    <h2 class="fw-bold">

    <?= $totalAnggota['total']; ?>

</h2>

                    <p>Total Anggota</p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="info-box">

                    <i class="fa-solid fa-map-location-dot fa-3x text-warning mb-3"></i>

                  <h2 class="fw-bold">

    <?= $totalTempekan['total']; ?>

</h2>

                    <p>Tempekan</p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="info-box">

                    <i class="fa-solid fa-user-check fa-3x text-success mb-3"></i>

                    <h2 class="fw-bold">

    <?= $totalAktif['total']; ?>

</h2>

<p class="text-muted">

   

</p>

                 <p>Anggota Aktif</p>

                </div>

            </div>

        </div>

    </div>

</section>


<section class="cta-section">

    <div class="container">

        <div class="card shadow-lg border-0">

            <div class="card-header text-center">

                Informasi Anggota

            </div>

            <div class="card-body text-center py-5 px-4">

                <h2 class="fw-bold mb-3">

                    Lihat Data Anggota STT Widyatmika

                </h2>

                <p class="text-muted mb-4">

                    Klik tombol di bawah ini untuk melihat seluruh data anggota aktif
                    STT Widyatmika.

                </p>

                <a href="anggota.php" class="btn btn-primary btn-lg px-4">

                    <i class="fa-solid fa-address-book me-2"></i>

                    Data Anggota

                </a>

            </div>

        </div>

    </div>

</section>
<?php include 'footer.php'; ?>

<form action="proses_login.php" method="POST" onsubmit="return validasiLogin()">