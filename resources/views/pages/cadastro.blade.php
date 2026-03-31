@extends('layouts.app')
@section('title', 'Cadastrar-se — Kudima')

@section('content')

<section class="page-header" style="padding-bottom:0;min-height:100vh;display:flex;align-items:center;justify-content:center;">
    <div style="width:100%;max-width:420px;margin:0 auto;text-align:center;">
        <a href="/" class="logo" style="font-size:1.8rem;display:block;margin-bottom:32px;">Kudima</a>

        <!-- Formulário -->
        <div id="register-form-container">
            <h1 style="font-size:1.6rem;letter-spacing:-1px;margin-bottom:8px;">Criar uma conta</h1>
            <p style="margin-bottom:32px;color:var(--text-secondary);">Cadastre-se como profissional e comece a receber pedidos.</p>

            <div id="register-error" style="display:none;background:#fef2f2;border:1px solid #fecaca;color:#dc2626;padding:12px 16px;border-radius:10px;font-size:.88rem;margin-bottom:16px;text-align:left;"></div>

            <form id="register-form" style="text-align:left;">
                <div style="margin-bottom:16px;">
                    <label style="display:block;font-size:.85rem;font-weight:600;margin-bottom:6px;color:var(--text);">Nome completo</label>
                    <input type="text" id="reg-name" required placeholder="Seu nome"
                        style="width:100%;padding:12px 14px;border:1px solid var(--border);border-radius:10px;font-family:inherit;font-size:.9rem;outline:none;transition:border-color .2s;"
                        onfocus="this.style.borderColor='var(--primary)'" onblur="this.style.borderColor='var(--border)'">
                </div>
                <div style="margin-bottom:16px;">
                    <label style="display:block;font-size:.85rem;font-weight:600;margin-bottom:6px;color:var(--text);">Email</label>
                    <input type="email" id="reg-email" required placeholder="seu@email.com"
                        style="width:100%;padding:12px 14px;border:1px solid var(--border);border-radius:10px;font-family:inherit;font-size:.9rem;outline:none;transition:border-color .2s;"
                        onfocus="this.style.borderColor='var(--primary)'" onblur="this.style.borderColor='var(--border)'">
                </div>
                <div style="margin-bottom:16px;">
                    <label style="display:block;font-size:.85rem;font-weight:600;margin-bottom:6px;color:var(--text);">Telemóvel</label>
                    <input type="tel" id="reg-phone" placeholder="+244 9XX XXX XXX"
                        style="width:100%;padding:12px 14px;border:1px solid var(--border);border-radius:10px;font-family:inherit;font-size:.9rem;outline:none;transition:border-color .2s;"
                        onfocus="this.style.borderColor='var(--primary)'" onblur="this.style.borderColor='var(--border)'">
                </div>
                <div style="margin-bottom:16px;">
                    <label style="display:block;font-size:.85rem;font-weight:600;margin-bottom:6px;color:var(--text);">Palavra-passe</label>
                    <input type="password" id="reg-password" required placeholder="Mínimo 8 caracteres"
                        style="width:100%;padding:12px 14px;border:1px solid var(--border);border-radius:10px;font-family:inherit;font-size:.9rem;outline:none;transition:border-color .2s;"
                        onfocus="this.style.borderColor='var(--primary)'" onblur="this.style.borderColor='var(--border)'">
                </div>
                <div style="margin-bottom:16px;">
                    <label style="display:block;font-size:.85rem;font-weight:600;margin-bottom:6px;color:var(--text);">Confirmar palavra-passe</label>
                    <input type="password" id="reg-password-confirm" required placeholder="Confirme a palavra-passe"
                        style="width:100%;padding:12px 14px;border:1px solid var(--border);border-radius:10px;font-family:inherit;font-size:.9rem;outline:none;transition:border-color .2s;"
                        onfocus="this.style.borderColor='var(--primary)'" onblur="this.style.borderColor='var(--border)'">
                </div>
                <div style="margin-bottom:16px;">
                    <label style="display:block;font-size:.85rem;font-weight:600;margin-bottom:6px;color:var(--text);">Tipo de conta</label>
                    <select id="reg-role" style="width:100%;padding:12px 14px;border:1px solid var(--border);border-radius:10px;font-family:inherit;font-size:.9rem;outline:none;background:#fff;transition:border-color .2s;"
                        onfocus="this.style.borderColor='var(--primary)'" onblur="this.style.borderColor='var(--border)'">
                        <option value="professional">Profissional</option>
                        <option value="client">Cliente</option>
                    </select>
                </div>
                <button type="submit" id="reg-submit" class="btn btn-primary" style="width:100%;justify-content:center;margin-top:8px;">Criar Conta</button>
            </form>

            <p style="margin-top:20px;font-size:.88rem;color:var(--text-secondary);">
                Já tem conta? <a href="/login" style="color:var(--primary);font-weight:600;">Entrar</a>
            </p>
        </div>

        <!-- Sucesso -->
        <div id="register-success" style="display:none;">
            <div style="width:64px;height:64px;border-radius:50%;background:var(--primary);color:#fff;display:flex;align-items:center;justify-content:center;font-size:1.8rem;margin:0 auto 24px;">✓</div>
            <h1 style="font-size:1.6rem;letter-spacing:-1px;margin-bottom:8px;">Conta criada com sucesso!</h1>
            <p style="color:var(--text-secondary);margin-bottom:8px;">Bem-vindo(a), <strong id="success-name"></strong>.</p>
            <p style="color:var(--text-secondary);margin-bottom:32px;font-size:.9rem;">A sua conta foi criada e já está logado na plataforma.</p>
            <a href="/" class="btn btn-primary" style="justify-content:center;">Ir para o Início</a>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
document.getElementById('register-form').addEventListener('submit', async function(e) {
    e.preventDefault();
    const errorEl = document.getElementById('register-error');
    const submitBtn = document.getElementById('reg-submit');
    errorEl.style.display = 'none';
    submitBtn.disabled = true;
    submitBtn.textContent = 'A criar conta...';

    try {
        const res = await fetch('/api/register', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
            body: JSON.stringify({
                name: document.getElementById('reg-name').value,
                email: document.getElementById('reg-email').value,
                phone: document.getElementById('reg-phone').value,
                password: document.getElementById('reg-password').value,
                password_confirmation: document.getElementById('reg-password-confirm').value,
                role: document.getElementById('reg-role').value,
            })
        });
        const data = await res.json();

        if (!res.ok) {
            let msg = data.message || 'Erro ao criar conta.';
            if (data.errors) {
                msg = Object.values(data.errors).flat().join('<br>');
            }
            errorEl.innerHTML = msg;
            errorEl.style.display = 'block';
            submitBtn.disabled = false;
            submitBtn.textContent = 'Criar Conta';
            return;
        }

        // Save token
        localStorage.setItem('kudima_token', data.access_token);
        localStorage.setItem('kudima_user', JSON.stringify(data.user));

        // Show success
        document.getElementById('register-form-container').style.display = 'none';
        document.getElementById('success-name').textContent = data.user.name;
        document.getElementById('register-success').style.display = 'block';

    } catch (err) {
        errorEl.textContent = 'Erro de conexão. Tente novamente.';
        errorEl.style.display = 'block';
        submitBtn.disabled = false;
        submitBtn.textContent = 'Criar Conta';
    }
});
</script>
@endsection
