<?php

use App\Http\Middleware\Activated;
use App\Http\Middleware\Admin;

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

// Route::get('/cart', function () {
//     return view('web.cart');
// });

Auth::routes(['register' => false, 'verify' => true]);

Route::middleware(['auth', Activated::class])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::namespace('Admin')->group(function () {
//             Route::middleware(Admin::class)->group(function () {
//             });
                        
            Route::get('config', 'ConfigController@index')->name('config.index');
            Route::post('config', 'ConfigController@change')->name('config.change');

            Route::get('ckeditor', 'CkeditorController@index');
            Route::post('ckeditor/upload', 'CkeditorController@upload')->name('ckeditor.upload');

            Route::get('/', 'HomeController@index')->name('admin');
            Route::get('profile', 'UserController@profile')->name('profile');

            // Route::post('bill-products', 'BillProductController@store')->name('bill-products.store');
            // Route::post('city-district', 'WardController@city_district')->name('wards.city_district');
            // Route::post('district-ward', 'WardController@district_ward')->name('wards.district_ward');
            Route::resource('products', 'ProductController')->except(['show']);
            // Route::post('products/read', 'ProductController@products')->name('products.read');

            // Route::post('bill-products', 'BillProductController@store')->name('bill-products.store');
            // Route::post('receipt-products', 'ReceiptProductController@store')->name('receipt-products.store');
            Route::post('products/read', 'ProductController@products')->name('products.read');
    
            // Route::put('bill-products', 'BillProductController@update')->name('bill-products.update');
            // Route::put('receipt-products', 'ReceiptProductController@update')->name('receipt-products.update');
    
            // Route::delete('bill-products', 'BillProductController@destroy')->name('bill-products.destroy');
            // Route::delete('receipt-products', 'ReceiptProductController@destroy')->name('receipt-products.destroy');

            Route::resource('products', 'ProductController')->except('show');
            // Route::post('products/{id}','ProductImageController@store')->name('product_images.store');
            // Route::get('products/{id}/create','ProductImageController@create')->name('product_images.create');
            // Route::get('products/{id}/{order}/edit','ProductImageController@edit')->name('product_images.edit');
            // Route::put('products/{id}/{order}','ProductImageController@update')->name('product_images.update');
            // Route::delete('products/{id}/{order}','ProductImageController@destroy')->name('product_images.destroy');
            
            // Route::post('receipt-products', 'ReceiptProductController@store')->name('receipt-products.store');
    
            // Route::put('bill-products', 'BillProductController@update')->name('bill-products.update');
            // Route::put('receipt-products', 'ReceiptProductController@update')->name('receipt-products.update');
    
            // Route::delete('bill-products', 'BillProductController@destroy')->name('bill-products.destroy');
            // Route::delete('receipt-products', 'ReceiptProductController@destroy')->name('receipt-products.destroy');
    
            // Route::resource('bills', 'BillController');
            Route::resource('categories', 'CategoryController')->except(['show']);
            // Route::resource('contacts', 'ContactController')->except(['create', 'edit', 'update']);
            Route::resource('contents', 'ContentController')->except('show');
            
            Route::resource('menus', 'MenuController')->except('show');
            Route::resource('sponsors', 'SponsorController')->except('show');
            Route::resource('carousels', 'CarouselController')->except('show');
            Route::resource('types', 'TypeController')->except(['show']);
            Route::resource('users', 'UserController')->except(['show']);
            Route::resource('contacts', 'ContactController');
            // Route::post('contacts', 'ContactController@show')->name('contacts.show');
            Route::resource('orders', 'OrderController');
        });
    });
});

Route::group(['middleware' => ['web']], function () {
    Route::post('axios-type', 'HomeController@type')->name('axios.type');
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('{menu}', 'HomeController@menu')->where('menu', '([A-Za-z0-9\-\/]+)');
    Route::post('admin', 'Admin\ContactController@store')->name('web.contacts.store');

    // Route::post('admin', 'Admin\PaymentController@store')->name('web.payments.store');
    Route::namespace('Web')->group(function () {
        Route::post('add-product', 'CartController@add_product')->name('add-product');
        Route::post('dat-hang', 'OrderController@store')->name('order');
    });
});