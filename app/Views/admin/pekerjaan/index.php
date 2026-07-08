<?php $this->extend('admin/template/layout'); ?>

<?php $this->section('content'); ?>

<div class="topbar">
    <div class="topbar-left">
        <h1 class="page-title">Kelola Pekerjaan</h1>
        <p class="page-subtitle">Tambah, Edit, atau Hapus Riwayat Pekerjaan</p>
    </div>
</div>

<div class="content-area">
    <div class="container-fluid">

        <div style="margin-bottom: 24px;">
            <a href="<?= base_url('admin/pekerjaan/add') ?>"
                style="background: var(--color-electric-iris); color: #ffffff; border: none; border-radius: var(--radius-button); padding: 12px 24px; font-family: var(--font-dotdigital); font-size: 12px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; cursor: pointer; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">
                <i class="fas fa-plus"></i>
                Tambah Pekerjaan
            </a>
        </div>

        <div style="background: var(--color-graphite); border: 1px solid var(--color-steel-border); border-radius: var(--radius-card); overflow: hidden;">
            <table style="width:100%; border-collapse: collapse;">

                <thead>
                    <tr style="background: rgba(255,255,255,.05); border-bottom:1px solid var(--color-steel-border);">

                        <th style="padding:16px; color:var(--color-glacier); font-family:var(--font-dotdigital); font-size:12px; font-weight:700; text-align:left; text-transform:uppercase; letter-spacing:.1em;">
                            No
                        </th>

                        <th style="padding:16px; color:var(--color-glacier); font-family:var(--font-dotdigital); font-size:12px; font-weight:700; text-align:left; text-transform:uppercase; letter-spacing:.1em;">
                            Periode
                        </th>

                        <th style="padding:16px; color:var(--color-glacier); font-family:var(--font-dotdigital); font-size:12px; font-weight:700; text-align:left; text-transform:uppercase; letter-spacing:.1em;">
                            Posisi
                        </th>

                        <th style="padding:16px; color:var(--color-glacier); font-family:var(--font-dotdigital); font-size:12px; font-weight:700; text-align:left; text-transform:uppercase; letter-spacing:.1em;">
                            Perusahaan
                        </th>

                        <th style="padding:16px; color:var(--color-glacier); font-family:var(--font-dotdigital); font-size:12px; font-weight:700; text-align:left; text-transform:uppercase; letter-spacing:.1em;">
                            Aksi
                        </th>

                    </tr>
                </thead>

                <tbody>

                <?php foreach ($pekerjaan as $key => $item): ?>

                    <tr style="border-bottom:1px solid var(--color-steel-border); transition: background-color .2s;">

                        <td style="padding:16px; color:var(--color-moonlight);">
                            <?= $key + 1 ?>
                        </td>

                        <td style="padding:16px; color:var(--color-moonlight);">
                            <?= htmlspecialchars($item['periode']) ?>
                        </td>

                        <td style="padding:16px; color:var(--color-moonlight);">
                            <?= htmlspecialchars($item['posisi']) ?>
                        </td>

                        <td style="padding:16px; color:var(--color-moonlight);">
                            <?= htmlspecialchars($item['perusahaan']) ?>
                        </td>

                        <td style="padding:16px; display:flex; gap:8px;">

                            <a href="<?= base_url('admin/pekerjaan/edit/'.$item['id']) ?>"
                                style="background: var(--color-electric-iris); color:#ffffff; border:none; border-radius:4px; padding:6px 12px; font-size:12px; text-decoration:none; cursor:pointer;">
                                Edit
                            </a>

                            <a href="<?= base_url('admin/pekerjaan/delete/'.$item['id']) ?>"
                                onclick="return confirm('Yakin hapus?')"
                                style="background: var(--color-electric-signal); color:#ffffff; border:none; border-radius:4px; padding:6px 12px; font-size:12px; text-decoration:none; cursor:pointer;">
                                Hapus
                            </a>

                        </td>

                    </tr>

                <?php endforeach; ?>

                </tbody>

            </table>
        </div>

    </div>
</div>

<?php $this->endSection(); ?>