# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is an e-commerce platform built with a custom PHP framework called "Sophia". The application sells smart drugs/nootropics and supports multiple payment methods (Stripe, PayPal, cryptocurrency via CoinPayments).

**Technology Stack:**
- PHP with custom Sophia MVC framework
- MySQL database
- Composer for dependency management
- External integrations: Stripe, Klaviyo (email marketing), PHPMailer

## Framework Architecture (Sophia)

### Request Flow
1. All requests hit [index.php](index.php), which bootstraps the application
2. [Sophia\Core::init()](sophia/framework/Core.php) parses URLs via `sophia` GET parameter: `/?sophia=Controller/method/param1/param2`
3. URLs map to: `Controllers\{Controller}::{method}(param1, param2)`
4. Special case: URLs starting with `Response/` map to `Response\{Controller}` (used for AJAX endpoints)

### Directory Structure
- `sophia/framework/` - Core framework classes (Core, Controller, Javascript, Stylesheet)
- `sophia/addons/` - Service classes (Database, Email, Stripe, Coinpayments)
- `app/controllers/` - Application controllers (Home, Admin)
- `app/models/` - Data models (Shop, Admin, Ipn)
- `app/response/` - AJAX response handlers (Shop, Admin)
- `views/` - PHP view templates organized by controller (`views/home/`, `views/admin/`)

### Key Framework Classes

**Sophia\Controller** ([sophia/framework/Controller.php](sophia/framework/Controller.php)):
- `view($arr)` - Returns data array for view rendering; auto-determines view path from class/method name
- `json($data, $t)` - Outputs JSON response and terminates
- `set($fields)` - Sanitizes POST data into `$this->_req` array
- `check($rules)` - Validates required fields, returns object with `_errors` array
- `model($name)` - Instantiates model from `Model\` namespace

**Sophia\Addon\Database** ([sophia/addons/Database.php](sophia/addons/Database.php)):
- `query($sql)` - Execute query; auto-returns insert_id for INSERT, affected_rows for UPDATE
- `select($sql)` - Returns array of associative arrays
- `fetch($sql)` - Returns single row (auto-adds LIMIT 1)
- `escape($str)` - Escape string for SQL safety
- `check($sql)` - Returns last value from fetch result, or 0 if empty

### Configuration Constants (defined in index.php)
- Database: `DB_HOST`, `DB_USER`, `DB_PASS`, `DB_NAME`
- Email: `EMAIL_HOST`, `EMAIL_USERNAME`, `EMAIL_PASSWORD`
- Admin credentials: `ADMIN_USERNAME`, `ADMIN_PASSWORD`
- Paths: `DIR` (document root), `APP`, `VIEWS`

## Common Development Commands

### Composer
```bash
cd sophia
composer install              # Install dependencies
composer update               # Update dependencies
composer dump-autoload        # Regenerate autoloader
```

### Local Development Setup

#### 1. Install MySQL (if not installed)
```bash
brew install mysql
brew services start mysql
```

#### 2. Create Database and User
```bash
# Login to MySQL (fresh install usually has no root password)
mysql -u root

# Or if password is set:
mysql -u root -p

# Run these SQL commands:
CREATE DATABASE smartdrugsx_admin;
CREATE USER 'smartdrugsx_admin'@'localhost' IDENTIFIED BY 'SmArTnewpassX0987';
GRANT ALL PRIVILEGES ON smartdrugsx_admin.* TO 'smartdrugsx_admin'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

#### 3. Import Database Schema
```bash
mysql -u smartdrugsx_admin -pSmArTnewpassX0987 smartdrugsx_admin < database_schema.sql
```

This creates all required tables and adds sample data for testing.

#### 4. Start Development Server

**Option A: With Clean URLs (Recommended)**
```bash
# Uses router.php to mimic Apache's mod_rewrite behavior
php -S localhost:8000 router.php

# Access with clean URLs (like production):
# http://localhost:8000/home/shop
# http://localhost:8000/home/shopus
# http://localhost:8000/admin/login
```

**Option B: Without Clean URLs**
```bash
# Standard PHP server (no URL rewriting)
php -S localhost:8000

# Access with ?sophia= parameter:
# http://localhost:8000/?sophia=home/shop
# http://localhost:8000/?sophia=admin/login
```

**Note:** PHP's built-in server doesn't process `.htaccess` files. Use [router.php](router.php) to enable clean URLs locally that match production behavior.

### Database
Database connection is auto-initialized via `Sophia\Addon\Database` constructor. Credentials defined in [index.php](index.php:67-70) constants.

**Database Tables:**
- `categories`, `products`, `product_package`, `product_images`, `product_description`
- `quantity_discount`, `reviews`, `promo_codes`, `used_promo`
- `checkout`, `checkout_cart`, `customers`, `payments`, `coinpayments`
- `order_timeline`, `subscribers`

See [database_schema.sql](database_schema.sql) for complete schema definition.

**Regional Shop Variants:**
The application has regional-specific shop pages that filter products by category:
- `/home/shopus` (category 9) - US Domestic products
- `/home/shopeu` (category 12) - EU Domestic products
- `/home/shopuk` (category 11) - UK Domestic products
- `/home/shopin` (category 14) - India Domestic products
- `/home/shoppremium` (category 15) - Premium products
- `/home/shop` - All products except category 9

To add test data for regional shops, run:
```bash
mysql -u smartdrugsx_admin -pSmArTnewpassX0987 smartdrugsx_admin < add_regional_data.sql
```

## Development Guidelines

### Creating a New Controller Method
1. Add method to controller in `app/controllers/`
2. Return `$this->view([...data...])` for page rendering
3. Create corresponding view file in `views/{controller}/{method}.php`
4. Access via `/?sophia={controller}/{method}`

### Creating an AJAX Endpoint
1. Add method to controller in `app/response/`
2. Use `$this->set([...])` to sanitize POST inputs
3. Call model methods and return with `$this->json($result, true)`
4. Access via `/?sophia=response/{controller}/{method}`

### Database Queries
Always use `$this->DB->escape()` on user input or use the `set()` method which auto-escapes. The `set()` method accepts field names with optional sanitization functions (e.g., `'field'`, `['field', 'ints']`, `['field', 'clean']`).

### Model Pattern
Models extend `Sophia\Controller` to access `$this->DB`. They contain business logic and database queries. Initialize DB in constructor with `$this->DB()`.

### View Rendering
The `content()` helper function (in [sophia/framework/Functions.php](sophia/framework/Functions.php)) includes view files. Views receive data as `$data` variable extracted into local scope.

### Asset Management
CSS/JS dependencies are registered in [index.php](index.php) in `$data['css']` and `$data['js']` arrays. Use:
- `Stylesheet::add($name, $url)` / `Stylesheet::page($data)` for CSS
- `Javascript::add($name, $url)` / `Javascript::page($data)` for JS

## Third-Party Integrations

**Stripe** - Payment processing via `sophia/addons/Stripe.php`
**Klaviyo** - Email marketing (Company ID: UEJZUV in index.php)
**CoinPayments** - Cryptocurrency payments via `sophia/addons/Coinpayments.php`
**PHPMailer** - Email sending via `sophia/addons/Email.php`

## Important Notes

- Session-based cart system stored in `$_SESSION['cart']`
- Timezone set to Europe/Belgrade
- URL routing expects `/?sophia=` parameter (mod_rewrite likely configured)
- Admin authentication checks should verify against `ADMIN_USERNAME` and `ADMIN_PASSWORD` constants
- Sensitive credentials are hardcoded in index.php (not ideal for production - consider environment variables)
