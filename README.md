# Kudima API

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Filament](https://img.shields.io/badge/Filament-Administrator-warning?style=for-the-badge)

[Português](#português) | [English](#english)

---

<a name="português"></a>
## 🇦🇴 Português

**Kudima** é uma plataforma digital que conecta clientes a prestadores de serviços qualificados, permitindo a visualização clara de ofertas e preços. O projeto visa preencher a lacuna no mercado de serviços locais, promovendo eficiência e confiança.

### 📋 Contexto e Objetivos

Atualmente, clientes enfrentam dificuldades em encontrar profissionais (eletricistas, canalizadores, mecânicos) e saber custos antecipadamente. O **Kudima** resolve isso com:
- **Conexão Direta**: Clientes encontram profissionais por categoria.
- **Transparência de Preços**: Profissionais definem seus catálogos de serviços e preços.
- **Confiança**: Perfis detalhados e sistema de avaliações.
- **Gestão Centralizada**: Os administradores moderam e garantem a qualidade da plataforma.

### 🚀 Funcionalidades (Âmbito)

*   **Para Clientes**:
    *   Registo e Login.
    *   Pesquisa de Profissionais e Serviços (com filtros por categoria e preço).
    *   Solicitação de Serviço (registo do preço acordado).
    *   Avaliação e Comentários pós-serviço.
*   **Para Profissionais**:
    *   Gestão de Perfil (Bio, Endereço, Foto).
    *   **Catálogo de Serviços**: Criar/Editar serviços próprios com preços definidos.
    *   Gestão de Solicitações (Aceitar/Recusar).
*   **Para Administradores (Painel Web)**:
    *   Gestão de Usuários (Clientes e Profissionais).
    *   **Moderação de Serviços**: Visualizar, editar e remover qualquer serviço (Soft Delete).
    *   Gestão de Categorias e Relatórios.

### 🛠️ Arquitetura e Tecnologias

*   **Mobile**: React Native (Expo) - *Interface do Cliente/Profissional*.
*   **Web Admin**: FilamentPHP (Laravel Blade) - *Painel de Gestão*.
*   **Backend**: API RESTful em Laravel (PHP).
*   **Banco de Dados**: MySQL.

### 🗄️ Modelo de Dados Principal

*   **Users**: `name`, `email`, `phone`, `role` ('cliente', 'profissional', 'admin').
*   **Categories**: `name`, `image_url`.
*   **Services**: `professional_id`, `category_id`, `name`, `description`, `price`, `active`, `deleted_at` (Soft Delete).
*   **Service Requests**: `client_id`, `professional_id`, `service_id`, `agreed_price`, `status`.

### 📦 Instalação

1.  **Clonar e Instalar**:
    ```bash
    git clone https://github.com/seu-usuario/kudima-api.git
    cd kudima-api
    composer install
    ```
2.  **Configurar .env e Banco**:
    ```bash
    cp .env.example .env
    php artisan key:generate
    php artisan migrate
    ```
3.  **Criar Admin e Rodar**:
    ```bash
    php artisan make:filament-user
    php artisan serve
    ```

---

<a name="english"></a>
## 🇺🇸 English

**Kudima** is a digital platform connecting clients with qualified service providers, offering clear visibility of services and pricing. The project aims to bridge the gap in the local service market, promoting efficiency and trust.

### 📋 Context & Objectives

Clients establish direct connections with professionals (electricians, plumbers, mechanics) with transparent pricing.
- **Direct Connection**: Find professionals by category.
- **Price Transparency**: Professionals define their service catalogs and prices.
- **Trust**: Detailed profiles and rating system.
- **Centralized Management**: Admin moderation ensures platform quality.

### 🚀 Key Features

*   **For Clients**:
    *   Registration & Login.
    *   Search Professionals & Services (filter by category, price).
    *   Request Service (records agreed price).
    *   Reviews & Ratings.
*   **For Professionals**:
    *   Profile Management (Bio, Address, Photo).
    *   **Service Catalog**: Create/Edit own services with prices.
    *   Request Management (Accept/Refuse).
*   **For Administrators (Web Panel)**:
    *   User Management (Clients & Professionals).
    *   **Service Moderation**: View, edit, and remove any service (Soft Delete).
    *   Category & Report Management.

### 🛠️ Architecture & Tech Stack

*   **Mobile**: React Native (Expo) - *Client/Professional UI*.
*   **Web Admin**: FilamentPHP (Laravel Blade) - *Management Panel*.
*   **Backend**: Laravel RESTful API.
*   **Database**: MySQL.

### 🗄️ Core Data Model

*   **Users**: `name`, `email`, `phone`, `role`.
*   **Categories**: `name`, `image_url`.
*   **Services**: `professional_id`, `category_id`, `name`, `description`, `price`, `active`, `deleted_at`.
*   **Service Requests**: `client_id`, `professional_id`, `service_id`, `agreed_price`, `status`.
