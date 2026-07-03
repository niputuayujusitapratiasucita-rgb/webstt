<?php include 'header.php'; ?>

<section class="login-page">

    <div class="login-box">

        <img src="logo.png" alt="Logo STT">

        <h3>Login Admin</h3>

        <p class="text-center text-muted mb-4">
            Sistem Informasi Pendataan Anggota<br>
            STT Widyatmika
        </p>

        <form action="proses_login.php" method="POST">

            <div class="mb-3">

                <label class="form-label">
                    Username
                </label>

                <input
                    type="text"
                    name="username"
                    id="username"
                    class="form-control"
                    placeholder="Masukkan Username"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    id="password"
                    class="form-control"
                    placeholder="Masukkan Password"
                    required>

            </div>

            <div class="form-check mb-4">

                <input
                    class="form-check-input"
                    type="checkbox"
                    id="showPassword"
                    onclick="tampilPassword()">

                <label class="form-check-label" for="showPassword">

                    Tampilkan Password

                </label>

            </div>

            <button
                type="submit"
                class="btn btn-primary w-100">

                <i class="fa-solid fa-right-to-bracket"></i>
                Login

            </button>

        </form>

        <hr>

        <div class="text-center">

            <a href="index.php">

                <i class="fa-solid fa-house"></i>
                Kembali ke Beranda

            </a>

        </div>

    </div>

</section>

<?php include 'footer.php'; ?>