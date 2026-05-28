@extends('layout')

@section('title', 'Informations passager')

@section('styles')
<style>
    .registration-wrap {
        max-width: 560px;
        margin: 48px auto;
        padding: 0 40px;
    }

    /* ── HEADER ── */
    .registration-tag {
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: var(--blue);
        margin-bottom: 6px;
    }

    .registration-title {
        font-size: 26px;
        font-weight: 700;
        color: var(--gray-800);
        letter-spacing: -0.01em;
        margin-bottom: 6px;
    }

    .registration-subtitle {
        font-size: 14px;
        color: var(--text-muted);
        margin-bottom: 32px;
    }

    /* ── STEPS ── */
    .steps {
        display: flex;
        align-items: center;
        gap: 0;
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
    .step.active .step-num { background: var(--blue); color: white; }
    .step.inactive .step-num { background: var(--gray-100); color: var(--gray-400); }
    .step.done .step-label { color: var(--blue); }
    .step.active .step-label { color: var(--gray-800); }
    .step.inactive .step-label { color: var(--gray-400); }

    .step-sep {
        flex: 1;
        height: 1px;
        background: var(--gray-200);
        margin: 0 8px;
        min-width: 32px;
    }

    /* ── FORM CARD ── */
    .form-card {
        background: var(--white);
        border: 1px solid var(--gray-200);
        border-radius: 16px;
        padding: 32px;
        box-shadow: 0 2px 12px rgba(0,0,0,0.04);
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-size: 12px;
        font-weight: 600;
        color: var(--gray-600);
        margin-bottom: 7px;
        letter-spacing: 0.02em;
    }

    .form-group input {
        width: 100%;
        padding: 11px 14px;
        background: var(--gray-50);
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
        background: var(--white);
        box-shadow: 0 0 0 3px rgba(37,99,235,0.1);
    }

    .form-group input::placeholder { color: var(--gray-400); }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
    }

    .form-divider {
        height: 1px;
        background: var(--gray-100);
        margin: 24px 0;
    }

    .form-actions {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        margin-top: 24px;
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
        cursor: pointer;
    }

    .btn-back:hover { background: var(--gray-100); color: var(--text); }

    .btn-confirm {
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

    .btn-confirm:hover { background: #1D4ED8; box-shadow: 0 4px 16px rgba(37,99,235,0.4); }

    .form-note {
        font-size: 12px;
        color: var(--text-muted);
        text-align: center;
        margin-top: 16px;
    }
</style>
@endsection

@section('content')

<div class="registration-wrap">

    <p class="registration-tag">✈ Réservation</p>
    <h1 class="registration-title">Informations passager</h1>
    <p class="registration-subtitle">Renseignez vos coordonnées pour finaliser la réservation.</p>

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
        <div class="step active">
            <div class="step-num">3</div>
            <span class="step-label">Informations</span>
        </div>
        <div class="step-sep"></div>
        <div class="step inactive">
            <div class="step-num">4</div>
            <span class="step-label">Confirmation</span>
        </div>
    </div>

    <!-- FORM -->
    <div class="form-card">
        <form action="{{ route('recap') }}" method="POST">
            @csrf

            <div class="form-row">
                <div class="form-group">
                    <label>Prénom</label>
                    <input type="text" name="first_name" placeholder="Jean" required>
                </div>
                <div class="form-group">
                    <label>Nom</label>
                    <input type="text" name="last_name" placeholder="Dupont" required>
                </div>
            </div>

            <div class="form-group">
                <label>Adresse email</label>
                <input type="email" name="email" placeholder="jean.dupont@email.com" required>
            </div>

            <div class="form-divider"></div>

            <div class="form-actions">
                <a href="javascript:history.back()" class="btn-back">← Retour</a>
                <button type="submit" class="btn-confirm">Confirmer la réservation →</button>
            </div>
        </form>
    </div>

    <p class="form-note">🔒 Vos données sont sécurisées et ne seront pas partagées.</p>

</div>

@endsection