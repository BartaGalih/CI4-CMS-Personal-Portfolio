<?php $this->extend('admin/template/layout'); ?>

<?php $this->section('content'); ?>

<div class="topbar">
    <div class="topbar-left">
        <h1 class="page-title">Kelola Projects</h1>
        <p class="page-subtitle">
            <?= $action == 'add' ? 'Tambah Project Baru' : 'Edit Project' ?>
        </p>
    </div>
</div>

<div class="content-area">
    <div class="container-fluid">

        <?php if (isset($validation) && $validation->getErrors()) : ?>
            <div style="background:#ff4757;border-left:4px solid #ff4757;border-radius:var(--radius-card);padding:16px;margin-bottom:24px;color:#fff;">
                <div style="font-weight:bold;margin-bottom:8px;">
                    Validasi Gagal
                </div>

                <ul style="margin:0;padding-left:20px;">
                    <?php foreach ($validation->getErrors() as $error) : ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif; ?>

        <div style="background:var(--color-graphite);border:1px solid var(--color-steel-border);border-radius:var(--radius-card);padding:32px;">

            <form method="POST" enctype="multipart/form-data">

                <div class="mb-4">

                    <label class="form-label">Nama Project</label>

                    <input
                        type="text"
                        class="form-control"
                        name="nama_project"
                        value="<?= old('nama_project', $project['nama_project'] ?? '') ?>">

                </div>

                <div class="mb-4">

                    <label class="form-label">Deskripsi</label>

                    <textarea
                        class="form-control"
                        rows="5"
                        name="deskripsi"><?= old('deskripsi', $project['deskripsi'] ?? '') ?></textarea>

                </div>

                <div class="mb-4">

                    <label class="form-label">Teknologi</label>

                    <input
                        type="text"
                        class="form-control"
                        name="teknologi"
                        placeholder="Laravel, CodeIgniter, Bootstrap"
                        value="<?= old('teknologi', $project['teknologi'] ?? '') ?>">

                </div>

                <div class="mb-4">

                    <label class="form-label">Github</label>

                    <input
                        type="url"
                        class="form-control"
                        name="link_github"
                        value="<?= old('link_github', $project['link_github'] ?? '') ?>">

                </div>

                <div class="mb-4">

                    <label class="form-label">Demo</label>

                    <input
                        type="url"
                        class="form-control"
                        name="link_demo"
                        value="<?= old('link_demo', $project['link_demo'] ?? '') ?>">

                </div>

                <div class="mb-4">

                    <label class="form-label">Status</label>

                    <select
                        class="form-select"
                        name="status">

                        <option value="aktif"
                            <?= old('status', $project['status'] ?? '') == 'aktif' ? 'selected' : '' ?>>
                            Aktif
                        </option>

                        <option value="archived"
                            <?= old('status', $project['status'] ?? '') == 'archived' ? 'selected' : '' ?>>
                            Archived
                        </option>

                    </select>

                </div>

                <div class="mb-4">

                    <label class="form-label">Gambar Project</label>

                    <input
                        type="file"
                        class="form-control"
                        name="gambar"
                        accept="image/*">

                        <input type="hidden" name="gambar_lama" value="<?= $project['gambar'] ?? '' ?>">
                </div>

                <?php if (!empty($project['gambar'])) : ?>

                    <div class="mb-4">

                        <label class="form-label">
                            Gambar Saat Ini
                        </label>

                        <div>

                            <img
                                src="<?= base_url('uploads/projects/' . $project['gambar']) ?>"
                                style="max-width:250px;border-radius:10px;border:1px solid #444;">

                        </div>

                    </div>

                <?php endif; ?>

                <div style="display:flex;gap:12px;">

                    <button
                        type="submit"
                        style="background:var(--color-electric-iris);color:#fff;border:none;border-radius:var(--radius-button);padding:12px 24px;font-family:var(--font-dotdigital);font-size:12px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;cursor:pointer;">

                        <?= $action == 'add' ? 'Tambah Project' : 'Update Project' ?>

                    </button>

                    <a
                        href="<?= base_url('admin/projects') ?>"
                        style="background:transparent;color:var(--color-moonlight);border:1px solid var(--color-steel-border);border-radius:var(--radius-button);padding:12px 24px;font-family:var(--font-dotdigital);font-size:12px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;text-decoration:none;display:inline-flex;align-items:center;">

                        Batal

                    </a>

                </div>

            </form>

        </div>

    </div>
</div>

<?php $this->endSection(); ?>