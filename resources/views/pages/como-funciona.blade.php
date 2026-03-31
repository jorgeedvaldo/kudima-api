@extends('layouts.app')
@section('title', 'Como Funciona — Kudima')
@section('description', 'Descubra como usar o Kudima para encontrar profissionais ou oferecer os seus serviços.')

@section('content')

<section class="page-header">
    <h1>Como <span>Funciona</span></h1>
    <p>Descubra como o Kudima facilita a contratação e oferta de serviços profissionais em Angola.</p>
</section>

<!-- Para Clientes -->
<section class="section">
    <div class="section-header">
        <div class="tag">Para Clientes</div>
        <h2>Solicite serviços com total segurança</h2>
        <p>No Kudima, você solicita um serviço, profissionais verificados aceitam o pedido e você escolhe quem vai executar. Simples, seguro e transparente.</p>
    </div>
    <div class="steps-grid">
        <div class="step-card">
            <div class="step-num">1</div>
            <h3>Escolha o serviço</h3>
            <p>Selecione o serviço desejado na nossa lista de categorias. Informe o local e descreva o problema.</p>
        </div>
        <div class="step-card">
            <div class="step-num">2</div>
            <h3>Profissionais aceitam</h3>
            <p>Profissionais qualificados podem aceitar o seu pedido e, se necessário, enviar um orçamento personalizado.</p>
        </div>
        <div class="step-card">
            <div class="step-num">3</div>
            <h3>Escolha e avalie</h3>
            <p>Compare os profissionais, escolha o melhor e após a conclusão do serviço, deixe a sua avaliação.</p>
        </div>
    </div>
</section>

<!-- Para Profissionais -->
<section class="section section-alt" id="profissionais">
    <div class="section-header">
        <div class="tag">Para Profissionais</div>
        <h2>Receba pedidos e aumente a sua renda</h2>
        <p>No Kudima, você recebe pedidos reais, decide quais aceitar e constrói a sua reputação com avaliações de clientes.</p>
    </div>
    <div class="steps-grid">
        <div class="step-card">
            <div class="step-num">1</div>
            <h3>Receba pedidos</h3>
            <p>Receba notificações de serviços próximos à sua área de atuação e especialidade.</p>
        </div>
        <div class="step-card">
            <div class="step-num">2</div>
            <h3>Aceite o serviço</h3>
            <p>Aceite o pedido e, se necessário, envie um orçamento personalizado ao cliente.</p>
        </div>
        <div class="step-card">
            <div class="step-num">3</div>
            <h3>Execute e cresça</h3>
            <p>Execute o serviço com qualidade. As boas avaliações trazem mais clientes no futuro.</p>
        </div>
    </div>
</section>

<!-- Vantagens -->
<section class="section">
    <div class="section-header">
        <div class="tag">Vantagens</div>
        <h2>Porquê escolher o Kudima?</h2>
    </div>
    <div class="features-grid">
        <div class="feature-card">
            <div class="feature-icon">🛡️</div>
            <h3>Segurança</h3>
            <p>Profissionais verificados e um sistema de avaliações que garante a qualidade do serviço.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">💰</div>
            <h3>Transparência</h3>
            <p>Preços claros e definidos antecipadamente. Sem surpresas no final.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">⚡</div>
            <h3>Rapidez</h3>
            <p>Encontre um profissional em minutos. Solicitação simples e direta.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">📱</div>
            <h3>Acesso Mobile</h3>
            <p>Aplicação nativa para Android e iOS. Tenha o Kudima sempre consigo.</p>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta-section">
    <h2>Pronto para começar?</h2>
    <p>Descarregue a aplicação e encontre profissionais qualificados perto de si.</p>
    <a href="/servicos" class="btn btn-white">Ver Serviços Disponíveis</a>
</section>

@endsection
