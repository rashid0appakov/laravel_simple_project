<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsController;



Route::get('/login/admin', [App\Http\Controllers\Auth\LoginController::class, 'showUserLoginForm'])->name('login/admin');
Route::get('/login/client', [App\Http\Controllers\Auth\LoginController::class, 'showClientLoginForm'])->name('login/client');
Route::get('/register/admin', [App\Http\Controllers\Auth\RegisterController::class, 'showUserRegisterForm'])->name('register/admin');
Route::get('/register/client', [App\Http\Controllers\Auth\RegisterController::class, 'showClientRegisterForm'])->name('register/client');

Route::post('/login/admin', [App\Http\Controllers\Auth\LoginController::class, 'userLogin'])->name('login.user');
Route::post('/login/client', [App\Http\Controllers\Auth\LoginController::class, 'clientLogin'])->name('login.client');
Route::post('/register/admin', [App\Http\Controllers\Auth\RegisterController::class, 'createUser'])->name('register.user');
Route::post('/register/client', [App\Http\Controllers\Auth\RegisterController::class, 'createClient'])->name('register.client');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/recicling', [App\Http\Controllers\DustCategoryController::class, 'getIndex'])->name('dust_categories.index');
Route::get('/recicling/{category_slug}/{slug}', [App\Http\Controllers\DustController::class, 'show'])->name('dusts.show');
Route::get('/recicling/{slug}', [App\Http\Controllers\DustCategoryController::class, 'show'])->name('dust_categories.show');
Route::get('/login', function(){
    return redirect()->route('login/client');
});
Route::get('/register', function(){
    return redirect()->route('register/client');
});

Route::post(
    'codes/search',
    array(
        'as' => 'codes.search',
        'uses' => 'CodeController@codesSearch'
    )
);

Route::resource('/admin/news', NewsController::class);
Route::get('/news', [App\Http\Controllers\NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [App\Http\Controllers\NewsController::class, 'show'])->name('news.show');

Route::get('/conatcts', [App\Http\Controllers\Auth\LoginController::class, 'showUserLoginForm'])->name('login/admin');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/leads', [App\Http\Controllers\LeadController::class, 'store'])->name('leads.store');
Route::get('/codes', [App\Http\Controllers\CodeController::class, 'clientIndex'])->name('codes.index');
Route::get('/codes/{code}', [App\Http\Controllers\CodeController::class, 'show'])->name('codes.show');
Route::view('about', 'about')->name('about');
Route::view('contacts', 'contacts')->name('contacts');

Route::view('accumulation', 'accumulation')->name('accumulation');
Route::view('disinfection', 'disinfection')->name('disinfection');
Route::view('recycling', 'recycling')->name('recycling');
Route::view('transportation', 'transportation')->name('transportation');
Route::view('utilization', 'utilization')->name('utilization');
Route::group([
    'prefix'        => 'client',
    'middleware'    => 'auth:client',
    'as'            => 'client.'
], function(){
    Route::get('/', [App\Http\Controllers\ClientController::class, 'home'])->name('index');
    Route::get('/orders', [App\Http\Controllers\ClientController::class, 'getOrders'])->name('orders.index');
    Route::get('/orders/{order}', [App\Http\Controllers\ClientController::class, 'showOrders'])->name('orders.show');
});
Route::group([
    'prefix'        => 'admin',
    'middleware'    => 'auth:user',
    'as'            => 'admin.'
], function(){
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('index');
    Route::post('/codes/import', [App\Http\Controllers\CodeController::class, 'import'])->name('codes.import');
    Route::get('/codes/search', [App\Http\Controllers\CodeController::class, 'search'])->name('codes.search');
    Route::get('/companies/search', [App\Http\Controllers\CompanyController::class, 'search'])->name('companies.search');
    Route::get('/stocks/search', [App\Http\Controllers\StockController::class, 'search'])->name('stocks.search');
    Route::get('/clients/search', [App\Http\Controllers\ClientController::class, 'search'])->name('clients.search');
    Route::post('/clients/{client}/order', [App\Http\Controllers\ClientController::class, 'order'])->name('clients.order');
    Route::get('/orders/{order}/file', [App\Http\Controllers\OrderController::class, 'file'])->name('orders.file');
    Route::get('/orders/{order}/doc1', [App\Http\Controllers\OrderController::class, 'doc1'])->name('orders.doc1');
    Route::get('/leads/getData', [App\Http\Controllers\LeadController::class, 'getData']);
    Route::post('/leads/{lead}/client', [App\Http\Controllers\LeadController::class, 'client'])->name('leads.client');
    Route::get('/logs', [App\Http\Controllers\LogController::class, 'index'])->name('logs.index');
    Route::resources([
        'posts'             => App\Http\Controllers\PostController::class,
        'dust_categories'   => App\Http\Controllers\DustCategoryController::class,
        'dusts'             => App\Http\Controllers\DustController::class,
        'users'             => App\Http\Controllers\UserController::class,
        'roles'             => App\Http\Controllers\RoleController::class,
        'codes'             => App\Http\Controllers\CodeController::class,
        'companies'         => App\Http\Controllers\CompanyController::class,
        'templates'         => App\Http\Controllers\TemplateController::class,
        'stocks'            => App\Http\Controllers\StockController::class,
        'clients'           => App\Http\Controllers\ClientController::class,
        'orders'            => App\Http\Controllers\OrderController::class,
        'leads'             => App\Http\Controllers\LeadController::class,
        'codes'             => App\Http\Controllers\CodeController::class,
        'codes'             => App\Http\Controllers\CodeController::class,
        'admin/news'        => App\Http\Controllers\Admin\NewsController::class,
    ]);
});