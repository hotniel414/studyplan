<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda Sekretaris | StudyPlan</title>

    <link rel="stylesheet" href="/studyplan/asset/sekretaris.css?v=2">
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
            <a href="<?= site_url('sekretaris'); ?>" class="nav-item active">
                <span>🏠</span> Beranda
            </a>
            <a href="<?= site_url('sekretaris/jadwal'); ?>" class="nav-item">
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
            <div class="topbar-title">Dashboard Sekretaris</div>
            <div class="profile">
                <span class="profile-icon">👩‍💼</span>
                <span>Halo, Sekretaris!</span>
            </div>
        </header>

        <section class="welcome">
            <div>
                <h1>Selamat Datang, Sekretaris! 👋</h1>
                <p>Kelola jadwal pelajaran dan tugas siswa dari sini.</p>
            </div>
        </section>

        <!-- STATISTIK -->
        <section class="stats-info">
            <div class="info-card stat-blue">
                <h3>Total Tugas</h3>
                <h2><?= $total_tugas; ?></h2>
                <p>Tugas keseluruhan</p>
            </div>
            <div class="info-card stat-purple">
                <h3>Tugas Hari Ini</h3>
                <h2><?= $tugas_hari_ini; ?></h2>
                <p>Jatuh tempo hari ini</p>
            </div>
        </section>

        <!-- TUGAS HARI INI -->
        <section class="tugas-list">
            <h2>Tugas Hari Ini</h2>
            <?php if (empty($daftar_tugas_hari_ini)): ?>
                <div class="empty-state">
                    <div class="empty-icon">✓</div>
                    <h3>Tidak ada tugas hari ini</h3>
                    <p>Semua tugas sudah teratur.</p>
                </div>
            <?php else: ?>
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
                        <?php foreach ($daftar_tugas_hari_ini as $t): ?>
                            <tr>
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
            <?php endif; ?>
        </section>

        <!-- MENU CEPAT -->
        <section class="quick-actions">
            <div class="action-card stat-blue">
                <div class="action-icon">📅</div>
                <div class="action-info">
                    <h3>Perbarui Jadwal</h3>
                    <p>Kelola jadwal pelajaran harian</p>
                </div>
                <a href="<?= site_url('sekretaris/jadwal'); ?>" class="action-button">
                    Buka <span>→</span>
                </a>
            </div>

            <div class="action-card stat-purple">
                <div class="action-icon">📝</div>
                <div class="action-info">
                    <h3>Tambah Tugas</h3>
                    <p>Berikan tugas baru kepada siswa</p>
                </div>
                <a href="<?= site_url('sekretaris/tugas'); ?>" class="action-button">
                    Buka <span>→</span>
                </a>
            </div>
        </section>

        <footer class="footer">
            © <?= date('Y'); ?> StudyPlan. Kelola dengan terencana.
        </footer>

    </main>
</div>

</body>
</html>
