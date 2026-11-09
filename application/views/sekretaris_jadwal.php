<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perbarui Jadwal | StudyPlan</title>

    <link rel="stylesheet" href="/studyplan/asset/sekretaris.css?v=7">
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
            <a href="<?= site_url('sekretaris/jadwal'); ?>" class="nav-item active">
                <span>📅</span> Perbarui Jadwal
            </a>
            <a href="<?= site_url('sekretaris/tugas'); ?>" class="nav-item">
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
            <div class="topbar-title">Perbarui Jadwal Pelajaran</div>
            <div class="profile">
                <span class="profile-icon">👩‍💼</span>
                <span>Halo, Sekretaris!</span>
            </div>
        </header>

        <section class="form-section">
            <h1 class="section-title">Form Jadwal Pelajaran</h1>

            <div class="jadwal-form">
                <form id="jadwalForm" method="post">
                    <div class="form-group">
                        <label for="hari">Hari (untuk semua pelajaran)</label>
                        <select id="hari" name="hari" required>
                            <option value="">Pilih hari</option>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                        </select>
                    </div>

                    <div class="jadwal-rows" id="jadwalRows">
                        <div class="jadwal-row">
                            <div class="row-fields">
                                <div class="form-group">
                                    <label for="jam">Waktu</label>
                                    <input type="text" name="jam[]" placeholder="Contoh: 07:00 - 07:45" required>
                                </div>
                                <div class="form-group">
                                    <label for="mapel">Mata Pelajaran</label>
                                    <input type="text" name="mapel[]" placeholder="Contoh: Matematika" required>
                                </div>
                                <div class="form-group">
                                    <label for="guru">Nama Guru</label>
                                    <input type="text" name="guru[]" placeholder="Contoh: Budi Santoso" required>
                                </div>
                            </div>
                            <button type="button" class="remove-row">×</button>
                        </div>
                    </div>

                    <button type="button" id="addRowBtn" class="add-row-button">+ Tambah Pelajaran</button>

                    <button type="submit" name="save_jadwal" value="1" class="save-button">
                        Simpan Semua Jadwal
                    </button>
                </form>
            </div>

            <div class="jadwal-list">
                <h2>Jadwal Saat Ini</h2>

                <?php
                $hari_urut = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
                $jadwal_by_hari = [];
                foreach ($jadwal as $j) {
                    $jadwal_by_hari[$j['hari']][] = $j;
                }
                ?>

                <?php foreach ($hari_urut as $h): ?>
                    <?php if (!isset($jadwal_by_hari[$h])): continue; endif; ?>
                    <div class="hari-group">
                        <h3 class="hari-header"><?= html_escape($h); ?></h3>
                        <table class="jadwal-table">
                            <thead>
                                <tr>
                                    <th>Waktu</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Guru</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($jadwal_by_hari[$h] as $j): ?>
                                    <tr class="<?= html_escape($j['warna']); ?>">
                                        <td><?= html_escape($j['jam']); ?></td>
                                <td>
                                    <?= html_escape($j['mapel']); ?>
                                </td>
                                        <td><?= html_escape($j['guru']); ?></td>
                                        <td>
                                            <button class="edit-button">Edit</button>
                                            <button class="delete-button">Hapus</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <footer class="footer">
            © <?= date('Y'); ?> StudyPlan. Kelola dengan terencana.
        </footer>

    </main>
</div>

<script>
    function createRow() {
        const row = document.createElement("div");
        row.className = "jadwal-row";
        row.innerHTML = `
            <div class="row-fields">
                <div class="form-group">
                    <label>Waktu</label>
                    <input type="text" name="jam[]" placeholder="Contoh: 07:00 - 07:45" required>
                </div>
                <div class="form-group">
                    <label>Mata Pelajaran</label>
                    <input type="text" name="mapel[]" placeholder="Contoh: Matematika" required>
                </div>
                <div class="form-group">
                    <label>Nama Guru</label>
                    <input type="text" name="guru[]" placeholder="Contoh: Budi Santoso" required>
                </div>
            </div>
            <button type="button" class="remove-row">×</button>
        `;
        return row;
    }

    document.getElementById("addRowBtn").addEventListener("click", function() {
        document.getElementById("jadwalRows").appendChild(createRow());
    });

    document.getElementById("jadwalRows").addEventListener("click", function(e) {
        if (e.target.classList.contains("remove-row")) {
            const rows = document.querySelectorAll(".jadwal-row");
            if (rows.length > 1) {
                e.target.closest(".jadwal-row").remove();
            }
        }
    });

    document.getElementById("jadwalForm")
        .addEventListener("submit", function(event) {
            event.preventDefault();
            const hari = document.getElementById("hari").value;
            if (!hari) {
                alert("Pilih hari terlebih dahulu.");
                return;
            }
            alert("Semua jadwal berhasil disimpan untuk hari " + hari + ".");
        });
</script>

</body>
</html>
