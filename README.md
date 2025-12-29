# Kudima API

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Filament](https://img.shields.io/badge/Filament-Administrator-warning?style=for-the-badge)

[Português](#português) | [English](#english)

---

<a name="português"></a>
## 🇦🇴 Português

O **Kudima API** é o backend de uma plataforma de prestação de serviços que conecta Clientes a Profissionais qualificados (canalizadores, eletricistas, mecânicos, etc.). Este projeto fornece uma API RESTful para o aplicativo Android e um Painel Administrativo Web para gestão do sistema.

### 🚀 Funcionalidades Principais

*   **API RESTful (Mobile)**:
    *   **Autenticação**: Registo e Login para Clientes.
    *   **Catálogo de Serviços**: Pesquisa de serviços por categoria ou profissional.
    *   **Solicitações**: Criação de pedidos de serviço com orçamento acordado.
    *   **Avaliações**: Sistema de rating e comentários após o serviço.
*   **Painel Administrativo (Web)**:
    *   Desenvolvido com **FilamentPHP**.
    *   **Gestão de Usuários**:
        *   Criação e edição de perfis de Profissionais (incluindo especialidades e foto).
        *   Visualização e bloqueio de Clientes.
    *   **Gestão de Categorias**: Definição das áreas de atuação.
    *   **Gestão de Serviços**: Cadastro de serviços específicos e preços para profissionais.

### 🛠️ Tecnologias Utilizadas

*   **Framework**: Laravel 9.x / 10.x
*   **Admin Panel**: FilamentPHP v2
*   **Banco de Dados**: MySQL
*   **Autenticação API**: Laravel Sanctum

### 📦 Instalação e Configuração

1.  **Clonar o Repositório**:
    ```bash
    git clone https://github.com/seu-usuario/kudima-api.git
    cd kudima-api
    ```

2.  **Instalar Dependências**:
    ```bash
    composer install
    ```

3.  **Configurar Ambiente**:
    ```bash
    cp .env.example .env
    # Configure as variáveis DB_DATABASE, DB_USERNAME, etc. no .env
    ```

4.  **Gerar Chave e Migrar**:
    ```bash
    php artisan key:generate
    php artisan migrate
    ```

5.  **Criar Usuário Admin**:
    ```bash
    php artisan make:filament-user
    ```

6.  **Rodar o Servidor**:
    ```bash
    php artisan serve
    ```

### 🔗 Endpoints da API

| Método | Endpoint | Descrição |
| :--- | :--- | :--- |
| `POST` | `/api/register` | Registo de novo cliente |
| `POST` | `/api/login` | Autenticação no app |
| `GET` | `/api/categories` | Lista de categorias |
| `GET` | `/api/services` | Pesquisa de serviços (`?search=`, `?category_id=`) |
| `GET` | `/api/professionals` | Lista de profissionais |
| `POST` | `/api/requests` | Solicitar um serviço |

---

<a name="english"></a>
## 🇺🇸 English

**Kudima API** is the backend application for a service marketplace platform connecting Clients with skilled Professionals (plumbers, electricians, mechanics, etc.). It provides a RESTful API for the Android mobile app and a Web Administration Panel for system management.

### 🚀 Key Features

*   **RESTful API (Mobile)**:
    *   **Auth**: Client registration and login.
    *   **Service Catalog**: Search services by category or professional.
    *   **Requests**: Create service requests with agreed pricing.
    *   **Reviews**: Rating and comment system after service completion.
*   **Administration Panel (Web)**:
    *   Built with **FilamentPHP**.
    *   **User Management**:
        *   Create and edit Professional profiles (including specialties and photos).
        *   View and block Client access.
    *   **Category Management**: Define service categories.
    *   **Service Management**: Manage specific services and pricing for professionals.

### 🛠️ Tech Stack

*   **Framework**: Laravel 9.x / 10.x
*   **Admin Panel**: FilamentPHP v2
*   **Database**: MySQL
*   **API Auth**: Laravel Sanctum

### 📦 Installation & Setup

1.  **Clone Repository**:
    ```bash
    git clone https://github.com/your-username/kudima-api.git
    cd kudima-api
    ```

2.  **Install Dependencies**:
    ```bash
    composer install
    ```

3.  **Environment Setup**:
    ```bash
    cp .env.example .env
    # Configure DB_DATABASE, DB_USERNAME, etc. in .env
    ```

4.  **Generate Key & Migrate**:
    ```bash
    php artisan key:generate
    php artisan migrate
    ```

5.  **Create Admin User**:
    ```bash
    php artisan make:filament-user
    ```

6.  **Run Server**:
    ```bash
    php artisan serve
    ```

### 🔗 API Endpoints

| Method | Endpoint | Description |
| :--- | :--- | :--- |
| `POST` | `/api/register` | Register new client |
| `POST` | `/api/login` | App authentication |
| `GET` | `/api/categories` | List categories |
| `GET` | `/api/services` | Search services (`?search=`, `?category_id=`) |
| `GET` | `/api/professionals` | List professionals |
| `POST` | `/api/requests` | Request a service |
