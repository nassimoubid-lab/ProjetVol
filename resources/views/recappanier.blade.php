@extends('layout')

@section('title', 'Confirmation de réservation')

@section('styles')
<style>
    .recap-wrap {
        max-width: 660px;
        margin: 48px auto;
        padding: 0 40px;
    }

    /* ── STEPS ── */
    .steps {
        display: flex;
        align-items: center;
        margin-bottom: 36px;
    }

    .step {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 12px;
        font-weight: 500;
    }

    .step-num {
        width: 26px;
        height: 26px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 11px;
        font-weight: 700;
    }

    .step.done .step-num { background: var(--blue); color: white; }
    .step.done .step-label { color: var(--blue); }
    .step-sep { flex: 1; height: 1px; background: var(--blue); margin: 0 8px; min-width: 32px; }

    /* ── SUCCESS BANNER ── */
    .success-banner {
        background: linear-gradient(135deg, #059669, #10B981);
        border-radius: 14px;
        padding: 28px 32px;
        text-align: center;
        margin-bottom: 28px;
        color: white;
    }

    .success-icon {
        font-size: 36px;
        margin-bottom: 10px;
    }

    .success-title {
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 6px;
    }

    .success-desc {
        font-size: 14px;
        opacity: 0.85;
    }

    /* ── SECTION TITLE ── */
    .section-title {
        font-size: 15px;
        font-weight: 700;
        color: var(--gray-800);
        margin-bottom: 14px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    /* ── VOL CARD ── */
    .vol-recap-card {
        background: var(--white);
        border: 1px solid var(--gray-200);
        border-radius: 12px;
        padding: 20px 24px;
        margin-bottom: 12px;
        transition: all 0.15s;
    }

    .vol-recap-card:hover {
        border-color: var(--blue-border);
        box-shadow: 0 2px 12px rgba(37,99,235,0.06);
    }

    .vol-recap-name {
        font-size: 15px;
        font-weight: 700;
        color: var(--gray-800);
        margin-bottom: 14px;
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
    }

    .vol-route {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 14px;
    }

    .vol-point { min-width: 120px; }

    .vol-point-city {
        font-size: 15px;
        font-weight: 600;
        color: var(--gray-800);
        margin-bottom: 2px;
    }

    .vol-point-info { font-size: 12px; color: var(--text-muted); }

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
        font-size: 13px;
        color: var(--blue);
        background: white;
        padding: 0 4px;
    }

    .vol-connector-label {
        font-size: 10px;
        color: var(--gray-400);
        text-transform: uppercase;
        font-weight: 500;
        margin-top: 6px;
        letter-spacing: 0.06em;
    }

    .vol-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 12px;
        border-top: 1px solid var(--gray-100);
    }

    .vol-places {
        font-size: 12px;
        color: var(--text-muted);
    }

    .vol-places strong { color: var(--gray-800); }

    /* ── BACK BUTTON ── */
    .recap-actions {
        text-align: center;
        margin-top: 32px;
    }

    .btn-home {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 28px;
        background: var(--blue);
        color: white;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.15s;
        box-shadow: 0 2px 8px rgba(37,99,235,0.3);
    }

    .btn-home:hover { background: #1D4ED8; box-shadow: 0 4px 16px rgba(37,99,235,0.4); }
</style>
@endsection

@section('content')

<div class="recap-wrap">

    <!-- ÉTAPES -->
    <div class="steps">
        <div class="step done">
            <div class="step-num">✓</div>
            <span class="step-label">Vols</span>
        </div>
        <div class="step-sep"></div>
        <div class="step done">
            <div class="step-num">✓</div>
            <span class="step-label">Panier</span>
        </div>
        <div class="step-sep"></div>
        <div class="step done">
            <div class="step-num">✓</div>
            <span class="step-label">Informations</span>
        </div>
        <div class="step-sep"></div>
        <div class="step done">
            <div class="step-num">✓</div>
            <span class="step-label">Confirmation</span>
        </div>
    </div>

    <!-- BANNER -->
    <div class="success-banner">
        <div class="success-icon">🎉</div>
        <p class="success-title">Réservation confirmée !</p>
        <p class="success-desc">
            Merci {{ $reservations->first()->resPassenger->first_name }}, vos billets ont bien été réservés.
        </p>
    </div>

    <!-- VOLS -->
    <p class="section-title">✈ Détail de vos vols</p>

    @php $reservationsGrouped = $reservations->groupBy('resVol.id'); @endphp

    @foreach($reservationsGrouped as $volReservations)
        @php
            $vol = $volReservations->first()->resVol;
            $nombrePlaces = $volReservations->count();
        @endphp

        <div class="vol-recap-card">
            <p class="vol-recap-name">
                {{ $vol->name }}
                <span class="vol-badge">Direct</span>
            </p>
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
            <div class="vol-footer">
                <p class="vol-places">Places réservées : <strong>{{ $nombrePlaces }}</strong></p>
                <span style="font-size:12px; color:var(--success); font-weight:600;">✓ Confirmé</span>
            </div>
        </div>
    @endforeach

    <div class="recap-actions">
        <a href="{{ url('/') }}" class="btn-home">← Retour à la billetterie</a>
    </div>

</div>

@endsection