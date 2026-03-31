<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kudima — Conecte-se a Profissionais Qualificados')</title>
    <meta name="description" content="@yield('description', 'Kudima é uma plataforma digital que conecta clientes a prestadores de serviços qualificados em Angola.')">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
</head>
<body>

    <!-- Navbar -->
    <header class="navbar" id="navbar">
        <div class="nav-container">
            <a href="/" class="logo">Kudima</a>
            <button class="hamburger" id="hamburger" aria-label="Menu">
                <span></span><span></span><span></span>
            </button>
            <nav id="nav-menu">
                <a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Início</a>
                <a href="/como-funciona" class="{{ request()->is('como-funciona') ? 'active' : '' }}">Como Funciona</a>
                <a href="/faq" class="{{ request()->is('faq') ? 'active' : '' }}">Perguntas Frequentes</a>
            </nav>
            <div class="nav-actions">
                <a href="/login" class="btn-login">Entrar</a>
                <a href="/cadastro" class="btn-signup">Cadastrar-se</a>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="site-footer">
        <div class="footer-container">
            <div class="footer-top">
                <div class="footer-brand">
                    <a href="/" class="logo">Kudima</a>
                    <p>Conectando quem precisa a quem sabe fazer. A plataforma de serviços profissionais de Angola.</p>
                </div>
                <div class="footer-links">
                    <h4>Plataforma</h4>
                    <a href="/">Início</a>
                    <a href="/como-funciona">Como Funciona</a>
                    <a href="/faq">FAQ</a>
                </div>
                <div class="footer-links">
                    <h4>Conta</h4>
                    <a href="/login">Entrar</a>
                    <a href="/cadastro">Cadastrar-se</a>
                </div>
                <div class="footer-links">
                    <h4>Contacto</h4>
                    <a href="mailto:info@kudima.ao">info@kudima.ao</a>
                    <p style="color:rgba(255,255,255,.4);font-size:.82rem;margin-top:4px;">Luanda, Angola 🇦🇴</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} Kudima. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    <script>
        document.getElementById('hamburger').addEventListener('click', function() {
            this.classList.toggle('open');
            document.getElementById('nav-menu').classList.toggle('open');
        });
        window.addEventListener('scroll', function() {
            document.getElementById('navbar').classList.toggle('scrolled', window.scrollY > 10);
        });
    </script>
    @yield('scripts')
</body>
</html>
