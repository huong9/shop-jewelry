<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/login', 'AdminController@login')->name('login');
Route::post('/login', 'AdminController@p_login');

Route::get('/search-result', 'HomeController@search')->name('search');
Route::get('/search', 'HomeController@searchBar')->name('search.bar');

Route::get('/register', 'AdminController@register')->name('register');
Route::post('/register', 'AdminController@p_register');

Route::get('/collection', 'HomeController@collection')->name('collection');

Route::get('/danh-muc/{id}-{slug}', 'HomeController@getListView')->name('getListView');

Route::get('/contact', 'HomeController@contact')->name('contact');
Route::post('/contact', 'HomeController@p_contact');

Route::get('/checkout', 'CheckoutController@index')->name('checkout');
Route::post('/checkout', 'CheckoutController@submit')->name('checkout');

Route::get('/account', 'AccountController@index')->name('account')->middleware('auth');
Route::get('/logout', 'AdminController@logout')->name('logout');

Route::get('/address', 'AccountController@address')->name('address');
Route::post('/address', 'AccountController@u_address')->name('address.update');

Route::get('/admin/error', 'AdminController@error')->name('admin.error');

Route::get('/newsletter', 'HomeController@newsletter')->name('newsletter');

Route::post('wishlist-add', 'WishlistController@add_wishlist')->name('add_wishlist');
Route::get('/wishlist', 'WishlistController@wishlist')->name('wishlist');
Route::get('/wishlist-del/{id}', 'WishlistController@wishlist_delete')->name('wishlist.delete')->middleware('auth');
Route::post('/wishlist-del-api', 'WishlistController@wishlist_delete_api');


Route::get('/rating/{id}/{user_id}', 'RatingController@add_rating')->name('rating.add');
Route::get('/rating-edit/{id}', 'RatingController@edit_rating')->name('rating.edit');
Route::get('/rating-delete/{id}', 'RatingController@delete_rating')->name('rating.delete');

Route::get('/blogs', 'BlogController@index')->name('blog');
Route::get('/blogs-detail/{id}-{slug}', 'BlogController@detail')->name('blog.detail');

Route::get('/blogs-comment/{id}/{user_id}', 'BlogController@comment')->name('blog.comment');
Route::get('/blogs-comment-delete/{id}', 'BlogController@comment_del')->name('blog.comment.delete');


Route::get('/blogs-comment-rep/{id}/{user_id}', 'BlogController@comment_rep')->name('blog.comment.rep');
Route::get('/blogs-comment-rep-delete/{id}', 'BlogController@comment_rep_del')->name('blog.comment.rep.delete');

Route::get('/order-cancel/{id}', 'AccountController@order_cancel')->name('order.cancel');

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'as' => 'admin.'], function () {
    // Category
    Route::get('/', 'AdminController@index')->name('admin');

    Route::group(['prefix' => 'category'], function () {
        Route::get('/', 'CategoryController@index')->name('cate');
        Route::get('/create', 'CategoryController@create')->name('cate.create');
        Route::post('/create', 'CategoryController@p_create')->name('cate.create');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('cate.edit');
        Route::post('/edit/{id}', 'CategoryController@p_edit')->name('cate.edit');
        Route::get('/delete/{id}', 'CategoryController@delete')->name('cate.delete');
    });
    // color
    Route::group(['prefix' => 'color'], function () {
        Route::get('/', 'ColorController@index')->name('color');
        Route::get('/create', 'ColorController@create')->name('color.create');
        Route::post('/create', 'ColorController@p_create')->name('color.create');
        Route::get('/edit/{id}', 'ColorController@edit')->name('color.edit');
        Route::post('/edit/{id}', 'ColorController@p_edit')->name('color.edit');
        Route::get('/delete/{id}', 'ColorController@delete')->name('color.delete');
    });
    // size
    Route::group(['prefix' => 'size'], function () {
        Route::get('/', 'SizeController@index')->name('size');
        Route::get('/create', 'SizeController@create')->name('size.create');
        Route::post('/create', 'SizeController@p_create')->name('size.create');
        Route::get('/edit/{id}', 'SizeController@edit')->name('size.edit');
        Route::post('/edit/{id}', 'SizeController@p_edit')->name('size.edit');
        Route::get('/delete/{id}', 'SizeController@delete')->name('size.delete');
    });
    // img
    Route::group(['prefix' => 'image'], function () {
        Route::get('/', 'ImgController@index')->name('image');
        Route::get('/create', 'ImgController@create')->name('image.create');
        Route::post('/create', 'ImgController@p_create')->name('image.create');
        Route::get('/edit/{id}', 'ImgController@edit')->name('image.edit');
        Route::post('/edit/{id}', 'ImgController@p_edit')->name('image.edit');
        Route::get('/delete/{id}', 'ImgController@delete')->name('image.delete');
    });
    // order
    Route::group(['prefix' => 'order'], function () {
        Route::get('/', 'OrderController@index')->name('order');
        Route::get('/create', 'OrderController@create')->name('order.create');
        Route::post('/create', 'OrderController@p_create')->name('order.create');
        Route::get('/edit/{id}', 'OrderController@edit')->name('order.edit');
        Route::post('/edit/{id}', 'OrderController@p_edit')->name('order.edit');
        Route::get('/delete/{id}', 'OrderController@delete')->name('order.delete');
    });
    // order_detail

    // product
    Route::group(['prefix' => 'product'], function () {
        Route::get('/', 'ProductController@index')->name('product');
        Route::get('/create', 'ProductController@create')->name('product.create');
        Route::post('/create', 'ProductController@p_create')->name('product.create');
        Route::get('/edit/{id}', 'ProductController@edit')->name('product.edit');
        Route::post('/edit/{id}', 'ProductController@p_edit')->name('product.edit');
        Route::get('/delete/{id}', 'ProductController@delete')->name('product.delete');
    });
    // product_detail
    Route::group(['prefix' => 'product_detail'], function () {
        Route::get('/', 'productDetailController@index')->name('product_detail');
        Route::get('/create', 'productDetailController@create')->name('product_detail.create');
        Route::post('/create', 'productDetailController@p_create')->name('product_detail.create');
        Route::get('/edit/{id}', 'productDetailController@edit')->name('product_detail.edit');
        Route::post('/edit/{id}', 'productDetailController@p_edit')->name('product_detail.edit');
        Route::get('/delete/{id}', 'productDetailController@delete')->name('product_detail.delete');
    });
    // users
    Route::group(['prefix' => 'User'], function () {
        Route::get('/', 'UserController@index')->name('user');
        Route::get('/create', 'UserController@create')->name('user.create');
        Route::post('/create', 'UserController@p_create')->name('user.create');
        Route::get('/edit/{id}', 'UserController@edit')->name('user.edit');
        Route::post('/edit/{id}', 'UserController@p_edit')->name('user.edit');
        Route::get('/delete/{id}', 'UserController@delete')->name('user.delete');
    });
    //role
    Route::group(['prefix' => 'role'], function () {
        Route::get('/', 'RoleController@index')->name('role');
        Route::get('/create', 'RoleController@create')->name('role.create');
        Route::post('/create', 'RoleController@p_create')->name('role.create');
        Route::get('/edit/{id}', 'RoleController@edit')->name('role.edit');
        Route::post('/edit/{id}', 'RoleController@p_edit')->name('role.edit');
        Route::get('/delete/{id}', 'RoleController@delete')->name('role.delete');
    });
    // news
    Route::group(['prefix' => 'news'], function () {
        Route::get('/', 'NewsController@index')->name('news');
        Route::get('/create', 'NewsController@create')->name('news.create');
        Route::post('/create', 'NewsController@p_create')->name('news.create');
        Route::get('/edit/{id}', 'NewsController@edit')->name('news.edit');
        Route::post('/edit/{id}', 'NewsController@p_edit')->name('news.edit');
        Route::get('/delete/{id}', 'NewsController@delete')->name('news.delete');
    });
    // newsContent
    Route::group(['prefix' => 'newsContent'], function () {
        Route::get('/', 'NewsContentController@index')->name('newsC');
        Route::get('/create', 'NewsContentController@create')->name('newsC.create');
        Route::post('/create', 'NewsContentController@p_create')->name('newsC.create');
        Route::get('/edit/{id}', 'NewsContentController@edit')->name('newsC.edit');
        Route::post('/edit/{id}', 'NewsContentController@p_edit')->name('newsC.edit');
        Route::get('/delete/{id}', 'NewsContentController@delete')->name('newsC.delete');
    });
    // news write
    // Route::group(['prefix' => 'newsMain'], function () {
    //     Route::get('/blog-create', 'BlogController@blog_write')->name('blog.create');
    //     Route::post('/blog-create', 'BlogController@blog_write_p')->name('blog.create');
    //     Route::get('/blog-create-content', 'BlogController@blog_write_content')->name('blog.create.content');
    //     Route::post('/blog-create-content', 'BlogController@blog_write_content_p')->name('blog.create.content');
    //     Route::get('/blog-edit/{id}', 'BlogController@edit')->name('blog.edit');
    //     Route::post('/blog-edit/{id}', 'BlogController@p_edit')->name('blog.edit');
    //     Route::get('/blog-delete/{id}', 'BlogController@delete')->name('blog.delete');
    // });
});
// cart
Route::group(['prefix' => 'cart'], function () {
    Route::get('/', 'CartController@index')->name('cart');
    Route::get('/add', 'CartController@add')->name('cart.add');
    Route::get('/update', 'CartController@update')->name('cart.update');
    Route::get('/delete/{id}', 'CartController@delete')->name('cart.delete');
    Route::get('/delete-all', 'CartController@delete-all')->name('cart.delete-all');
});
