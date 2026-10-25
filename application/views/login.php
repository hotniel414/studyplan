<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Role - Sekretaris dan Siswa</title>
    <link rel="stylesheet" href="/studyplan/asset/role.css">


</head>

<body>

    <div class="login-container">
        <div class="logo" id="mainLogo">🔐</div>

        <h1 id="pageTitle">Login Sistem</h1>

        <p class="subtitle" id="pageSubtitle">
            Silakan pilih role dan masuk ke akun Anda
        </p>

        <div class="role-options">
            <button
                type="button"
                class="role-option active"
                id="sekretarisRole"
                onclick="pilihRole('sekretaris')">
                <span class="role-icon">📋</span>
                <span class="role-name">Sekretaris</span>
            </button>

            <button
                type="button"
                class="role-option"
                id="siswaRole"
                onclick="pilihRole('siswa')">
                <span class="role-icon">🎓</span>
                <span class="role-name">Siswa</span>
            </button>
        </div>

        <form id="loginForm">
            <div class="form-group">
                <label for="username" id="usernameLabel">
                    Username
                </label>

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
                    autocomplete="current-password"
                    required>
            </div>

            <label class="remember">
                <input type="checkbox" id="showPassword">
                Tampilkan password
            </label>

            <button type="submit" class="login-button">
                Masuk sebagai Sekretaris
            </button>
        </form>

        </form>

        <p class="footer" id="footerText" style="visibility:hidden">
            Belum punya akun? <a href="register_siswa.html" class="register-link" id="registerLink" style="display:none">Daftar</a>
        </p>
    </div>

    <script>
        let roleAktif = "sekretaris";

        function pilihRole(role) {
            roleAktif = role;

            const sekretarisRole =
                document.getElementById("sekretarisRole");
            const siswaRole =
                document.getElementById("siswaRole");

            const logo = document.getElementById("mainLogo");
            const title = document.getElementById("pageTitle");
            const subtitle = document.getElementById("pageSubtitle");
            const usernameLabel =
                document.getElementById("usernameLabel");
            const usernameInput =
                document.getElementById("username");
            const passwordInput =
                document.getElementById("password");
            const loginButton =
                document.querySelector(".login-button");

            if (role === "sekretaris") {
                sekretarisRole.classList.add("active");
                siswaRole.classList.remove("active");

                logo.textContent = "📋";
                title.textContent = "Sekretaris";
                subtitle.textContent =
                    "Selamat datang, silakan masuk ke akun Anda";

                usernameLabel.textContent = "Username";
                usernameInput.placeholder = "Masukkan username";
                passwordInput.placeholder = "Masukkan password";

                loginButton.textContent = "Masuk sebagai Sekretaris";
                var r = document.getElementById("registerLink");
                if (r) {
                    r.style.display = "none";
                }
                var ft = document.getElementById("footerText");
                if (ft) {
                    ft.style.visibility = "hidden";
                }
            } else {
                siswaRole.classList.add("active");
                sekretarisRole.classList.remove("active");

                logo.textContent = "🎓";
                title.textContent = "Siswa";
                subtitle.textContent =
                    "Selamat datang, silakan masuk ke akun anda";

                usernameLabel.textContent = "Username";
                usernameInput.placeholder =
                    "Masukkan username";
                passwordInput.placeholder = "Masukkan password";

                loginButton.textContent = "Masuk sebagai Siswa";
                document.getElementById("registerLink").href = "register_siswa.html";
                document.getElementById("registerLink").style.display = "inline";
                var ft = document.getElementById("footerText");
                if (ft) {
                    ft.style.visibility = "visible";
                }
            }
        }

        document.getElementById("showPassword")
            .addEventListener("change", function() {
                const passwordInput =
                    document.getElementById("password");
                passwordInput.type = this.checked ? "text" : "password";
            });

        document.getElementById("loginForm")
            .addEventListener("submit", function(event) {
                event.preventDefault();

                const username =
                    document.getElementById("username").value.trim();
                const password =
                    document.getElementById("password").value;

                if (!username || !password) {
                    alert("Username dan password wajib diisi.");
                    return;
                }

                alert(
                    "Form login " + roleAktif +
                    " berhasil diisi. Hubungkan ke backend " +
                    "untuk memverifikasi akun."
                );
            });
    </script>

</body>

</html>