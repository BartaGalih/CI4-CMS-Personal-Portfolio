<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/design-tokens.css') ?>">
    <style>
        :root {
            --clr-primary: var(--color-electric-signal);
            --clr-secondary: var(--color-snow);
        }

        body {
            background: linear-gradient(135deg, var(--color-void) 0%, #0a0a1a 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: var(--font-untitled-sans);
        }

        .login-container {
            width: 100%;
            max-width: 420px;
            padding: 20px;
        }

        .login-card {
            background: var(--color-graphite);
            border: 1px solid var(--color-steel-border);
            border-radius: var(--radius-card);
            padding: 48px 40px;
            box-shadow: var(--shadow-subtle);
            backdrop-filter: blur(10px);
        }

        .login-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .login-icon {
            font-size: 3rem;
            color: var(--color-electric-signal);
            margin-bottom: 16px;
            display: inline-block;
        }

        .login-title {
            font-family: var(--font-aeonikpro);
            font-size: 28px;
            font-weight: 500;
            color: var(--color-glacier);
            margin: 0;
            letter-spacing: 1px;
        }

        .login-subtitle {
            font-size: 14px;
            color: var(--color-fog);
            margin-top: 8px;
            letter-spacing: 0.05em;
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-label {
            font-family: var(--font-dotdigital);
            font-size: 12px;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--color-fog);
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .form-input {
            width: 100%;
            background: var(--color-void);
            border: 1px solid var(--color-steel-border);
            border-radius: var(--radius-input);
            color: var(--color-moonlight);
            padding: 12px 14px;
            font-size: 14px;
            font-family: var(--font-untitled-sans);
            transition: all 0.2s ease;
        }

        .form-input::placeholder {
            color: var(--color-fog);
        }

        .form-input:focus {
            outline: none;
            border-color: var(--color-electric-signal);
            background: var(--color-void);
            box-shadow: 0 0 0 3px rgba(102, 58, 243, 0.1);
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 13px;
            margin-bottom: 28px;
        }

        .remember-forgot label {
            margin: 0;
            display: flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
            color: var(--color-moonlight);
        }

        .remember-forgot a {
            color: var(--color-electric-signal);
            text-decoration: none;
            transition: opacity 0.2s ease;
        }

        .remember-forgot a:hover {
            opacity: 0.8;
        }

        input[type="checkbox"] {
            accent-color: var(--color-electric-signal);
            cursor: pointer;
            width: 14px;
            height: 14px;
        }

        .login-button {
            width: 100%;
            background: var(--color-electric-signal);
            color: #ffffff;
            border: none;
            border-radius: 6px;
            padding: 12px 16px;
            font-family: var(--font-dotdigital);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: var(--shadow-sm);
        }

        .login-button:hover {
            opacity: 0.9;
            box-shadow: var(--shadow-md);
            background: none;
            border: 1px solid var(--color-electric-signal);
        }

        .login-button:active {
            transform: translateY(0);
        }

        .alert-message {
            background: rgba(228, 109, 76, 0.1);
            border: 1px solid var(--color-electric-signal);
            border-radius: var(--radius-badge);
            color: var(--color-electric-signal);
            padding: 12px 14px;
            margin-bottom: 24px;
            font-size: 13px;
            display: none;
            animation: slideDown 0.3s ease-out;
        }

        .alert-message.show {
            display: block;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .footer-text {
            text-align: center;
            margin-top: 28px;
            font-size: 12px;
            color: var(--color-fog);
        }

        .footer-text a {
            color: var(--color-electric-signal);
            text-decoration: none;
            transition: opacity 0.2s ease;
        }

        .footer-text a:hover {
            opacity: 0.8;
        }

        /* Loading animation */
        .spinner {
            display: none;
            width: 16px;
            height: 16px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-top-color: #ffffff;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
            margin-right: 8px;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .login-button:disabled {
            opacity: 0.7;
            cursor: not-allowed;
        }

        .login-button:disabled .spinner {
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="login-icon">
                    <i class="fas fa-lock"></i>
                </div>
                <h1 class="login-title">Admin Login</h1>
                <p class="login-subtitle">MASUK KE PANEL ADMIN</p>
            </div>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert-message show">
                    <i class="fas fa-exclamation-circle" style="margin-right: 8px;"></i>
                    <?= htmlspecialchars(session()->getFlashdata('error')) ?>
                </div>
            <?php endif; ?>

            <form method="POST" id="loginForm">
                <div class="form-group">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-input" id="username"name="username"placeholder="Masukkan username"requiredautocomplete="username">
                </div>

                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-input" id="password"name="password"placeholder="Masukkan password"requiredautocomplete="current-password">
                </div>

                <button type="submit" class="login-button" id="submitBtn">
                    Masuk
                </button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simple form validation and submission
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const username = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value.trim();
            const submitBtn = document.getElementById('submitBtn');

            if (!username || !password) {
                e.preventDefault();
                alert('Username dan password harus diisi');
                return false;
            }

            // Show loading state
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="spinner"></span>Memproses...';
        });

        // Focus effects for better UX
        document.querySelectorAll('.form-input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.opacity = '1';
            });
        });
    </script>
</body>
</html>

