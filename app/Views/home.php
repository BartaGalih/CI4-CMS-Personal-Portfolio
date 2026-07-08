<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio <?= htmlspecialchars($profil['nama']) ?></title>
    <link rel="stylesheet" href="<?=  base_url('assets/css/styles.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <nav>
        <div class="nav-container">
            <a href="#home" class="nav-brand"><?= htmlspecialchars($profil['nama']) ?></a>
            <ul class="nav-links">
                <li><a href="#home" class="active">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#projects">Projects</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <a href="#contact" class="nav-cta">Get in Touch</a>
        </div>
    </nav>

    <main id="home">
        <section class="hero">
            <p class="hero-eyebrow">Developer Portfolio</p>
            <h1 class="hero-title">
                Crafting <span class="outline">digital</span> experiences
            </h1>
            <p class="hero-description"><?= nl2br(htmlspecialchars($hero_description)); ?></p>
            <div class="hero-buttons">
                <a href="#contact" class="btn btn-primary">Start a Project</a>
                <a href="#projects" class="btn btn-secondary">View Work</a>
            </div>

            <div class="tech-stack-warpper">
                <p class="section-eyebrow">Technical Skills</p>
                <div class="tech-stack">
                    <?php foreach ($skills as $skill): ?>
                        <div class="tech-item">
                            <div class="tech-name"><?= htmlspecialchars($skill['nama_skill']); ?></div>
                            <span class="tech-badge"><?= htmlspecialchars($skill['level']); ?></span>
                            <div class="tech-time"><?= htmlspecialchars($skill['tahun']); ?> yrs</div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </main>

    <section class="section" id="about">
        <p class="section-eyebrow">About Me</p>
        
        <div class="about-grid">
            <div class="about-content">
                <h2 class="section-title">Building solutions with intention</h2>
                <p class="about-paragraph">
                    <?= isset($profil['deskripsi_tentang']) && trim($profil['deskripsi_tentang']) !== '' ? nl2br(htmlspecialchars($profil['deskripsi_tentang'])) : 'Saya adalah full-stack developer yang fokus pada kode bersih, performa, dan pengalaman pengguna yang elegan pada tampilan gelap.'; ?>
                </p>

            </div>

            <div class="bio-card">
                <div class="bio-photo">
                    <?php
                        if (isset($profil['foto'])) {
                            echo "<img src='" . htmlspecialchars($profil['foto']) . "' alt='Foto Profil' class='img-fluid rounded-2 mb-4'>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <p class="section-eyebrow">Experience</p>
        <h2 class="section-subtitle">Education & Work History</h2>

        <div style="max-width: 900px;">
            <h3 style="font-size: 18px; font-weight: 600; color: var(--color-snow); margin: 40px 0 20px 0;">Education</h3>
            <table class="experience-table">
                <thead>
                    <tr>
                        <th>Period</th>
                        <th>Institution</th>
                        <th>Program</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($pendidikan) > 0): ?>
                        <?php foreach ($pendidikan as $edu): ?>
                            <tr>
                                <td><span class="period"><?= htmlspecialchars($edu['periode']); ?></span></td>
                                <td><?= htmlspecialchars($edu['institusi']); ?></td>
                                <td><?= htmlspecialchars($edu['program']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" style="color: var(--color-ash);">No education records found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <h3 style="font-size: 18px; font-weight: 600; color: var(--color-snow); margin: 40px 0 20px 0;">Work Experience</h3>
            <table class="experience-table">
                <thead>
                    <tr>
                        <th>Period</th>
                        <th>Position</th>
                        <th>Company</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($pekerjaan) > 0): ?>
                        <?php foreach ($pekerjaan as $work): ?>
                            <tr>
                                <td><span class="period"><?= htmlspecialchars($work['periode']); ?></span></td>
                                <td><?= htmlspecialchars($work['posisi']); ?></td>
                                <td><?= htmlspecialchars($work['perusahaan']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" style="color: var(--color-ash);">No work records found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>

    <section class="section" id="projects">
        <p class="section-eyebrow">Portfolio</p>
        <h2 class="section-title">Recent Projects</h2>

        <div class="projects-grid">
            <?php foreach ($projects as $project): ?>
                <div class="project-tile" style="background-image: url('<?= base_url('uploads/projects/' . ($project['gambar'] ?? '')) ?>'); background-size: cover; background-position: center;">
                    <div class="project-overlay">
                        <div class="project-title"><?= htmlspecialchars($project['nama_project']); ?></div>
                        <div class="project-actions">
                            <?php if (!empty($project['link_demo'])): ?>
                                <a href="<?= esc($project['link_demo']) ?>" target="_blank" rel="noopener noreferrer" class="project-btn demo-btn">
                                    <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i>
                                    Demo
                                </a>
                            <?php endif; ?>
                            <?php if (!empty($project['link_github'])): ?>
                                <a href="<?= esc($project['link_github']) ?>" target="_blank" rel="noopener noreferrer" class="project-btn github-btn">
                                    <i class="fa-brands fa-github" aria-hidden="true"></i>
                                    GitHub
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="section" id="contact">
        <p class="section-eyebrow">Get In Touch</p>
        <h2 class="section-title">Let's Build Something Great</h2>

        <div class="contact-content">
            <div class="contact-info">
                <div class="contact-group">
                    <h3>Email</h3>
                    <p><?= isset($profil['email']) ? htmlspecialchars($profil['email']) : 'barta.galih@example.com'; ?></p>
                </div>

                <div class="contact-group">
                    <h3>Phone</h3>
                    <p><?= isset($profil['telepon']) ? htmlspecialchars($profil['telepon']) : '+62 812 3456 7890'; ?></p>
                </div>

                <div class="contact-group">
                    <h3>Available for</h3>
                    <p>Freelance projects, kontrak kerja, atau peluang full-time. Mari kita diskusikan ide besar Anda berikutnya.</p>
                </div>
            </div>

            <form class="contact-form" method="POST" action="<?= base_url('sendmessages'); ?>" id="contactForm">
                <?php if ($session->has('success')): ?>
                    <div style="background: #2ecc71; border-left: 4px solid #2ecc71; border-radius: 8px; padding: 16px; margin-bottom: 24px; color: white;">
                        <div style="font-weight: bold; margin-bottom: 8px; display: flex; align-items: center;">
                            <span style="font-size: 18px; margin-right: 8px;"><i class="fa-solid fa-circle-check" aria-hidden="true"></i></span>
                            Berhasil!
                        </div>
                        <p><?= htmlspecialchars($session->getFlashdata('success')); ?></p>
                    </div>
                <?php endif; ?>

                <?php if ($session->has('error')): ?>
                    <div style="background: #e74c3c; border-left: 4px solid #e74c3c; border-radius: 8px; padding: 16px; margin-bottom: 24px; color: white;">
                        <div style="font-weight: bold; margin-bottom: 8px; display: flex; align-items: center;">
                            <span style="font-size: 18px; margin-right: 8px;"><i class="fa-solid fa-circle-xmark" aria-hidden="true"></i></span>
                            Error!
                        </div>
                        <p><?= htmlspecialchars($session->getFlashdata('error')); ?></p>
                    </div>
                <?php endif; ?>

                <?php if (isset($validation) && $validation->getErrors()): ?>
                    <div style="background: #ff4757; border-left: 4px solid #ff4757; border-radius: 8px; padding: 16px; margin-bottom: 24px; color: white;">
                        <div style="font-weight: bold; margin-bottom: 8px; display: flex; align-items: center;">
                            <span style="font-size: 18px; margin-right: 8px;"><i class="fa-solid fa-triangle-exclamation" aria-hidden="true"></i></span>
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

                <div class="form-group">
                    <label class="form-label">Name</label>
                    <input type="text" name="nama" class="form-input" placeholder="Nama Anda" value="<?= old('nama'); ?>" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-input" placeholder="email@anda.com" value="<?= old('email'); ?>" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Subject</label>
                    <input type="text" name="subjek" class="form-input" placeholder="Topik pesan Anda" value="<?= old('subjek'); ?>" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Message</label>
                    <textarea class="form-textarea" name="pesan" placeholder="Ceritakan tentang proyek Anda..." required><?= old('pesan'); ?></textarea>
                </div>

                <button type="submit" class="form-submit">Send Message</button>
            </form>
        </div>
    </section>

    <footer>
        <div class="footer-content">
            <p>© <?= date('Y'); ?> <?= isset($profil['nama']) ? htmlspecialchars($profil['nama']) : 'Barta Galih'; ?>. All rights reserved.</p>
            <div class="footer-links">
                <a href="#home">Home</a>
                <a href="#about">About</a>
                <a href="#projects">Projects</a>
                <a href="#contact">Contact</a>
            </div>
        </div>
    </footer>

    <script>
        const navLinks = document.querySelectorAll('.nav-links a');
        function updateActiveNav() {
            const scrollPos = window.scrollY + 100;
            navLinks.forEach(link => {
                const section = document.querySelector(link.getAttribute('href'));
                if (section) {
                    const sectionTop = section.offsetTop;
                    const sectionHeight = section.offsetHeight;
                    if (scrollPos >= sectionTop && scrollPos < sectionTop + sectionHeight) {
                        navLinks.forEach(l => l.classList.remove('active'));
                        link.classList.add('active');
                    }
                }
            });
        }
        window.addEventListener('scroll', updateActiveNav);
    </script>
</body>
</html>
