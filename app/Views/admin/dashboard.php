<?php $this->extend('admin/template/layout'); ?>

<?php $this->section('content'); ?>    
       <!-- Top Bar -->
        <div class="topbar">
            <div class="topbar-left">
                <h1 class="page-title">Dashboard</h1>
                <p class="page-subtitle">Selamat datang, <?= htmlspecialchars($admin_username) ?></p>
            </div>
            <div class="topbar-right">
                <div class="user-info">
                    <span><?= htmlspecialchars($admin_username) ?></span>
                </div>
            </div>
        </div>

        <!-- Page Content -->
        <div class="content-area">
            <div class="container-fluid">
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon profil">
                            <i class="fas fa-user-circle"></i>
                        </div>
                        <div class="stat-content">
                            <p class="stat-label">Profil</p>
                        </div>
                        <a href="<?= base_url('admin/profil') ?>" class="stat-action ">Kelola</a>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon skills">
                            <i class="fas fa-code"></i>
                        </div>
                        <div class="stat-content">
                            <p class="stat-label">Skills</p>
                            <p class="stat-value"><?= $skills_count ?></p>
                        </div>
                        <a href="<?= base_url('admin/skills') ?>" class="stat-action">Kelola</a>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon pendidikan">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="stat-content">
                            <p class="stat-label">Pendidikan</p>
                            <p class="stat-value"><?= $pendidikan_count ?></p>
                        </div>
                        <a href="<?= base_url('admin/pendidikan') ?>" class="stat-action">Kelola</a>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon pekerjaan">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <div class="stat-content">
                            <p class="stat-label">Pekerjaan</p>
                            <p class="stat-value"><?= $pekerjaan_count ?></p>
                        </div>
                        <a href="<?= base_url('admin/pekerjaan') ?>" class="stat-action">Kelola</a>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon projects">
                            <i class="fas fa-file"></i>
                        </div>
                        <div class="stat-content">
                            <p class="stat-label">Proyek</p>
                            <p class="stat-value"><?= $projects_count ?></p>
                        </div>
                        <a href="<?= base_url('admin/projects') ?>" class="stat-action">Kelola</a>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon messages">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="stat-content">
                            <p class="stat-label">Pesan</p>
                            <p class="stat-value"><?= $messages_count ?></p>
                        </div>
                        <a href="<?= base_url('admin/messages') ?>" class="stat-action">Lihat</a>
                    </div>
                </div>
            </div>
        </div> 
<?php $this->endSection(); ?>
