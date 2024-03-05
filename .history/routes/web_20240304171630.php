<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\Claims\ClaimController;
use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\FilterController;
use App\Http\Controllers\Admin\IndustriesController;
use App\Http\Controllers\Admin\ListingController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\HomeController;
  use App\Http\Controllers\Reviewer\ReviewController;
  use App\Http\Controllers\SocialAuthLinkedinController;
use App\Http\Controllers\User\ListingController as UserListing;
use App\Http\Controllers\Web\Front\PageController as HomePageController;
use App\Http\Controllers\User\Profiles\ProfileController;
use App\Http\Controllers\User\Settings\SettingController as UserSettings;

use Illuminate\Support\Facades\Route;


Route::get('/live/search', [HomePageController::class, 'liveSearch']);
Route::get('search', [HomePageController::class, 'pageSearch'])->name('search');
Route::get('/login-signup', [HomeController::class, 'login'])->name('userLoginsignup');
Route::get('/redirect', [SocialAuthLinkedinController::class, 'redirect']);
Route::get('/callback', [SocialAuthLinkedinController::class, 'callback']);
/*Route::get('/',[HomePageController::class, 'index']);*/

Route::get('/software/{slug}',[HomePageController::class, 'show'])->name('front_software_listing');
Route::get('/review/{type}/{name}',[HomePageController::class, 'writeReview'])->name('front_write_review');
Route::post('/store_review',[HomePageController::class, 'storeReview'])->name('front_store_review');

Route::get('/single-listing/{type}/{name}',[HomePageController::class, 'listingDetails'])->name('listing_details');
Route::get('/single-listing/{type}/{name}', function($type, $name) 
{
    $product = Product::where('product_title', strtolower($name))
        ->and('category', strtolower($type))
        ->get();

    return $product;
});
Route::get('/service/{slug}',[HomePageController::class, 'view'])->name('front_service_listing');
Route::get('/portfolio/{id}',[HomePageController::class, 'getPortfolio'])->name('get_portfolio_details');
Route::get('/',[HomePageController::class, 'home']);
Route::view('/service','front.web.service');
Route::view('/single-service','front.web.single-service');
Route::view('/single-software','front.web.single-software');
Route::view('/browse-software','front.web.browse-software');

Route::view('/browse-service','front.web.browse-service');
Route::get('/directories/{type}',[HomePageController::class, 'directories'])->name('directories');

Route::view('/review-profile','front.web.review.main');
Route::view('/review-software','front.web.review.review-software');
Route::view('/review-service','front.web.review.review-service');
Route::view('/contact-us','front.web.contact');
Route::view('/page','front.web.page');
Route::view('/help-center','front.web.help-center');
Route::view('/blogs','front.web.blog.list');
Route::view('/blog/single','front.web.blog.single');

// Main Page Route
Auth::routes();

// locale
// authentication

/*Route::get('/', [HomeController::class, 'index'])->name('home_latest');*/
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::post('/vendor-login', [LoginBasic::class, 'vendorLogin'])->name('vendor_login');
Route::get('/admin', [LoginBasic::class, 'index'])->name('auth-login-basic');
Route::get('/register', [LoginBasic::class, 'register'])->name('auth-register-basic');
Route::get('/importSoftware', [ListingController::class, 'import']);
Route::get('/importService', [CategoryController::class, 'import']);
Route::get('/importHomeService', [ServicesController::class, 'import']);

Route::get('/forgot-password', [LoginBasic::class, 'forgotPassword'])->name('forgot-password');
Route::post('/forgot-password', [LoginBasic::class, 'forgotEmail'])->name('forgot-email');
Route::get('/reset-user-password/{token?}', [LoginBasic::class, 'showResetForm'])->name('showResetForm');
Route::post('/reset-user-password', [LoginBasic::class, 'resetPassword'])->name('resetPassword');
// Move this on the 'auth' middleware
Route::get('/select-type', [LoginBasic::class, 'selectType'])->name('select_type');
Route::get('/save-type', [LoginBasic::class, 'saveType'])->name('save_type');

Route::post('/vendor_register', [LoginBasic::class, 'store'])->name('vendor_register');
Route::get('/verify/{token}', [LoginBasic::class, 'verify'])->name('verification.verify');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth', 'prefix' => 'vendor'], function () {

  Route::post('vendor_claim', [ListingController::class, 'claimByVendor'])->name('claimbyvendor');

  Route::view('settings', 'front.user.settings')->name('settings');
  Route::view('reviews', 'front.user.reviews')->name('reviews');
  Route::view('badges', 'front.user.comin_soon')->name('badges');
  Route::view('analytics', 'front.user.analytics')->name('analytics');

  Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('userDashboard');

  Route::resource('profile', ProfileController::class)
    ->only(['index', 'store']);

  Route::resource('settings', UserSettings::class)
    ->only(['store'])
    ->names([
      'store' => 'save_settings'
    ]);

  Route::resource('listing', UserListing::class)
    ->only('index')
    ->names([
      'index' => 'user_listing'
    ]);

  /*Software*/
  Route::prefix('listing')->group(function () {
    Route::get('{type}/{listing}', [ListingController::class, 'getDetails'])->name('manage_details');
  });
  Route::resource('/listing', ListingController::class)
    ->only('create')
    ->names([
      'create' => 'manage_listing.create'
    ]);
  Route::delete('delete_package/{package_id}', [ListingController::class, 'destroyPackage'])->name('delete_package');
  /*Software*/

  /*Service*/
  Route::prefix('service')->group(function () {
    Route::get('step/{step}/{service}', [ServicesController::class, 'serviceData'])->name('manage_service_step');
    Route::get('step/portfolios/list/{service}', [ServicesController::class, 'portfolioList'])
      ->name('manage_portfolioList');
    Route::get('step/portfolios/edit/{portfolio}/{service}', [ServicesController::class, 'editPortfolio'])
      ->name('manage_editPortfolio');
  });

  Route::resource('/service', ServicesController::class)->only('create')
    ->names([
      'create' => 'manage_service.create'
    ]);
  /*Service*/

  Route::get('/logout', [Dashboard::class, 'logout'])->name('vendor_logout');
});

Route::group(['middleware' => 'auth', 'prefix' => 'review'], function () {
  Route::get('/home', [ReviewController::class, 'index'])->name('review_home');
});

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
  Route::get('/clogout', [Dashboard::class, 'logout'])->name('clogout');

  /*Software*/
  Route::prefix('listing')->group(function () {
    Route::get('{type}/{listing}', [ListingController::class, 'getDetails'])->name('details');
    Route::post('saveDescription/{type}/{listing}',
      [ListingController::class, 'saveDescription'])->name('saveDescription');
    Route::post('saveFeatures/{type}/{listing}', [ListingController::class, 'saveFeatures'])->name('saveFeatures');
    Route::post('uploadMedia', [ListingController::class, 'uploadMedia'])->name('uploadMedia');
    Route::post('removeMedia', [ListingController::class, 'removeMedia'])->name('removeMedia');
    Route::post('saveMedia/{type}/{listing}', [ListingController::class, 'saveMedia'])->name('saveMedia');
    Route::post('savePrice{type}/{listing}', [ListingController::class, 'savePrice'])->name('savePrice');
    Route::post('saveInformation/{type}/{listing}',
      [ListingController::class, 'saveInformation'])->name('saveInformation');
    Route::post('{type}/{listing}', [ListingController::class, 'saveDestination'])->name('saveDestination');
    Route::post('integration/{type}/{listing}', [ListingController::class, 'saveIntegration'])->name('saveIntegration');
    Route::post('find/listing/soft', [ListingController::class, 'findListing'])->name('find_listing');
    Route::post('find/listing/future_software', [ListingController::class, 'futureSoftware'])->name('future_software');
    Route::post('training/{type}/{listing}', [ListingController::class, 'saveTraining'])->name('saveTraining');
    Route::get('ajax/listing/data', [ListingController::class, 'ListingData'])->name('ListingData');
    Route::post('status', [ListingController::class, 'statusChange'])->name('ListingStatusChange');
  });
  Route::resource('/listing', ListingController::class);
  /*Software*/

  /*Service*/
  Route::prefix('service')->group(function () {
    Route::get('ajax/service/data', [ServicesController::class, 'serviceAjax'])->name('serviceAjax');
    Route::get('step/{step}/{service}', [ServicesController::class, 'serviceData'])->name('service_step');
    Route::post('location/save/{service}', [ServicesController::class, 'saveLocation'])->name('save_location');
    Route::post('clients/save/{service}', [ServicesController::class, 'saveClients'])->name('save_clients');
    Route::post('service/save/{service}', [ServicesController::class, 'saveService'])->name('save_service');
    Route::post('description/save/{service}',
      [ServicesController::class, 'saveDescription'])->name('saveServiceDescription');
    Route::post('destination/save/{service}',
      [ServicesController::class, 'saveServiceDestination'])->name('saveServiceDestination');
    Route::post('portfolios/save/{service}', [ServicesController::class, 'savePortfolios'])->name('save_portfolios');
    Route::get('step/portfolios/list/{service}', [ServicesController::class, 'portfolioList'])->name('portfolioList');
    Route::get('step/portfolios/edit/{portfolio}/{service}',
      [ServicesController::class, 'editPortfolio'])->name('editPortfolio');
    Route::delete('delete_portfolio/{portfolio}',
      [ServicesController::class, 'deletePortfolio'])->name('deletePortfolio');
    Route::post('step/portfolios/update/{portfolio}/{service}',
      [ServicesController::class, 'updatePortfolio'])->name('updatePortfolio');
    Route::post('status', [ServicesController::class, 'statusChange'])->name('statusChange');
    Route::post('find/listing/service', [ServicesController::class, 'findListing'])->name('find_service_listing');
  });
  Route::resource('/service', ServicesController::class);
  /*Service*/

    /*----  Apply Admin Middleware to prevent the un-authorize access ----*/
  Route::middleware('check_role:admin')->group(function () {
    Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');

    /*Industries*/
    Route::get('/industries/ajaxData', [IndustriesController::class, 'ajaxData']);
    Route::resource('/industries', IndustriesController::class);
    /*Industries*/

    /*Features*/
    Route::get('/features/ajaxData', [FeatureController::class, 'ajaxData']);
    Route::resource('/features', FeatureController::class);
    Route::delete('/deleteFeatures/{id}', [FeatureController::class, 'deleteFeatures']);
    /*Features*/

    /*Category*/
    Route::get('/category/ajaxData', [CategoryController::class, 'ajaxData']);
    Route::get('/category/getCategory/{type}', [CategoryController::class, 'getCategory']);
    Route::resource('/category', CategoryController::class);
    /*Category*/

    /*Users*/
    Route::get('/users/UserManagement', [UserController::class, 'UserManagement']);
    Route::resource('/users', UserController::class);
    /*Users*/

    /* Claims */
    Route::resource('claims', ClaimController::class)
      ->only('index', 'store', 'update', 'create')
      ->names([
        'index' => 'claims_list_view',
        'store' => 'list_of_claims',
        'update' => 'approve_claim',
        'create' => 'update_claim_profile'
      ]);
    /* Claims */

    /*Pages*/
    Route::post('/page/add_filter', [PageController::class, 'filterValues']);
    Route::post('/page/stored_filter', [PageController::class, 'storedFilterValues']);
    Route::get('/page/ajaxData', [PageController::class, 'ajaxData']);
    Route::resource('/page', PageController::class);
    /*Pages*/

    /*Filter*/
    Route::get('/filter/search', [FilterController::class, 'search']);
    Route::resource('/filter', FilterController::class);
    /*Filter*/

    /*Settings*/
    Route::prefix('setting')->group(function () {
      Route::get('/scripts', [SettingsController::class, 'scripts'])->name('viewScripts');
      Route::post('/scripts', [SettingsController::class, 'saveScripts'])->name('saveScripts');
    });
    /*Settings*/

    /*Type*/
    Route::get('/type/ajaxData', [TypeController::class, 'ajaxData']);
    Route::resource('/type', TypeController::class);
    /*Type*/
  });
});
Route::post('api/fetch-states', [DropdownController::class, 'fetchState']);
Route::post('api/fetch-cities', [DropdownController::class, 'fetchCity']);
