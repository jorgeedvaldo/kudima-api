@extends('layouts.app')
@section('title', 'Kudima — Aqui quem precisa encontra quem sabe fazer')

@section('content')

<!-- Hero -->
<section class="hero">
    <!-- Animated shapes -->
    <div class="hero-shapes">
        <div class="hero-shape hero-shape-1"></div>
        <div class="hero-shape hero-shape-2"></div>
        <div class="hero-shape hero-shape-3"></div>
        <div class="hero-shape hero-shape-4"></div>
        <div class="hero-shape hero-shape-5"></div>
        <div class="hero-shape hero-shape-6"></div>
    </div>

    <div class="hero-grid">
        <!-- Left: Text -->
        <div class="hero-text">
            <h1><span class="highlight">Kudima</span> — Aqui quem precisa encontra quem sabe fazer</h1>
            <p class="subtitle">Uma plataforma para quem precisa contratar um profissional e para quem busca oportunidades de trabalho em Angola. Simples, rápido e seguro para todos!</p>
            <div class="hero-buttons">
                <a href="/cadastro" class="btn btn-primary btn-lg">Cadastrar como Profissional</a>
                <a href="/login" class="btn btn-secondary btn-lg">Entrar na Plataforma</a>
            </div>
            <div class="hero-social-proof">
                <div class="avatar-stack">
                    <span>J</span><span>M</span><span>C</span><span>H</span><span>+</span>
                </div>
                <p><strong>Profissionais verificados</strong> já se registaram e estão a trabalhar. Aproveite agora!</p>
            </div>
        </div>

        <!-- Right: Image -->
        <div class="hero-image-side">
            <div class="hero-image-wrapper">
                <img src="{{ asset('images/hero-workers.png') }}" alt="Profissionais Kudima">
            </div>
            <div class="hero-badge-float">
                <div class="badge-icon">⭐</div>
                <div class="badge-text">
                    <strong>4.8 / 5.0</strong>
                    <span>Avaliação média</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Como Funciona -->
<section class="section">
    <div class="section-header">
        <div class="tag">Como Funciona</div>
        <h2>Solicite serviços com total segurança</h2>
        <p>No Kudima, profissionais verificados aceitam o seu pedido e você escolhe quem vai executar.</p>
    </div>
    <div class="steps-grid">
        <div class="step-card">
            <div class="step-num">Passo 01</div>
            <h3>Escolha o serviço</h3>
            <p>Selecione o serviço desejado, informe o local e descreva o problema.</p>
        </div>
        <div class="step-card">
            <div class="step-num">Passo 02</div>
            <h3>Profissionais aceitam</h3>
            <p>Profissionais qualificados aceitam o pedido e enviam orçamento.</p>
        </div>
        <div class="step-card">
            <div class="step-num">Passo 03</div>
            <h3>Escolha e avalie</h3>
            <p>Compare perfis, escolha o melhor e avalie após a conclusão.</p>
        </div>
    </div>
</section>

<!-- Categorias -->
<section class="section section-alt">
    <div class="section-header">
        <div class="tag">Categorias</div>
        <h2>Profissionais em diversas áreas</h2>
        <p>Encontre a ajuda certa para qualquer necessidade.</p>
    </div>
    <div class="features-grid">
        <div class="feature-card">
            <div class="feature-icon">⚡</div>
            <h3>Eletricista</h3>
            <p>Instalações elétricas, reparações e manutenção geral.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">🔧</div>
            <h3>Canalizador</h3>
            <p>Desentupimentos, fugas e instalações sanitárias.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">🚗</div>
            <h3>Mecânico</h3>
            <p>Revisões, diagnóstico e reparação de veículos.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">🎨</div>
            <h3>Pintor</h3>
            <p>Pintura interior e exterior de residências.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">🪚</div>
            <h3>Carpinteiro</h3>
            <p>Montagem de móveis e trabalhos em madeira.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">➕</div>
            <h3>E mais...</h3>
            <p>Novas categorias são adicionadas regularmente.</p>
        </div>
    </div>
</section>

<!-- Para Profissionais -->
<section class="section">
    <div class="section-header">
        <div class="tag">Para Profissionais</div>
        <h2>Receba pedidos e aumente a sua renda</h2>
        <p>Cadastre-se, defina os seus serviços e preços, e comece a receber pedidos reais.</p>
    </div>
    <div class="steps-grid">
        <div class="step-card">
            <div class="step-num">01</div>
            <h3>Crie o seu perfil</h3>
            <p>Registe-se e adicione os serviços que oferece com os seus preços.</p>
        </div>
        <div class="step-card">
            <div class="step-num">02</div>
            <h3>Receba pedidos</h3>
            <p>Clientes próximos encontram o seu perfil e solicitam serviços.</p>
        </div>
        <div class="step-card">
            <div class="step-num">03</div>
            <h3>Execute e cresça</h3>
            <p>Conclua serviços, receba avaliações e atraia mais clientes.</p>
        </div>
    </div>
    <div style="text-align:center;margin-top:40px;">
        <a href="/cadastro" class="btn btn-primary btn-lg">Cadastrar como Profissional</a>
    </div>
</section>

<!-- Depoimentos -->
<section class="section section-alt">
    <div class="section-header">
        <div class="tag">Depoimentos</div>
        <h2>Vidas transformadas pelo Kudima</h2>
        <p>Histórias reais de quem já confia na plataforma.</p>
    </div>
    <div class="testimonials-grid">
        <div class="testimonial-card">
            <div class="stars">★★★★★</div>
            <blockquote>"O Kudima facilitou-me muito a vida. Consigo pedir serviços como eletricidade ou manutenção sem sair de casa."</blockquote>
            <div class="author">
                <div class="author-avatar">P</div>
                <div class="author-info"><strong>Paulo Fonseca</strong><span>Talatona, Luanda</span></div>
            </div>
        </div>
        <div class="testimonial-card">
            <div class="stars">★★★★★</div>
            <blockquote>"Comecei a trabalhar pelo Kudima e já consegui vários clientes. Agora tenho uma renda fixa."</blockquote>
            <div class="author">
                <div class="author-avatar">M</div>
                <div class="author-info"><strong>Maria Culina</strong><span>Rangel, Luanda</span></div>
            </div>
        </div>
        <div class="testimonial-card">
            <div class="stars">★★★★</div>
            <blockquote>"Gostei da facilidade de contratar um eletricista. Tudo transparente e com avaliação dos profissionais."</blockquote>
            <div class="author">
                <div class="author-avatar">J</div>
                <div class="author-info"><strong>João Silva</strong><span>Maianga, Luanda</span></div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta-section">
    <h2>Pronto para começar?</h2>
    <p>Junte-se aos angolanos que já confiam no Kudima para encontrar profissionais de qualidade.</p>
    <div style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap;">
        <a href="/cadastro" class="btn btn-white btn-lg">Cadastrar-se Grátis</a>
        <a href="/login" class="btn btn-ghost btn-lg" style="border-color:rgba(255,255,255,.3);color:#fff;">Já tenho conta</a>
    </div>
</section>

@endsection
