<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RayNass Air — Admin</title>
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
            --success: #059669;
            --success-bg: #ECFDF5;
            --sidebar-width: 240px;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--gray-50);
            color: var(--text);
            min-height: 100vh;
            display: flex;
        }

        /* ── SIDEBAR ── */
        .sidebar {
            width: var(--sidebar-width);
            min-height: 100vh;
            background: var(--white);
            border-right: 1px solid var(--gray-200);
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
            position: sticky;
            top: 0;
            height: 100vh;
        }

        .sidebar-logo {
            padding: 20px 24px;
            border-bottom: 1px solid var(--gray-200);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar-logo-icon {
            width: 34px;
            height: 34px;
            background: var(--blue);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            color: white;
            flex-shrink: 0;
        }

        .sidebar-logo-name {
            font-size: 14px;
            font-weight: 700;
            color: var(--gray-800);
            line-height: 1;
            margin-bottom: 2px;
        }

        .sidebar-logo-sub {
            font-size: 10px;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--blue);
            font-weight: 500;
        }

        .sidebar-user {
            padding: 16px 24px;
            border-bottom: 1px solid var(--gray-100);
            background: var(--gray-50);
        }

        .sidebar-user-label {
            font-size: 10px;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--gray-400);
            margin-bottom: 2px;
            font-weight: 500;
        }

        .sidebar-user-name {
            font-size: 13px;
            font-weight: 600;
            color: var(--gray-800);
        }

        .sidebar-nav {
            flex: 1;
            padding: 16px 12px;
        }

        .sidebar-section-label {
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--gray-400);
            padding: 0 12px;
            margin-bottom: 6px;
            margin-top: 16px;
        }

        .sidebar-section-label:first-child { margin-top: 0; }

        .sidebar-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 12px;
            border-radius: 8px;
            color: var(--gray-600);
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.15s;
            margin-bottom: 2px;
        }

        .sidebar-item:hover { background: var(--gray-100); color: var(--text); }
        .sidebar-item.active { background: var(--blue-pale); color: var(--blue); }
        .sidebar-item .icon { font-size: 15px; width: 18px; text-align: center; }

        .sidebar-bottom {
            padding: 16px 12px;
            border-top: 1px solid var(--gray-200);
        }

        .logout-btn {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 9px;
            background: var(--danger-bg);
            border: 1px solid #FECACA;
            border-radius: 8px;
            color: var(--danger);
            font-family: 'Inter', sans-serif;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.15s;
        }

        .logout-btn:hover { background: #FEE2E2; }

        /* ── MAIN ── */
        .main {
            flex: 1;
            padding: 40px 48px;
            min-width: 0;
        }

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

<!-- SIDEBAR -->
<aside class="sidebar">
    <div class="sidebar-logo">
        <div class="sidebar-logo-icon">✈</div>
        <div>
            <p class="sidebar-logo-name">RayNass Air</p>
            <p class="sidebar-logo-sub">Administration</p>
        </div>
    </div>

    @auth
    <div class="sidebar-user">
        <p class="sidebar-user-label">Connecté en tant que</p>
        <p class="sidebar-user-name">{{ Auth::user()->name }}</p>
    </div>
    @endauth

    <nav class="sidebar-nav">
        <p class="sidebar-section-label">Tableau de bord</p>
        <a href="{{ route('auth.compte') }}" class="sidebar-item {{ request()->is('compte') ? 'active' : '' }}">
            <span class="icon">🏠</span> Accueil
        </a>

        <p class="sidebar-section-label">Gestion des vols</p>
        <a href="{{ url('/formVol') }}" class="sidebar-item {{ request()->is('formVol') ? 'active' : '' }}">
            <span class="icon">➕</span> Ajouter un vol
        </a>
        <a href="{{ url('/modify') }}" class="sidebar-item {{ request()->is('modify') ? 'active' : '' }}">
            <span class="icon">✏️</span> Modifier / Supprimer
        </a>

        <p class="sidebar-section-label">Données</p>
        <a href="{{ url('/listpassenger') }}" class="sidebar-item {{ request()->is('listpassenger') ? 'active' : '' }}">
            <span class="icon">📋</span> Réservations
        </a>
        <a href="{{ url('/seatstaken') }}" class="sidebar-item {{ request()->is('seatstaken') ? 'active' : '' }}">
            <span class="icon">💺</span> Places / Vols
        </a>

        <p class="sidebar-section-label">Site</p>
        <a href="{{ url('/') }}" class="sidebar-item">
            <span class="icon">🌐</span> Voir le site
        </a>
    </nav>

    <div class="sidebar-bottom">
        <form action="{{ route('auth.logout') }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="logout-btn">🚪 Se déconnecter</button>
        </form>
    </div>
</aside>

<!-- MAIN -->
<main class="main">
    @yield('content')
</main>

</body>
</html>