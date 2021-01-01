<?php

//getting the Main page

Route::get('/',function () { return view('home')->with('title','Home'); });


Route::get('recent','bookController@recent')->name('recent');

Route::get('all','bookController@all');

Route::get('books','bookController@books');


Route::get('genres','GenreController@all');


Route::get('book/{id}',function($id) { return view('book.book') -> with('id',$id); });

Route::get('read/{id}','BookController@read');

Route::get('auth',function(){return view('auth.login')->with('title','Profile'); })->name('auth');

route::get('favorite',function(){ return view('book.favourite')->with('title','favorite');});


Route::get('download/{id}','BookController@download');


Route::get('saved','SaveController@saved');
Auth::routes();

Route::get('getbook/{id}','bookController@getbook');

Route::get('bookGenre/{id}','GenreController@genresByBook');

Route::get('genrebooks/{id}','GenreController@booksByGenre');



Route::get('relatedbooks/{id}','bookController@relatedbooks');
Route::get('allbooks',function () { return view('book.all')->with('title','books'); });

Route::get('addbook',function () { return view('book.add')->with('title','Add');});


Route::post('add','bookController@add');

Route::get('mybooks','bookController@mybooks');

Route::get('/posts',function () { return view('book.mybooks')->with('title','My Books');});



Route::post('Review','ReviewController@add');

Route::get('issaved/{book_id}','SaveController@isSaved');
Route::get('save/{book_id}','SaveController@save');




// Route::get('logout', 'Auth\LoginController@logout')->name('logout');


Route::post('search','BookController@search')->name('search');
Route::get('searchResult/{word}','BookController@searchResult');
