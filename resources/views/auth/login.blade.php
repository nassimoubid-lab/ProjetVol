<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RayNass Air — Connexion</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        :root {
            --blue: #2563EB;
            --blue-light: #3B82F6;
            --blue-pale: #EFF6FF;
            --blue-border: #BFDBFE;
            --gray-50: #F8FAFC;
            --gray-100: #F1F5F9;
            --gray-200: #E2E8F0;
            --gray-400: #94A3B8;
            --gray-600: #475569;
            --gray-800: #1E293B;
            --white: #FFFFFF;
            --text: #1E293B;
            --text-muted: #64748B;
            --danger: #DC2626;
            --danger-bg: #FEF2F2;
        }

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        /* ── GAUCHE ── */
        .left {
            background: linear-gradient(135deg, #1D4ED8 0%, #2563EB 50%, #3B82F6 100%);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 48px;
            position: relative;
            overflow: hidden;
        }

        .left::before {
            content: '';
            position: absolute;
            top: -100px; right: -100px;
            width: 400px; height: 400px;
            border-radius: 50%;
            background: rgba(255,255,255,0.05);
        }

        .left::after {
            content: '';
            position: absolute;
            bottom: -80px; left: -80px;
            width: 300px; height: 300px;
            border-radius: 50%;
            background: rgba(255,255,255,0.04);
        }

        .left-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            position: relative;
            z-index: 2;
        }

        .left-logo-icon {
            width: 36px;
            height: 36px;
            background: rgba(255,255,255,0.2);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .left-logo-name {
            font-size: 16px;
            font-weight: 700;
            color: white;
        }

        .left-logo-sub {
            font-size: 10px;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.6);
            display: block;
        }

        .left-content {
            position: relative;
            z-index: 2;
        }

        .left-tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 12px;
            background: rgba(255,255,255,0.15);
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 99px;
            font-size: 11px;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.9);
            margin-bottom: 20px;
        }

        .left-title {
            font-size: 36px;
            font-weight: 700;
            color: white;
            line-height: 1.15;
            margin-bottom: 14px;
            letter-spacing: -0.02em;
        }

        .left-desc {
            font-size: 14px;
            color: rgba(255,255,255,0.65);
            line-height: 1.7;
            max-width: 320px;
        }

        .left-stats {
            display: flex;
            gap: 32px;
            position: relative;
            z-index: 2;
        }

        .left-stat-value {
            font-size: 24px;
            font-weight: 700;
            color: white;
            line-height: 1;
            margin-bottom: 4px;
        }

        .left-stat-label {
            font-size: 11px;
            color: rgba(255,255,255,0.55);
        }

        /* ── DROITE ── */
        .right {
            background: var(--gray-50);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 48px;
        }

        .login-box {
            width: 100%;
            max-width: 380px;
        }

        .login-title {
            font-size: 24px;
            font-weight: 700;
            color: var(--gray-800);
            margin-bottom: 6px;
            letter-spacing: -0.01em;
        }

        .login-subtitle {
            font-size: 14px;
            color: var(--text-muted);
            margin-bottom: 32px;
        }

        /* ERREUR */
        .error-msg {
            background: var(--danger-bg);
            border: 1px solid #FECACA;
            color: var(--danger);
            padding: 10px 14px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 20px;
        }

        /* FORM */
        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: var(--gray-600);
            margin-bottom: 7px;
        }

        .form-group input {
            width: 100%;
            padding: 11px 14px;
            background: var(--white);
            border: 1px solid var(--gray-200);
            border-radius: 8px;
            color: var(--text);
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            outline: none;
            transition: all 0.15s;
        }

        .form-group input:focus {
            border-color: var(--blue);
            box-shadow: 0 0 0 3px rgba(37,99,235,0.1);
        }

        .form-group input.is-invalid { border-color: var(--danger); }

        .form-group input::placeholder { color: var(--gray-400); }

        .invalid-feedback {
            font-size: 12px;
            color: var(--danger);
            margin-top: 5px;
            display: block;
        }

        .submit-btn {
            width: 100%;
            padding: 12px;
            background: var(--blue);
            color: white;
            border: none;
            border-radius: 8px;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.15s;
            box-shadow: 0 2px 8px rgba(37,99,235,0.3);
            margin-top: 8px;
        }

        .submit-btn:hover { background: #1D4ED8; box-shadow: 0 4px 16px rgba(37,99,235,0.4); }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 13px;
            color: var(--text-muted);
            text-decoration: none;
            transition: color 0.15s;
        }

        .back-link:hover { color: var(--blue); }
    </style>
</head>
<body>

<!-- GAUCHE -->
<div class="left">
    <div class="left-logo">
        <div class="left-logo-icon">✈</div>
        <div>
            <span class="left-logo-name">RayNass Air</span>
            <span class="left-logo-sub">Administration</span>
        </div>
    </div>

    <div class="left-content">
        <p class="left-tag">🔒 Espace privé</p>
        <h1 class="left-title">Panneau<br>d'administration</h1>
        <p class="left-desc">
            Gérez vos vols, consultez les réservations et administrez votre compagnie aérienne depuis cet espace sécurisé.
        </p>
    </div>

    <div class="left-stats">
        <div>
            <p class="left-stat-value">Vols</p>
            <p class="left-stat-label">Gestion complète</p>
        </div>
        <div>
            <p class="left-stat-value">Réservations</p>
            <p class="left-stat-label">Suivi en temps réel</p>
        </div>
    </div>
</div>

<!-- DROITE -->
<div class="right">
    <div class="login-box">

        <h2 class="login-title">Connexion</h2>
        <p class="login-subtitle">Accédez à votre espace administrateur.</p>

        @error('invalid')
            <div class="error-msg">{{ $message }}</div>
        @enderror

        @if(session('success'))
            <div style="background:#ECFDF5; border:1px solid #A7F3D0; color:#059669; padding:10px 14px; border-radius:8px; font-size:13px; margin-bottom:20px;">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('auth.login') }}">
            @csrf

            <div class="form-group">
                <label>Adresse e-mail</label>
                <input type="email" name="email" value="{{ old('email') }}"
                       placeholder="admin@raynass.fr"
                       class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
                       required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Mot de passe</label>
                <input type="password" name="password"
                       placeholder="••••••••"
                       class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
                       required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="submit-btn">Se connecter →</button>
        </form>

        <a href="{{ url('/') }}" class="back-link">← Retour au site</a>

    </div>
</div>

</body>
</html>