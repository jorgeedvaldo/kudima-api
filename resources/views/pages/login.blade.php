@extends('layouts.app')
@section('title', 'Entrar — Kudima')

@section('content')

<section class="page-header" style="padding-bottom:0;min-height:100vh;display:flex;align-items:center;justify-content:center;">
    <div style="width:100%;max-width:420px;margin:0 auto;text-align:center;">
        <a href="/" class="logo" style="font-size:1.8rem;display:block;margin-bottom:32px;">Kudima</a>

        <!-- Formulário -->
        <div id="login-form-container">
            <h1 style="font-size:1.6rem;letter-spacing:-1px;margin-bottom:8px;">Bem-vindo de volta</h1>
            <p style="margin-bottom:32px;color:var(--text-secondary);">Entre na sua conta para continuar.</p>

            <div id="login-error" style="display:none;background:#fef2f2;border:1px solid #fecaca;color:#dc2626;padding:12px 16px;border-radius:10px;font-size:.88rem;margin-bottom:16px;text-align:left;"></div>

            <form id="login-form" style="text-align:left;">
                <div style="margin-bottom:16px;">
                    <label style="display:block;font-size:.85rem;font-weight:600;margin-bottom:6px;color:var(--text);">Email</label>
                    <input type="email" id="login-email" required placeholder="seu@email.com"
                        style="width:100%;padding:12px 14px;border:1px solid var(--border);border-radius:10px;font-family:inherit;font-size:.9rem;outline:none;transition:border-color .2s;"
                        onfocus="this.style.borderColor='var(--primary)'" onblur="this.style.borderColor='var(--border)'">
                </div>
                <div style="margin-bottom:24px;">
                    <label style="display:block;font-size:.85rem;font-weight:600;margin-bottom:6px;color:var(--text);">Palavra-passe</label>
                    <input type="password" id="login-password" required placeholder="••••••••"
                        style="width:100%;padding:12px 14px;border:1px solid var(--border);border-radius:10px;font-family:inherit;font-size:.9rem;outline:none;transition:border-color .2s;"
                        onfocus="this.style.borderColor='var(--primary)'" onblur="this.style.borderColor='var(--border)'">
                </div>
                <button type="submit" id="login-submit" class="btn btn-primary" style="width:100%;justify-content:center;">Entrar</button>
            </form>

            <p style="margin-top:20px;font-size:.88rem;color:var(--text-secondary);">
                Não tem conta? <a href="/cadastro" style="color:var(--primary);font-weight:600;">Cadastrar-se</a>
            </p>
        </div>

        <!-- Sucesso -->
        <div id="login-success" style="display:none;">
            <div style="width:64px;height:64px;border-radius:50%;background:var(--primary);color:#fff;display:flex;align-items:center;justify-content:center;font-size:1.8rem;margin:0 auto 24px;">✓</div>
            <h1 style="font-size:1.6rem;letter-spacing:-1px;margin-bottom:8px;">Login bem-sucedido!</h1>
            <p style="color:var(--text-secondary);margin-bottom:8px;">Bem-vindo(a) de volta, <strong id="login-success-name"></strong>.</p>
            <p style="color:var(--text-secondary);margin-bottom:32px;font-size:.9rem;">Está agora autenticado na plataforma Kudima.</p>
            <a href="/" class="btn btn-primary" style="justify-content:center;">Ir para o Início</a>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
document.getElementById('login-form').addEventListener('submit', async function(e) {
    e.preventDefault();
    const errorEl = document.getElementById('login-error');
    const submitBtn = document.getElementById('login-submit');
    errorEl.style.display = 'none';
    submitBtn.disabled = true;
    submitBtn.textContent = 'A entrar...';

    try {
        const res = await fetch('/api/login', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
            body: JSON.stringify({
                email: document.getElementById('login-email').value,
                password: document.getElementById('login-password').value,
            })
        });
        const data = await res.json();

        if (!res.ok) {
            errorEl.textContent = data.message || 'Email ou palavra-passe incorretos.';
            errorEl.style.display = 'block';
            submitBtn.disabled = false;
            submitBtn.textContent = 'Entrar';
            return;
        }

        // Save token
        localStorage.setItem('kudima_token', data.access_token);
        localStorage.setItem('kudima_user', JSON.stringify(data.user));

        // Show success
        document.getElementById('login-form-container').style.display = 'none';
        document.getElementById('login-success-name').textContent = data.user.name;
        document.getElementById('login-success').style.display = 'block';

    } catch (err) {
        errorEl.textContent = 'Erro de conexão. Tente novamente.';
        errorEl.style.display = 'block';
        submitBtn.disabled = false;
        submitBtn.textContent = 'Entrar';
    }
});
</script>
@endsection
