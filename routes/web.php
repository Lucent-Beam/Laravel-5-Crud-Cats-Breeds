<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {

});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('cats', function() {
  $cats = App\Cat::all();
  return view('cats.index')->with('cats', $cats);
});

Route::get('cats/breeds/{name}', function($name) {
  $breed = App\Breed::with('cats')
    ->whereName($name)
    ->first();

  return view('cats.index')
    ->with('breed', $breed)
    ->with('cats', $breed->cats);
});

// Route::get('cats/{id}',function($id){
//    return sprintf('Cat #%s', $id);
// })->where('id','[0-9]+');
// Route::get('cats/{id}',function($id){
//   return view('cats.index')->with(['id'=>$id]);
// })->where('id','[0-9]+');
