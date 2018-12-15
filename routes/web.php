<?php

Route::get('/test', function(){
   return App\User::find(1)->replies;
});



Route::get('/', [
  'uses'    =>  'FrontendController@index',
  'as'      =>  'frontend.index'
]);

Route::get('/', [
    'uses'  =>  'FrontendController@index',
    'as'    =>  'index'
]);






Auth::routes();


Route::group(['prefix' => 'admin', 'middleware' => 'auth'] , function(){

    Route::get('/posts', [
       'uses'   =>  'PostController@index',
       'as'     =>  'post.index'
    ]);

    Route::get('/post/create', [
       'uses'   =>  'PostController@create',
       'as'     =>  'post.create'
    ]);

    Route::post('/post/store', [
        'uses'   =>  'PostController@store',
        'as'     =>  'post.store'
    ]);

    Route::get('/post/edit/{id}', [
        'uses'   =>  'PostController@edit',
        'as'     =>  'post.edit'
    ]);

    Route::post('/post/update/{id}', [
        'uses'   =>  'PostController@update',
        'as'     =>  'post.update'
    ]);

    Route::get('/post/delete/{id}', [
        'uses'   =>  'PostController@destroy',
        'as'     =>  'post.delete'
    ]);

    Route::get('/post/trashed', [
        'uses'   =>  'PostController@trashed',
        'as'     =>  'post.trashed'
    ]);

    Route::get('/post/kill/{id}', [
       'uses'   =>  'PostController@kill',
       'as'     =>  'post.kill'
    ]);

    Route::get('/post/restore/{id}', [
       'uses'   =>  'PostController@restore',
       'as'     =>  'post.restore'
    ]);


//    Category
    Route::get('/categories', [
        'uses'  =>  'CategoryController@index',
        'as'    =>  'category.index'
    ]);

    Route::get('/category/create', [
        'uses'  =>  'CategoryController@create',
        'as'    =>  'category.create'
    ]);

    Route::post('/category/store', [
        'uses'  =>  'CategoryController@store',
        'as'    =>  'category.store'
    ]);

    Route::get('/category/edit/{id}', [
        'uses'  =>  'CategoryController@edit',
        'as'    =>  'category.edit'
    ]);

    Route::post('/category/update/{id}', [
        'uses'  =>  'CategoryController@update',
        'as'    =>  'category.update'
    ]);

    Route::get('/category/delete/{id}', [
        'uses'  =>  'CategoryController@destroy',
        'as'    =>  'category.delete'
    ]);


    //    Tags
    Route::get('/tags', [
        'uses'  =>  'TagController@index',
        'as'    =>  'tag.index'
    ]);

    Route::get('/tag/create', [
        'uses'  =>  'TagController@create',
        'as'    =>  'tag.create'
    ]);

    Route::post('/tag/store', [
        'uses'  =>  'TagController@store',
        'as'    =>  'tag.store'
    ]);

    Route::get('/tag/edit/{id}', [
        'uses'  =>  'TagController@edit',
        'as'    =>  'tag.edit'
    ]);

    Route::post('/tag/update/{id}', [
        'uses'  =>  'tagController@update',
        'as'    =>  'tag.update'
    ]);

    Route::get('/tag/delete/{id}', [
        'uses'  =>  'TagController@destroy',
        'as'    =>  'tag.delete'
    ]);


    //Users
    Route::get('/users', [
       'uses'   =>  'UsersController@index',
       'as'     =>  'users'
    ]);




    //admin
    Route::get('/user/admin/{id}', [
        'uses'   =>  'UsersController@admin',
        'as'     =>  'user.admin'
    ])->middleware(['admin', 'admin1', 'adminWarn']);

    Route::get('/user/remove_admin/{id}', [
        'uses'   =>  'UsersController@notAdmin',
        'as'     =>  'user.not.admin'
    ])->middleware(['admin', 'admin1', 'adminWarn']);

    //Edit profile
    Route::get('/edit/profile', [
       'uses'   =>  'ProfileController@index',
       'as'     =>  'edit.profile'
    ]);

    Route::post('/update/profile', [
        'uses'   =>  'ProfileController@update',
        'as'     =>  'update.profile'
    ]);

    Route::get('/delete/account/{id}', [
        'uses'   =>  'UsersController@destroy',
        'as'     =>  'user.delete'
    ])->middleware(['admin', 'admin1', 'adminWarn']);

    Route::get('/settings', [
       'uses'   =>  'SettingsController@index',
       'as'     =>  'settings'
    ])->middleware(['admin', 'admin1', 'adminWarn']);

    Route::post('/settings/update', [
        'uses'   =>  'SettingsController@update',
        'as'     =>  'settings.update'
    ])->middleware(['admin', 'admin1', 'adminWarn']);

    Route::get('/my-posts', [
       'uses'   =>  'UsersController@myPosts',
       'as'     =>  'myposts'
    ]);

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/comments', [
       'uses'   =>  'CommentContoller@index',
        'as'    =>  'comment.index'
    ]);

    Route::get('/comment/create', [
        'uses'   =>  'CommentController@create',
        'as'    =>  'comment.create'
    ]);

    Route::post('/comment/store', [
        'uses'   =>  'CommentContoller@store',
        'as'    =>  'comment.store'
    ]);

});

Route::get('/register', [
    'uses'   =>  'UsersController@create',
    'as'     =>  'user.create'
]);

Route::post('/user/store', [
    'uses'   =>  'UsersController@store',
    'as'     =>  'user.store'
]);

Route::get('/post/{slug}', [
   'uses'   =>  'FrontendController@singlePost',
   'as'     =>  'post.single'
]);

Route::get('/category/{id}', [
   'uses'   =>  'FrontendController@category',
   'as'     =>  'category.single'
]);

Route::get('/tag/{id}', [
   'uses'   =>  'FrontendController@tag',
   'as'     =>  'tag.single'
]);

Route::get('form', function(){
    return view('form');
});

Route::post('/form/save', [
   'uses'   =>  'FormController@store'
]);

Route::view('/ajaxUsers', 'ajaxUsers', [
   'users'   =>  App\User::all()
])->middleware(['admin', 'admin1', 'adminWarn']);;

Route::view('/ajaxTags', 'ajaxTags', [
    'tags'   =>  App\Tag::all()
])->middleware(['admin', 'admin1', 'adminWarn']);;

Route::get('/ajaxComment', function(){
    return view('ajaxComment');
});


//Route::get('/test', function(){
//    return view('test')->with('content', \App\Test::all());
//});

Route::put('/test/store', [
   'uses'   => 'TestController@store',
    'as'    =>  'test.store'
]);

Route::post('/test/post', 'TestController@store');



Route::post('/reply/store', [
   'uses'   =>  'ReplyController@store',
    'as'    =>  'reply.store'
]);



























