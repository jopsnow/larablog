## LaraBlog: A Simple Laravel Blog App (with Voyager Admin Panel)
Simple Blogging System with Voyager(Laravel Nova alternative).
Voyager is a FREE, open-source admin panel for Laravel application

## Requirements
- => PHP 7.3
- Laravel 8
- Voyager 1.3

## Installation Steps

### 1. Install dependencies

```bash
composer install
or 
php composer.phar install
```
### 2. Install Voyager
After creating your new Laravel application you can include the Voyager package with the following command:
```bash
php artisan voyager:install
```
All migrations files that you haven't migrated yet will be migrated.

### 3. Create a new admin user
```bash
php artisan voyager:admin your@email.com --create
```

#### Important!
Before you access the Voyager admin panel, we need to make a small change to our server configuration, since Voyager requires the 8000 port.


### 4. Access the admin panel
Go to http://localhost:8000/admin

