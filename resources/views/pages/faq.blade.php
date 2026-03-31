@extends('layouts.app')
@section('title', 'Perguntas Frequentes — Kudima')
@section('description', 'Encontre resposta para as dúvidas mais comuns sobre o Kudima.')

@section('content')

<section class="page-header">
    <h1>Perguntas <span>Frequentes</span></h1>
    <p>Esclareça as suas dúvidas sobre a plataforma Kudima.</p>
</section>

<!-- FAQ Clientes -->
<section class="section">
    <div class="section-header">
        <div class="tag">Para Clientes</div>
        <h2>Dúvidas sobre contratação de serviços</h2>
    </div>
    <div class="faq-list">
        <div class="faq-item">
            <button class="faq-question">Como funciona o Kudima?</button>
            <div class="faq-answer"><p>O Kudima conecta clientes a profissionais qualificados. Basta escolher o serviço desejado, descrever o problema e aguardar que profissionais aceitem o seu pedido. Depois, escolhe o melhor profissional com base no perfil e avaliações.</p></div>
        </div>
        <div class="faq-item">
            <button class="faq-question">Posso escolher o profissional?</button>
            <div class="faq-answer"><p>Sim! Após os profissionais aceitarem o seu pedido, você pode comparar perfis, ver avaliações de outros clientes e escolher o que mais lhe convem.</p></div>
        </div>
        <div class="faq-item">
            <button class="faq-question">Como sei se o profissional é de confiança?</button>
            <div class="faq-answer"><p>Todos os profissionais no Kudima possuem perfis detalhados com avaliações reais de outros clientes. Assim, pode tomar decisões informadas antes de contratar.</p></div>
        </div>
        <div class="faq-item">
            <button class="faq-question">O Kudima funciona em toda Angola?</button>
            <div class="faq-answer"><p>Atualmente, estamos focados em Luanda e arredores, mas estamos a expandir progressivamente para mais províncias e cidades de Angola.</p></div>
        </div>
        <div class="faq-item">
            <button class="faq-question">E se eu não gostar do serviço prestado?</button>
            <div class="faq-answer"><p>Após a conclusão do serviço, pode deixar uma avaliação honesta. Isso ajuda outros clientes e motiva os profissionais a manter a qualidade. Em casos graves, pode contactar a nossa equipa de suporte.</p></div>
        </div>
    </div>
</section>

<!-- FAQ Profissionais -->
<section class="section section-alt" id="profissionais">
    <div class="section-header">
        <div class="tag">Para Profissionais</div>
        <h2>Dúvidas sobre trabalhar no Kudima</h2>
    </div>
    <div class="faq-list">
        <div class="faq-item">
            <button class="faq-question">Como começo a trabalhar no Kudima?</button>
            <div class="faq-answer"><p>Basta registar-se na aplicação como profissional, preencher o seu perfil com informações sobre a sua especialidade e área de atuação. Após isso, começará a receber pedidos de serviços.</p></div>
        </div>
        <div class="faq-item">
            <button class="faq-question">Sou obrigado a aceitar todos os pedidos?</button>
            <div class="faq-answer"><p>Não! Você tem total liberdade para aceitar ou recusar qualquer pedido conforme a sua disponibilidade e interesse.</p></div>
        </div>
        <div class="faq-item">
            <button class="faq-question">Posso definir os meus próprios preços?</button>
            <div class="faq-answer"><p>Sim. Cada profissional define o seu catálogo de serviços e os respectivos preços. Transparência total para clientes e profissionais.</p></div>
        </div>
        <div class="faq-item">
            <button class="faq-question">Como aumento as minhas avaliações?</button>
            <div class="faq-answer"><p>Preste sempre um serviço de qualidade, seja pontual e comunique de forma clara com o cliente. Após a conclusão, o cliente pode avaliar-lhe. Boas avaliações atraem mais clientes!</p></div>
        </div>
        <div class="faq-item">
            <button class="faq-question">Os materiais de trabalho são fornecidos por quem me contratou?</button>
            <div class="faq-answer"><p>Isso pode variar. Normalmente, o cliente e o profissional combinam antecipadamente quem fornece os materiais necessários para o serviço.</p></div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta-section">
    <h2>Não encontrou o que procurava?</h2>
    <p>Entre em contacto connosco e ajudaremos a resolver a sua dúvida.</p>
    <a href="mailto:info@kudima.ao" class="btn btn-white">Contacte-nos</a>
</section>

@endsection

@section('scripts')
<script>
    document.querySelectorAll('.faq-question').forEach(function(btn) {
        btn.addEventListener('click', function() {
            const item = this.closest('.faq-item');
            const wasOpen = item.classList.contains('open');
            // Close all other items in the same list
            item.closest('.faq-list').querySelectorAll('.faq-item').forEach(function(i) {
                i.classList.remove('open');
            });
            if (!wasOpen) item.classList.add('open');
        });
    });
</script>
@endsection
