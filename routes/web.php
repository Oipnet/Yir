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

Route::get('/','HomeController@category');
Route::get('/vendre','HomeController@vendre')->name('vendre');
Route::get('/search', 'HomeController@Recherche')->name('recherche');
Route::get('/contact', 'Homecontroller@Contact');
Route::post('/contact', 'Homecontroller@PostContact')->name('contact_send');
Route::get('/galerie/{name}', 'HomeController@ShowGalerie')->name('galerie');
Route::post('/annonces/contact/{id}', 'HomeController@PostFicheProduit')->name('PostFiche');
Route::get('/annonces/renew/{id}', 'AnnoncesController@renew')->name('renenouvellement');
// contact via annonce



/*Route::get('welcome/{locale}', function ($locale) {
    App::setLocale($locale);
    return view('welcome', compact('locale'));
});*/
Route::get('/categorie/{slug}','HomeController@CategorieParSlug')->name('categorie_show');

/*
 * route admin
 */
Route::resource('admin/categories', 'CategoriesController');
Route::get('admin/listing/users', 'AdminController@ListingUsers');
Route::get('admin/listing/annonces', 'AdminController@ListingAnnonces');
Route::get('admin/listing/annonces/{id}', 'AdminController@PostValidationAnnonces');
Route::get('admin/listing/annonces/ban/{id}', 'AdminController@DisableAnnonces');

Route::get('admin/listing/{id}', 'AdminController@PostValidation');
Route::get('admin/ban/listing/{id}', 'AdminController@Bannir');

/*
 * fin des routes avec auth.admin middleware
 */

Route::resource('annonces', 'AnnoncesController');
Route::get('profil', 'UsersController@getEdit')->name('profil');
Route::post('profil', 'UsersController@update')->name('postProfil');

/*
 * pro
 */
Route::get('register/pro', '\App\Http\Controllers\Auth\RegisterController@FormPro')->name('register-pro');

Route::post('register/pro', '\App\Http\Controllers\Auth\RegisterController@register_pro');
/*
 * fin pro
 */
Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/auth/confirm/{token}', '\App\Http\Controllers\Auth\LoginController@getConfirm')->name('valide_token');
Route::get('/cgu', 'HomeController@cgu')->name('cgu');
Route::get('/ml', 'HomeController@ml')->name('ml');
Route::get('/plus', 'HomeController@plus')->name('plus');
