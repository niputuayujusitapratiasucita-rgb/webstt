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
                                placeholder="Masukkan nama anggota">

                        </div>

                        <!-- Tempekan -->

                        <div class="col-md-6 mb-3">

                            <label class="form-label">

                                Tempekan

                            </label>

                            <select
                                name="tempekan"
                                class="form-select">

                                <option value="">-- Pilih Tempekan --</option>

                                <option>Kaja Kangin</option>

                                <option>Kaja Kauh</option>

                                <option>Kelod Kangin</option>

                                <option>Kelod Kauh</option>

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
                                placeholder="Masukkan alamat anggota"></textarea>

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
                                placeholder="08xxxxxxxxxx">

                        </div>

                        <!-- Status -->

                        <div class="col-md-6 mb-3">

                            <label class="form-label">

                                Status

                            </label>

                            <select
                                name="status"
                                class="form-select">

                                <option value="Aktif">

                                    Aktif

                                </option>

                                <option value="Tidak Aktif">

                                    Tidak Aktif

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

<?php include "footer.php"; ?>