<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController as AdminController;
use App\Http\Controllers\Admin\DashboardController as DashboardController;
use App\Http\Controllers\Admin\GoveroratController as GoveroratController;
use App\Http\Controllers\Admin\UserController as UserController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\DonationRequestController as AdminDonationRequestController;
use App\Http\Controllers\Admin\CityController as AdminCityController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
//website controllers
use App\Http\Controllers\Website\HomeController as WebsiteHomeController;
use App\Http\Controllers\Website\PostController as WebsitePostController;
use App\Http\Controllers\Website\Auth\LoginController as WebsiteLoginController;
use App\Http\Controllers\Website\Auth\RegisterController as WebsiteRegisterController;
use App\Http\Controllers\Website\DonationRequestController as WebsiteDonationRequestController;
use App\Http\Controllers\Website\GeneralController as WebsiteGeneralController;
use App\Models\Admin;

// Website Routes

Route::get('/', [WebsiteHomeController::class, 'index'])->name('website.home');

Route::group(['prefix' => 'website','as' => 'website.','middleware' => ['web']
], function () {



    //login routes
    Route::get('login', [WebsiteLoginController::class, 'showLoginForm'])
        ->name('login');
        
    Route::post('login', [WebsiteLoginController::class, 'login'])
        ->name('login.submit');
    Route::post('logout', [WebsiteLoginController::class, 'logout'])->name('logout')->middleware('auth:web');

    //register routes
    Route::get('register', [WebsiteRegisterController::class, 'showRegistrationForm'])
        ->name('register');
    Route::post('register', [WebsiteRegisterController::class, 'register'])
        ->name('register.submit');

        // posts routes
    Route::get('posts', [WebsitePostController::class, 'index'])->name('posts');
    Route::get('posts/{post}', [WebsitePostController::class, 'postDetails'])->name('posts.details');

        // get cities by governorate
    Route::get('/cities/{governorate}', [WebsiteRegisterController::class, 'getCities'])->name('cities');
    // donation requests routes
    Route::get('donation-requests/create', [WebsiteDonationRequestController::class, 'create'])->name('donation-requests.create');
    Route::get('donation-requests', [WebsiteDonationRequestController::class, 'index'])->name('donation-requests');
    Route::get('donation-requests/{id}', [WebsiteDonationRequestController::class, 'show'])->name('donation-requests.show');

    // general routes
    Route::get('who-are-us', [WebsiteGeneralController::class, 'whoAreUs'])->name('who-are-us');
    Route::get('contact-us', [WebsiteGeneralController::class, 'contactUs'])->name('contact-us');
    Route::post('contact-us', [WebsiteGeneralController::class, 'submitContactUs'])->name('contact-us.send');
});





Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/login', function () {
        return view('auth.login');
    })->name('login')->middleware('guest:admin');

    Route::post('/login', [LoginController::class, 'login'])
        ->name('login.submit')->middleware('guest:admin');

        Route::post('/logout', function () {
        Auth::guard('admin')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('admin.login');
    })->name('logout');

    // Dashboard
    Route::middleware('auth:admin')->group(function () {
        Route::get('/', [DashboardController::class, 'home'])->name('dashboard');
        // governorates routes
        Route::resource('governorates', GoveroratController::class);
        // users routes
        Route::resource('users', UserController::class);
        Route::patch('users/{user}/toggle', [UserController::class, 'toggle'])->name('users.toggle');

        // categories routes
        Route::resource('categories', AdminCategoryController::class);
        // posts routes
        Route::resource('posts', AdminPostController::class);
        // donation requests routes
        Route::resource('donation-requests', AdminDonationRequestController::class);
        // cities routes
        Route::resource('cities', AdminCityController::class);
        

        Route::resource('admins',AdminController::class);
            // Route::get('/admin/profile', [AdminController::class, 'edit'])->name('profile.edit');
            // Route::post('/admin/profile', [AdminController::class, 'update'])->name('profile.update');

        
        Route::get('/settings', [AdminSettingController::class, 'index'])->name('settings.index');
        Route::get('/settings/edit', [AdminSettingController::class, 'edit'])->name('settings.edit');
        Route::match(['POST', 'PUT'], '/settings/edit', [AdminSettingController::class, 'update'])->name('settings.update');
        
    });
});

Auth::routes();

