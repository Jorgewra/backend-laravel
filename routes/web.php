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

Route::group(['prefix' => 'api'], function () {
    Route::group(['prefix' => 'v1'], function () {
        Route::group(['middleware' => 'client'], function () {
            Route::post('/client', 'ClientController@createClient')->middleware('cors');
            Route::put('/client/{id}', 'ClientController@updateClient')->middleware('cors');
            Route::get('/client/{id}', 'ClientController@getClient')->middleware('cors');

            Route::post('/address', 'AddressController@createAddress')->middleware('cors');
            Route::put('/address/{id}', 'AddressController@updateAddress')->middleware('cors');
            Route::get('/address/{id}', 'AddressController@getAddress')->middleware('cors');
            Route::get('/address/{id}/all', 'AddressController@allAddress')->middleware('cors');

            Route::get('/shop/geo/{latitude}/{longitude}', 'CustumerController@shopGeolocalizacao')->middleware('cors');
            Route::get('/shop/category/{id}', 'ProductController@categoryShop')->middleware('cors');
            Route::get('/shop/product/search', 'ProductController@productShop')->middleware('cors');
            Route::get('/shop/products/{id}', 'ProductController@productCategory')->middleware('cors');
            Route::post('/shop/favorite', 'ProductController@createFavorite')->middleware('cors');
            Route::post('/shop/evaluation', 'ProductController@createEvaluation')->middleware('cors');
            Route::get('/shop/favorite/{id}', 'ProductController@getFovorite')->middleware('cors');
            Route::get('/shop/subcategory/produto/{id}', 'ProductController@producSubCategorytAll')->middleware('cors');
            Route::get('/shop/subproduct/all/{id}', 'ProductController@subCategoryShop')->middleware('cors');

            Route::get('/user/sendPassword/{email}', 'UserController@sendPassword')->middleware('cors');
            Route::post('/user', 'UserController@signup')->middleware('cors');
            Route::put('/user/password', 'UserController@newPasswordUser')->middleware('cors');
            Route::post('/user/login', 'UserController@login')->middleware('cors');
            Route::get('/user/me/', 'UserController@getMe')->middleware('cors');
        });
        Route::group(['middleware' => 'auth:api'], function () {
            Route::post('/order', 'OrderController@createOrder')->middleware('cors');
            Route::get('/order/{id}', 'OrderController@getOrderOnly')->middleware('cors');
            Route::get('/admin/order/all/get', 'OrderController@allAdminOrder')->middleware('cors');
            Route::put('/admin/order/update/status', 'OrderController@updateOrder')->middleware('cors');
            Route::get('/order/all/get', 'OrderController@allClientOrder')->middleware('cors');

            Route::post('/banner', 'BannerController@createBanner')->middleware('cors');
            Route::put('/banner/{id}', 'BannerController@updateBanner')->middleware('cors');

            Route::get('/client/all/get', 'ClientController@allClient')->middleware('cors');
            Route::get('/client/seach/{value}', 'ClientController@seachClient')->middleware('cors');

            Route::post('/custumer', 'CustumerController@createCustumer')->middleware('cors');
            Route::put('/custumer/{id}', 'CustumerController@updateCustumer')->middleware('cors');
            Route::get('/custumer/{id}', 'CustumerController@getCustumer')->middleware('cors');
            Route::get('/custumer/all/get', 'CustumerController@allCustumer')->middleware('cors');

            Route::post('/product/category', 'ProductController@createCategory')->middleware('cors');
            Route::put('/product/category/{id}', 'ProductController@updateCategory')->middleware('cors');
            Route::get('/product/category/all/{id}', 'ProductController@categoryAll')->middleware('cors');

            Route::post('/product/subcategory', 'ProductController@createSubCategory')->middleware('cors');
            Route::put('/product/subcategory/{id}', 'ProductController@updateSubCategory')->middleware('cors');
            Route::get('/product/subcategory/all/{id}', 'ProductController@subCategoryAll')->middleware('cors');

            Route::post('/product', 'ProductController@createProduct')->middleware('cors');
            Route::put('/product/{id}', 'ProductController@updateProduct')->middleware('cors');
            Route::get('/product/all/{id}', 'ProductController@productAll')->middleware('cors');

            Route::post('/product/subproduct', 'ProductController@createSubProduct')->middleware('cors');
            Route::put('/product/subproduct/{id}', 'ProductController@updateSubProduct')->middleware('cors');
            Route::get('/product/subproduct/all/{id}', 'ProductController@producSubtAll')->middleware('cors');

            Route::get('/product/{status}/{value}', 'ProductController@productAdimin')->middleware('cors');

            Route::post('/product/priceDymanic', 'ProductController@createpriceDymanic')->middleware('cors');
            Route::put('/product/priceDymanic/{id}', 'ProductController@updatepriceDymanic')->middleware('cors');
        });
    });
});

Route::get('/', function () {
    return redirect('/api/documentation');
});
