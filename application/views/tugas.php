<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas | StudyPlan</title>

    <link rel="stylesheet" href="/studyplan/asset/tugas.css?v=1">
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
            <a href="<?= site_url('tugas'); ?>" class="nav-item active">
                <span>📝</span> Tugas
            </a>
            <a href="<?= site_url('pemberitahuan'); ?>" class="nav-item">
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
            <div class="topbar-title">Daftar Tugas</div>
            <div class="profile">
                <span class="profile-icon">♙</span>
                <span>Halo, Siswa!</span>
            </div>
        </header>

        <section class="tasks-section">
            <h1 class="section-title">Tugas Kamu</h1>

            <div class="tasks-grid">
                <?php foreach ($tugas as $t): ?>
                    <article class="task-card <?= html_escape($t['warna']); ?>">
                        <div class="task-icon">
                            <?= html_escape($t['ikon']); ?>
                        </div>

                        <div class="task-info">
                            <h3><?= html_escape($t['judul']); ?></h3>
                            <span class="subject-label">
                                <span class="subject-dot"></span>
                                <?= html_escape($t['mapel']); ?>
                            </span>

                            <p><?= html_escape($t['deskripsi']); ?></p>

                            <div class="task-deadline">
                                <span class="deadline-text">
                                    Deadline: <strong><?= html_escape($t['deadline']); ?></strong>
                                </span>
                            </div>

                            <a href="<?= site_url('tugas/detail/' . urlencode($t['judul'])); ?>"
                               class="view-photo-button">
                                Lihat Foto Tugas <span>→</span>
                            </a>
                        </div>
                    </article>
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
