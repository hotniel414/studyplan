<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda | StudyPlan</title>

    <link rel="stylesheet" href="/studyplan/asset/beranda.css">
</head>
<body>

<div class="dashboard">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <a href="<?= site_url('beranda'); ?>" class="logo">
            <span class="logo-icon">▰</span>
            <span>study<span class="logo-yellow">plan</span></span>
        </a>

        <nav class="navigation">
            <a href="<?= site_url('beranda'); ?>" class="nav-item active">
                <span>⌂</span> Beranda
            </a>
            <a href="<?= site_url('jadwal'); ?>" class="nav-item">
                <span>▦</span> Jadwal Pelajaran
            </a>
            <a href="<?= site_url('tugas'); ?>" class="nav-item">
                <span>▤</span> Tugas
            </a>
            <a href="<?= site_url('pemberitahuan'); ?>" class="nav-item">
                <span>♧</span> Pemberitahuan
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
            <div class="topbar-title">Dashboard Siswa</div>
            <div class="profile">
                <span class="profile-icon">♙</span>
                <span>Halo, Siswa!</span>
            </div>
        </header>

        <section class="welcome">
            <div>
                <h1>Selamat Datang, Siswa! 👋</h1>
                <p>Semangat menjalani hari ini, jangan lupa kerjakan tugasnya ya!</p>
            </div>

            <div class="date-box">
                <span class="date-icon">▦</span>
                <div>
                    <strong><?= html_escape($tanggal); ?></strong>
                    <small>Semoga harimu menyenangkan!</small>
                </div>
            </div>
        </section>

        <!-- GRID STATISTIK -->
        <section class="stats-grid">

            <div class="stat-card stat-blue">
                <div class="stat-icon">▤</div>
                <p>Total Tugas</p>
                <h2><?= $total_tugas; ?></h2>
                <small>Tugas keseluruhan</small>
            </div>

            <div class="stat-card stat-green">
                <div class="stat-icon">✓</div>
                <p>Tugas Selesai</p>
                <h2><?= $tugas_selesai; ?></h2>
                <small>Sudah dikerjakan</small>
            </div>

            <div class="stat-card stat-orange">
                <div class="stat-icon">◷</div>
                <p>Tugas Belum Selesai</p>
                <h2><?= $tugas_belum; ?></h2>
                <small>Masih harus dikerjakan</small>
            </div>

            <div class="stat-card stat-purple">
                <div class="stat-icon">▦</div>
                <p>Tugas Hari Ini</p>
                <h2><?= $tugas_hari_ini; ?></h2>
                <small>Jatuh tempo hari ini</small>
            </div>

        </section>

        <!-- JADWAL DAN TUGAS -->
        <section class="content-grid">

            <!-- JADWAL HARI INI -->
            <div class="panel schedule-panel">
                <div class="panel-heading">
                    <div class="heading-icon">▦</div>
                    <div>
                        <h2>Jadwal Hari Ini</h2>
                        <p><?= html_escape($tanggal); ?></p>
                    </div>
                </div>

                <div class="schedule-list">
                    <?php foreach ($jadwal as $i => $j): ?>
                        <div class="schedule-item <?= html_escape($j['warna']); ?>">
                            <div class="period-number">
                                <?= $i + 1; ?>
                            </div>

                            <div class="schedule-time">
                                <?= html_escape($j['jam']); ?>
                            </div>

                            <div class="schedule-detail">
                                <strong>
                                    <span class="subject-icon">
                                        <?= html_escape($j['ikon']); ?>
                                    </span>
                                    <?= html_escape($j['mapel']); ?>
                                </strong>
                                <small><?= html_escape($j['ruang']); ?></small>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- TUGAS HARI INI -->
            <div class="panel task-panel">
                <div class="panel-heading">
                    <div class="heading-icon">▤</div>
                    <div>
                        <h2>Tugas Hari Ini</h2>
                        <p>Prioritaskan tugas yang segera dikumpulkan</p>
                    </div>
                    <span class="task-count">
                        <?= count($daftar_tugas_hari_ini); ?> tugas
                    </span>
                </div>

                <div class="task-list">
                    <?php if (empty($daftar_tugas_hari_ini)): ?>
                        <div class="empty-state">
                            <div class="empty-icon">✓</div>
                            <h3>Tidak ada tugas hari ini</h3>
                            <p>Hebat! Kamu bisa fokus pada kegiatan belajar lainnya.</p>
                        </div>
                    <?php else: ?>

                        <?php foreach ($daftar_tugas_hari_ini as $t): ?>
                            <article class="task-card">
                                <div class="task-icon <?= html_escape($t['warna']); ?>">
                                    <?= html_escape($t['ikon']); ?>
                                </div>

                                <div class="task-info">
                                    <h3><?= html_escape($t['judul']); ?></h3>
                                    <span class="subject-label">
                                        <span class="subject-dot"></span>
                                        <?= html_escape($t['mapel']); ?>
                                    </span>

                                    <p><?= html_escape($t['deskripsi']); ?></p>

                                    <div class="task-footer">
                                        <span class="deadline">
                                            ▦ Hari ini
                                        </span>

                                        <a href="<?= site_url('tugas'); ?>"
                                           class="detail-button">
                                            Lihat Detail <span>→</span>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach; ?>

                    <?php endif; ?>
                </div>

                <a href="<?= site_url('tugas'); ?>" class="all-tasks">
                    Lihat semua tugas <span>→</span>
                </a>
            </div>

        </section>

        <!-- BANNER MOTIVASI -->
        <section class="motivation-banner">
            <div class="book-illustration">📚</div>
            <div class="motivation-text">
                <p>"Jangan hanya bermimpi,</p>
                <p>tapi buatlah rencana dan kerjakan."</p>
                <span>— StudyPlan</span>
            </div>
            <div class="banner-decoration">✦</div>
        </section>

        <footer class="footer">
            © <?= date('Y'); ?> StudyPlan. Belajar lebih terencana.
        </footer>

    </main>
</div>

</body>
</html>