<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda | StudyPlan</title>

    <link rel="stylesheet" href="/studyplan/asset/beranda.css?v=24">
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
            <a href="<?= site_url('beranda'); ?>" class="nav-item active">
                <span>🏠</span> Beranda
            </a>
            <a href="<?= site_url('jadwal'); ?>" class="nav-item">
                <span>📅</span> Jadwal Pelajaran
            </a>
            <a href="<?= site_url('tugas'); ?>" class="nav-item">
                <span>📝</span> Tugas
            </a>
            <a href="<?= site_url('pemberitahuan'); ?>" class="nav-item">
                <span>🔔</span> Pemberitahuan
            </a>
            <a href="<?= site_url('riwayat_tugas'); ?>" class="nav-item">
                <span>🕒</span> Riwayat Tugas
            </a>
        </nav>

        <div class="sidebar-quote">
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
                <p>Semangat menjalani minggu ini, jangan lupa kerjakan tugasnya ya!</p>
            </div>

            <div class="date-box">
                <div>
                    <strong><?= html_escape($tanggal); ?></strong>
                    <small>Semoga harimu menyenangkan!</small>
                </div>
            </div>
        </section>

        <!-- GRID STATISTIK -->
        <section class="stats-grid">

            <div class="stat-card stat-blue">
                <p>Total Tugas</p>
                <h2><?= $total_tugas; ?></h2>
                <small>Tugas keseluruhan</small>
            </div>

            <div class="stat-card stat-purple">
                <p>Tugas Minggu Ini</p>
                <h2><?= $tugas_hari_ini; ?></h2>
                <small>Tenggat waktu minggu ini</small>
            </div>

        </section>

        <!-- JADWAL DAN TUGAS -->
        <section class="content-grid">

            <!-- JADWAL HARI INI -->
            <div class="panel schedule-panel">
                <div class="panel-heading">
                    <div class="heading-icon">📅</div>
                    <div>
                        <h2>Jadwal Hari Ini</h2>
                        <p><?= html_escape($tanggal); ?></p>
                    </div>
                </div>

                <div class="schedule-list">
                    <?php $no = 1; ?>
                    <?php foreach ($jadwal as $j): ?>
                        <?php $colorIndex = (($no - 1) % 5) + 1; ?>
                        <div class="schedule-item lesson-color-<?= $colorIndex; ?>">
                            <div class="schedule-time">
                                <?= html_escape($j['jam']); ?>
                            </div>

                            <div class="schedule-detail">
                                <strong>
                                    <span class="schedule-dot"></span>
                                    <span><?= html_escape($j['mapel']); ?></span>
                                </strong>
                                <small>Guru: <?= html_escape($j['guru']); ?></small>
                            </div>
                        </div>
                        <?php $no++; ?>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- TUGAS HARI INI -->
            <div class="panel task-panel">
                <div class="panel-heading">
                    <div class="heading-icon">📝</div>
                    <div>
                        <h2>Tugas Tenggat Waktu Minggu Ini</h2>
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
                            <h3>Tidak ada tugas tenggat waktu minggu ini</h3>
                            <p>Hebat! Kamu bisa fokus pada kegiatan belajar lainnya.</p>
                        </div>
                    <?php else: ?>

                        <?php foreach ($daftar_tugas_hari_ini as $t): ?>
                            <article class="task-card <?= html_escape($t['warna']); ?> <?= $t['selesai'] ? 'selesai' : ''; ?>">
                                <input type="checkbox" class="task-checkbox" data-id="<?= html_escape($t['judul']); ?>" <?= $t['selesai'] ? 'checked' : ''; ?>>
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
        </section>

        <footer class="footer">
            © <?= date('Y'); ?> StudyPlan. Belajar lebih terencana.
        </footer>

    </main>
</div>

    <div class="confirm-modal" id="confirmModal">
        <div class="confirm-backdrop" id="confirmBackdrop"></div>
        <div class="confirm-box">
            <p class="confirm-message" id="confirmMessage"></p>
            <div class="confirm-actions">
                <button type="button" class="confirm-cancel" id="confirmCancel">Batal</button>
                <button type="button" class="confirm-ok" id="confirmOk">Ya</button>
            </div>
        </div>
    </div>

    <script>
        let pendingCheckbox = null;
        let pendingCheckboxWasChecked = false;

        const confirmModal = document.getElementById("confirmModal");
        const confirmBackdrop = document.getElementById("confirmBackdrop");
        const confirmMessage = document.getElementById("confirmMessage");
        const confirmOk = document.getElementById("confirmOk");
        const confirmCancel = document.getElementById("confirmCancel");

        function closeConfirm() {
            confirmModal.classList.remove("show");
            pendingCheckbox = null;
            pendingCheckboxWasChecked = false;
        }

        confirmCancel.addEventListener("click", function() {
            if (pendingCheckbox) {
                const wasChecked = pendingCheckboxWasChecked;
                pendingCheckbox.checked = !wasChecked;
                const card = pendingCheckbox.closest(".task-card");
                if (!wasChecked) {
                    card.classList.add("selesai");
                } else {
                    card.classList.remove("selesai");
                }
            }
            closeConfirm();
        });

        confirmBackdrop.addEventListener("click", function() {
            if (pendingCheckbox) {
                const wasChecked = pendingCheckboxWasChecked;
                pendingCheckbox.checked = !wasChecked;
                const card = pendingCheckbox.closest(".task-card");
                if (!wasChecked) {
                    card.classList.add("selesai");
                } else {
                    card.classList.remove("selesai");
                }
            }
            closeConfirm();
        });

        confirmOk.addEventListener("click", function() {
            closeConfirm();
        });

        document.querySelectorAll(".task-checkbox").forEach(function(checkbox) {
            checkbox.addEventListener("change", function() {
                const isChecked = this.checked;
                const action = isChecked ? "menandai selesai" : "membatalkan selesai";
                const card = this.closest(".task-card");
                
                if (isChecked) {
                    card.classList.add("selesai");
                } else {
                    card.classList.remove("selesai");
                }
                
                confirmMessage.textContent = "Yakin ingin " + action + " tugas ini?";
                pendingCheckbox = this;
                pendingCheckboxWasChecked = isChecked;
                confirmModal.classList.add("show");
            });
        });
    </script>

</body>
</html>