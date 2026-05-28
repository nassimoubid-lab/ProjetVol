@extends('layout')

@section('title', 'Recherche de vols')

@section('styles')
<style>
    /* ── HERO ── */
    .hero {
        background: linear-gradient(135deg, #1D4ED8 0%, #2563EB 50%, #3B82F6 100%);
        padding: 60px 40px;
        text-align: center;
    }

    .hero-tag {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 4px 14px;
        background: rgba(255,255,255,0.15);
        border: 1px solid rgba(255,255,255,0.25);
        border-radius: 99px;
        font-size: 11px;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: rgba(255,255,255,0.9);
        margin-bottom: 20px;
    }

    .hero-title {
        font-size: 40px;
        font-weight: 700;
        color: white;
        margin-bottom: 10px;
        letter-spacing: -0.02em;
        line-height: 1.1;
    }

    .hero-desc {
        font-size: 15px;
        color: rgba(255,255,255,0.75);
        margin-bottom: 40px;
    }

    /* ── SEARCH ── */
    .search-card {
        background: white;
        border-radius: 16px;
        padding: 28px 32px;
        max-width: 860px;
        margin: 0 auto;
        box-shadow: 0 4px 24px rgba(0,0,0,0.12);
    }

    .search-grid {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        gap: 16px;
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        color: var(--gray-400);
        margin-bottom: 6px;
    }

    .form-group select,
    .form-group input {
        width: 100%;
        padding: 10px 14px;
        background: var(--gray-50);
        border: 1px solid var(--gray-200);
        border-radius: 8px;
        color: var(--text);
        font-family: 'Inter', sans-serif;
        font-size: 14px;
        outline: none;
        transition: all 0.15s;
        appearance: none;
    }

    .form-group select:focus,
    .form-group input:focus {
        border-color: var(--blue);
        background: var(--white);
        box-shadow: 0 0 0 3px rgba(37,99,235,0.1);
    }

    .search-btn {
        width: 100%;
        padding: 12px;
        background: var(--blue);
        color: white;
        border: none;
        border-radius: 10px;
        font-family: 'Inter', sans-serif;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.15s;
        box-shadow: 0 2px 8px rgba(37,99,235,0.3);
    }

    .search-btn:hover { background: #1D4ED8; box-shadow: 0 4px 16px rgba(37,99,235,0.4); }

    /* ── MAIN CONTENT ── */
    .main-content {
        max-width: 900px;
        margin: 40px auto;
        padding: 0 40px;
    }

    .vols-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .vols-title {
        font-size: 18px;
        font-weight: 700;
        color: var(--gray-800);
    }

    .vols-count {
        font-size: 12px;
        color: var(--text-muted);
        background: var(--white);
        border: 1px solid var(--gray-200);
        padding: 4px 12px;
        border-radius: 99px;
    }

    /* ── VOL CARD ── */
    .vol-card {
        background: var(--white);
        border: 1px solid var(--gray-200);
        border-radius: 12px;
        padding: 20px 24px;
        margin-bottom: 12px;
        transition: all 0.15s;
    }

    .vol-card:hover {
        border-color: var(--blue-border);
        box-shadow: 0 4px 16px rgba(37,99,235,0.08);
        transform: translateY(-1px);
    }

    .vol-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 16px;
    }

    .vol-name {
        font-size: 14px;
        font-weight: 600;
        color: var(--gray-800);
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .vol-badge {
        font-size: 10px;
        padding: 2px 8px;
        background: var(--blue-pale);
        color: var(--blue);
        border-radius: 99px;
        font-weight: 500;
        letter-spacing: 0.04em;
    }

    .vol-price {
        font-size: 22px;
        font-weight: 700;
        color: var(--blue);
    }

    .vol-price span {
        font-size: 12px;
        font-weight: 400;
        color: var(--text-muted);
    }

    .vol-bottom {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
    }

    .vol-route {
        display: flex;
        align-items: center;
        gap: 16px;
        flex: 1;
    }

    .vol-point { min-width: 100px; }

    .vol-point-city {
        font-size: 16px;
        font-weight: 600;
        color: var(--gray-800);
        margin-bottom: 2px;
    }

    .vol-point-info {
        font-size: 12px;
        color: var(--text-muted);
    }

    .vol-connector {
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 3px;
    }

    .vol-connector-line {
        width: 100%;
        height: 1px;
        background: var(--gray-200);
        position: relative;
    }

    .vol-connector-line::before {
        content: '✈';
        position: absolute;
        top: -9px;
        left: 50%;
        transform: translateX(-50%);
        font-size: 14px;
        color: var(--blue);
        background: white;
        padding: 0 4px;
    }

    .vol-connector-label {
        font-size: 10px;
        color: var(--gray-400);
        letter-spacing: 0.06em;
        margin-top: 6px;
        text-transform: uppercase;
        font-weight: 500;
    }

    .vol-actions {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        gap: 8px;
        flex-shrink: 0;
    }

    .vol-seats {
        font-size: 12px;
        color: var(--text-muted);
    }

    .vol-seats.low { color: var(--danger); font-weight: 500; }

    .vol-form {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .qty-input {
        width: 60px;
        padding: 8px 10px;
        background: var(--gray-50);
        border: 1px solid var(--gray-200);
        border-radius: 8px;
        color: var(--text);
        font-family: 'Inter', sans-serif;
        font-size: 14px;
        outline: none;
        text-align: center;
        transition: all 0.15s;
    }

    .qty-input:focus {
        border-color: var(--blue);
        box-shadow: 0 0 0 3px rgba(37,99,235,0.1);
    }

    .add-btn {
        padding: 8px 18px;
        background: var(--blue);
        color: white;
        border: none;
        border-radius: 8px;
        font-family: 'Inter', sans-serif;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.15s;
        white-space: nowrap;
    }

    .add-btn:hover { background: #1D4ED8; }

    /* ── EMPTY ── */
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        background: var(--white);
        border: 1px solid var(--gray-200);
        border-radius: 12px;
    }

    .empty-icon { font-size: 40px; margin-bottom: 12px; opacity: 0.4; }
    .empty-title { font-size: 17px; font-weight: 600; color: var(--gray-800); margin-bottom: 6px; }
    .empty-desc { font-size: 14px; color: var(--text-muted); }
</style>
@endsection

@section('content')

<!-- HERO -->
<div class="hero">
    <div class="hero-tag">✈ Réservation en ligne</div>
    <h1 class="hero-title">Trouvez votre vol idéal</h1>
    <p class="hero-desc">Recherchez parmi nos destinations et réservez en quelques clics.</p>

    <div class="search-card">
        @if(session('ajout'))
            <div class="alert-success-custom">✓ {{ session('ajout') }}</div>
        @endif

        <form action="{{ route('search.vols') }}" method="GET">
            <div class="search-grid">
                <div class="form-group">
                    <label>Départ</label>
                    <select name="departure_airport_id">
                        <option value="">Tous les aéroports</option>
                        @foreach($airports as $airport)
                            <option value="{{ $airport->id }}" {{ request('departure_airport_id') == $airport->id ? 'selected' : '' }}>
                                {{ $airport->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Arrivée</label>
                    <select name="arrival_airport_id">
                        <option value="">Tous les aéroports</option>
                        @foreach($airports as $airport)
                            <option value="{{ $airport->id }}" {{ request('arrival_airport_id') == $airport->id ? 'selected' : '' }}>
                                {{ $airport->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Date départ</label>
                    <input type="date" name="departure_date" value="{{ request('departure_date') }}">
                </div>
                <div class="form-group">
                    <label>Date arrivée</label>
                    <input type="date" name="arrival_date" value="{{ request('arrival_date') }}">
                </div>
            </div>
            <button type="submit" class="search-btn">🔍 Rechercher des vols</button>
        </form>
    </div>
</div>

<!-- VOLS -->
<div class="main-content">
    <div class="vols-header">
        <h2 class="vols-title">Vols disponibles</h2>
        <span class="vols-count">{{ count($vols) }} vol(s) trouvé(s)</span>
    </div>

    @forelse($vols as $vol)
        <div class="vol-card">
            <div class="vol-top">
                <p class="vol-name">
                    {{ $vol->name }}
                    <span class="vol-badge">Direct</span>
                </p>
                <p class="vol-price">{{ $vol->price }} <span>€ / billet</span></p>
            </div>
            <div class="vol-bottom">
                <div class="vol-route">
                    <div class="vol-point">
                        <p class="vol-point-city">{{ $vol->airportDepart->name ?? '—' }}</p>
                        <p class="vol-point-info">{{ $vol->departure_date }} · {{ $vol->departure_time }}</p>
                    </div>
                    <div class="vol-connector">
                        <div class="vol-connector-line"></div>
                        <span class="vol-connector-label">Direct</span>
                    </div>
                    <div class="vol-point" style="text-align:right">
                        <p class="vol-point-city">{{ $vol->airportArrival->name ?? '—' }}</p>
                        <p class="vol-point-info">{{ $vol->arrival_date }} · {{ $vol->arrival_time }}</p>
                    </div>
                </div>
                <div class="vol-actions">
                    <p class="vol-seats {{ $vol->seats <= 5 ? 'low' : '' }}">
                        {{ $vol->seats <= 5 ? '⚠ ' : '' }}{{ $vol->seats }} siège(s) restant(s)
                    </p>
                    <form action="{{ route('panier') }}" method="POST" class="vol-form">
                        @csrf
                        <input type="hidden" name="vol_id" value="{{ $vol->id }}">
                        <input type="number" name="quantity" value="1" min="1" max="{{ $vol->seats }}" class="qty-input">
                        <button type="submit" class="add-btn">+ Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="empty-state">
            <div class="empty-icon">✈</div>
            <p class="empty-title">Aucun vol trouvé</p>
            <p class="empty-desc">Essayez de modifier vos critères de recherche.</p>
        </div>
    @endforelse
</div>

@endsection