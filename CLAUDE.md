# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

SmartDrugsX is a PHP e-commerce application built on **Sophia**, a custom lightweight MVC framework. It handles product browsing, shopping cart, checkout, and multiple payment methods (Stripe, PayPal, CoinPayments crypto, card, Zelle). There is an admin panel for managing products, orders, customers, and reviews.

## Development Setup

**Requirements:** PHP 7.2+, MySQL, Composer, Apache/Nginx

**Install dependencies:**
```bash
cd sophia && composer install
```

**Run locally with PHP built-in server:**
```bash
php -S localhost:8000
```

The entry point is `index.php`. All configuration (database, email, admin credentials) is hardcoded as `define()` constants in `index.php` — there is no `.env` file.

## Architecture

### Sophia Framework (`sophia/`)

The custom MVC framework lives in `sophia/` with PSR-4 autoloading defined in `sophia/composer.json`:

| Namespace | Directory | Purpose |
|-----------|-----------|---------|
| `Sophia\` | `sophia/framework/` | Core framework (router, base controller, helpers) |
| `Sophia\Addon\` | `sophia/addons/` | Database, Email, Stripe, Coinpayments wrappers |
| `Controllers\` | `app/controllers/` | Page controllers (Home, Admin) |
| `Response\` | `app/response/` | AJAX/JSON endpoint handlers |
| `Model\` | `app/models/` | Business logic and data access |

### Routing (`sophia/framework/Core.php`)

URL format: `/?sophia=controller/method/param1/param2`

- Hyphens in URLs are converted to underscores before routing (done in `index.php`)
- Default: `Controllers\Home::index()`
- URLs starting with `response/` route to the `Response\` namespace instead of `Controllers\` — these are the AJAX API endpoints that return JSON
- Remaining URL segments are passed as method parameters
- Returns a 404 view if controller or method doesn't exist

### Controllers

Extend `\Sophia\Controller`. Key methods:
- `$this->model('Name')` — instantiate a model from `Model\` namespace
- `$this->view($arr)` — return view data; `page` defaults to the calling method name, `view` defaults to the controller name (lowercase)
- `$this->json($data)` — output JSON and `die()`
- `$this->set($fields)` — validate and escape POST input (used in Response controllers)
- `$this->check($fields)` — validate required fields, returns object with `_errors` array

### Input Handling via `set()`

Response controllers use `set()` to declare expected POST fields with filter functions:
```php
$this->Shop->set([
    ['product', 'ints'],      // extract integers
    ['email', 'isEmail'],     // validate email
    ['name', 'clean'],        // sanitize string
    ['password', 'md50'],     // hash
]);
```
All values are automatically escaped via `$this->DB->escape()`.

### Database (`sophia/addons/Database.php`)

MySQLi wrapper. Models access it via `$this->DB()` then `$this->DB->method()`:

| Method | Description |
|--------|-------------|
| `select($q)` | Fetch all rows as associative arrays |
| `fetch($q)` | Fetch single row (auto-appends `LIMIT 1`) |
| `check($q)` | Fetch single scalar value |
| `query($q)` | Execute raw query; returns `insert_id` for INSERT, `affected_rows` for UPDATE |
| `get($q, $ttl)` | Cached select — file-based cache in `sophia/addons/db_cache/`, default 10s TTL |
| `escape($q)` | `real_escape_string()` wrapper |
| `numRows($q)` | Count rows via `SELECT count(id) FROM ...` |

### Views (`views/`)

Plain PHP templates. The view file is resolved as `views/{controller}/{method}.php`. Layout wrappers are `views/home.php` (frontend) and `views/admin.php` (admin). Data returned from controllers is available as variables in the view.

### Asset Management

CSS and JS are registered globally in `index.php` and per-controller in constructors via `style` and `script` arrays. The framework loads page-specific assets from `assets/sophia/css/{view}/{page}.css` and `assets/sophia/js/{view}/{page}.js` automatically.

### Helper Functions (`sophia/framework/Functions.php`)

Large utility file (~9300 lines) auto-loaded by Composer. Key functions:
- `ints($q)` — extract integer from input
- `clean($q)` — sanitize string
- `isEmail($q)` — validate email format
- `md50($q)` — custom MD5-based hash
- `ip()` — get client IP (CloudFlare-aware)
- `post($v)` / `post_raw($v)` — get POST data
- `format_uri($str)` — slugify for URLs
- `content($view, $data)` — render a view template
- `writeFile()` / `readFiles()` / `pathFile()` — file I/O helpers

### Authentication

Admin auth is session-based: `$_SESSION['admin'] = true` after login. Credentials are checked against `ADMIN_USERNAME` and `ADMIN_PASSWORD` constants. There are no frontend user accounts — carts are session-based.

### Payment Integrations

- **Stripe**: `sophia/addons/Stripe.php` — creates customer and charge
- **CoinPayments**: `sophia/addons/Coinpayments.php` + `app/models/Ipn.php` for IPN callbacks
- **PayPal, Card, Zelle**: Handled in `app/models/Shop.php` checkout flow

### Email

PHPMailer via `sophia/addons/Email.php`. SMTP config in `index.php`. HTML email templates are in the project root (`email_*.html`). Klaviyo SDK integrated for marketing automation.

## Key Files

- `index.php` — entry point, all config constants, asset registration, HTML shell
- `sophia/framework/Core.php` — router
- `sophia/framework/Controller.php` — base controller class
- `sophia/framework/Functions.php` — global helper functions
- `sophia/addons/Database.php` — MySQL wrapper
- `app/controllers/Home.php` — frontend page controller
- `app/controllers/Admin.php` — admin panel controller
- `app/response/Shop.php` — cart/checkout AJAX endpoints
- `app/response/Admin.php` — admin AJAX endpoints
- `app/models/Shop.php` — e-commerce business logic
- `app/models/Admin.php` — admin data operations
- `app/models/Ipn.php` — crypto payment IPN handler

## No Build/Test/Lint Tooling

This project has no build step, no test framework, no linter, and no CI/CD pipeline. PHP files are served directly.
