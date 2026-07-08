<?php $this->extend('admin/template/layout'); ?>

<?php $this->section('content'); ?>

<div class="topbar">
    <div class="topbar-left">
        <h1 class="page-title">Kelola Pesan</h1>
        <p class="page-subtitle">Daftar pesan yang masuk dari halaman kontak</p>
    </div>
</div>

<div class="content-area">
    <div class="container-fluid">

        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <div style="background:var(--color-graphite);border:1px solid var(--color-steel-border);border-radius:var(--radius-card);overflow:hidden;">

            <table style="width:100%;border-collapse:collapse;">

                <thead>
                    <tr style="background:rgba(255,255,255,.05);">

                        <th style="padding:16px;">No</th>
                        <th style="padding:16px;">Nama</th>
                        <th style="padding:16px;">Email</th>
                        <th style="padding:16px;">Subjek</th>
                        <th style="padding:16px;">Status</th>
                        <th style="padding:16px;">Tanggal</th>
                        <th style="padding:16px;">Aksi</th>

                    </tr>
                </thead>

                <tbody>

                <?php if (!empty($messages)) : ?>

                    <?php foreach ($messages as $key => $message) : ?>

                        <tr style="<?= $message['status']=='baru' ? 'background:rgba(255,255,255,.03);font-weight:bold;' : '' ?>">

                            <td style="padding:16px;">
                                <?= $key+1 ?>
                            </td>

                            <td style="padding:16px;">
                                <?= esc($message['nama']) ?>
                            </td>

                            <td style="padding:16px;">
                                <?= esc($message['email']) ?>
                            </td>

                            <td style="padding:16px;">
                                <?= esc($message['subjek']) ?>
                            </td>

                            <td style="padding:16px;">

                                <?php if ($message['status']=='baru') : ?>

                                    <span class="badge bg-danger">
                                        Baru
                                    </span>

                                <?php elseif($message['status']=='dibaca') : ?>

                                    <span class="badge bg-success">
                                        Dibaca
                                    </span>

                                <?php else : ?>

                                    <span class="badge bg-primary">
                                        Dibalas
                                    </span>

                                <?php endif; ?>

                            </td>

                            <td style="padding:16px;">
                                <?= date('d M Y H:i', strtotime($message['created_at'])) ?>
                            </td>

                            <td style="padding:16px;">

                                <a
                                    href="<?= base_url('admin/messages/detail/'.$message['id']) ?>"
                                    class="btn btn-sm btn-primary">
                                    Detail
                                </a>

                                <a
                                    href="<?= base_url('admin/messages/delete/'.$message['id']) ?>"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Hapus pesan ini?')">
                                    Hapus
                                </a>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                <?php else : ?>

                    <tr>

                        <td colspan="7" style="padding:32px;text-align:center;">
                            Belum ada pesan.
                        </td>

                    </tr>

                <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>
</div>

<?php $this->endSection(); ?>