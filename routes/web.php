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

Route::get('/', [
    'uses' => 'FrontEndController@index',
    'as'=> 'index'
]);

Route::get('/posts/{slug}', [
    'uses' => 'FrontEndController@singlePost',
    'as'=> 'single.post'
]);

Route::get('/category/{id}', [
    'uses' => 'FrontEndController@category',
    'as'=> 'single.category'
]);

Route::get('/tag/{id}', [
    'uses' => 'FrontEndController@tag',
    'as'=> 'single.tag'
]);

Route::get('/results',function(){
    $posts = \App\Post::where('title','like','%' . request('query') . '%')->get() ;

    return view('results')->with('posts',$posts)
    ->with('setting',\App\Setting::first())
        ->with('title', 'Results for : ' . request('query'))
        ->with('categories', \App\Category::take(4)->get())
        ->with('tags', \App\Tag::all()) ;

}) ;

Route::get('/test',function(){
    return App\User::find(1)->profile ;
}) ;

Auth::routes();


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

    Route::get('/home', [ 
        'uses' => 'HomeController@index', 
        'as' => 'home'
    ]);

    Route::get('/posts/create',[
        'uses' => 'PostsController@create',
        'as' => 'posts.create'
    ]);
    
    Route::post('/posts/store',[
        'uses' => 'PostsController@store',
        'as' => 'posts.store'
    ]);

    Route::get('/categories/create',[
        'uses' => 'CategoriesController@create',
        'as' => 'categories.create'
    ]);

    Route::post('/categories/store',[
        'uses' => 'CategoriesController@store',
        'as' => 'categories.store'
    ]);

    Route::get('/categories',[
        'uses' => 'CategoriesController@index',
        'as' => 'categories.index'
    ]);

    Route::get('/categories/edit/{id}',[
        'uses' => 'CategoriesController@edit',
        'as' => 'categories.edit'
    ]);

    Route::get('/categories/delete/{id}',[
        'uses' => 'CategoriesController@destroy',
        'as' => 'categories.delete'
    ]);

    Route::post('/categories/update/{id}',[
        'uses' => 'CategoriesController@update',
        'as' => 'categories.update'
    ]);

    Route::get('/posts',[
        'uses' => 'PostsController@index',
        'as' => 'posts.index'
    ]);

    Route::get('/posts/edit/{id}',[
        'uses' => 'PostsController@edit',
        'as' => 'posts.edit'
    ]);

    Route::get('/posts/trash/{id}',[
        'uses' => 'PostsController@trash',
        'as' => 'posts.trash'
    ]);

    Route::post('/posts/update/{id}',[
        'uses' => 'PostsController@update',
        'as' => 'posts.update'
    ]);
    
    Route::get('/posts/trashed',[
        'uses' => 'PostsController@trashed',
        'as' => 'posts.trashed'
    ]);

    Route::get('/posts/delete/{id}',[
        'uses' => 'PostsController@destroy',
        'as' => 'posts.delete'
    ]);

    Route::get('/posts/restore/{id}',[
        'uses' => 'PostsController@restore',
        'as' => 'posts.restore'
    ]);

    Route::get('/tags',[
        'uses' => 'TagsController@index',
        'as' => 'tags.index'
    ]) ;

    Route::get('/tags/create',[
        'uses' => 'TagsController@create',
        'as' => 'tags.create'
    ]) ;

    Route::post('/tags/store',[
        'uses' => 'TagsController@store',
        'as' => 'tags.store'
    ]);

    Route::get('/tags/edit/{id}',[
        'uses' => 'TagsController@edit',
        'as' => 'tags.edit'
    ]);

    Route::post('/tags/update/{id}',[
        'uses' => 'TagsController@update',
        'as' => 'tags.update'
    ]);

    Route::get('/tags/delete/{id}',[
        'uses' => 'TagsController@destroy',
        'as' => 'tags.delete'
    ]) ;

    Route::get('/users',[
        'uses' => 'UsersController@index',
        'as' => 'users.index'
    ]);

    Route::get('/users/create',[
        'uses' => 'UsersController@create',
        'as' => 'users.create'
    ]);

    Route::post('/users/store',[
        'uses' => 'UsersController@store',
        'as' => 'users.store'
    ]);

    Route::get('/users/admin/{id}',[
        'uses' => 'UsersController@admin',
        'as' => 'users.admin'
    ])->middleware('admin');

    Route::get('/users/noadmin/{id}',[
        'uses' => 'UsersController@noadmin',
        'as' => 'users.noadmin'
    ])->middleware('admin');

    Route::get('/users/profile',[
        'uses' => 'ProfilesController@index',
        'as' => 'user.profile'
    ]);

    Route::post('/users/profile/update',[
        'uses' => 'ProfilesController@update',
        'as' => 'user.profile.update'
    ]);

    Route::get('/settings',[
        'uses' => 'SettingsController@index',
        'as' => 'settings'
    ]);

    Route::post('/settings/update',[
        'uses' => 'SettingsController@update',
        'as' => 'settings.update'
    ]);
}) ;

