<?php

session_start();

if (!isset($_SESSION['login'])) {

    header("Location: login.php");
    exit();

}

include "koneksi.php";
include "header.php";

?>

<section class="py-5">

    <div class="container">

        <!-- Judul -->

        <div class="mb-4">

            <h2 class="fw-bold">

                Tambah Data Anggota

            </h2>

            <p class="text-muted">

                Silakan lengkapi data anggota STT Widyatmika.

            </p>

        </div>

        <div class="card shadow">

            <div class="card-header">

                Form Tambah Anggota

            </div>

            <div class="card-body">

                <form
                    action="simpan_anggota.php"
                    method="POST"
                    onsubmit="return validasiForm();">

                    <div class="row">

                        <!-- Nama -->

                        <div class="col-md-6 mb-3">

                            <label class="form-label">

                                Nama Lengkap

                            </label>

                            <input
                                type="text"
                                name="nama"
                                id="nama"
                                class="form-control"
                                placeholder="Masukkan nama anggota"
                                required>

                        </div>

                        <!-- Tempekan -->

                        <div class="col-md-6 mb-3">

                            <label class="form-label">

                                Tempekan

                            </label>

                            <select
                                name="tempekan"
                                class="form-select"
                                required>

                                <option value="">-- Pilih Tempekan --</option>

                                <option value="Kaja Kangin">Kaja Kangin</option>

                                <option value="Kaja Kauh">Kaja Kauh</option>

                                <option value="Kelod Kangin">Kelod Kangin</option>

                                <option value="Kelod Kauh">Kelod Kauh</option>

                            </select>

                        </div>

                        <!-- Alamat -->

                        <div class="col-12 mb-3">

                            <label class="form-label">

                                Alamat

                            </label>

                            <textarea
                                name="alamat"
                                id="alamat"
                                rows="3"
                                class="form-control"
                                placeholder="Masukkan alamat anggota"
                                required></textarea>

                        </div>

                        <!-- Nomor HP -->

                        <div class="col-md-6 mb-3">

                            <label class="form-label">

                                Nomor HP

                            </label>

                            <input
                                type="text"
                                name="no_hp"
                                id="no_hp"
                                class="form-control"
                                placeholder="08xxxxxxxxxx"
                                required>

                        </div>

                        <!-- Status -->

                        <div class="col-md-3 mb-3">

                            <label class="form-label">

                                Status

                            </label>

                            <select
                                name="status"
                                id="status"
                                class="form-select"
                                onchange="ubahKeterangan()">

                                <option value="Aktif">

                                    Aktif

                                </option>

                                <option value="Tidak Aktif">

                                    Tidak Aktif

                                </option>

                            </select>

                        </div>

                        <!-- Keterangan -->

                        <div class="col-md-3 mb-3">

                            <label class="form-label">

                                Keterangan

                            </label>

                            <select
                                name="keterangan"
                                id="keterangan"
                                class="form-select">

                                <option value="Aktif mengikuti kegiatan STT">

                                    Aktif mengikuti kegiatan STT

                                </option>

                            </select>

                        </div>

                    </div>

                    <hr>

                    <div class="d-flex justify-content-between">

                        <a
                            href="dashboard.php"
                            class="btn btn-secondary">

                            <i class="fa-solid fa-arrow-left"></i>

                            Kembali

                        </a>

                        <button
                            type="submit"
                            class="btn btn-success">

                            <i class="fa-solid fa-floppy-disk"></i>

                            Simpan Data

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</section>

<script>

function ubahKeterangan(){

    let status = document.getElementById("status").value;
    let keterangan = document.getElementById("keterangan");

    if(status === "Aktif"){

        keterangan.innerHTML = `
            <option value="Aktif mengikuti kegiatan STT">
                Aktif mengikuti kegiatan STT
            </option>
        `;

    }else{

        keterangan.innerHTML = `
            <option value="">-- Pilih Keterangan --</option>
            <option value="Menikah">Menikah</option>
            <option value="Bekerja di luar daerah">Bekerja di luar daerah</option>
        `;

    }

}

window.onload = ubahKeterangan;

</script>

<?php include "footer.php"; ?>