markdown
# Inventory Management System — Backend (Laravel API)

A RESTful API backend for a full-stack Inventory Management System, built with Laravel 12 and Laravel Sanctum for authentication. Developed as part of a Web Development Internship (Laravel + React).

## Tech Stack

- **Framework:** Laravel 12
- **Database:** SQLite
- **Authentication:** Laravel Sanctum (token-based)
- **PHP:** 8.2+

## Features

### Authentication
- User registration and login (token-based via Sanctum)
- Logout, current-user info, and change-password endpoints

### Master Data Modules (Week 2)
- **Category** — name, slug, description, status
- **Brand** — name, logo (image upload), description, status
- **Supplier** — name, company name, email, phone, address, city, country, status
- **Customer** — name, email, phone, address, customer type (retail/wholesale), status
- **Product** — name, SKU, category, brand, unit, purchase price, sale price, stock quantity, reorder level, image, description, status

Every module supports:
- Full CRUD (Create, Read, Update, Delete)
- Server-side search and pagination
- Form validation (required fields, unique constraints, image type/size limits)
- Image upload for Brand (logo) and Product (image)

## Project Structure

app/
├── Models/ Category, Brand, Supplier, Customer, Product, User
├── Http/
│ ├── Controllers/Api/ AuthController + one controller per module
│ ├── Requests/ Validation rules per module
│ └── Resources/ (reserved for API response transformers)
database/
├── migrations/ One migration per module
├── seeders/ One seeder per module + DatabaseSeeder
routes/
└── api.php All API routes (auth + Week 2 modules)


## Setup

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed      # creates tables and inserts sample data
php artisan storage:link        # required for brand logos / product images
php artisan serve
```

The API will be available at `http://127.0.0.1:8000`.

## API Endpoints

### Authentication
| Method | Endpoint              | Description                  |
|--------|------------------------|-------------------------------|
| POST   | /api/register           | Register a new user          |
| POST   | /api/login               | Log in and receive a token    |
| POST   | /api/logout               | Log out (revoke token)        |
| GET    | /api/user                  | Get the authenticated user    |
| POST   | /api/change-password       | Change the current password   |

### Master Data (all require `Authorization: Bearer <token>`)
| Method | Endpoint                     | Description        |
|--------|--------------------------------|---------------------|
| GET    | /api/{resource}                 | List (search, paginate) |
| POST   | /api/{resource}                 | Create              |
| GET    | /api/{resource}/{id}            | Show                |
| PUT    | /api/{resource}/{id}            | Update              |
| DELETE | /api/{resource}/{id}            | Delete              |

Where `{resource}` is one of: `categories`, `brands`, `suppliers`, `customers`, `products`.

`brands` and `products` accept `multipart/form-data` for logo/image uploads.

## Sample Data

Running `php artisan db:seed` (or `migrate --seed`) populates the database with:
- 5 categories
- 5 brands
- 5 suppliers
- 5 customers
- 10 products (linked to the seeded categories/brands)

## Frontend

The companion React frontend for this project is available at:
`https://github.com/khansazahidcs-crypto/inventory-management-frontend`

## License

Built on the [Laravel framework](https://laravel.com), open-sourced under the [MIT license](https://opensource.org/licenses/MIT).