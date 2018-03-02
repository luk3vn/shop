<?php
Route::namespace('Terranet\Shop\Controllers')->group(function () {

  Route::group(['middleware' => ['auth']], function () {
    Route::get('accounts', 'AccountsController@index')->name('accounts');
  });
  Route::resource('cart', 'CartController');
  Route::resource('customer', 'CustomerController');
  Route::resource('customer.address', 'CustomerAddressController');
  Route::get('checkout', 'CheckoutController@index')->name('checkout.index');
  Route::post('checkout', 'CheckoutController@store')->name('checkout.store');
  Route::post('set-courier', 'CheckoutController@setCourier')->name('set.courier');
  Route::post('set-address', 'CheckoutController@setAddress')->name('set.address');
  Route::get('checkout/execute', 'CheckoutController@execute')->name('checkout.execute');
  Route::get('checkout/cancel', 'CheckoutController@cancel')->name('checkout.cancel');
  Route::get('checkout/success', 'CheckoutController@success')->name('checkout.success');
  Route::get("category/{slug}", 'CategoryController@getCategory')->name('front.category.slug');
  Route::get("search", 'ProductController@search')->name('search.product');
  Route::get("{product}", 'ProductController@getProduct')->name('front.get.product');
});