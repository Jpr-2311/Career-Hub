# CareerHub

CareerHub is a Laravel-based job portal that connects job seekers and employers through a clean, responsive web interface.

## Features

- User registration and login
- Admin and user roles
- Job posting and management
- Job search by title, keywords, skills and salary
- Company profiles
- Job details pages
- Archive, close, retrieve and decline job workflows
- User profile management
- Admin dashboard
- Seeded demo jobs and companies
- Responsive Bootstrap-based UI with CareerHub branding

## Tech Stack

- PHP 8+
- Laravel 9
- MySQL
- Bootstrap
- HTML5
- CSS3
- JavaScript

## Installation

```bash
git clone <your-repository-url>
cd careerHub

composer install

copy .env.example .env
php artisan key:generate

# Configure your MySQL database in .env
php artisan migrate
php artisan db:seed

php artisan storage:link

php artisan serve
```

For Linux/macOS, use:

```bash
cp .env.example .env
```

## Demo Accounts

### Admin
- Email: `admin@careerhub.com`
- Password: `password`

### Demo User
- Email: `demo@careerhub.com`
- Password: `password`


