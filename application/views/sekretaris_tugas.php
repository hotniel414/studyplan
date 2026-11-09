<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tugas | StudyPlan</title>

    <link rel="stylesheet" href="/studyplan/asset/sekretaris.css?v=3">
</head>
<body>

<div class="dashboard">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <a href="<?= site_url('sekretaris'); ?>" class="logo">
            <span class="logo-icon">📋</span>
            <span>study<span class="logo-yellow">plan</span></span>
        </a>

        <nav class="navigation">
            <a href="<?= site_url('sekretaris'); ?>" class="nav-item">
                <span>🏠</span> Beranda
            </a>
            <a href="<?= site_url('sekretaris/jadwal'); ?>" class="nav-item">
                <span>📅</span> Perbarui Jadwal
            </a>
            <a href="<?= site_url('sekretaris/tugas'); ?>" class="nav-item active">
                <span>📝</span> Tambah Tugas
            </a>
            <a href="<?= site_url('login'); ?>" class="nav-item">
                <span>🚪</span> Keluar
            </a>
        </nav>

        <div class="sidebar-quote">
            Kelola<br>
            Jadwal dan<br>
            Tugas Siswa
            <span>✦</span>
        </div>
    </aside>

    <!-- KONTEN UTAMA -->
    <main class="main-content">

        <header class="topbar">
            <div class="topbar-title">Tambah Tugas Baru</div>
            <div class="profile">
                <span class="profile-icon">👩‍💼</span>
                <span>Halo, Sekretaris!</span>
            </div>
        </header>

        <section class="form-section">
            <h1 class="section-title">Form Pembuatan Tugas</h1>

            <div class="tugas-form">
                <form id="tugasForm" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="judul_tugas">Judul Tugas</label>
                        <input
                            type="text"
                            id="judul_tugas"
                            name="judul_tugas"
                            placeholder="Contoh: Membuat Website Sederhana"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="mapel">Mata Pelajaran</label>
                        <select id="mapel" name="mapel" required>
                            <option value="">Pilih mata pelajaran</option>
                            <option value="Matematika">Matematika</option>
                            <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                            <option value="Pemrograman Web">Pemrograman Web</option>
                            <option value="Basis Data">Basis Data</option>
                            <option value="PKN">PKN</option>
                            <option value="Pemrograman Dasar">Pemrograman Dasar</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi Tugas</label>
                        <textarea
                            id="deskripsi"
                            name="deskripsi"
                            placeholder="Deskripsi tugas yang akan dikerjakan siswa"
                            rows="4"
                            required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="deadline">Deadline</label>
                        <input
                            type="date"
                            id="deadline"
                            name="deadline"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="foto_tugas">Foto Tugas</label>
                        <input
                            type="file"
                            id="foto_tugas"
                            name="foto_tugas"
                            accept="image/*">
                        <div class="foto-preview" id="fotoPreview" style="margin-top:10px"></div>
                    </div>

                    <button type="submit" class="save-button">
                        Buat Tugas
                    </button>
                </form>
            </div>

            <div class="tugas-list">
                <h2>Daftar Tugas</h2>
                <table class="tugas-table">
                    <thead>
                        <tr>
                            <th>Judul Tugas</th>
                            <th>Mata Pelajaran</th>
                            <th>Deadline</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tugas as $t): ?>
                            <tr class="<?= html_escape($t['warna']); ?>">
                                <td><?= html_escape($t['judul']); ?></td>
                                <td><?= html_escape($t['mapel']); ?></td>
                                <td><?= html_escape($t['deadline']); ?></td>
                                <td>
                                    <button class="edit-button">Edit</button>
                                    <button class="delete-button">Hapus</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>

        <footer class="footer">
            © <?= date('Y'); ?> StudyPlan. Kelola dengan terencana.
        </footer>

    </main>
</div>

<script>
    document.getElementById("foto_tugas")
        .addEventListener("change", function() {
            const file = this.files[0];
            const preview = document.getElementById("fotoPreview");
            if (file && file.type.startsWith("image/")) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = '<img src="' + e.target.result + '" alt="Preview">';
                };
                reader.readAsDataURL(file);
            } else {
                preview.innerHTML = "";
            }
        });

    document.getElementById("tugasForm")
        .addEventListener("submit", function(event) {
            event.preventDefault();
            alert("Tugas berhasil dibuat.");
        });
</script>

</body>
</html>
