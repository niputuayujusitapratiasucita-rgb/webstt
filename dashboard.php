<?php

session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}

include "koneksi.php";
include "header.php";

// ===========================
// Statistik
// ===========================

$totalAnggota = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM anggota"));
$totalAktif = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM anggota WHERE status='Aktif'"));
$totalTempekan = mysqli_num_rows(mysqli_query($conn, "SELECT DISTINCT tempekan FROM anggota"));

?>

<section class="py-5">

    <div class="container">

        <!-- Judul -->
        <div class="mb-5">

            <h2 class="fw-bold">
                Dashboard Admin
            </h2>

            <p class="text-muted">
                Selamat datang,
                <strong><?php echo $_SESSION['username']; ?></strong>
            </p>

        </div>

        <!-- Statistik -->
        <div class="row g-4 mb-5">

            <div class="col-lg-4">

                <div class="card h-100">

                    <div class="card-body text-center">

                        <i class="fa-solid fa-users fa-3x text-danger mb-3"></i>

                        <h5>Total Anggota</h5>

                        <h2 class="fw-bold">
                            <?php echo $totalAnggota; ?>
                        </h2>

                    </div>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="card h-100">

                    <div class="card-body text-center">

                        <i class="fa-solid fa-user-check fa-3x text-success mb-3"></i>

                        <h5>Anggota Aktif</h5>

                        <h2 class="fw-bold">
                            <?php echo $totalAktif; ?>
                        </h2>

                    </div>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="card h-100">

                    <div class="card-body text-center">

                        <i class="fa-solid fa-map-location-dot fa-3x text-warning mb-3"></i>

                        <h5>Jumlah Tempekan</h5>

                        <h2 class="fw-bold">
                            <?php echo $totalTempekan; ?>
                        </h2>

                    </div>

                </div>

            </div>

        </div>

        <!-- Menu Admin -->
        <div class="card shadow">

            <div class="card-header">
                Menu Administrator
            </div>

            <div class="card-body">

                <div class="row g-4">

                    <div class="col-md-4">

                        <a href="anggota.php" class="btn btn-primary w-100 py-3">

                            <i class="fa-solid fa-address-book fa-2x d-block mb-2"></i>

                            Data Anggota

                        </a>

                    </div>

                    <div class="col-md-4">

                        <a href="tambah_anggota.php" class="btn btn-success w-100 py-3">

                            <i class="fa-solid fa-user-plus fa-2x d-block mb-2"></i>

                            Tambah Anggota

                        </a>

                    </div>

                    <div class="col-md-4">

                        <a href="logout.php"
                           onclick="return konfirmasiLogout()"
                           class="btn btn-danger w-100 py-3">

                            <i class="fa-solid fa-right-from-bracket fa-2x d-block mb-2"></i>

                            Logout

                        </a>

                    </div>

                </div>

            </div>

        </div>

        <!-- Data Anggota -->
        <div class="card shadow mt-5">

            <div class="card-header">
                Data Anggota
            </div>

            <div class="card-body">

                <div class="table-responsive" style="max-height:550px; overflow-y:auto;">

                    <table class="table table-hover align-middle">

                        <thead>

                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Nomor HP</th>
                                <th>Tempekan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>

                        </thead>

                        <tbody>

                            <?php

                            $no = 1;

                            $query = mysqli_query($conn, "SELECT * FROM anggota ORDER BY id DESC");

                            while ($data = mysqli_fetch_assoc($query)) {

                            ?>

                                <tr>

                                    <td><?php echo $no++; ?></td>

                                    <td><?php echo $data['nama']; ?></td>

                                    <td><?php echo $data['no_hp']; ?></td>

                                    <td><?php echo $data['tempekan']; ?></td>

                                    <td>

                                        <?php

                                        if ($data['status'] == "Aktif") {
                                            echo '<span class="status-aktif">Aktif</span>';
                                        } else {
                                            echo '<span class="status-nonaktif">Tidak Aktif</span>';
                                        }

                                        ?>

                                    </td>

                                    <td>

                                        <a href="detail_anggota.php?id=<?php echo $data['id']; ?>" class="btn btn-primary btn-sm">
                                            Detail
                                        </a>

                                    </td>

                                </tr>

                            <?php } ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</section>

<?php include "footer.php"; ?>