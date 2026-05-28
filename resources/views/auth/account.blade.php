@extends('layoutAdmin')

@section('title', 'Tableau de bord')

@section('styles')
<style>
    .page-header {
        margin-bottom: 36px;
    }

    .page-tag {
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: var(--blue);
        margin-bottom: 6px;
    }

    .page-title {
        font-size: 26px;
        font-weight: 700;
        color: var(--gray-800);
        letter-spacing: -0.01em;
        margin-bottom: 4px;
    }

    .page-subtitle {
        font-size: 14px;
        color: var(--text-muted);
    }

    /* ── ACTION CARDS ── */
    .actions-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 16px;
        max-width: 700px;
    }

    .action-card {
        background: var(--white);
        border: 1px solid var(--gray-200);
        border-radius: 12px;
        padding: 24px;
        text-decoration: none;
        transition: all 0.15s;
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .action-card:hover {
        border-color: var(--blue-border);
        box-shadow: 0 4px 16px rgba(37,99,235,0.08);
        transform: translateY(-2px);
    }

    .action-card-icon {
        width: 44px;
        height: 44px;
        background: var(--blue-pale);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
    }

    .action-card-title {
        font-size: 15px;
        font-weight: 600;
        color: var(--gray-800);
        margin-bottom: 4px;
    }

    .action-card-desc {
        font-size: 12px;
        color: var(--text-muted);
        line-height: 1.5;
    }

    .action-card-arrow {
        font-size: 12px;
        color: var(--blue);
        font-weight: 500;
        margin-top: auto;
    }
</style>
@endsection

@section('content')

<div class="page-header">
    <p class="page-tag">🏠 Tableau de bord</p>
    <h1 class="page-title">Bonjour, @auth{{ Auth::user()->name }}@endauth 👋</h1>
    <p class="page-subtitle">Que souhaitez-vous faire aujourd'hui ?</p>
</div>

<div class="actions-grid">
    <a href="{{ url('/formVol') }}" class="action-card">
        <div class="action-card-icon">➕</div>
        <div>
            <p class="action-card-title">Ajouter un vol</p>
            <p class="action-card-desc">Créez un nouveau vol et ajoutez-le à la liste disponible.</p>
        </div>
        <span class="action-card-arrow">Accéder →</span>
    </a>

    <a href="{{ url('/modify') }}" class="action-card">
        <div class="action-card-icon">✏️</div>
        <div>
            <p class="action-card-title">Modifier / Supprimer</p>
            <p class="action-card-desc">Modifiez les informations d'un vol ou supprimez-le.</p>
        </div>
        <span class="action-card-arrow">Accéder →</span>
    </a>

    <a href="{{ url('/listpassenger') }}" class="action-card">
        <div class="action-card-icon">📋</div>
        <div>
            <p class="action-card-title">Réservations</p>
            <p class="action-card-desc">Consultez la liste complète des réservations effectuées.</p>
        </div>
        <span class="action-card-arrow">Accéder →</span>
    </a>

    <a href="{{ url('/seatstaken') }}" class="action-card">
        <div class="action-card-icon">💺</div>
        <div>
            <p class="action-card-title">Places / Vols</p>
            <p class="action-card-desc">Visualisez les places disponibles et prises par vol.</p>
        </div>
        <span class="action-card-arrow">Accéder →</span>
    </a>
</div>

@endsection