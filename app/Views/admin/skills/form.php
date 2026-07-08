<?php $this->extend('admin/template/layout'); ?>

<?php $this->section('content'); ?>   
    <div class="topbar">
        <div class="topbar-left">
            <h1 class="page-title">Kelola Skills</h1>
            <p class="page-subtitle">Tambah, Edit, atau Hapus Skills Anda</p>
        </div>
    </div>

    <div class="content-area">
        <div class="container-fluid">
            <?php if (isset($validation) && $validation->getErrors()): ?>
                <div style="background: #ff4757; border-left: 4px solid #ff4757; border-radius: var(--radius-card); padding: 16px; margin-bottom: 24px; color: white;">
                    <div style="font-weight: bold; margin-bottom: 8px; display: flex; align-items: center;">
                        <span style="font-size: 18px; margin-right: 8px;">⚠️</span>
                        Validasi Gagal
                    </div>
                    <ul style="margin: 0; padding-left: 24px;">
                        <?php foreach ($validation->getErrors() as $field => $errors): ?>
                            <?php foreach ((array)$errors as $error): ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <div style="background: var(--color-graphite); border: 1px solid var(--color-steel-border); border-radius: var(--radius-card); padding: 32px; margin-bottom: 24px;">
                <h3 style="color: var(--color-glacier); margin-bottom: 24px; font-family: var(--font-aeonik); font-size: 24px;">
                    <?= ($action=='add'?'Tambah':'Edit') . ' Skill' ?>
                </h3> 
                <form method="POST">
                    <input type="hidden" name="action" value="<?= $action ?>">
                    <?php if($id > 0) echo "<input type='hidden' name='id' value='$id'>"; ?>

                    <div style="margin-bottom: 24px;">
                        <label style="font-family: var(--font-dotdigital); font-size: 12px; letter-spacing: 0.1em; text-transform: uppercase; color: var(--color-fog); display: block; margin-bottom: 8px;">Nama Skill</label>
                        <input type="text" name="nama_skill" class="form-control" value="<?= htmlspecialchars($skill['nama_skill']??'') ?>" required style="background: var(--color-void); border: 1px solid var(--color-steel-border); color: var(--color-moonlight);">
                        <?php if (isset($validation) && $validation->getError('nama_skill')): ?>
                            <div style="color: #ff4757; font-size: 12px; margin-top: 6px; display: flex; align-items: center;">
                                <span style="margin-right: 6px;">❌</span>
                                <?= esc($validation->getError('nama_skill')) ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label style="font-family: var(--font-dotdigital); font-size: 12px; letter-spacing: 0.1em; text-transform: uppercase; color: var(--color-fog); display: block; margin-bottom: 8px;">Level</label>
                            <select name="level" class="form-control" required style="background: var(--color-void); border: 1px solid var(--color-steel-border); color: var(--color-moonlight);">
                                <option value="" style="background: var(--color-void); color: var(--color-moonlight);">-- Pilih Level --</option>
                                <option value="Expert" style="background: var(--color-void); color: var(--color-moonlight);" <?= ($skill['level']??'')=='Expert'?'selected':'' ?>>Expert</option>
                                <option value="Advanced" style="background: var(--color-void); color: var(--color-moonlight);" <?= ($skill['level']??'')=='Advanced'?'selected':'' ?>>Advanced</option>
                                <option value="Intermediate" style="background: var(--color-void); color: var(--color-moonlight);" <?= ($skill['level']??'')=='Intermediate'?'selected':'' ?>>Intermediate</option>
                                <option value="Beginner" style="background: var(--color-void); color: var(--color-moonlight);" <?= ($skill['level']??'')=='Beginner'?'selected':'' ?>>Beginner</option>
                            </select>
                            <?php if (isset($validation) && $validation->getError('level')): ?>
                                <div style="color: #ff4757; font-size: 12px; margin-top: 6px; display: flex; align-items: center;">
                                    <span style="margin-right: 6px;">❌</span>
                                    <?= esc($validation->getError('level')) ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6">
                            <label style="font-family: var(--font-dotdigital); font-size: 12px; letter-spacing: 0.1em; text-transform: uppercase; color: var(--color-fog); display: block; margin-bottom: 8px;">Tahun Pengalaman</label>
                            <input type="number" name="tahun" class="form-control" value="<?= $skill['tahun']??'' ?>" style="background: var(--color-void); border: 1px solid var(--color-steel-border); color: var(--color-moonlight);">
                            <?php if (isset($validation) && $validation->getError('tahun')): ?>
                                <div style="color: #ff4757; font-size: 12px; margin-top: 6px; display: flex; align-items: center;">
                                    <span style="margin-right: 6px;">❌</span>
                                    <?= esc($validation->getError('tahun')) ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div style="display: flex; gap: 12px;">
                        <button type="submit" style="background: var(--color-electric-iris); color: #ffffff; border: none; border-radius: var(--radius-button); padding: 12px 24px; font-family: var(--font-dotdigital); font-size: 12px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; cursor: pointer; box-shadow: var(--shadow-sm);">Simpan</button>
                        <a href="skills.php" style="background: transparent; color: var(--color-moonlight); border: 1px solid var(--color-steel-border); border-radius: var(--radius-button); padding: 12px 24px; font-family: var(--font-dotdigital); font-size: 12px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; cursor: pointer; text-decoration: none; display: inline-flex; align-items: center;">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $this->endSection(); ?>
