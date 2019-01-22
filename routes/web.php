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

Route::any('es', 'IndexController@es');
Route::get('es_get', 'IndexController@esGet');
Route::get('es_search', 'IndexController@esSearch');
Route::get('es_delete', 'IndexController@esDelete');

Route::get('bb', 'IndexController@bb');

Route::get('index', 'IndexController@index');
Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('notify', 'IndexController@testNotify');
Route::get('roll', 'IndexController@testRoll');



Route::get('/redis/{id}', 'IndexController@showProfile');
Route::get('/setC/{id}', 'IndexController@setCache');

Route::get('/register', 'IndexController@register');

Route::get('testzzz', 'IndexController@testZZZ');


Route::get('paul/{id}', 'IndexController@paul');

Route::any('/user', function () {
    return json_encode(['msg' => OK, 'data'=>[1,2,3], 'status' => 200]);
});

Route::get('testwk', 'IndexController@testwk');

Route::get('aaa', function ()
{
    return View::make('paul');

    $languages = ['php', 'python', 'scala','java'];

    foreach ($languages as &$lang)
        $lang = strtoupper($lang);

//    echo $lang;

    foreach ($languages as $lang) {
//        print_r($languages);
        echo $lang . "\n";
    }
});

