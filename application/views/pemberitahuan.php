<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemberitahuan | StudyPlan</title>

    <link rel="stylesheet" href="/studyplan/asset/pemberitahuan.css?v=1">
</head>
<body>

<div class="dashboard">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <a href="<?= site_url('beranda'); ?>" class="logo">
            <span class="logo-icon">🎓</span>
            <span>study<span class="logo-yellow">plan</span></span>
        </a>

        <nav class="navigation">
            <a href="<?= site_url('beranda'); ?>" class="nav-item">
                <span>🏠</span> Beranda
            </a>
            <a href="<?= site_url('jadwal'); ?>" class="nav-item">
                <span>📅</span> Jadwal Pelajaran
            </a>
            <a href="<?= site_url('tugas'); ?>" class="nav-item">
                <span>📝</span> Tugas
            </a>
            <a href="<?= site_url('pemberitahuan'); ?>" class="nav-item active">
                <span>🔔</span> Pemberitahuan
            </a>
        </nav>

        <div class="sidebar-quote">
            Rencanakan<br>
            Hari Ini,<br>
            Raih Masa<br>
            Depan
            <span>✦</span>
        </div>
    </aside>

    <!-- KONTEN UTAMA -->
    <main class="main-content">

        <header class="topbar">
            <div class="topbar-title">Pemberitahuan</div>
            <div class="profile">
                <span class="profile-icon">♙</span>
                <span>Halo, Siswa!</span>
            </div>
        </header>

        <section class="notif-section">
            <h1 class="section-title">Pemberitahuan Terbaru</h1>

            <div class="notif-list">
                <?php foreach ($pemberitahuan as $p): ?>
                    <div class="notif-item <?= html_escape($p['warna']); ?>">
                        <div class="notif-icon">
                            <?= html_escape($p['ikon']); ?>
                        </div>

                        <div class="notif-info">
                            <h3><?= html_escape($p['judul']); ?></h3>
                            <p><?= html_escape($p['pesan']); ?></p>
                            <span class="notif-time"><?= html_escape($p['waktu']); ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <footer class="footer">
            © <?= date('Y'); ?> StudyPlan. Belajar lebih terencana.
        </footer>

    </main>
</div>

</body>
</html>
