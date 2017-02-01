<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/




// Authentication Routes...
$this->get('admin', 'Adminauth\AuthController@showLoginForm');
$this->post('admin/login', 'Adminauth\AuthController@login');
$this->get('admin/logout', 'Adminauth\AuthController@logout');
// Registration Routes...
$this->get('admin/register', 'Auth\AuthController@showRegistrationForm');
$this->post('register', 'Auth\AuthController@register');
// Password Reset Routes...
$this->get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
$this->post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
$this->post('password/reset', 'Auth\PasswordController@reset');




Route::group(['middleware' => 'admin','namespace' => 'admin'], function () {
	
	
	
	Route::get('dashboard', function () { 
 	//return view('admin.template')->with(['middle' => 'admin/dashboard']);  
	return view('admin.template')->with(['middle' => 'admin/dashboard']);

    });
	
	
	Route::get('admin/profile/editProfile/', 'ProfileController@editProfile');
    Route::any('admin/profile/editProfile/{id}', 'ProfileController@editProfile');

    //profile
    Route::get('admin/profile', 'ProfileController@index');
    Route::any('admin/profile/ajaxGetStateOnCountry', 'ProfileController@ajaxGetStateOnCountry');
    Route::any('admin/profile/ajaxGetCityOnState', 'ProfileController@ajaxGetCityOnState');


    //category
    Route::get('admin/category', 'CategoryController@index');
    Route::any('admin/category/add', 'CategoryController@add');
    Route::any('admin/category/edit/{id}', 'CategoryController@edit');
    Route::any('admin/category/delete/{id}', 'CategoryController@delete');


    //product
    Route::get('admin/product', 'ProductController@index');
    Route::any('admin/product/ajax_product_active_inactive', 'ProductController@ajax_product_active_inactive');
    Route::any('admin/product/add_select_type_product', 'ProductController@add_select_type_product');
    Route::post('admin/product/add', 'ProductController@add');
    Route::any('admin/product/view/{id}', 'ProductController@view');
    Route::any('admin/product/edit/{id}', 'ProductController@edit');
    Route::any('admin/product/delete/{id}', 'ProductController@delete');

    //gallery
    Route::any('admin/gallery/list/{id}', 'GalleryController@index');
    Route::any('admin/gallery/add/{id}', 'GalleryController@add');
    Route::any('admin/gallery/edit/{id}', 'GalleryController@edit');
    Route::any('admin/gallery/ajax_gallery_active_inactive', 'GalleryController@ajax_gallery_active_inactive');
    Route::any('admin/gallery/delete/{id}', 'GalleryController@delete');


    //cms
    Route::get('admin/cms', 'CmsController@index');
    Route::any('admin/cms/add', 'CmsController@add');
    Route::any('admin/cms/edit/{id}', 'CmsController@edit');
    Route::any('admin/cms/view/{id}', 'CmsController@view');
    Route::any('admin/cms/delete/{id}', 'CmsController@delete');


    //blog
    Route::get('admin/blog', 'BlogController@index');
    Route::any('admin/blog/add', 'BlogController@add');
    Route::any('admin/blog/view/{id}', 'BlogController@view');
    Route::any('admin/blog/edit/{id}', 'BlogController@edit');
    Route::any('admin/blog/delete/{id}', 'BlogController@delete');


    //user
    Route::get('admin/user', 'UserController@index');
    Route::any('admin/user/view/{id}', 'UserController@view');
    Route::any('admin/user/edit/{id}', 'UserController@edit');
    Route::any('admin/user/ajax_user_active_inactive', 'UserController@ajax_user_active_inactive');
    Route::any('admin/user/delete/{id}', 'UserController@delete');


    //size
    Route::get('admin/size', 'SizeController@index');
    Route::any('admin/size/add', 'SizeController@add');
    Route::any('admin/size/edit/{id}', 'SizeController@edit');
    Route::any('admin/size/delete/{id}', 'SizeController@delete');


    //colour
    Route::get('admin/colour', 'ColourController@index');
    Route::any('admin/colour/add', 'ColourController@add');
    Route::any('admin/colour/edit/{id}', 'ColourController@edit');
    Route::any('admin/colour/delete/{id}', 'ColourController@delete');


    //shipping
    Route::get('admin/shipping', 'ShippingController@index');
    Route::any('admin/shipping/add', 'ShippingController@add');
    Route::any('admin/shipping/edit/{id}', 'ShippingController@edit');
    Route::any('admin/shipping/delete/{id}', 'ShippingController@delete');


    //slider
    Route::get('admin/slider', 'SliderController@index');
    Route::any('admin/slider/add', 'SliderController@add');
    Route::any('admin/slider/edit/{id}', 'SliderController@edit');
    Route::any('admin/slider/delete/{id}', 'SliderController@delete');


    //testimonial
    Route::get('admin/testimonial', 'TestimonialController@index');
    Route::any('admin/testimonial/add', 'TestimonialController@add');
    Route::any('admin/testimonial/edit/{id}', 'TestimonialController@edit');
    Route::any('admin/testimonial/delete/{id}', 'TestimonialController@delete');


    //order
    Route::get('admin/order', 'OrderController@index');
    Route::any('admin/order/view/{id}', 'OrderController@view');
	
});



//front side
//Route::get('/', function () {
  //  return view('welcome');
//});


Route::group(['middleware' => 'auth'], function () {
    Route::auth();
});



Route::get('login', function () {return view('login');});
Route::post('login', 'Auth\AuthController@login');
Route::get('/', 'HomeController@index');
Route::get('logout', 'Auth\AuthController@logout');


Route::get('hiw', function () {return view('hiw');});
Route::get('why-the-clothes-loop', function () {return view('why-the-clothes-loop');});
Route::get('blog', 'BlogController@index');
Route::any('blogView/{id}', 'BlogController@blogView');


Route::any('register/edit/{id}', 'RegisterController@edit');
Route::any('register/isOldPasswordMatch', 'RegisterController@isOldPasswordMatch');
Route::any('register/changePassword', 'RegisterController@changePassword');
Route::any('register/isOldAndNewPasswordDiffrent', 'RegisterController@isOldAndNewPasswordDiffrent');
Route::any('register/updateEmail', 'RegisterController@updateEmail');
Route::any('register/deactivateAccount', 'RegisterController@deactivateAccount');
Route::any('register/isAccountDeactivatePasswordMatch', 'RegisterController@isAccountDeactivatePasswordMatch');


Route::get('shop', 'ShopController@index');
Route::any('shop/ajax_pagination', 'ShopController@ajax_pagination');
Route::any('shop/view/{id}', 'ShopController@view');

Route::any('cart/ajax_size_found_in_tempcart', 'CartController@ajax_size_found_in_tempcart');
Route::post('cart/temp_add_cart', 'CartController@temp_add_cart');
Route::get('cart/shopping_cart', 'CartController@shopping_cart');
Route::any('cart/ajax_temp_update_qty_cart', 'CartController@ajax_temp_update_qty_cart');
Route::any('cart/delete_shop_product/{id}', 'CartController@delete_shop_product');
Route::get('cart/delivery_deatil', 'CartController@delivery_deatil');
Route::any('cart/ajax_delivery_deatil_update_user_address', 'CartController@ajax_delivery_deatil_update_user_address');
Route::get('cart/payment', 'CartController@payment');
Route::any('cart/ajax_confirm_order', 'CartController@ajax_confirm_order');
Route::any('cart/success_payment', 'CartController@success_payment');
Route::any('cart/cancel_payment', 'CartController@cancel_payment');


Route::any('order/pending_order_list','OrderController@index');
Route::any('order/pending_order_view/{id}','OrderController@pendingView');
Route::any('order/past_order_list','OrderController@pastOrder');
Route::any('order/past_order_view/{id}','OrderController@pastView');



	
	





