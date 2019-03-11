# Laravel simple role handling & middleware

* [Installation](#installation) 
* [Usage](#usage)
* [Seeding (optional)](#seeding-(optional)) 

## Installation:
This package can be used in Laravel 5.7 or higher.

You can install the package via composer:
```bash
composer require dasperg/laravel-role
```

Create the role tables by running the migrations:
```bash
php artisan migrate
```

Add RoleTrait to your `User` model:
```php
use Dasperg\Role\RoleTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use RoleTrait;
    
    // ...
}
```

Register middleware in `app/Http/Kernel.php` file:
```php
protected $routeMiddleware = [
    // ...
    'role' => Dasperg/Role/RoleMiddleware::class,
];
```


## Usage
Controller:
```php
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }
    ...
```
Route:
```php
Route::get('/', 'HomeController@index')->middleware('role:admin');
```

## Seeding (optional)
You can publish example seeder:
```bash
php artisan vendor:publish --provider="Dasperg\Role\RoleServiceProvider" --tag="seeds"
```

Don't forget to dump autoloader:
```bash
composer dump-autoload
```

Now you can seed data:
```bash
php artisan db:seed --class=RolesTableSeeder
```