<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>RayNass Air Compagny</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-5" style="padding-top: 15px; padding-bottom: 15px;">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <i class="bi bi-airplane" style="font-size: 1.5rem; margin-right: 8px;"></i> 
                <h2 class="h4 mb-0">RayNass Air Compagny</h2>
            </a>

            <div class="d-flex align-items-center gap-2">
                <a href="{{ url('/login') }}" class="btn btn-secondary btn-md d-flex align-items-center gap-1">
                    <i class="bi bi-person-circle"></i> 
                    <span class="d-none d-sm-inline">Se connecter</span>
                </a>

                <form action="{{ route('showpanier') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success btn-md rounded-pill shadow-sm d-flex align-items-center gap-1">
                        <i class="bi bi-cart-fill"></i> 
                        <span class="d-none d-sm-inline">Voir mon panier</span>
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <footer class="text-center mt-5 mb-3 text-muted">
        2025 Compagnie Aérienne
    </footer>
</body>
</html>
