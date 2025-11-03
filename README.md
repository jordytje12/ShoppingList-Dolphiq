# Shopping List API Dolphiq

A simple REST API for a shopping list.

## Features
- Create a shopping list with name and date
- Add grocery to a shopping list
- Delete grocery from a shopping list
- Update grocery in a shopping list
- List all groceries form a shopping list

## Requirements
- PHP 8.1+
- Composer
- SQLite or MySQL

## Installation
### 1. Clone repository
git clone https://github.com/jordytje12/ShoppingList-Dolphiq.git
cd ShoppingList-Dolphiq

### 2. Install dependencies
composer install
npm install

### 3. Environment setup
cp .env.example .env
php artisan key:generate

### 4. Make storage and cache
mkdir -p storage/framework/{cache,sessions,views} bootstrap/cache
chmod -R 775 storage bootstrap/cache

### 5. SQLite quick setup
mkdir -p database && touch database/database.sqlite

### 6. Run migrations
php artisan migrate

### 7. Run server
php artisan serve

The api is now running on http://localhost:8000/

## API Endpoints
Base URL: `http://localhost:8000/api`

- `POST /shopping-lists` - Create shopping list (body: `name`, `date`)
- `GET /shopping-lists/{shopping_list}` - List all groceries from a shopping list
- `POST /shopping-lists/{shopping_list}/groceries` - Add grocery (body: `name`, `quantity`)
- `PATCH /groceries/{grocery}` - Update grocery quantity (body: `quantity`)
- `DELETE /groceries/{grocery}` - Delete grocery
