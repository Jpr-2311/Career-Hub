# CareerHub

**A Laravel job portal for discovering opportunities, presenting companies, and managing job listings.**

CareerHub brings job seekers, employers, and administrators together in one web application. Candidates can explore published jobs and build a profile; employers can create company profiles and job listings; administrators can review and manage submissions.

## Contents

- [Features](#features)
- [Technology](#technology)
- [Requirements](#requirements)
- [Getting started](#getting-started)
- [Demo accounts](#demo-accounts)
- [How it works](#how-it-works)
- [Useful commands](#useful-commands)
- [Project structure](#project-structure)
- [Testing](#testing)
- [Production checklist](#production-checklist)

## Features

- Browse active job listings and search by title, description, requirements, qualifications, or salary.
- View company profiles and job details.
- Register and sign in using Laravel's authentication scaffolding.
- Create a candidate profile, including personal details, education, and experience.
- Create and manage company profiles and job postings.
- Submit company and job listings for administrator review.
- Review users, companies, and job listings from the administrator dashboard.
- Track listing states such as pending, active, archived, closed, and rejected.
- Use a responsive interface styled with Bootstrap and CareerHub CSS.
- Load local sample users, companies, and jobs using database seeders.

## Technology

| Area | Technology |
| --- | --- |
| Backend | PHP 8.0.2+ and Laravel 9 |
| Database | MySQL or MariaDB |
| Frontend | Blade, Bootstrap, Sass, and JavaScript |
| Asset build | Vite 4 |
| Automated tests | PHPUnit 9 |

## Requirements

- PHP **8.0.2 or newer**, with the extensions required by Laravel and a PDO driver for your database.
- [Composer](https://getcomposer.org/)
- MySQL or MariaDB
- [Node.js and npm](https://nodejs.org/) for compiling frontend assets

## Getting started

### 1. Get the code and install dependencies

From the directory where you keep your projects:

```bash
git clone <repository-url>
cd CareerHub-Laravel-Job-Portal
composer install
npm install
```

Replace `<repository-url>` with the URL of your CareerHub repository.

### 2. Configure the environment

Create your local environment file.

**Windows PowerShell**

```powershell
Copy-Item .env.example .env
```

**macOS / Linux**

```bash
cp .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

Edit `.env` and set the URL and database credentials for your local setup:

```dotenv
APP_NAME=CareerHub
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=careerhub
DB_USERNAME=root
DB_PASSWORD=
```

Create the `careerhub` database (or use a different name and update `DB_DATABASE`) before running migrations.

### 3. Create tables and sample data

```bash
php artisan migrate --seed
php artisan storage:link
```

The seeders create local demo accounts and sample companies and jobs. Run them only against a development database; the included demo credentials are public and must not be used in a deployed environment.

### 4. Build assets and start the app

```bash
npm run build
php artisan serve
```

Open [http://127.0.0.1:8000](http://127.0.0.1:8000). For frontend development with Vite's watcher, use `npm run dev` in a separate terminal instead of `npm run build`.

## Demo accounts

These accounts are created by `php artisan db:seed`:

| Role | Email | Password |
| --- | --- | --- |
| Administrator | `admin@careerhub.com` | `password` |
| Demo user | `demo@careerhub.com` | `password` |

Sign in at `/login`. The administrator dashboard is available at `/admin-dashboard` after signing in as the administrator.

> **Security:** These are predictable, publicly documented development credentials. Do not expose a seeded administrator account on a public or production instance. Use a fresh database and provision secure credentials for deployment.

## How it works

### Candidates and registered users

Registered users can browse published opportunities, search job details, and create a profile with personal information, education, and experience.

### Employers

Users can create company profiles and post jobs. Submissions from non-administrator accounts enter a pending state for review. Owners can manage their listings, including archiving or closing job posts.

### Administrators

Administrators can access the protected dashboard to review and manage user, company, and job records. Administrators can publish or decline submissions and manage listing status.

## Useful commands

Run these from the project root:

| Command | Purpose |
| --- | --- |
| `php artisan serve` | Start Laravel's local development server |
| `php artisan route:list` | Inspect registered application routes |
| `php artisan migrate:status` | Check migration status |
| `php artisan migrate` | Apply pending database migrations |
| `php artisan db:seed` | Add the demo accounts and sample records to the configured database |
| `npm run dev` | Run Vite in development mode |
| `npm run build` | Compile frontend assets for serving |
| `vendor/bin/phpunit` | Run the PHPUnit test suite |

## Project structure

```text
app/
  Http/Controllers/   Request handling for jobs, companies, users, and administration
  Http/Middleware/    Authentication, administrator, and profile middleware
  Models/             Eloquent models
database/
  migrations/         Database schema
  seeders/            Demo users, companies, and jobs
resources/
  js/                 JavaScript entry points
  sass/               Sass entry point and styles
  views/              Blade templates
routes/
  web.php             Web routes
public/
  css/                Application and vendor stylesheets
  plugins/            Frontend plugin assets
```

## Testing

Run the PHPUnit suite with:

```bash
vendor/bin/phpunit
```

The repository includes Laravel's example unit and feature tests. Configure a test database in `phpunit.xml` before adding or running tests that write to a database.

## Production checklist

- Set `APP_ENV=production` and `APP_DEBUG=false`.
- Set a unique `APP_KEY` and production-safe database credentials.
- Do not use the seeded demo accounts; create secure administrator credentials.
- Serve the app over HTTPS and configure `APP_URL` for the deployed domain.
- Build frontend assets with `npm run build`.
- Ensure Laravel's `storage` and `bootstrap/cache` directories are writable by the application.
