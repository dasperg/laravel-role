Add RoleTrait
```
...
use Dasperg\Role\RoleTrait;

class User extends Model {
    use RoleTrait;
...
}
```

Register middleware in `app/Http/Kernel.php`:
```
class Kernel {
    ...
    protected $routeMiddleware = [
        ...
        'role' => Dasperg/Role/RoleMiddleware::class,
    ];
    ...
}
```

Usage:
```
class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }
    ...
```
OR
```
Route::get('/', 'IndexController@index')->middleware('role:admin');
```
