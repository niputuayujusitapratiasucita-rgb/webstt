<?php
include 'header.php';
include 'koneksi.php';

$query = mysqli_query($conn, "SELECT * FROM anggota ORDER BY nama ASC");
?>

<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="fw-bold">
                Data Anggota STT Widyatmika
            </h2>

            <p class="text-muted">
                Daftar anggota aktif STT Widyatmika.
            </p>

        </div>

        <div class="card shadow">

            <div class="card-body">

                <!-- Pencarian & Filter -->

                <div class="row mb-4">

                    <div class="col-md-8 mb-3 mb-md-0">

                        <input
                            type="text"
                            id="search"
                            class="form-control"
                            placeholder="Cari Nama Anggota...">

                    </div>

                    <div class="col-md-4">

                        <select
                            id="filterTempekan"
                            class="form-select">

                            <option value="Semua">Semua Tempekan</option>
                            <option value="Kaja Kangin">Kaja Kangin</option>
                            <option value="Kaja Kauh">Kaja Kauh</option>
                            <option value="Kelod Kangin">Kelod Kangin</option>
                            <option value="Kelod Kauh">Kelod Kauh</option>

                        </select>

                    </div>

                </div>

                <!-- Tabel -->

                <div class="table-responsive">

                    <table
                        class="table table-hover table-bordered align-middle"
                        id="tabelAnggota">

                        <thead>

                            <tr>

                                <th width="60" class="text-center">No</th>

                                <th>Nama</th>

                                <th>Tempekan</th>

                                <th>No. HP</th>

                                <th>Status</th>

                                <th width="120" class="text-center">Aksi</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php

                            $no = 1;

                            if (mysqli_num_rows($query) > 0) {

                                while ($data = mysqli_fetch_assoc($query)) {

                            ?>

                                    <tr>

                                        <td class="text-center">

                                            <?= $no++; ?>

                                        </td>

                                        <td>

                                            <?= htmlspecialchars($data['nama']); ?>

                                        </td>

                                        <td>

                                            <?= htmlspecialchars($data['tempekan']); ?>

                                        </td>

                                        <td>

                                            <?= htmlspecialchars($data['no_hp']); ?>

                                        </td>

                                        <td>

                                            <?php

                                            if ($data['status'] == "Aktif") {

                                                echo '<span class="status-aktif">Aktif</span>';

                                            } else {

                                                echo '<span class="status-nonaktif">Tidak Aktif</span>';

                                            }

                                            ?>

                                        </td>

                                        <td class="text-center">

                                            <a
                                                href="detail_anggota.php?id=<?= $data['id']; ?>"
                                                class="btn btn-primary btn-sm">

                                                <i class="fa-solid fa-circle-info"></i>

                                                Detail

                                            </a>

                                        </td>

                                    </tr>

                            <?php

                                }

                            } else {

                            ?>

                                <tr>

                                    <td colspan="6" class="text-center py-4">

                                        Belum ada data anggota.

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

<?php include 'footer.php'; ?>