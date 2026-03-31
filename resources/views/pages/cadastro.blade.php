@extends('layouts.app')
@section('title', 'Cadastrar-se — Kudima')

@section('content')

<section class="page-header" style="padding-bottom:0;min-height:100vh;display:flex;align-items:center;justify-content:center;">
    <div style="width:100%;max-width:420px;margin:0 auto;text-align:center;">
        <a href="/" class="logo" style="font-size:1.8rem;display:block;margin-bottom:32px;">Kudima</a>
        <h1 style="font-size:1.6rem;letter-spacing:-1px;margin-bottom:8px;">Criar uma conta</h1>
        <p style="margin-bottom:32px;">Cadastre-se como profissional e comece a receber pedidos.</p>

        <form method="POST" action="/api/register" style="text-align:left;">
            @csrf
            <div style="margin-bottom:16px;">
                <label style="display:block;font-size:.85rem;font-weight:600;margin-bottom:6px;color:var(--text);">Nome completo</label>
                <input type="text" name="name" required placeholder="Seu nome"
                    style="width:100%;padding:12px 14px;border:1px solid var(--border);border-radius:10px;font-family:inherit;font-size:.9rem;outline:none;transition:border-color .2s;"
                    onfocus="this.style.borderColor='var(--primary)'" onblur="this.style.borderColor='var(--border)'">
            </div>
            <div style="margin-bottom:16px;">
                <label style="display:block;font-size:.85rem;font-weight:600;margin-bottom:6px;color:var(--text);">Email</label>
                <input type="email" name="email" required placeholder="seu@email.com"
                    style="width:100%;padding:12px 14px;border:1px solid var(--border);border-radius:10px;font-family:inherit;font-size:.9rem;outline:none;transition:border-color .2s;"
                    onfocus="this.style.borderColor='var(--primary)'" onblur="this.style.borderColor='var(--border)'">
            </div>
            <div style="margin-bottom:16px;">
                <label style="display:block;font-size:.85rem;font-weight:600;margin-bottom:6px;color:var(--text);">Telemóvel</label>
                <input type="tel" name="phone" placeholder="+244 9XX XXX XXX"
                    style="width:100%;padding:12px 14px;border:1px solid var(--border);border-radius:10px;font-family:inherit;font-size:.9rem;outline:none;transition:border-color .2s;"
                    onfocus="this.style.borderColor='var(--primary)'" onblur="this.style.borderColor='var(--border)'">
            </div>
            <div style="margin-bottom:16px;">
                <label style="display:block;font-size:.85rem;font-weight:600;margin-bottom:6px;color:var(--text);">Palavra-passe</label>
                <input type="password" name="password" required placeholder="Mínimo 8 caracteres"
                    style="width:100%;padding:12px 14px;border:1px solid var(--border);border-radius:10px;font-family:inherit;font-size:.9rem;outline:none;transition:border-color .2s;"
                    onfocus="this.style.borderColor='var(--primary)'" onblur="this.style.borderColor='var(--border)'">
            </div>
            <div style="margin-bottom:16px;">
                <label style="display:block;font-size:.85rem;font-weight:600;margin-bottom:6px;color:var(--text);">Confirmar palavra-passe</label>
                <input type="password" name="password_confirmation" required placeholder="Confirme a palavra-passe"
                    style="width:100%;padding:12px 14px;border:1px solid var(--border);border-radius:10px;font-family:inherit;font-size:.9rem;outline:none;transition:border-color .2s;"
                    onfocus="this.style.borderColor='var(--primary)'" onblur="this.style.borderColor='var(--border)'">
            </div>
            <div style="margin-bottom:16px;">
                <label style="display:block;font-size:.85rem;font-weight:600;margin-bottom:6px;color:var(--text);">Tipo de conta</label>
                <select name="role" style="width:100%;padding:12px 14px;border:1px solid var(--border);border-radius:10px;font-family:inherit;font-size:.9rem;outline:none;background:#fff;transition:border-color .2s;"
                    onfocus="this.style.borderColor='var(--primary)'" onblur="this.style.borderColor='var(--border)'">
                    <option value="professional">Profissional</option>
                    <option value="client">Cliente</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;margin-top:8px;">Criar Conta</button>
        </form>

        <p style="margin-top:20px;font-size:.88rem;color:var(--text-secondary);">
            Já tem conta? <a href="/login" style="color:var(--primary);font-weight:600;">Entrar</a>
        </p>
    </div>
</section>

@endsection
