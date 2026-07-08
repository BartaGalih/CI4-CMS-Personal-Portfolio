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

        <?php if (isset($validation) && $validation->getErrors()): ?>
            <div style="background:#ff4757;border-left:4px solid #ff4757;border-radius:var(--radius-card);padding:16px;margin-bottom:24px;color:#fff;">
                <div style="font-weight:bold;margin-bottom:8px;display:flex;align-items:center;">
                    <span style="font-size:18px;margin-right:8px;">⚠️</span>
                    Validasi Gagal
                </div>

                <ul style="margin:0;padding-left:24px;">
                    <?php foreach ($validation->getErrors() as $field => $errors): ?>
                        <?php foreach ((array) $errors as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <div style="background:var(--color-graphite);border:1px solid var(--color-steel-border);border-radius:var(--radius-card);padding:32px;">

            <h3 style="color:var(--color-glacier);margin-bottom:24px;font-family:var(--font-aeonik);font-size:24px;">
                <?= ($action == 'add' ? 'Tambah' : 'Edit') ?> Pekerjaan
            </h3>

            <form method="POST">

                <input type="hidden" name="action" value="<?= $action ?>">

                <?php if ($id > 0): ?>
                    <input type="hidden" name="id" value="<?= $id ?>">
                <?php endif; ?>

                <div style="margin-bottom:24px;">
                    <label style="font-family:var(--font-dotdigital);font-size:12px;letter-spacing:.1em;text-transform:uppercase;color:var(--color-fog);display:block;margin-bottom:8px;">
                        Periode
                    </label>

                    <input
                        type="text"
                        name="periode"
                        class="form-control"
                        placeholder="2024 - Sekarang"
                        value="<?= htmlspecialchars($pekerjaan['periode'] ?? '') ?>"
                        required
                        style="background:var(--color-void);border:1px solid var(--color-steel-border);color:var(--color-moonlight);">

                    <?php if (isset($validation) && $validation->getError('periode')): ?>
                        <div style="color:#ff4757;font-size:12px;margin-top:6px;display:flex;align-items:center;">
                            <span style="margin-right:6px;">❌</span>
                            <?= esc($validation->getError('periode')) ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div style="margin-bottom:24px;">
                    <label style="font-family:var(--font-dotdigital);font-size:12px;letter-spacing:.1em;text-transform:uppercase;color:var(--color-fog);display:block;margin-bottom:8px;">
                        Posisi
                    </label>

                    <input
                        type="text"
                        name="posisi"
                        class="form-control"
                        value="<?= htmlspecialchars($pekerjaan['posisi'] ?? '') ?>"
                        required
                        style="background:var(--color-void);border:1px solid var(--color-steel-border);color:var(--color-moonlight);">

                    <?php if (isset($validation) && $validation->getError('posisi')): ?>
                        <div style="color:#ff4757;font-size:12px;margin-top:6px;display:flex;align-items:center;">
                            <span style="margin-right:6px;">❌</span>
                            <?= esc($validation->getError('posisi')) ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div style="margin-bottom:24px;">
                    <label style="font-family:var(--font-dotdigital);font-size:12px;letter-spacing:.1em;text-transform:uppercase;color:var(--color-fog);display:block;margin-bottom:8px;">
                        Perusahaan
                    </label>

                    <input
                        type="text"
                        name="perusahaan"
                        class="form-control"
                        value="<?= htmlspecialchars($pekerjaan['perusahaan'] ?? '') ?>"
                        required
                        style="background:var(--color-void);border:1px solid var(--color-steel-border);color:var(--color-moonlight);">

                    <?php if (isset($validation) && $validation->getError('perusahaan')): ?>
                        <div style="color:#ff4757;font-size:12px;margin-top:6px;display:flex;align-items:center;">
                            <span style="margin-right:6px;">❌</span>
                            <?= esc($validation->getError('perusahaan')) ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div style="display:flex;gap:12px;">

                    <button
                        type="submit"
                        style="background:var(--color-electric-iris);color:#fff;border:none;border-radius:var(--radius-button);padding:12px 24px;font-family:var(--font-dotdigital);font-size:12px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;cursor:pointer;box-shadow:var(--shadow-sm);">
                        Simpan
                    </button>

                    <a href="<?= base_url('admin/pekerjaan') ?>"
                        style="background:transparent;color:var(--color-moonlight);border:1px solid var(--color-steel-border);border-radius:var(--radius-button);padding:12px 24px;font-family:var(--font-dotdigital);font-size:12px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;text-decoration:none;display:inline-flex;align-items:center;">
                        Batal
                    </a>

                </div>

            </form>

        </div>

    </div>
</div>

<?php $this->endSection(); ?>