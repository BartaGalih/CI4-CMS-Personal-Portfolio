<?php $this->extend('admin/template/layout'); ?>

<?php $this->section('content'); ?>    
    <div class="topbar">
        <div class="topbar-left">
            <h1 class="page-title">Edit Profil</h1>
            <p class="page-subtitle">Perbarui Informasi Pribadi Anda</p>
        </div>
    </div>

    <div class="content-area">
        <div class="container-fluid">
            <div style="background: var(--color-graphite); border: 1px solid var(--color-steel-border); border-radius: var(--radius-card); padding: 32px;">
                <form method="POST" enctype="multipart/form-data" action="<?= base_url('admin/profil/update') ?>">
                    <input type="hidden" name="foto_lama" value="<?= htmlspecialchars($profil['foto'] ?? '') ?>">

                    <?php if (!empty($profil['foto'])): ?>
                        <div style="margin-bottom: 24px; text-align: center;">
                            <p style="font-family: var(--font-dotdigital); font-size: 12px; letter-spacing: 0.1em; color: var(--color-fog); text-transform: uppercase;">Foto Profil Saat Ini</p>
                            <img src="<?= base_url($profil['foto']) ?>" style="width: 150px; height: 150px; object-fit: cover; border-radius: var(--radius-card); border: 1px solid var(--color-steel-border);">
                        </div>
                    <?php endif; ?>

                    <div style="margin-bottom: 24px;">
                        <label style="font-family: var(--font-dotdigital); font-size: 12px; letter-spacing: 0.1em; text-transform: uppercase; color: var(--color-fog); display: block; margin-bottom: 8px;">Upload Foto Baru</label>
                        <input type="file" name="foto" class="form-control" accept="image/*" style="background: var(--color-void); border: 1px solid var(--color-steel-border); color: var(--color-moonlight);">
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label style="font-family: var(--font-dotdigital); font-size: 12px; letter-spacing: 0.1em; text-transform: uppercase; color: var(--color-fog); display: block; margin-bottom: 8px;">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($profil['nama'] ?? '') ?>" required style="background: var(--color-void); border: 1px solid var(--color-steel-border); color: var(--color-moonlight);">
                        </div>
                        <div class="col-md-6">
                            <label style="font-family: var(--font-dotdigital); font-size: 12px; letter-spacing: 0.1em; text-transform: uppercase; color: var(--color-fog); display: block; margin-bottom: 8px;">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" value="<?= htmlspecialchars($profil['tempat_lahir'] ?? '') ?>" style="background: var(--color-void); border: 1px solid var(--color-steel-border); color: var(--color-moonlight);">
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label style="font-family: var(--font-dotdigital); font-size: 12px; letter-spacing: 0.1em; text-transform: uppercase; color: var(--color-fog); display: block; margin-bottom: 8px;">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" value="<?= $profil['tanggal_lahir'] ?? '' ?>" style="background: var(--color-void); border: 1px solid var(--color-steel-border); color: var(--color-moonlight);">
                        </div>
                        <div class="col-md-6">
                            <label style="font-family: var(--font-dotdigital); font-size: 12px; letter-spacing: 0.1em; text-transform: uppercase; color: var(--color-fog); display: block; margin-bottom: 8px;">Email</label>
                            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($profil['email'] ?? '') ?>" style="background: var(--color-void); border: 1px solid var(--color-steel-border); color: var(--color-moonlight);">
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label style="font-family: var(--font-dotdigital); font-size: 12px; letter-spacing: 0.1em; text-transform: uppercase; color: var(--color-fog); display: block; margin-bottom: 8px;">Nomor Telepon</label>
                            <input type="text" name="telepon" class="form-control" value="<?= htmlspecialchars($profil['telepon'] ?? '') ?>" style="background: var(--color-void); border: 1px solid var(--color-steel-border); color: var(--color-moonlight);">
                        </div>
                        <div class="col-md-6">
                            <label style="font-family: var(--font-dotdigital); font-size: 12px; letter-spacing: 0.1em; text-transform: uppercase; color: var(--color-fog); display: block; margin-bottom: 8px;">Alamat</label>
                            <input type="text" name="alamat" class="form-control" value="<?= htmlspecialchars($profil['alamat'] ?? '') ?>" style="background: var(--color-void); border: 1px solid var(--color-steel-border); color: var(--color-moonlight);">
                        </div>
                    </div>

                    <div style="margin-bottom: 24px;">
                        <label style="font-family: var(--font-dotdigital); font-size: 12px; letter-spacing: 0.1em; text-transform: uppercase; color: var(--color-fog); display: block; margin-bottom: 8px;">Deskripsi Tentang</label>
                        <textarea name="deskripsi_tentang" class="form-control" rows="5" style="background: var(--color-void); border: 1px solid var(--color-steel-border); color: var(--color-moonlight); font-family: var(--font-untitled-sans);"><?= htmlspecialchars($profil['deskripsi_tentang'] ?? '') ?></textarea>
                    </div>

                    <div style="display: flex; gap: 12px;">
                        <button type="submit" style="background: var(--color-electric-signal); color: #ffffff; border: none; border-radius: var(--radius-button); padding: 12px 24px; font-family: var(--font-dotdigital); font-size: 12px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; cursor: pointer; box-shadow: var(--shadow-sm);">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $this->endSection(); ?>
