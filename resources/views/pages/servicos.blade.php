@extends('layouts.app')
@section('title', 'Serviços — Kudima')
@section('description', 'Explore os serviços disponíveis no Kudima e encontre profissionais qualificados.')

@section('content')

<section class="page-header">
    <h1>Nossos <span>Serviços</span></h1>
    <p>Explore as categorias de serviços disponíveis e encontre profissionais qualificados para cada necessidade.</p>
</section>

<section class="section">
    <div class="services-list">
        @foreach($categories as $category)
        <div class="service-big-card">
            <div class="card-img">
                @if($category->image_url)
                    <img src="{{ $category->image_url }}" alt="{{ $category->name }}" style="width:100%;height:100%;object-fit:cover;">
                @else
                    @php
                        $icons = ['Eletricista'=>'⚡','Canalizador'=>'🔧','Mecânico'=>'🚗','Pintor'=>'🎨','Carpinteiro'=>'🪚'];
                    @endphp
                    {{ $icons[$category->name] ?? '🔨' }}
                @endif
            </div>
            <div class="card-body">
                <h3>{{ $category->name }}</h3>
                <p>{{ $category->description ?? 'Encontre profissionais qualificados para serviços de '.$category->name.'.' }}</p>
                <div class="card-meta">
                    <span class="badge">{{ $category->services->count() }} serviço(s)</span>
                    <span class="price">{{ $category->professionals->count() }} profissional(is)</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

<!-- Serviços Específicos -->
<section class="section section-alt">
    <div class="section-header">
        <div class="tag">Catálogo</div>
        <h2>Serviços disponíveis</h2>
        <p>Todos os serviços que os nossos profissionais podem prestar.</p>
    </div>
    <div class="features-grid">
        @foreach($services as $service)
        <div class="feature-card">
            <div class="feature-icon">
                @php
                    $catIcons = ['Eletricista'=>'⚡','Canalizador'=>'🔧','Mecânico'=>'🚗','Pintor'=>'🎨','Carpinteiro'=>'🪚'];
                @endphp
                {{ $catIcons[$service->category->name ?? ''] ?? '🔨' }}
            </div>
            <h3>{{ $service->name }}</h3>
            <p>{{ $service->description }}</p>
            <p style="margin-top:8px;">
                <span style="background:var(--primary-bg);color:var(--primary);padding:3px 10px;border-radius:8px;font-size:.78rem;font-weight:600;">
                    {{ $service->category->name ?? 'Geral' }}
                </span>
            </p>
        </div>
        @endforeach
    </div>
</section>

<!-- CTA -->
<section class="cta-section">
    <h2>Precisa de algum destes serviços?</h2>
    <p>Descarregue a aplicação Kudima e encontre profissionais qualificados perto de si.</p>
    <a href="/como-funciona" class="btn btn-white">Saiba Como Funciona</a>
</section>

@endsection
