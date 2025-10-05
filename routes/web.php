<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerBranchController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductModelController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserBranchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserGroupController;
use App\Livewire\Counter;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/' ,[MasterController::class, 'index'])->name('home');
// Route::get('/' ,[StaticController::class, 'index'])->name('home')->middleware('auth.basic');

Route::middleware('auth')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard','index')->name('dashboard');
    });

    // Route::prefix('dashboard')->group(function () {
        Route::get('/settings', function () {
            $pageComponents = [
                'pageTitle'     => ' الإعدادت',
                'navElements' => [
                    'الإعدادت' => route('brands.index')
                ]
            ];

            return view('dashboard.setting.index', $pageComponents);
        })->name('settings');
        
        Route::resource('/customers',CustomerController::class);
        Route::resource('/customers.branches',CustomerBranchController::class)->shallow();
        Route::resource('/customers.products',CustomerProductController::class);
        Route::resource('/departments',DepartmentController::class);
        Route::resource('/employees',EmployeeController::class);
        Route::resource('/users', UserController::class);
        Route::resource('/users.branches', UserBranchController::class);
        Route::resource('/tasks', TaskController::class);
        Route::resource('/groups', UserGroupController::class);
        Route::resource('/roles', RolesController::class);
        Route::resource('/categories', CategoryController::class);
        Route::resource('/brands', BrandController::class);
        Route::resource('/models', ProductModelController::class);
        Route::resource('/products', ProductController::class);
    // });
});

Route::controller(AuthController::class)->prefix('/auth')->group(function () {
    Route::post('register', 'storeUser')->name('auth.store');
    Route::get('register', 'register')->name('auth.register');
    Route::get('login', 'login')->name('auth.login');
    Route::get('logout', 'logout')->name('auth.logout');
});

Route::controller(LoginController::class)->group(function () {
    Route::post('/authenticate', 'authenticate')->name('auth');
    Route::post('/authenticateExisting', 'authenticateExistingUser')->name('authExisting');
});

Route::get('/counter', Counter::class);

Route::get('/test', TestController::class);

// Route::fallback(function () {
//     return redirect()->route('home');
// });