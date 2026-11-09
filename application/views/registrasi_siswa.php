<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Siswa - StudyPlan</title>
    <link rel="stylesheet" href="/studyplan/asset/role.css">
</head>

<body>

    <div class="login-container">
        <div class="logo">🎓</div>

        <h1>Registrasi Siswa</h1>

        <p class="subtitle">
            Buat akun siswa baru Anda
        </p>

        <form id="registrasiForm">
            <div class="form-group">
                <label for="username">Username</label>
                <input
                    type="text"
                    id="username"
                    name="username"
                    placeholder="Masukkan username"
                    autocomplete="username"
                    required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan password"
                    autocomplete="new-password"
                    required>
            </div>

            <div class="form-group">
                <label for="konfirmasi_password">Konfirmasi Password</label>
                <input
                    type="password"
                    id="konfirmasi_password"
                    name="konfirmasi_password"
                    placeholder="Masukkan ulang password"
                    autocomplete="new-password"
                    required>
            </div>

            <label class="remember">
                <input type="checkbox" id="showPassword">
                Tampilkan password
            </label>

            <button type="submit" class="login-button">
                Daftar Akun
            </button>
        </form>

        <p class="footer">
            Sudah punya akun? <a href="<?= base_url('login'); ?>" class="register-link">Masuk</a>
        </p>
    </div>

    <script>
        document.getElementById("showPassword")
            .addEventListener("change", function() {
                const passwordInput =
                    document.getElementById("password");
                const konfirmasiInput =
                    document.getElementById("konfirmasi_password");
                const isText = this.checked;
                passwordInput.type = isText ? "text" : "password";
                konfirmasiInput.type = isText ? "text" : "password";
            });

        document.getElementById("registrasiForm")
            .addEventListener("submit", function(event) {
                event.preventDefault();

                const username =
                    document.getElementById("username").value.trim();
                const password =
                    document.getElementById("password").value;
                const konfirmasiPassword =
                    document.getElementById("konfirmasi_password").value;

                if (!username || !password || !konfirmasiPassword) {
                    alert("Semua field wajib diisi.");
                    return;
                }

                if (password !== konfirmasiPassword) {
                    alert("Password dan konfirmasi password tidak cocok.");
                    return;
                }

                alert(
                    "Registrasi siswa berhasil. Anda dapat login dengan akun Anda."
                );
            });
    </script>

</body>

</html>
