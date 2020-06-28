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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['rol']], function () {
    Route::get('/dash', 'AdminController@index')->name('admin');
	Route::get('/dash/user/new', 'AdminController@newUser');
	Route::post('/dash/user/save', 'AdminController@saveUser')->name('save-user');
	Route::get('/dash/user/list', 'AdminController@listUser');
	Route::get('/dash/rol/new', 'RolController@newRol');
	Route::post('/dash/rol/save', 'RolController@saveRol')->name('save-rol');
	Route::get('/dash/rol/list', 'RolController@listRol');
	Route::get('/dash/seccion/new', 'SeccionController@newSeccion');
	Route::post('/dash/seccion/save', 'SeccionController@saveSeccion')->name('save-seccion');
	Route::get('/dash/seccion/list', 'SeccionController@listSeccion');
	Route::get('/dash/document/type/new', 'DocumentController@createTypeDoc');
	Route::post('/dash/document/type/save', 'DocumentController@saveTypeDoc')->name('save-doc-type');
	Route::get('/dash/people/new', 'PersonController@createPerson');
	Route::post('/dash/people/save', 'PersonController@savePerson')->name('save-person');;
	Route::get('/dash/people/list', 'PersonController@listPerson');
	Route::get('/dash/quote/new', 'QuoteController@createQuote');
	//Route::get('/dash/quote/calendar', 'QuoteController@getCalendarAjaxQuote');
	Route::post('/dash/quote/save', 'QuoteController@saveQuote')->name('save-quote');;
	Route::get('/dash/quote/list', 'QuoteController@listQuote');

});


//ajax routes
Route::post('/ajax/user/asignar/rol/{id}', 'AdminController@toAssignRolUserAjax');
Route::get('/ajax/user/get/rol/{id}', 'AdminController@getRolUserAjax');
Route::post('/ajax/user/modificar/rol/{id}', 'AdminController@updateRolUserAjax');
Route::get('/ajax/user/get/{id}', 'AdminController@getUserAjax');
Route::post('/ajax/user/edit/{id}', 'AdminController@editUserAjax');
Route::delete('/ajax/user/delete/{id}', 'AdminController@deleteUserAjax');

Route::get('/ajax/rol/get/{id}', 'RolController@getRolAjax');
Route::get('/ajax/rol/secciones/get/{id}', 'RolController@getSeccionesRolAjax');
Route::post('/ajax/edit/rol/{id}', 'RolController@editRolAjax');
Route::get('/ajax/get/count/rol/user/{id}', 'RolController@getCountRolUserAjax');
Route::delete('/ajax/rol/delete/{id}', 'RolController@deleteRolAjax');

Route::get('/ajax/seccion/get/{id}', 'SeccionController@getSeccionAjax');
Route::post('/ajax/edit/seccion/{id}', 'SeccionController@editSeccionAjax');
Route::get('/ajax/get/count/seccion/rol/{id}', 'SeccionController@getCountRolSeccion');
Route::delete('/ajax/seccion/delete/{id}', 'SeccionController@deleteSeccionAjax');

Route::post('/ajax/save/doc', 'DocumentController@saveDoc');
Route::post('/ajax/save/data/doc', 'DocumentController@saveDataDoc');
Route::post('/ajax/save/doc/{id}', 'DocumentController@saveDocEdit');
Route::post('/ajax/savedoc/after/{id}', 'DocumentController@saveDocAfter');

Route::get('/ajax/get/documentos/{user}', 'DocumentController@ajaxGetDoc');
Route::get('/ajax/get/docs/all', 'DocumentController@ajaxGetDocAll');
// Route::get('/ajax/get/tipo/doc/{id}', 'DocumentController@ajaxGetTipoDoc');
Route::get('/ajax/get/doc/{id}', 'DocumentController@ajaxGetDocId');


Route::get('/procesos/crear-documento', 'DocumentController@crear');
Route::get('/procesos/documentos/list', 'DocumentController@listDocument');
Route::get('/procesos/documento/{user}/edit/{slug}', 'DocumentController@editDocument');


Route::get('/docs/pdf/{id}', 'PdfController@getDocumentPdf');

/* personas */
Route::get('/ajax/people/get/{id}', 'PersonController@getPersonAjax');
Route::post('/ajax/people/edit/{id}', 'PersonController@editPersonAjax');
Route::delete('/ajax/people/delete/{id}', 'PersonController@deletePersonAjax');
/* personas */

/* citas */
Route::get('/ajax/quote/persons', 'QuoteController@getQuoteAjaxPerson');
Route::post('/ajax/quote/save', 'QuoteController@getQuoteAjaxSave');
Route::get('/ajax/quotes/calendar', 'QuoteController@getQuotesAjaxCalendar');
Route::get('/ajax/quotes/{date}', 'QuoteController@getQuotesAjax');
Route::get('/ajax/quote/get/{id}', 'QuoteController@getQuoteAjax');
Route::post('/ajax/quote/edit/{id}', 'QuoteController@editQuoteAjax');
Route::delete('/ajax/quote/delete/{id}', 'QuoteController@deleteQuoteAjax');
/* citas */
