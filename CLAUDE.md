# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a PHP-based e-commerce application called "SmartDrugsX" built on a custom MVC framework named "Sophia". The application handles product sales, checkout, admin management, and integrates with payment providers (Stripe, Coinpayments), email services, and Klaviyo.

## Running the Application

**Development Server:**
```bash
php -S localhost:8000 router.php
```

The `router.php` file handles clean URL routing for the PHP built-in server, mimicking Apache's mod_rewrite:
- `/home/shop` → `?sophia=home/shop`
- `/admin/login` → `?sophia=admin/login`
- Hyphens in URLs are converted to underscores for method names (e.g., `/admin/popup-settings` → `popup_settings` method)

**Database Connection:**
- Host: localhost
- User: smartdrugsx_admin
- Database: smartdrugsx_admin
- Ensure MySQL/MariaDB is running before starting the development server

**Dependencies:**
```bash
cd sophia
composer install
```

## Architecture

### Request Flow

1. `index.php` - Entry point that defines constants, loads dependencies, and renders the main HTML wrapper
2. `sophia/framework/Core.php` - Parses the `sophia` URL parameter (e.g., `?sophia=home/shop`)
   - Format: `/{controller}/{method}/{params...}`
   - Default controller: `Home`, default method: `index`
   - Special case: URLs starting with `response/` route to Response handlers instead of Controllers
3. Controllers in `app/controllers/` handle business logic
4. Models in `app/models/` handle database operations
5. Views in `views/` render HTML templates
6. Response handlers in `app/response/` return JSON for AJAX requests

### Directory Structure

```
app/
├── controllers/     # Business logic (Home.php, Admin.php)
├── models/         # Database operations (Shop.php, Admin.php, Ipn.php)
├── response/       # AJAX/JSON endpoints (Shop.php, Admin.php)
sophia/
├── framework/      # Core framework classes (Core, Controller, Javascript, Stylesheet)
├── addons/        # Third-party integrations (Database, Email, Stripe, Coinpayments)
├── data/          # Static data files (countries.php, regional_countries.php)
views/
├── home/          # Frontend views for shop
├── admin/         # Admin panel views
assets/
├── sophia/js/     # JavaScript files (home.js, admin/*.js)
├── hono/          # Frontend theme assets
```

### Framework Components

**Sophia\Core:**
- Parses URLs via `sophia` parameter
- Routes to Controllers (default) or Response handlers
- Returns "404" if controller/method doesn't exist

**Sophia\Controller (base class):**
- `DB()` - Initialize database connection
- `model($name)` - Load a model from `app/models/`
- `view($arr)` - Prepare data for view rendering, returns merged data array
- `json($data)` - Return JSON response and terminate
- `set($fields)` - Process and sanitize POST data
- `check($required)` - Validate required fields

**Autoloading (PSR-4):**
- `Sophia\Addon\` → `sophia/addons/`
- `Sophia\` → `sophia/framework/`
- `Controllers\` → `app/controllers/`
- `Response\` → `app/response/`
- `Model\` → `app/models/`

### Key Patterns

**Controllers:**
- Extend `Sophia\Controller`
- Methods return arrays passed to `view()` helper
- Use `$this->model('ModelName')` to load models
- Use `$this->json()` for API responses

**Models:**
- Handle all database operations via `$this->DB` (instance of `Sophia\Addon\Database`)
- Return data arrays or execute queries

**Response Handlers:**
- Located in `app/response/`
- Handle AJAX requests from JavaScript
- Always return JSON via `$this->json()`

**Views:**
- PHP templates in `views/`
- Receive data arrays from controllers
- Main wrapper is in `index.php` (lines 145-213)
- Use `content()` helper to include view files

### Asset Management

**CSS/JS Loading:**
- Defined in `index.php` in the `$data` array (lines 75-129)
- `Sophia\Stylesheet::add()` and `Sophia\Javascript::add()` register assets
- `Sophia\Stylesheet::page()` and `Sophia\Javascript::page()` render tags
- Controllers can add page-specific assets via `$this->data['style']` and `$this->data['script']`

**Third-party Libraries:**
- Bootstrap 4.6, jQuery 3.5, Font Awesome, SweetAlert2
- Stripe.js for payment processing
- Klaviyo for email marketing
- Hono theme (local assets in `/assets/hono/`)

## Common Tasks

**Add a new page:**
1. Add method to controller (e.g., `public function shop_page()` in `app/controllers/Home.php`)
2. Create view file (e.g., `views/home/shop_page.php`)
3. Access via URL: `http://localhost:8000/home/shop-page` (hyphens become underscores)

**Add an AJAX endpoint:**
1. Create method in `app/response/{Controller}.php`
2. Call from JavaScript: `fetch('/?sophia=response/{controller}/{method}')`
3. Return data using `$this->json($data)`

**Add database operations:**
1. Add method to model in `app/models/`
2. Use `$this->DB->query()` or helper methods
3. Call from controller: `$this->model('ModelName')->methodName()`

**Debug database queries:**
- Model files contain raw SQL queries
- Check `Sophia\Addon\Database` in `sophia/addons/Database.php` for query methods

## Important Configuration

**Constants (index.php):**
- `DIR` - Document root
- `APP` - Application directory
- `VIEWS` - Views directory path
- `SITENAME` - Site name displayed in titles
- `PAGINATION` - Items per page (10)
- Database credentials: `DB_HOST`, `DB_USER`, `DB_PASS`, `DB_NAME`
- Admin credentials: `ADMIN_USERNAME`, `ADMIN_PASSWORD`
- Email settings: `EMAIL_HOST`, `EMAIL_USERNAME`, `EMAIL_PASSWORD`

**Security:**
- Admin authentication handled in `app/controllers/Admin.php`
- Input sanitization via `$this->DB->escape()` in Controller's `set()` method
- HTTPS URLs are enforced for external resources

## Testing Pages

Test frontend pages:
```bash
curl -s "http://localhost:8000/home/shop"
curl -s "http://localhost:8000/home/shopus"
curl -s "http://localhost:8000/home/shopeu"
curl -s "http://localhost:8000/home/checkout"
```

Test admin pages (requires authentication):
```bash
curl -s "http://localhost:8000/admin/login"
```

## Recent Changes

The following files have been recently modified or added:
- Admin system: Customer management, order management, promo codes, popup settings
- Shop model enhancements for regional shops (US, EU, UK, Premium)
- Country/regional data files added in `sophia/data/`
- JavaScript updates for admin functionality (customers.js, popup_settings.js)
