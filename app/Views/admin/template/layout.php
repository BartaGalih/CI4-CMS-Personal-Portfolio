<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?=  base_url('assets/css/design-tokens.css') ?>">
    <link rel="stylesheet" href="<?=  base_url('assets/css/admin.css') ?>">
</head>
<body>
    <!-- Sidebar Navigation -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h2 class="sidebar-title">
                <i class="fas fa-cog"></i> Admin
            </h2>
            <p class="sidebar-subtitle">Dashboard</p>
        </div>
        <nav class="sidebar-nav">
            <a href="<?= base_url('admin/dashboard') ?>" class="nav-link <?= ($page_title === 'Dashboard') ? 'active' : '' ?>">
                <i class="fas fa-home"></i> Dashboard
            </a>
            <a href="<?= base_url('admin/profil') ?>" class="nav-link <?= ($page_title === 'Management Profil') ? 'active' : '' ?>">
                <i class="fas fa-user"></i> Profil
            </a>
            <a href="<?= base_url('admin/skills') ?>" class="nav-link <?= ($page_title === 'Management Skills') ? 'active' : '' ?>">
                <i class="fas fa-star"></i> Skills
            </a>
            <a href="<?= base_url('admin/pendidikan') ?>" class="nav-link <?= ($page_title === 'Management Pendidikan') ? 'active' : '' ?>">
                <i class="fas fa-graduation-cap"></i> Pendidikan
            </a>
            <a href="<?= base_url('admin/pekerjaan') ?>" class="nav-link <?= ($page_title === 'Management Pekerjaan') ? 'active' : '' ?>">
                <i class="fas fa-briefcase"></i> Pekerjaan
            </a>
            <a href="<?= base_url('admin/projects') ?>" class="nav-link <?= ($page_title === 'Management Projects') ? 'active' : '' ?>">
                <i class="fas fa-file"></i> Proyek
            </a>
            <a href="<?= base_url('admin/messages') ?>" class="nav-link <?= ($page_title === 'Management Messages') ? 'active' : '' ?>">
                <i class="fas fa-envelope"></i> Pesan
            </a>
        </nav>
        <div class="sidebar-footer">
            <a href="<?= base_url('admin/logout') ?>" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <?= $this->renderSection('content') ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>