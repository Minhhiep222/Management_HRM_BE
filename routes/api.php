<?php




use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\AuthController;
use App\HTTP\Controllers\EmployeeController;
use App\HTTP\Controllers\TeamController;
use App\HTTP\Controllers\DepartmentController;
use App\HTTP\Controllers\UserController;
use App\HTTP\Controllers\BrandController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\WorkDailyController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProjectController;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::post('login', [AuthController::class, 'login']);
// Route::post('register', [AuthController::class, 'register']);

//**Route emoloyees */
Route::prefix('employees')->controller(EmployeeController::class)->group(function () {
    Route::get('list', 'index');
    Route::get('{id}', 'show');
    Route::put('{id}', 'update');
    Route::delete('{id}', 'destroy');
    Route::patch('deleteAll', 'destroyMembers');
    Route::post('/', 'store');
});

//**Route teams */
Route::prefix('teams')->controller(TeamController::class)->group(function () {
    Route::get('list', 'index');
    Route::get('{id}', 'show');
    Route::put('{id}', 'update');
    Route::delete('{id}', 'destroy');
    Route::patch('deleteAll', 'destroyTeams');
    Route::post('/', 'store');
    Route::get('getEmployeeWithID/{id}', 'getEmployeeWithID');
});

/**Route brand */
Route::prefix('brands')->controller(BrandController::class)->group(function () {
    Route::get('list', 'index');
    Route::get('{id}', 'show');
    Route::put('{id}', 'update');
    Route::delete('{id}', 'destroy');
    Route::patch('deleteAll', 'destroyBrands');
    Route::post('/', 'store');
    Route::get('getEmployeeWithID/{id}', 'getEmployeeWithID');
});

/**Route departments */
Route::prefix('departments')->controller(DepartmentController::class)->group(function () {
    Route::get('list', 'index');
    Route::get('{id}', 'show');
    Route::put('{id}', 'update');
    Route::delete('{id}', 'destroy');
    Route::post('/', 'store');
    Route::patch('deleteAll', 'destroyDepartment');
    Route::get('getEmployeeWithID/{id}', 'getEmployeeWithID');
});

/**Route managers */
Route::prefix('managers')->controller(ManagerController::class)->group(function () {
    Route::get('list', 'index');
    Route::get('{id}', 'show');
    Route::put('{id}', 'update');
    Route::delete('{id}', 'destroy');
    Route::post('/', 'store');
    Route::get('getEmployeeWithID/{id}', 'getEmployeeWithID');
});

/**Route managers */
Route::prefix('customers')->controller(CustomerController::class)->group(function () {
    Route::get('list', 'index');
    Route::get('{id}', 'show');
    Route::put('{id}', 'update');
    Route::delete('{id}', 'destroy');
    Route::post('/', 'store');
    Route::get('getEmployeeWithID/{id}', 'getEmployeeWithID');
});


/**Route contracts */
Route::prefix('contracts')->controller(ContractController::class)->group(function () {
    Route::get('list', 'index');
    Route::get('{id}', 'show');
    Route::put('{id}', 'update');
    Route::delete('{id}', 'destroy');
    Route::patch('deleteAll', 'destroyContracts');
    Route::post('/', 'store');
});

/**Route contracts */
Route::prefix('projects')->controller(ProjectController::class)->group(function () {
    Route::get('list', 'index');
    Route::get('{id}', 'show');
    Route::put('{id}', 'update');
    Route::delete('{id}', 'destroy');
    Route::patch('deleteAll', 'destroyProjects');
    Route::post('/', 'store');
});

/**Route workdailies */
Route::prefix('workdailies')->controller(WorkDailyController::class)->group(function () {
    Route::get('list', 'index');
    Route::get('{id}/{date}', 'show');
    Route::put('{id}/{date}', 'update');
    Route::delete('{id}', 'destroy');
    Route::post('/', 'store');
});


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::post('register',[AuthController::class,'register']);

// Route::get('getAllDepartment',[DepartmentController::class,'getAllDepartment']);

// // Route::get('setSidebar',[AuthController::class,'setSidebar']);
// Route::get('profileUser',[UserController::class,'profileUser']);


// Route::get('getToken',[AuthController::class,'getToken']);

// Route::post('login',[AuthController::class,'login'])->name('login');
// Route::middleware('auth:sanctum')->group(function () {
// Route::get('logout',[AuthController::class,'logout']);
// Route::get('getValues', [AuthController::class,'getValues']);
// });
Route::middleware('auth:sanctum')->group(function() {
    Route::get('user', [AuthController::class, 'user']);
});
Route::post('register',[AuthController::class,'register']);
Route::post('/create/user', [AuthController::class, 'store']);
Route::get('code', [AuthController::class, 'getCode']);
Route::post('login', [AuthController::class, 'login']);