@extends('layouts.app')
@section('title', 'Entrar — Kudima')

@section('content')

<section class="page-header" style="padding-bottom:0;min-height:100vh;display:flex;align-items:center;justify-content:center;">
    <div style="width:100%;max-width:420px;margin:0 auto;text-align:center;">
        <a href="/" class="logo" style="font-size:1.8rem;display:block;margin-bottom:32px;">Kudima</a>
        <h1 style="font-size:1.6rem;letter-spacing:-1px;margin-bottom:8px;">Bem-vindo de volta</h1>
        <p style="margin-bottom:32px;">Entre na sua conta para continuar.</p>

        <form method="POST" action="/api/login" style="text-align:left;">
            @csrf
            <div style="margin-bottom:16px;">
                <label style="display:block;font-size:.85rem;font-weight:600;margin-bottom:6px;color:var(--text);">Email</label>
                <input type="email" name="email" required placeholder="seu@email.com"
                    style="width:100%;padding:12px 14px;border:1px solid var(--border);border-radius:10px;font-family:inherit;font-size:.9rem;outline:none;transition:border-color .2s;"
                    onfocus="this.style.borderColor='var(--primary)'" onblur="this.style.borderColor='var(--border)'">
            </div>
            <div style="margin-bottom:24px;">
                <label style="display:block;font-size:.85rem;font-weight:600;margin-bottom:6px;color:var(--text);">Palavra-passe</label>
                <input type="password" name="password" required placeholder="••••••••"
                    style="width:100%;padding:12px 14px;border:1px solid var(--border);border-radius:10px;font-family:inherit;font-size:.9rem;outline:none;transition:border-color .2s;"
                    onfocus="this.style.borderColor='var(--primary)'" onblur="this.style.borderColor='var(--border)'">
            </div>
            <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;">Entrar</button>
        </form>

        <p style="margin-top:20px;font-size:.88rem;color:var(--text-secondary);">
            Não tem conta? <a href="/cadastro" style="color:var(--primary);font-weight:600;">Cadastrar-se</a>
        </p>
    </div>
</section>

@endsection
