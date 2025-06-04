# 📚 BookReview API

Uma API RESTful feita em Laravel para gerenciamento de livros, autores, gêneros e reviews. Ideal para aplicações que precisam de um sistema de avaliação e catálogo literário.

## 🚀 Funcionalidades

- CRUD de **Usuários** (com autenticação)
- CRUD de **Livros**
- CRUD de **Autores**
- CRUD de **Gêneros**
- Sistema de **reviews** para livros, incluindo notas e comentários
- Validação robusta de dados via Form Requests
- Relacionamentos entre entidades bem definidos (Laravel Eloquent)

## 🧱 Modelos

### 📘 Book
- `id`
- `title`
- `author_id`
- `genre_id`
- `description` (opcional)
- Timestamps

### ✍️ Author
- `id`
- `name`
- Timestamps

### 🎭 Genre
- `id`
- `name`
- Timestamps

### 👤 User
- `id`
- `name`
- `email`
- `password`
- Timestamps

### 📝 Review
- `id`
- `user_id`
- `book_id`
- `rating` (1 a 5)
- `comment` (opcional)
- Timestamps

## 🔁 Relacionamentos

- Um **Book** pertence a um **Author** e a um **Genre**
- Um **Review** pertence a um **User** e a um **Book**
- Um **User** pode ter vários **Reviews**
- Um **Book** pode ter várias **Reviews**

## 🔐 Autenticação

Autenticação baseada em Laravel Sanctum.

```bash
composer require laravel/sanctum
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
php artisan migrate
