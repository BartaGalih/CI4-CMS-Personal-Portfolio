<?php $this->extend('admin/template/layout'); ?>

<?php $this->section('content'); ?>

<div class="topbar">
    <div class="topbar-left">
        <h1 class="page-title">Kelola Projects</h1>
        <p class="page-subtitle">Tambah, Edit, atau Hapus Data Project</p>
    </div>
</div>

<div class="content-area">
    <div class="container-fluid">

        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <div style="margin-bottom:24px;">
            <a href="<?= base_url('admin/projects/add') ?>"
                style="background: var(--color-electric-iris); color:#fff; border:none; border-radius:var(--radius-button); padding:12px 24px; font-family:var(--font-dotdigital); font-size:12px; font-weight:700; letter-spacing:.1em; text-transform:uppercase; text-decoration:none; display:inline-flex; align-items:center; gap:8px;">
                <i class="fas fa-plus"></i>
                Tambah Project
            </a>
        </div>

        <div style="background:var(--color-graphite); border:1px solid var(--color-steel-border); border-radius:var(--radius-card); overflow:hidden;">

            <table style="width:100%; border-collapse:collapse;">

                <thead>
                    <tr style="background:rgba(255,255,255,.05); border-bottom:1px solid var(--color-steel-border);">

                        <th style="padding:16px;">No</th>
                        <th style="padding:16px;">Gambar</th>
                        <th style="padding:16px;">Nama Project</th>
                        <th style="padding:16px;">Teknologi</th>
                        <th style="padding:16px;">Status</th>
                        <th style="padding:16px;">Aksi</th>

                    </tr>
                </thead>

                <tbody>

                <?php if (!empty($projects)) : ?>

                    <?php foreach ($projects as $key => $project) : ?>

                        <tr style="border-bottom:1px solid var(--color-steel-border);">

                            <td style="padding:16px;">
                                <?= $key + 1 ?>
                            </td>

                            <td style="padding:16px;">

                                <?php if ($project['gambar']) : ?>

                                    <img
                                        src="<?= base_url('uploads/projects/' . $project['gambar']) ?>"
                                        style="width:80px;height:60px;object-fit:cover;border-radius:8px;">

                                <?php else : ?>

                                    -

                                <?php endif; ?>

                            </td>

                            <td style="padding:16px;">
                                <?= esc($project['nama_project']) ?>
                            </td>

                            <td style="padding:16px;">
                                <?= esc($project['teknologi']) ?>
                            </td>

                            <td style="padding:16px;">

                                <?php if ($project['status'] == 'aktif') : ?>

                                    <span class="badge bg-success">
                                        Aktif
                                    </span>

                                <?php else : ?>

                                    <span class="badge bg-secondary">
                                        Archived
                                    </span>

                                <?php endif; ?>

                            </td>

                            <td style="padding:16px;">

                                <a
                                    href="<?= base_url('admin/projects/edit/' . $project['id']) ?>"
                                    class="btn btn-sm btn-primary">
                                    Edit
                                </a>

                                <a
                                    href="<?= base_url('admin/projects/delete/' . $project['id']) ?>"
                                    onclick="return confirm('Yakin ingin menghapus project ini?')"
                                    class="btn btn-sm btn-danger">
                                    Hapus
                                </a>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                <?php else : ?>

                    <tr>
                        <td colspan="6" style="padding:24px;text-align:center;">
                            Belum ada data project.
                        </td>
                    </tr>

                <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>
</div>

<?php $this->endSection(); ?>