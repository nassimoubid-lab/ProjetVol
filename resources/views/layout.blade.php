<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RayNass Air — @yield('title')</title>
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
            --success: #059669;
            --success-bg: #ECFDF5;
            --danger: #DC2626;
            --danger-bg: #FEF2F2;
        }

        html { scroll-behavior: smooth; }

        body {
            background: var(--gray-50);
            color: var(--text);
            font-family: 'Inter', sans-serif;
            font-weight: 400;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ── NAV ── */
        nav {
            background: var(--white);
            border-bottom: 1px solid var(--gray-200);
            padding: 0 40px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }

        .nav-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .nav-brand-icon {
            width: 34px;
            height: 34px;
            background: var(--blue);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            color: white;
        }

        .nav-brand-name {
            font-size: 15px;
            font-weight: 700;
            color: var(--gray-800);
            letter-spacing: -0.01em;
        }

        .nav-brand-sub {
            font-size: 10px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--blue);
            display: block;
            line-height: 1;
            font-weight: 500;
        }

        .nav-actions { display: flex; align-items: center; gap: 8px; }

        .btn-nav {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 16px;
            border-radius: 8px;
            font-family: 'Inter', sans-serif;
            font-size: 13px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.15s;
            cursor: pointer;
            border: none;
        }

        .btn-nav-ghost {
            background: transparent;
            color: var(--gray-600);
            border: 1px solid var(--gray-200);
        }

        .btn-nav-ghost:hover { background: var(--gray-100); color: var(--text); }

        .btn-nav-primary {
            background: var(--blue);
            color: white;
            box-shadow: 0 1px 3px rgba(37,99,235,0.3);
        }

        .btn-nav-primary:hover { background: var(--blue-light); }

        /* ── CONTENT ── */
        .content { flex: 1; }

        /* ── FOOTER ── */
        footer {
            background: var(--white);
            border-top: 1px solid var(--gray-200);
            padding: 20px 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .footer-brand { font-size: 13px; font-weight: 600; color: var(--gray-600); }
        .footer-copy { font-size: 12px; color: var(--gray-400); }

        /* ── ALERTS ── */
        .alert-success-custom {
            background: var(--success-bg);
            border: 1px solid #A7F3D0;
            color: var(--success);
            padding: 10px 16px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 20px;
        }

        .alert-danger-custom {
            background: var(--danger-bg);
            border: 1px solid #FECACA;
            color: var(--danger);
            padding: 10px 16px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 20px;
        }
    </style>
    @yield('styles')
</head>
<body>

<nav>
    <a href="/" class="nav-brand">
        <div class="nav-brand-icon">✈</div>
        <div>
            <span class="nav-brand-name">RayNass Air</span>
            <span class="nav-brand-sub">Company</span>
        </div>
    </a>
    <div class="nav-actions">
        <form action="{{ route('showpanier') }}" method="POST" style="margin:0">
            @csrf
            <button type="submit" class="btn-nav btn-nav-primary">🛒 Mon panier</button>
        </form>
    </div>
</nav>

<div class="content">
    @yield('content')
</div>

<footer>
    <span class="footer-brand">RayNass Air Company</span>
    <span class="footer-copy">© {{ date('Y') }} — Tous droits réservés</span>
    <a href="{{ url('/login') }}" style="font-size:11px; color:var(--gray-400); text-decoration:none; transition: color 0.15s;" onmouseover="this.style.color='var(--gray-600)'" onmouseout="this.style.color='var(--gray-400)'">Administration</a>
</footer>

</body>
</html>