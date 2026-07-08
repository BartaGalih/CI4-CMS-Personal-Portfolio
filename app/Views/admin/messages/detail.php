<?php $this->extend('admin/template/layout'); ?>

<?php $this->section('content'); ?>

<div class="topbar">
    <div class="topbar-left">
        <h1 class="page-title">Detail Pesan</h1>
        <p class="page-subtitle">Lihat informasi lengkap pesan yang masuk</p>
    </div>
</div>

<div class="content-area">
    <div class="container-fluid">

        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <div style="background:var(--color-graphite);border:1px solid var(--color-steel-border);border-radius:var(--radius-card);padding:32px;">

            <div style="display:grid;grid-template-columns:180px 1fr;gap:18px;margin-bottom:18px;">

                <div style="color:var(--color-fog);">
                    Nama
                </div>

                <div style="color:var(--color-moonlight);font-weight:600;">
                    <?= esc($message['nama']) ?>
                </div>

                <div style="color:var(--color-fog);">
                    Email
                </div>

                <div>
                    <a href="mailto:<?= esc($message['email']) ?>">
                        <?= esc($message['email']) ?>
                    </a>
                </div>

                <div style="color:var(--color-fog);">
                    Subjek
                </div>

                <div style="color:var(--color-moonlight);font-weight:600;">
                    <?= esc($message['subjek']) ?>
                </div>

                <div style="color:var(--color-fog);">
                    Status
                </div>

                <div>

                    <?php if ($message['status'] == 'baru') : ?>

                        <span class="badge bg-danger">
                            Baru
                        </span>

                    <?php elseif ($message['status'] == 'dibaca') : ?>

                        <span class="badge bg-success">
                            Dibaca
                        </span>

                    <?php else : ?>

                        <span class="badge bg-primary">
                            Dibalas
                        </span>

                    <?php endif; ?>

                </div>

                <div style="color:var(--color-fog);">
                    Dikirim
                </div>

                <div style="color:var(--color-moonlight);">
                    <?= date('d F Y H:i', strtotime($message['created_at'])) ?>
                </div>

            </div>

            <hr style="border-color:var(--color-steel-border);margin:24px 0;">

            <h5 style="margin-bottom:16px;">
                Isi Pesan
            </h5>

            <div style="background:var(--color-void);border:1px solid var(--color-steel-border);border-radius:10px;padding:20px;min-height:180px;white-space:pre-wrap;line-height:1.7;color:var(--color-moonlight);">
                <?= esc($message['pesan']) ?>
            </div>

            <div style="margin-top:30px;display:flex;gap:10px;flex-wrap:wrap;">
                <?php if ($message['status'] != 'dibaca') : ?>
                    <a href="<?= base_url('admin/messages/read/'.$message['id']) ?>" class="btn btn-success"> Tandai Dibaca </a>
                <?php endif; ?>

                <?php if ($message['status'] == 'dibaca') : ?>
                    <a href="<?= base_url('admin/messages/unread/'.$message['id']) ?>" class="btn btn-warning"> Tandai Belum Dibaca </a>
                <?php endif; ?>

                <a href="<?= base_url('admin/messages/delete/'.$message['id']) ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus pesan ini?')"> Hapus </a>

                <a href="<?= base_url('admin/messages') ?>" class="btn btn-secondary"> Kembali </a>

            </div>

        </div>

    </div>
</div>

<?php $this->endSection(); ?>