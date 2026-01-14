# 📊 Dashboard em PHP com Laravel

Este projeto é um **Dashboard administrativo** desenvolvido com **PHP (Laravel)**, focado em organização de usuários, autenticação e visualização de dados em uma interface moderna utilizando AdminLTE e Bootstrap.

O objetivo principal do projeto foi praticar **desenvolvimento fullstack com Laravel**, integração de front-end com Blade + Vite e realizar o **deploy completo em produção utilizando Railway**.

---

## 🚀 Tecnologias Utilizadas

### Backend

-   **PHP 8+**
-   **Laravel**
-   **MySQL**
-   **Eloquent ORM**
-   **Autenticação Laravel (Auth)**

### Frontend

-   **Blade (Template Engine do Laravel)**
-   **JavaScript**
-   **Vite**
-   **Bootstrap 5**
-   **AdminLTE 4**
-   **Bootstrap Icons**
-   **OverlayScrollbars**

### Infraestrutura / Deploy

-   **Railway**
-   **Docker (para build em produção)**
-   **HTTPS com Railway + Laravel**
-   **Node.js (build dos assets)**
-   **NPM**

---

## ✨ Funcionalidades

-   Sistema de autenticação (login e registro)
-   CRUD de usuários
-   Gerenciamento de perfis, interesses e cargos
-   Dashboard administrativo com layout responsivo
-   Integração entre backend Laravel e frontend via Blade + Vite
-   Build de assets com Vite
-   Deploy automatizado no Railway

---

## 📚 Aprendizados

Durante o desenvolvimento deste projeto, foram praticados e aprendidos:

-   Estrutura e organização de projetos Laravel
-   Uso de **Blade** para criação de layouts reutilizáveis
-   Compilação de assets com **Vite**
-   Integração de bibliotecas frontend (Bootstrap, AdminLTE, Icons)
-   Configuração de ambiente de produção
-   Resolução de problemas de **mixed content (HTTP vs HTTPS)**
-   Deploy de aplicações Laravel no **Railway**
-   Uso de variáveis de ambiente (`.env`)
-   Build e cache de produção (`php artisan optimize`)

---

## 🛠️ Como rodar o projeto localmente

```bash
git clone https://github.com/seu-usuario/seu-repo.git
cd seu-repo

composer install
npm install

cp .env.example .env
php artisan key:generate

php artisan migrate
npm run dev
php artisan serve
```
