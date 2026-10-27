<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Pelajaran | StudyPlan</title>

    <link rel="stylesheet" href="/studyplan/asset/jadwal.css?v=1">
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
            <a href="<?= site_url('jadwal'); ?>" class="nav-item active">
                <span>📅</span> Jadwal Pelajaran
            </a>
            <a href="<?= site_url('tugas'); ?>" class="nav-item">
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
            <div class="topbar-title">Jadwal Pelajaran</div>
            <div class="profile">
                <span class="profile-icon">♙</span>
                <span>Halo, Siswa!</span>
            </div>
        </header>

        <section class="schedule-section">
            <h1 class="section-title">Jadwal Mingguan</h1>

            <div class="schedule-grid">
                <?php foreach ($hari_list as $h): ?>
                    <?php $hari_jadwal = array_filter($jadwal, function($j) use ($h) {
                        return $j['hari'] === $h;
                    }); ?>
                    <?php if (empty($hari_jadwal)): continue; endif; ?>

                    <div class="day-card">
                        <div class="day-header">
                            <span class="day-name"><?= html_escape($h); ?></span>
                            <span class="day-count"><?= count($hari_jadwal); ?> pelajaran</span>
                        </div>

                        <div class="day-lessons">
                            <?php foreach ($hari_jadwal as $j): ?>
                                <div class="lesson-item <?= html_escape($j['warna']); ?>">
                                    <div class="lesson-time">
                                        <?= html_escape($j['jam']); ?>
                                    </div>
                                    <div class="lesson-detail">
                                        <div class="lesson-subject">
                                            <span class="subject-icon"><?= html_escape($j['ikon']); ?></span>
                                            <span><?= html_escape($j['mapel']); ?></span>
                                        </div>
                                        <small class="lesson-room"><?= html_escape($j['ruang']); ?></small>
                                    </div>
                                </div>
                            <?php endforeach; ?>
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
