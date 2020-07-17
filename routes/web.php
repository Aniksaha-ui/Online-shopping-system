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

Route::get('/', function () {
    return view('auth.login');
});


Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');
//some pages for all user

Route::get('/view','productcontroller@view');
Route::get('/view/{id}','productcontroller@filterproduct');


Route::get('/product_description/{id}','productcontroller@getdescription');




//cart
Route::get('/single/cart/{id}','cartcontroller@singlecart');
Route::get('/viewcart/','cartcontroller@viewcart');
Route::get('/delete/cart/{id}','cartcontroller@deletecart');
Route::get('/viewcart/{id}','cartcontroller@viewcart');
Route::post('/updatecart','cartcontroller@updatecart')->name('updatecart');

//End cart



//checkout

Route::get('/checkout','checkoutcontroller@checkout');
Route::get('/stripe','checkoutcontroller@stripe');
Route::post('/stripe','checkoutcontroller@stripepost')->name('stripe.post');




//End checkout





Route::get('/home', 'HomeController@index')->name('home');



//PDF download


Route::get('/pdf/download', 'cartcontroller@pdfdownload');



//For chart

Route::get('chart-line', 'ChartController@chartLine');
Route::get('chart-line-ajax', 'ChartController@chartLineAjax');

//Analysis of product

Route::get('productanalysis', 'analysiscontroller@analysis');
Route::get('productanalysisajax','analysiscontroller@analysisAjax');


//Analysis of customer(ke koto tk shopping korce)

Route::get('useranalysis', 'analysiscontroller@analysisofusers');
Route::get('useranalysisAjax','analysiscontroller@analysisofuserAjax');



Route::group(['middleware' => 'App\Http\Middleware\admin'],function(){


//Catagory section start
Route::get('/add_catagory','catagorycontroller@create');
Route::post('/add_catagory','catagorycontroller@store');
Route::get('/managecatagory','catagorycontroller@manageproduct');
Route::get('catagory/edit/{id}','catagorycontroller@edit');
Route::post('/updatecatagory','catagorycontroller@edit1');
Route::get('catagory/delete/{id}','catagorycontroller@delete');
//Catagory controller end

//subcatagory section start

Route::get('/add_sub','subcatagorycontroller@create');
Route::post('/add_sub','subcatagorycontroller@store');
Route::get('/managesubcatagory','subcatagorycontroller@manage');
Route::get('sub/edit/{id}','subcatagorycontroller@edit');

Route::post('/updatesub','subcatagorycontroller@edit1');

Route::get('sub/delete/{id}','subcatagorycontroller@delete');


//subcatagory section end
//product section start
Route::get('/add_product','productcontroller@create');
Route::post('/add_product','productcontroller@store');
Route::get('subcatagory/{id}','productcontroller@getsub');
Route::get('/manageproduct','productcontroller@manage');
Route::get('product/edit/{id}','productcontroller@edit');
Route::post('/updateproduct','productcontroller@edit1');
Route::get('product/delete/{id}','productcontroller@delete');

//End of product secttion

//For chart

Route::get('chart-line', 'ChartController@chartLine');
Route::get('chart-line-ajax', 'ChartController@chartLineAjax');

//Analysis of product

Route::get('productanalysis', 'analysiscontroller@analysis');
Route::get('productanalysisajax','analysiscontroller@analysisAjax');


//Analysis of customer(ke koto tk shopping korce)

Route::get('useranalysis', 'analysiscontroller@analysisofusers');
Route::get('useranalysisAjax','analysiscontroller@analysisofuserAjax');


});