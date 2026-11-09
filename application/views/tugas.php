<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas | StudyPlan</title>

    <link rel="stylesheet" href="/studyplan/asset/tugas.css?v=21">
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
            <div class="topbar-title">Daftar Tugas</div>
            <div class="profile">
                <span class="profile-icon">♙</span>
                <span>Halo, Siswa!</span>
            </div>
        </header>

        <section class="tasks-section">
            <h1 class="section-title">Tugas Kamu</h1>

            <div class="task-controls">
                <input type="text" id="taskSearch" placeholder="Cari tugas..." class="task-search">
                <div class="task-filters">
                    <button type="button" class="task-filter active" data-filter="all">Semua</button>
                    <button type="button" class="task-filter" data-filter="belum">Belum Selesai</button>
                    <button type="button" class="task-filter" data-filter="selesai">Selesai</button>
                </div>
            </div>

            <div class="tasks-grid">
                <?php foreach ($tugas as $t): ?>
                    <article class="task-card <?= html_escape($t['warna']); ?> <?= $t['selesai'] ? 'selesai' : ''; ?>">
                        <input type="checkbox" class="task-checkbox" data-id="<?= $t['judul']; ?>" <?= $t['selesai'] ? 'checked' : ''; ?>>
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

        const searchInput = document.getElementById("taskSearch");
        const filterButtons = document.querySelectorAll(".task-filter");
        const taskCards = document.querySelectorAll(".task-card");

        let currentSearch = "";
        let currentFilter = "all";

        function applyFilters() {
            taskCards.forEach(function(card) {
                const title = card.querySelector("h3").textContent.toLowerCase();
                const subject = card.querySelector(".subject-label").textContent.toLowerCase();
                const matchesSearch = title.includes(currentSearch) || subject.includes(currentSearch);
                let matchesFilter = true;

                if (currentFilter === "belum") {
                    matchesFilter = !card.classList.contains("selesai");
                } else if (currentFilter === "selesai") {
                    matchesFilter = card.classList.contains("selesai");
                }

                if (matchesSearch && matchesFilter) {
                    card.style.display = "flex";
                } else {
                    card.style.display = "none";
                }
            });
        }

        searchInput.addEventListener("input", function() {
            currentSearch = this.value.toLowerCase();
            applyFilters();
        });

        filterButtons.forEach(function(btn) {
            btn.addEventListener("click", function() {
                filterButtons.forEach(function(b) {
                    b.classList.remove("active");
                });
                this.classList.add("active");
                currentFilter = this.dataset.filter;
                applyFilters();
            });
        });
    </script>

</body>
</html>
