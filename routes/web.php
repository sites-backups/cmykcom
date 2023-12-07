<?php


use App\Http\Controllers\Web\Home\WebController;
use App\Http\Controllers\Web\Product\ItemController;





use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Specification\SpecificationController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\FAQ\FAQController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Product\ProductImageController;
use App\Http\Controllers\Admin\Blog\BlogController;
use App\Http\Controllers\Web\Home\FrontendHomeController;
use App\Http\Controllers\Web\Forms\FormController;
use App\Http\Controllers\Web\Blog\StaticController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('web.home.index');
// });


/***
 *  =================================================
 *
 *
 *
 *                  Website Routes
 *
 *
 *
 *  =================================================
 * ***/

 Route::group(['middleware'=> 'urlRedirect'],function (){
 Route::controller(FrontendHomeController::class)->group(
        function()
        {
            Route::get('/','index');


        }
    );
});

// search items
Route::get('/search-items',[FrontendHomeController::class,'searchItem'])->name('search-item');

Route::group(['middleware'=> 'slashes'],function (){

    Route::controller(FrontendHomeController::class)->group(
        function()
        {
            Route::get('/why-bcb','whyBCB');
            Route::get('/about-us','aboutUS');
            Route::get('/blog','blogList');
            // Route::get('/blogs/{slug}','blogDetail');
            Route::get('/quote','quote');
            Route::get('/get-in-touch','contactUs');
            Route::get('/disclaimer','DisclaimerPage');
            Route::get('/privacy-policy','privacy_policy');
            Route::get('/terms-conditions','TermsAndConditions');
        }
    );

    Route::controller(ItemController::class)->group(
        function()
        {
            Route::get('/products','productList');
            // product detail page
            Route::get('/product/{slug}','productDetail');

            // category List
            Route::get('/categories','categoryList');
            // product category List
            Route::get('/product-category/{slug}','productCategory');
        }
    );

});

Route::get('/thank-you',[FormController::class,'thankyou']);

 // submit forms
 Route::post('/store-quote',[FormController::class,'storeGetQuote']);
 Route::post('/store-contact',[FormController::class,'storeContact']);
 Route::post('/product-quote',[FormController::class,'productQuote']);
 Route::post('/request-for-call',[FormController::class,'storeCallback']);

//  static blogs controller
Route::controller(StaticController::class)->group(
    function(){

        Route::get('/5-advantages-of-using-custom-mailer-boxes-in-the-business-market','page1');
        Route::get('/fascinating-facts-about-custom-shoe-boxes','page2');
        Route::get('/mailer-boxes--boxes-designed-for-your-convenience','page3');
        Route::get('/how-a-creative-custom-boxes-packaging-enhance-your-market','page4');
        Route::get('/things-to-consider-while-designing-custom-packaging-boxes','page5');
        Route::get('/best-prices-and-protection-guaranteed-with-customized-mailer-boxes','page6');
        Route::get('/this-festive-season-make-others-your-fan-with-aesthetically-designed-gift-boxes','page7');
        Route::get('/the-new-mailer-boxes-are-not-only-sturdy-but-remarkably-stylish','page8');
        Route::get('/how-customized-mailer-boxes-have-a-distinguishable-superiority-over-packaging-boxes','page9');
        Route::get('/custom-rigid-boxes','page10');
        Route::get('/improve-your-sales-by-using-custom-printed-boxes','page11');
        Route::get('/reasons-to-use-custom-boxes-for-your-business','page12');

    }
);


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/***
 *  =================================================
 *
 *
 *
 *                  Admin Panel Routes
 *
 *
 *
 *  =================================================
 * ***/

Route::group(['prefix' => '/admin', 'as' => 'admin.'],function (){

    Route::get('/',[DashboardController::class,'Login'])->name('login');

     /**  Loading Protected Routes  **/
     Route::group(['middleware'=> 'auth'],function (){

        // Dashboard Home
        Route::controller(DashboardController::class)->group(
            function()
            {
                Route::get('/dashboard','dashboard')->name('home');
            }
        );


        // Category Routes
        Route::resource('/categories', CategoryController::class);
        Route::controller(CategoryController::class)->group(
            function()
            {
                Route::post('categories-status','statusUpdate')->name('categories.categories-status');
                Route::post('display_nav','NavBarDisplay')->name('categories.display_nav');
            }
        );


        // Product Routes
        Route::resource('/products', ProductController::class);
        Route::controller(ProductController::class)->group(function()
        {
            Route::post('/product-status','displayNav')->name('products.product-status');
            Route::post('/publish-update','statusPublish')->name('products.publish-update');
            Route::post('/recommend-update','statusRecommend')->name('books.recommend-update');
        });

        Route::resource('/productsImage', ProductImageController::class);

        // FAQ Route here
        Route::resource('faqs', FAQController::class);
        Route::resource('/specification', SpecificationController::class);

        // blog Controller
        Route::resource('/blogs',BlogController::class);


     });

});


Route::get('/optimize',function(){
    Artisan::call('optimize');
    return "Server optimized";
});
Route::get('/optimize',function(){
    Artisan::call('optimize:clear');
    return "optimized:cleared";
});
Route::get('/config',function(){
    Artisan::call('config:cache');
    return "Config:cached";
});
Route::get('/config-clear',function(){
    Artisan::call('config:clear');
    return "Config:cleared";
});
