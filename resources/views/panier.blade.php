@extends('layout')

@section('title', 'Mon panier')

@section('styles')
<style>
    .panier-wrap {
        max-width: 760px;
        margin: 48px auto;
        padding: 0 40px;
    }

    /* ── HEADER ── */
    .panier-header {
        margin-bottom: 32px;
    }

    .panier-tag {
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: var(--blue);
        margin-bottom: 6px;
    }

    .panier-title {
        font-size: 26px;
        font-weight: 700;
        color: var(--gray-800);
        letter-spacing: -0.01em;
    }

    .panier-subtitle {
        font-size: 14px;
        color: var(--text-muted);
        margin-top: 4px;
    }

    /* ── ITEMS ── */
    .panier-item {
        background: var(--white);
        border: 1px solid var(--gray-200);
        border-radius: 12px;
        padding: 18px 22px;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        transition: all 0.15s;
    }

    .panier-item:hover {
        border-color: var(--blue-border);
        box-shadow: 0 2px 12px rgba(37,99,235,0.06);
    }

    .panier-item-left {
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .panier-item-icon {
        width: 42px;
        height: 42px;
        background: var(--blue-pale);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        flex-shrink: 0;
    }

    .panier-item-name {
        font-size: 15px;
        font-weight: 600;
        color: var(--gray-800);
        margin-bottom: 3px;
    }

    .panier-item-qty {
        font-size: 12px;
        color: var(--text-muted);
    }

    .panier-item-qty span {
        display: inline-block;
        background: var(--gray-100);
        border: 1px solid var(--gray-200);
        border-radius: 99px;
        padding: 1px 10px;
        font-weight: 500;
        color: var(--gray-600);
    }

    .panier-item-price {
        font-size: 18px;
        font-weight: 700;
        color: var(--blue);
        white-space: nowrap;
    }

    /* ── TOTAL ── */
    .panier-total {
        background: var(--blue-pale);
        border: 1px solid var(--blue-border);
        border-radius: 12px;
        padding: 18px 22px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 20px;
        margin-bottom: 28px;
    }

    .panier-total-label {
        font-size: 14px;
        font-weight: 600;
        color: var(--gray-600);
    }

    .panier-total-value {
        font-size: 24px;
        font-weight: 700;
        color: var(--blue);
    }

    /* ── ACTIONS ── */
    .panier-actions {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
    }

    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 10px 20px;
        background: var(--white);
        border: 1px solid var(--gray-200);
        border-radius: 8px;
        font-family: 'Inter', sans-serif;
        font-size: 13px;
        font-weight: 500;
        color: var(--gray-600);
        text-decoration: none;
        transition: all 0.15s;
    }

    .btn-back:hover { background: var(--gray-100); color: var(--text); }

    .btn-reserve {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 11px 28px;
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
    }

    .btn-reserve:hover { background: #1D4ED8; box-shadow: 0 4px 16px rgba(37,99,235,0.4); }

    /* ── EMPTY ── */
    .panier-empty {
        background: var(--white);
        border: 1px solid var(--gray-200);
        border-radius: 12px;
        padding: 60px 20px;
        text-align: center;
        margin-bottom: 28px;
    }

    .panier-empty-icon { font-size: 40px; margin-bottom: 12px; opacity: 0.35; }
    .panier-empty-title { font-size: 17px; font-weight: 600; color: var(--gray-800); margin-bottom: 6px; }
    .panier-empty-desc { font-size: 14px; color: var(--text-muted); margin-bottom: 20px; }

    .btn-discover {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 10px 22px;
        background: var(--blue);
        color: white;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        transition: background 0.15s;
    }

    .btn-discover:hover { background: #1D4ED8; }
</style>
@endsection

@section('content')

<div class="panier-wrap">

    <div class="panier-header">
        <p class="panier-tag">🛒 Récapitulatif</p>
        <h1 class="panier-title">Mon panier</h1>
        <p class="panier-subtitle">Vérifiez vos vols sélectionnés avant de confirmer.</p>
    </div>

    @php $total = 0; @endphp

    @forelse($list as $element)
        <div class="panier-item">
            <div class="panier-item-left">
                <div class="panier-item-icon">✈</div>
                <div>
                    <p class="panier-item-name">{{ $element->panierVolName->name }}</p>
                    <p class="panier-item-qty">
                        Quantité : <span>{{ $element->quantite }} billet(s)</span>
                    </p>
                </div>
            </div>
            <p class="panier-item-price">{{ $element->panierVolName->price * $element->quantite }} €</p>
        </div>

        @php $total += $element->panierVolName->price * $element->quantite; @endphp

    @empty
        <div class="panier-empty">
            <div class="panier-empty-icon">🛒</div>
            <p class="panier-empty-title">Votre panier est vide</p>
            <p class="panier-empty-desc">Ajoutez des vols depuis la page d'accueil pour commencer.</p>
            <a href="{{ url('/') }}" class="btn-discover">✈ Découvrir les vols</a>
        </div>
    @endforelse

    @if(count($list) > 0)
        <div class="panier-total">
            <span class="panier-total-label">Total à régler</span>
            <span class="panier-total-value">{{ $total }} €</span>
        </div>
    @endif

    <div class="panier-actions">
        <a href="{{ url('/') }}" class="btn-back">← Retour aux vols</a>
        @if(count($list) > 0)
            <form action="{{ route('registration') }}" method="POST" style="margin:0">
                @csrf
                <button type="submit" class="btn-reserve">✓ Réserver maintenant</button>
            </form>
        @endif
    </div>

</div>

@endsection