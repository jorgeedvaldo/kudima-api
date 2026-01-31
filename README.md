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

### 📡 Documentação da API

A API segue o padrão RESTful e aceita/retorna JSON. Os endpoints abaixo devem ser prefixados com a URL base da API (ex: `http://localhost:8000`).

#### 🔐 Autenticação (Público)

**`POST /api/register`**
*   **Descrição**: Registo de novo utilizador.
*   **Body**:
    ```json
    {
      "name": "Nome do Usuário",
      "email": "email@exemplo.com",
      "phone": "923456789",
      "password": "senha_segura",
      "password_confirmation": "senha_segura",
      "role": "client" // ou "professional" (default: "client")
    }
    ```
*   **Response (201)**: `{ "access_token": "...", "token_type": "Bearer", "user": {...} }`

**`POST /api/login`**
*   **Descrição**: Login e obtenção de token.
*   **Body**:
    ```json
    {
      "email": "email@exemplo.com",
      "password": "senha_segura"
    }
    ```
*   **Response (200)**: `{ "access_token": "...", "token_type": "Bearer", "user": {...} }`

#### 🛡️ Endpoints Protegidos
*Requer Header*: `Authorization: Bearer <seu_token>`

**`POST /api/logout`**
*   **Descrição**: Invalida o token atual.

**`GET /api/user`**
*   **Descrição**: Retorna dados do utilizador logado (inclui perfil se for profissional).

**`GET /api/categories`**
*   **Descrição**: Lista todas categorias.
*   **Response**: `[ { "id": 1, "name": "...", "image_url": "..." }, ... ]`

**`GET /api/services`**
*   **Descrição**: Pesquisa de serviços.
*   **Query Params**:
    *   `category_id`: Filtrar por categoria.
    *   `professional_id`: Serviços de um profissional específico.
    *   `search`: Busca por nome do serviço.
*   **Response**: Lista de serviços com dados da categoria.

**`GET /api/professionals`**
*   **Descrição**: Lista profissionais cadastrados.
*   **Query Params**: `category_id` (Filtrar por competência).
*   **Response**: Lista de usuários (role=professional) com perfil e categorias.

**`GET /api/professionals/{id}`**
*   **Descrição**: Perfil completo do profissional.
*   **Response**: Dados do user, `professionalProfile`, `professionalCategories`, `reviewsReceived`.

**`GET /api/requests`**
*   **Descrição**: Histórico de solicitações (visão do cliente e profissional).
*   **Response**: Lista de pedidos com status, cliente, profissional e categoria.

**`POST /api/requests`**
*   **Descrição**: Criar nova solicitação de serviço.
*   **Body**:
    ```json
    {
      "professional_id": 1,
      "category_id": 2,
      "description": "Descrição do problema...",
      "scheduled_at": "2024-01-01 10:00:00" // Opcional
    }
    ```
*   **Response (201)**: Dados do pedido criado (status inicial: `pending`).

**`PATCH /api/requests/{id}/status`**
*   **Descrição**: Atualizar status do pedido.
*   **Body**: `{"status": "accepted"}`
*   **Valores**: `accepted` (aceite), `rejected` (recusa), `completed` (conclusão), `cancelled` (cancelamento).

**`POST /api/reviews`**
*   **Descrição**: Avaliar serviço concluído.
*   **Regras**: Apenas cliente do pedido, status deve ser `completed`.
*   **Body**:
    ```json
    {
      "service_request_id": 15,
      "rating": 5, // Inteiro 1-5
      "comment": "Serviço excelente!"
    }
    ```
*   **Response (201)**: Review criada.

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

### 📡 API Documentation

The API follows the RESTful pattern and accepts/returns JSON. The endpoints below should be prefixed with the API base URL (e.g., `http://localhost:8000`).

#### 🔐 Authentication (Public)

**`POST /api/register`**
*   **Description**: Register a new user.
*   **Body**:
    ```json
    {
      "name": "User Name",
      "email": "email@example.com",
      "phone": "923456789",
      "password": "secure_password",
      "password_confirmation": "secure_password",
      "role": "client" // or "professional" (default: "client")
    }
    ```
*   **Response (201)**: `{ "access_token": "...", "token_type": "Bearer", "user": {...} }`

**`POST /api/login`**
*   **Description**: Login and token retrieval.
*   **Body**:
    ```json
    {
      "email": "email@example.com",
      "password": "secure_password"
    }
    ```
*   **Response (200)**: `{ "access_token": "...", "token_type": "Bearer", "user": {...} }`

#### 🛡️ Protected Endpoints
*Requires Header*: `Authorization: Bearer <your_token>`

**`POST /api/logout`**
*   **Description**: Invalidates the current token.

**`GET /api/user`**
*   **Description**: Returns logged-in user data (includes profile if professional).

**`GET /api/categories`**
*   **Description**: Lists all categories.
*   **Response**: `[ { "id": 1, "name": "...", "image_url": "..." }, ... ]`

**`GET /api/services`**
*   **Description**: Search for services.
*   **Query Params**:
    *   `category_id`: Filter by category.
    *   `professional_id`: Services from a specific professional.
    *   `search`: Search by service name.
*   **Response**: List of services with category data.

**`GET /api/professionals`**
*   **Description**: Lists registered professionals.
*   **Query Params**: `category_id` (Filter by competence).
*   **Response**: List of users (role=professional) with profile and categories.

**`GET /api/professionals/{id}`**
*   **Description**: Full professional profile.
*   **Response**: User data, `professionalProfile`, `professionalCategories`, `reviewsReceived`.

**`GET /api/requests`**
*   **Description**: Request history (client and professional view).
*   **Response**: List of requests with status, client, professional, and category.

**`POST /api/requests`**
*   **Description**: Create a new service request.
*   **Body**:
    ```json
    {
      "professional_id": 1,
      "category_id": 2,
      "description": "Problem description...",
      "scheduled_at": "2024-01-01 10:00:00" // Optional
    }
    ```
*   **Response (201)**: Created request data (initial status: `pending`).

**`PATCH /api/requests/{id}/status`**
*   **Description**: Update request status.
*   **Body**: `{"status": "accepted"}`
*   **Values**: `accepted`, `rejected`, `completed`, `cancelled`.

**`POST /api/reviews`**
*   **Description**: Rate completed service.
*   **Rules**: Only request client, status must be `completed`.
*   **Body**:
    ```json
    {
      "service_request_id": 15,
      "rating": 5, // Integer 1-5
      "comment": "Excellent service!"
    }
    ```
*   **Response (201)**: Review created.
