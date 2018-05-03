<?php

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

Route::get('/', 'Front\MainController@index')->name('main');

Route::get('/news', 'Front\NewsController@newsList')->name('front.news');

Route::get('/news/{id}', 'Front\NewsController@showNews')
    ->where('id', '\d+')
    ->name('front.news.show');

Route::get('/news/{year}/{month}', 'Front\NewsController@showArchive')
    ->where('year', '\d+')
    ->name('front.news.archive');

Route::get('/article/{id}', 'Front\ArticlesController@showArticle')
    ->where('id', '\d+')
    ->name('front.articles.show');

Route::get('/articles/{year}/{month}', 'Front\ArticlesController@showArchive')
    ->where('year', '\d+')
    ->name('front.articles.archive');

Route::get('/articles', 'Front\ArticlesController@articlesList')->name('articlesList');

Route::get('/shop', 'Front\ShopController@shop')->name('front.shop');

Route::get('/gallery', 'Front\GalleryController@index')->name('front.gallery');
Route::get('/gallery/{id}', 'Front\GalleryController@showGallery')
    ->where('id', '\d+')
    ->name('front.gallery.show');
Route::get('/order', 'Front\OrderController@index')->name('front.order');


Route::get('/contacts', 'Front\StaticPageController@contacts')->name('front.contacts');
Route::get('/policy', 'Front\StaticPageController@policy')->name('front.policy');



Route::group(['middleware' => 'guest'], function() {
    Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'Auth\RegisterController@register');
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login');
});

Route::group(['middleware' => 'auth'], function(){
   Route::get('/my/account', 'AccountController@index')->name('account');
   Route::get('/logout', function(){
       \Auth::logout();
       return redirect(route('login'));
   })->name('logout');

   //admin
   Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {
       Route::get('/', 'Admin\NewsController@index')->name('admin');

       /** Categories */
       Route::get('/categories', 'Admin\CategoriesController@index')->name('categories');
       Route::post('/categories/add', 'Admin\CategoriesController@addRequestCategory');
       Route::get('/categories/add', 'Admin\CategoriesController@addCategory')->name('categories.add');
       Route::get('/categories/edit/{id}', 'Admin\CategoriesController@editCategory')
                ->where('id', '\d+')
                ->name('categories.edit');
       Route::post('/categories/edit/{id}', 'Admin\CategoriesController@editRequestCategory')
           ->where('id', '\d+');
       Route::delete('/categories/delete', 'Admin\CategoriesController@deleteCategory')->name('categories.delete');

       /** Articles */
       Route::get('/articles', 'Admin\ArticlesController@index')->name('articles');
       Route::post('/articles/add', 'Admin\ArticlesController@addRequestArticle');
       Route::get('/articles/add', 'Admin\ArticlesController@addArticle')->name('articles.add');
       Route::get('/articles/edit/{id}', 'Admin\ArticlesController@editArticle')
           ->where('id', '\d+')
           ->name('articles.edit');
       Route::post('/articles/edit/{id}', 'Admin\ArticlesController@editRequestArticle')
           ->where('id', '\d+');
       Route::delete('/articles/delete', 'Admin\ArticlesController@deleteArticle')->name('articles.delete');
       Route::post('/articles/delete_image', 'Admin\ArticlesController@deleteArticleImage')
           ->name('articles.delete.image');

       /** News */
       Route::get('/news', 'Admin\NewsController@index')->name('news');
       Route::post('/news/add', 'Admin\NewsController@addRequestNews');
       Route::get('/news/add', 'Admin\NewsController@addNews')->name('news.add');
       Route::get('/news/edit/{id}', 'Admin\NewsController@editNews')
           ->where('id', '\d+')
           ->name('news.edit');
       Route::post('/news/edit/{id}', 'Admin\NewsController@editRequestNews')
           ->where('id', '\d+');
       Route::delete('/news/delete', 'Admin\NewsController@deleteNews')->name('news.delete');
       Route::post('/news/delete_image', 'Admin\NewsController@deleteNewsImage')
           ->name('news.delete.image');

       /** Shop */
       Route::get('/shop', 'Admin\ShopController@index')->name('shop');
       Route::post('/shop/add', 'Admin\ShopController@addRequestShop');
       Route::get('/shop/add', 'Admin\ShopController@addShop')->name('shop.add');
       Route::get('/shop/edit/{id}', 'Admin\ShopController@editShop')
           ->where('id', '\d+')
           ->name('shop.edit');
       Route::post('/shop/edit/{id}', 'Admin\ShopController@editRequestShop')
           ->where('id', '\d+');
       Route::delete('/shop/delete', 'Admin\ShopController@deleteShop')->name('shop.delete');
       Route::post('/shop/delete_image', 'Admin\ShopController@deleteShopImage')
           ->name('shop.delete.image');

       /** Users */
       Route::get('/users', 'Admin\UsersController@index')->name('users');
       Route::post('/users/add', 'Admin\UsersController@addRequestUser');
       Route::get('/users/add', 'Admin\UsersController@addUser')->name('users.add');
       Route::get('/users/edit/{id}', 'Admin\UsersController@editUser')
           ->where('id', '\d+')
           ->name('users.edit');
       Route::post('/users/edit/{id}', 'Admin\UsersController@editRequestUser')
           ->where('id', '\d+');
       Route::delete('/users/delete', 'Admin\UsersController@deleteUser')->name('users.delete');

       /** Settings */
       Route::get('/settings/{name}', 'Admin\SettingsController@index')->name('settings.page');
       Route::post('/settings/{name}', 'Admin\SettingsController@editSettings')->name('settings.page');

       /** Gallery */
       Route::get('/gallery', 'Admin\GalleryController@index')->name('gallery');
       Route::get('/gallery/add', 'Admin\GalleryController@addGallery')->name('gallery.add');
       Route::post('/gallery/add', 'Admin\GalleryController@addRequestGallery');
       Route::get('/gallery/edit/{id}', 'Admin\GalleryController@editGallery')
           ->where('id', '\d+')
           ->name('gallery.edit');
       Route::post('/gallery/edit/{id}', 'Admin\GalleryController@editRequestGallery')
           ->where('id', '\d+');
       Route::delete('/gallery/delete', 'Admin\GalleryController@deleteGallery')->name('gallery.delete');
   });
});