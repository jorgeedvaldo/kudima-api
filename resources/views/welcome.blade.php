<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kudima — Conecte-se a Profissionais Qualificados</title>
    <meta name="description" content="Kudima é uma plataforma digital que conecta clientes a prestadores de serviços qualificados em Angola. Encontre eletricistas, canalizadores, mecânicos e muito mais.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        :root {
            --primary: #7F57F1;
            --primary-dark: #6842d0;
            --primary-light: #a78bfa;
            --accent: #F59E0B;
            --bg-dark: #0f0a1e;
            --bg-card: rgba(255,255,255,0.06);
            --text: #e2e0ea;
            --text-muted: #9b97a8;
            --radius: 16px;
            --shadow: 0 8px 32px rgba(127,87,241,0.18);
        }

        html { scroll-behavior: smooth; }
        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-dark);
            color: var(--text);
            line-height: 1.7;
            overflow-x: hidden;
        }

        /* ── Navbar ── */
        .navbar {
            position: fixed; top: 0; width: 100%; z-index: 100;
            display: flex; align-items: center; justify-content: space-between;
            padding: 18px 40px;
            background: rgba(15,10,30,.75);
            backdrop-filter: blur(18px);
            border-bottom: 1px solid rgba(255,255,255,.06);
        }
        .navbar .logo {
            font-size: 1.5rem; font-weight: 800;
            background: linear-gradient(135deg, var(--primary-light), var(--accent));
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
            letter-spacing: -0.5px;
        }
        .navbar nav a {
            color: var(--text-muted); text-decoration: none; font-size: .9rem; margin-left: 28px;
            transition: color .25s;
        }
        .navbar nav a:hover { color: #fff; }
        .btn-admin {
            background: var(--primary); color: #fff; padding: 10px 22px; border-radius: 10px;
            text-decoration: none; font-weight: 600; font-size: .88rem;
            transition: background .25s, transform .2s;
        }
        .btn-admin:hover { background: var(--primary-dark); transform: translateY(-1px); }

        /* ── Hero ── */
        .hero {
            position: relative;
            min-height: 100vh;
            display: flex; align-items: center; justify-content: center;
            text-align: center;
            padding: 140px 20px 80px;
        }
        .hero::before {
            content: '';
            position: absolute; top: -200px; left: 50%; width: 800px; height: 800px;
            transform: translateX(-50%);
            background: radial-gradient(circle, rgba(127,87,241,.25) 0%, transparent 70%);
            pointer-events: none;
        }
        .hero-content { position: relative; max-width: 780px; }
        .hero-badge {
            display: inline-block;
            padding: 6px 16px; border-radius: 20px;
            background: rgba(127,87,241,.15); border: 1px solid rgba(127,87,241,.3);
            color: var(--primary-light); font-size: .78rem; font-weight: 600;
            margin-bottom: 24px; letter-spacing: .5px; text-transform: uppercase;
        }
        .hero h1 {
            font-size: clamp(2.5rem, 6vw, 4rem);
            font-weight: 900; line-height: 1.1; letter-spacing: -1.5px;
            margin-bottom: 22px;
        }
        .hero h1 span {
            background: linear-gradient(135deg, var(--primary-light), var(--accent));
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
        }
        .hero p {
            color: var(--text-muted); font-size: 1.15rem; max-width: 600px; margin: 0 auto 36px;
        }
        .hero-buttons { display: flex; gap: 14px; justify-content: center; flex-wrap: wrap; }
        .btn {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 14px 28px; border-radius: 12px; font-weight: 600;
            font-size: .95rem; text-decoration: none; transition: all .3s;
        }
        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: #fff; box-shadow: var(--shadow);
        }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 12px 40px rgba(127,87,241,.3); }
        .btn-outline {
            border: 1.5px solid rgba(255,255,255,.15); color: var(--text);
            background: transparent;
        }
        .btn-outline:hover { border-color: var(--primary-light); color: #fff; }

        /* ── Stats ── */
        .stats {
            display: flex; justify-content: center; gap: 60px; flex-wrap: wrap;
            margin-top: 60px;
        }
        .stat { text-align: center; }
        .stat-number {
            font-size: 2.2rem; font-weight: 800;
            background: linear-gradient(135deg, var(--primary-light), var(--accent));
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
        }
        .stat-label { color: var(--text-muted); font-size: .85rem; margin-top: 4px; }

        /* ── Section ── */
        section { padding: 100px 20px; }
        .section-header { text-align: center; max-width: 600px; margin: 0 auto 60px; }
        .section-header h2 {
            font-size: 2.2rem; font-weight: 800; letter-spacing: -1px; margin-bottom: 14px;
        }
        .section-header p { color: var(--text-muted); font-size: 1.05rem; }

        /* ── Features Grid ── */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 24px;
            max-width: 1100px; margin: 0 auto;
        }
        .feature-card {
            background: var(--bg-card);
            border: 1px solid rgba(255,255,255,.06);
            border-radius: var(--radius);
            padding: 32px;
            transition: transform .3s, border-color .3s;
        }
        .feature-card:hover {
            transform: translateY(-4px);
            border-color: rgba(127,87,241,.25);
        }
        .feature-icon {
            width: 52px; height: 52px; border-radius: 14px;
            display: flex; align-items: center; justify-content: center;
            background: linear-gradient(135deg, rgba(127,87,241,.2), rgba(245,158,11,.15));
            font-size: 1.5rem; margin-bottom: 18px;
        }
        .feature-card h3 { font-size: 1.15rem; font-weight: 700; margin-bottom: 10px; }
        .feature-card p { color: var(--text-muted); font-size: .92rem; }

        /* ── How It Works ── */
        .steps-row {
            display: flex; gap: 24px; max-width: 1100px; margin: 0 auto; flex-wrap: wrap;
            justify-content: center;
        }
        .step-card {
            flex: 1 1 240px; max-width: 260px;
            background: var(--bg-card);
            border: 1px solid rgba(255,255,255,.06);
            border-radius: var(--radius);
            padding: 32px; text-align: center;
            position: relative;
        }
        .step-num {
            position: absolute; top: -16px; left: 50%; transform: translateX(-50%);
            width: 32px; height: 32px; border-radius: 50%;
            background: var(--primary); color: #fff;
            font-weight: 800; font-size: .85rem;
            display: flex; align-items: center; justify-content: center;
        }
        .step-card h3 { font-size: 1.05rem; font-weight: 700; margin: 14px 0 8px; }
        .step-card p { color: var(--text-muted); font-size: .88rem; }

        /* ── Roles Section ── */
        .roles-grid {
            display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 24px; max-width: 1100px; margin: 0 auto;
        }
        .role-card {
            background: var(--bg-card); border: 1px solid rgba(255,255,255,.06);
            border-radius: var(--radius); padding: 36px;
            transition: transform .3s, border-color .3s;
        }
        .role-card:hover { transform: translateY(-4px); border-color: rgba(127,87,241,.25); }
        .role-card .role-tag {
            display: inline-block; padding: 4px 12px; border-radius: 8px;
            font-size: .72rem; font-weight: 700; text-transform: uppercase;
            letter-spacing: .8px; margin-bottom: 16px;
        }
        .role-client .role-tag { background: rgba(59,130,246,.15); color: #60a5fa; }
        .role-pro .role-tag { background: rgba(16,185,129,.15); color: #34d399; }
        .role-admin .role-tag { background: rgba(239,68,68,.15); color: #f87171; }
        .role-card h3 { font-size: 1.3rem; font-weight: 700; margin-bottom: 14px; }
        .role-card ul { list-style: none; padding: 0; }
        .role-card li {
            color: var(--text-muted); font-size: .9rem;
            padding: 6px 0; display: flex; align-items: center; gap: 10px;
        }
        .role-card li::before {
            content: '✓'; color: var(--primary-light); font-weight: 700;
        }

        /* ── Tech Stack ── */
        .tech-row {
            display: flex; gap: 20px; max-width: 900px; margin: 0 auto;
            flex-wrap: wrap; justify-content: center;
        }
        .tech-chip {
            background: var(--bg-card); border: 1px solid rgba(255,255,255,.08);
            border-radius: 12px; padding: 18px 28px;
            display: flex; align-items: center; gap: 12px;
            font-weight: 600; font-size: .95rem;
            transition: border-color .3s, transform .3s;
        }
        .tech-chip:hover { border-color: rgba(127,87,241,.3); transform: translateY(-2px); }
        .tech-chip .dot {
            width: 10px; height: 10px; border-radius: 50%;
        }
        .dot-laravel { background: #FF2D20; }
        .dot-mysql { background: #4479A1; }
        .dot-filament { background: #FBBF24; }
        .dot-react { background: #61DAFB; }
        .dot-sanctum { background: #34D399; }

        /* ── API Section ── */
        .api-grid {
            display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 16px; max-width: 1000px; margin: 0 auto;
        }
        .api-item {
            background: var(--bg-card); border: 1px solid rgba(255,255,255,.06);
            border-radius: 12px; padding: 20px;
            transition: border-color .3s;
        }
        .api-item:hover { border-color: rgba(127,87,241,.25); }
        .api-method {
            display: inline-block; padding: 3px 8px; border-radius: 6px;
            font-size: .7rem; font-weight: 700; text-transform: uppercase; letter-spacing: .5px;
            margin-right: 6px;
        }
        .m-get { background: rgba(16,185,129,.2); color: #34d399; }
        .m-post { background: rgba(59,130,246,.2); color: #60a5fa; }
        .m-put { background: rgba(245,158,11,.2); color: #fbbf24; }
        .m-patch { background: rgba(168,85,247,.2); color: #c084fc; }
        .api-endpoint { font-family: 'Courier New', monospace; font-size: .85rem; color: var(--text); }
        .api-desc { color: var(--text-muted); font-size: .82rem; margin-top: 8px; }

        /* ── Footer ── */
        footer {
            text-align: center; padding: 50px 20px;
            border-top: 1px solid rgba(255,255,255,.06);
        }
        footer p { color: var(--text-muted); font-size: .85rem; }
        footer .logo-footer {
            font-size: 1.2rem; font-weight: 800; margin-bottom: 10px;
            background: linear-gradient(135deg, var(--primary-light), var(--accent));
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
        }

        /* ── Responsive ── */
        @media (max-width: 768px) {
            .navbar { padding: 14px 20px; }
            .navbar nav { display: none; }
            .stats { gap: 30px; }
            section { padding: 70px 16px; }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <header class="navbar">
        <div class="logo">Kudima</div>
        <nav>
            <a href="#funcionalidades">Funcionalidades</a>
            <a href="#como-funciona">Como Funciona</a>
            <a href="#perfis">Perfis</a>
            <a href="#tech">Tecnologias</a>
            <a href="#api">API</a>
        </nav>
        <a href="/admin" class="btn-admin">⚙️ Painel Admin</a>
    </header>

    <!-- Hero -->
    <section class="hero" id="hero">
        <div class="hero-content">
            <div class="hero-badge">🇦🇴 Feito em Angola</div>
            <h1>Encontre <span>profissionais qualificados</span> perto de si</h1>
            <p>O <strong>Kudima</strong> conecta clientes a eletricistas, canalizadores, mecânicos e mais — com transparência de preços e avaliações reais.</p>
            <div class="hero-buttons">
                <a href="#funcionalidades" class="btn btn-primary">🚀 Explorar Funcionalidades</a>
                <a href="#api" class="btn btn-outline">📡 Documentação API</a>
            </div>

            <div class="stats">
                <div class="stat">
                    <div class="stat-number">5+</div>
                    <div class="stat-label">Categorias</div>
                </div>
                <div class="stat">
                    <div class="stat-number">10+</div>
                    <div class="stat-label">Profissionais</div>
                </div>
                <div class="stat">
                    <div class="stat-number">8+</div>
                    <div class="stat-label">Serviços</div>
                </div>
                <div class="stat">
                    <div class="stat-number">13</div>
                    <div class="stat-label">Endpoints API</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section id="funcionalidades">
        <div class="section-header">
            <h2>Funcionalidades Principais</h2>
            <p>Tudo o que precisa para encontrar, contratar e avaliar profissionais de serviços locais.</p>
        </div>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">🔍</div>
                <h3>Pesquisa Inteligente</h3>
                <p>Encontre profissionais por categoria, serviço ou preço. Filtre e compare facilmente.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">💰</div>
                <h3>Transparência de Preços</h3>
                <p>Profissionais definem os seus próprios catálogos com preços claros e acessíveis.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">⭐</div>
                <h3>Avaliações Reais</h3>
                <p>Sistema de avaliações e comentários para garantir qualidade e confiança.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">📱</div>
                <h3>App Mobile</h3>
                <p>Interface nativa em React Native (Expo) para clientes e profissionais.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🛡️</div>
                <h3>Painel de Administração</h3>
                <p>Gestão completa de utilizadores, serviços e categorias via FilamentPHP.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🔐</div>
                <h3>API Segura</h3>
                <p>Autenticação via Laravel Sanctum com tokens Bearer para proteger todos os dados.</p>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section id="como-funciona">
        <div class="section-header">
            <h2>Como Funciona?</h2>
            <p>3 passos simples para começar a utilizar a plataforma.</p>
        </div>
        <div class="steps-row">
            <div class="step-card">
                <div class="step-num">1</div>
                <h3>Crie a sua Conta</h3>
                <p>Registe-se como cliente ou profissional em segundos.</p>
            </div>
            <div class="step-card">
                <div class="step-num">2</div>
                <h3>Encontre & Solicite</h3>
                <p>Pesquise profissionais, veja preços e solicite o serviço desejado.</p>
            </div>
            <div class="step-card">
                <div class="step-num">3</div>
                <h3>Avalie & Repita</h3>
                <p>Após a conclusão, avalie o profissional e ajude a comunidade.</p>
            </div>
        </div>
    </section>

    <!-- Roles -->
    <section id="perfis">
        <div class="section-header">
            <h2>Para Quem é o Kudima?</h2>
            <p>Diferentes perfis, a mesma experiência de qualidade.</p>
        </div>
        <div class="roles-grid">
            <div class="role-card role-client">
                <div class="role-tag">Cliente</div>
                <h3>Precisa de um serviço?</h3>
                <ul>
                    <li>Pesquisa de profissionais por categoria</li>
                    <li>Filtro por preço e avaliações</li>
                    <li>Solicitação e acompanhamento de serviços</li>
                    <li>Avaliações e comentários pós-serviço</li>
                </ul>
            </div>
            <div class="role-card role-pro">
                <div class="role-tag">Profissional</div>
                <h3>Ofereça os seus serviços</h3>
                <ul>
                    <li>Gestão do perfil profissional completo</li>
                    <li>Catálogo de serviços com preços livres</li>
                    <li>Aceitar ou recusar solicitações</li>
                    <li>Construir reputação via avaliações</li>
                </ul>
            </div>
            <div class="role-card role-admin">
                <div class="role-tag">Administrador</div>
                <h3>Gerir a plataforma</h3>
                <ul>
                    <li>Gestão de utilizadores e profissionais</li>
                    <li>Moderação de serviços (Soft Delete)</li>
                    <li>Gestão de categorias e imagens</li>
                    <li>Painel completo via FilamentPHP</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Tech Stack -->
    <section id="tech">
        <div class="section-header">
            <h2>Tecnologias</h2>
            <p>Construído com tecnologias robustas e modernas.</p>
        </div>
        <div class="tech-row">
            <div class="tech-chip"><div class="dot dot-laravel"></div>Laravel (PHP)</div>
            <div class="tech-chip"><div class="dot dot-mysql"></div>MySQL</div>
            <div class="tech-chip"><div class="dot dot-filament"></div>FilamentPHP</div>
            <div class="tech-chip"><div class="dot dot-react"></div>React Native (Expo)</div>
            <div class="tech-chip"><div class="dot dot-sanctum"></div>Laravel Sanctum</div>
        </div>
    </section>

    <!-- API Endpoints -->
    <section id="api">
        <div class="section-header">
            <h2>Endpoints da API</h2>
            <p>API RESTful pronta para consumo. Todos os endpoints aceitam e retornam JSON.</p>
        </div>
        <div class="api-grid">
            <div class="api-item">
                <span class="api-method m-post">POST</span>
                <span class="api-endpoint">/api/register</span>
                <div class="api-desc">Registar novo utilizador</div>
            </div>
            <div class="api-item">
                <span class="api-method m-post">POST</span>
                <span class="api-endpoint">/api/login</span>
                <div class="api-desc">Login e obtenção de token</div>
            </div>
            <div class="api-item">
                <span class="api-method m-post">POST</span>
                <span class="api-endpoint">/api/logout</span>
                <div class="api-desc">Invalidar token atual</div>
            </div>
            <div class="api-item">
                <span class="api-method m-get">GET</span>
                <span class="api-endpoint">/api/user</span>
                <div class="api-desc">Dados do utilizador logado</div>
            </div>
            <div class="api-item">
                <span class="api-method m-put">PUT</span>
                <span class="api-endpoint">/api/profile</span>
                <div class="api-desc">Atualizar perfil do utilizador</div>
            </div>
            <div class="api-item">
                <span class="api-method m-get">GET</span>
                <span class="api-endpoint">/api/categories</span>
                <div class="api-desc">Listar todas as categorias</div>
            </div>
            <div class="api-item">
                <span class="api-method m-get">GET</span>
                <span class="api-endpoint">/api/services</span>
                <div class="api-desc">Pesquisar serviços</div>
            </div>
            <div class="api-item">
                <span class="api-method m-get">GET</span>
                <span class="api-endpoint">/api/professionals</span>
                <div class="api-desc">Listar profissionais</div>
            </div>
            <div class="api-item">
                <span class="api-method m-get">GET</span>
                <span class="api-endpoint">/api/professionals/{id}</span>
                <div class="api-desc">Perfil completo do profissional</div>
            </div>
            <div class="api-item">
                <span class="api-method m-get">GET</span>
                <span class="api-endpoint">/api/requests</span>
                <div class="api-desc">Histórico de solicitações</div>
            </div>
            <div class="api-item">
                <span class="api-method m-post">POST</span>
                <span class="api-endpoint">/api/requests</span>
                <div class="api-desc">Criar nova solicitação</div>
            </div>
            <div class="api-item">
                <span class="api-method m-patch">PATCH</span>
                <span class="api-endpoint">/api/requests/{id}/status</span>
                <div class="api-desc">Atualizar status do pedido</div>
            </div>
            <div class="api-item">
                <span class="api-method m-post">POST</span>
                <span class="api-endpoint">/api/reviews</span>
                <div class="api-desc">Avaliar serviço concluído</div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="logo-footer">Kudima</div>
        <p>© {{ date('Y') }} Kudima — Plataforma de Serviços Profissionais em Angola.</p>
        <p style="margin-top: 8px;"><a href="/admin" style="color: var(--primary-light); text-decoration: none;">Aceder ao Painel de Administração →</a></p>
    </footer>

</body>
</html>
