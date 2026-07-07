<?php

session_start();

if (!isset($_SESSION['login'])) {

    header("Location: login.php");
    exit();

}

include "koneksi.php";
include "header.php";

if (!isset($_GET['id'])) {

    header("Location: anggota.php");
    exit();

}

$id = mysqli_real_escape_string($conn, $_GET['id']);

$query = mysqli_query($conn, "SELECT * FROM anggota WHERE id='$id'");

$data = mysqli_fetch_assoc($query);

if (!$data) {

    echo "<div class='container py-5'>";
    echo "<div class='alert alert-danger'>";
    echo "Data anggota tidak ditemukan.";
    echo "</div>";
    echo "</div>";

    include "footer.php";
    exit();

}

?>

<section class="py-5">

    <div class="container">

        <div class="mb-4">

            <h2 class="fw-bold">

                Detail Anggota

            </h2>

            <p class="text-muted">

                Informasi lengkap anggota STT Widyatmika.

            </p>

        </div>

        <div class="card shadow">

            <div class="card-header">

                Biodata Anggota

            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="fw-semibold">

                            Nama Lengkap

                        </label>

                        <div class="form-control">

                            <?= htmlspecialchars($data['nama']); ?>

                        </div>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="fw-semibold">

                            Tempekan

                        </label>

                        <div class="form-control">

                            <?= htmlspecialchars($data['tempekan']); ?>

                        </div>

                    </div>

                    <div class="col-12 mb-3">

                        <label class="fw-semibold">

                            Alamat

                        </label>

                        <div class="form-control" style="min-height:90px;">

                            <?= nl2br(htmlspecialchars($data['alamat'])); ?>

                        </div>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="fw-semibold">

                            Nomor HP

                        </label>

                        <div class="form-control">

                            <?= htmlspecialchars($data['no_hp']); ?>

                        </div>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="fw-semibold">

                            Status

                        </label>

                        <div>

                            <?php

                            if ($data['status'] == "Aktif") {

                                echo '<span class="status-aktif">Aktif</span>';

                            } else {

                                echo '<span class="status-nonaktif">Tidak Aktif</span>';

                            }

                            ?>

                        </div>

                    </div>

                    <!-- Keterangan -->

                    <div class="col-md-6 mb-3">

                        <label class="fw-semibold">

                            Keterangan

                        </label>

                        <div class="form-control">

                            <?php

                            if ($data['status'] == "Aktif") {

                                echo "Aktif mengikuti kegiatan STT";

                            } else {

                                echo !empty($data['keterangan'])
                                    ? htmlspecialchars($data['keterangan'])
                                    : "-";

                            }

                            ?>

                        </div>

                    </div>

                </div>

                <hr>

                <div class="d-flex justify-content-between">

                    <a href="anggota.php" class="btn btn-secondary">

                        <i class="fa-solid fa-arrow-left"></i>

                        Kembali

                    </a>

                    <div>

                        <a href="edit_anggota.php?id=<?= $data['id']; ?>" class="btn btn-warning">

                            <i class="fa-solid fa-pen"></i>

                            Edit

                        </a>

                        <a href="hapus_anggota.php?id=<?= $data['id']; ?>"
                            class="btn btn-danger"
                            onclick="return konfirmasiHapus();">

                            <i class="fa-solid fa-trash"></i>

                            Hapus

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<?php include "footer.php"; ?>