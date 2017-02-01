<?php

Route::get('/x159758457855474888', function () {

    /*$x = get_image_lib('slide');
    if($x) {
        dd(get_image_lib('slide'));
    }else{
        dd(get_image_lib('slide'));
        return 'error';
    }*/
    // Basic add Item to Cart
    /*CartProvider::instance()->add(new Item('293ad', 'Product 1', 1, 9.99));
    dd(CartProvider::instance()->getCartItems() );

    */

   /* $p = Post::where('id',1)->get();

    //$g = PostCategoryDetail::where('post_id',1)->post();



    dd($p->tags);*/

/*   $p = Post::find(9);
    dd($p->tags);*/

    //return view('x');
   // return view('layouts.sh');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['namespace' => 'FrontEnd'],
    function (){
        Route::get('/','FrontController@index');
        Route::get('/event-detail/{id}.html','FrontController@event_post_detail');
        Route::get('/event/{event_type}.html','FrontController@event_list');
    }
);

Route::group(
    ['prefix' => 'cpanel','namespace' => 'Admin'],
    function() {
        //Route::get('test', 'Admin\IndexController@index');
        //
        //==== Role =============================
        Route::get('/role','RoleController@index');
        Route::get('/role-form','RoleController@form');
        Route::put('/role-form','RoleController@form');
        Route::post('/role-save','RoleController@save');
        Route::post('/role-delete','RoleController@delete');

        //==== User =============================
        Route::get('/user','UserController@index');
        Route::get('/user-form','UserController@form');
        Route::put('/user-form','UserController@form');
        Route::post('/user-save','UserController@save');
        Route::post('/user-delete','UserController@delete');

        //==== Tag =============================
        Route::get('/tag','PostTagController@index');
        Route::get('/tag-form','PostTagController@form');
        Route::put('/tag-form','PostTagController@form');
        Route::post('/tag-save','PostTagController@save');
        Route::post('/tag-delete','PostTagController@delete');

        //==== Category =============================
        Route::get('/category','PostCategoryController@index');
        Route::get('/category-form','PostCategoryController@form');
        Route::put('/category-form','PostCategoryController@form');
        Route::post('/category-save','PostCategoryController@save');
        Route::post('/category-delete','PostCategoryController@delete');

        //==== Faculty =============================
        Route::get('/faculty','FacultyController@index');
        Route::get('/faculty-form','FacultyController@form');
        Route::put('/faculty-form','FacultyController@form');
        Route::post('/faculty-save','FacultyController@save');
        Route::post('/faculty-delete','FacultyController@delete');

        //==== Post =============================
        Route::get('/post','PostController@index');
        Route::get('/post-form','PostController@form');
        Route::put('/post-form','PostController@form');
        Route::post('/post-save','PostController@save');
        Route::post('/post-delete','PostController@delete');
        Route::post('/post-upload','PostController@upload');
        Route::post('/post-remove-upload','PostController@remove_upload_tmp');

        //==== EventPostController =============================
        Route::get('/event-post','EventPostController@index');
        Route::get('/event-post-form','EventPostController@form');
        Route::put('/event-post-form','EventPostController@form');
        Route::post('/event-post-save','EventPostController@save');
        Route::post('/event-post-delete','EventPostController@delete');
        Route::post('/event-post-upload','EventPostController@upload');
        Route::post('/event-post-remove-upload','EventPostController@remove_upload_tmp');

        //==== Page ==============================
        Route::get('/page','PageController@index');
        Route::get('/page-form','PageController@form');
        Route::put('/page-form','PageController@form');
        Route::post('/page-save','PageController@save');
        Route::post('/page-delete','PageController@delete');
        Route::post('/page-upload','PageController@upload');
        Route::post('/page-remove-upload','PageController@remove_upload_tmp');



        //==== ImageLibController ==============================
        Route::get('/image-lib','ImageLibController@index');
        Route::get('/image-lib-form','ImageLibController@form');
        Route::put('/image-lib-form','ImageLibController@form');
        Route::post('/image-lib-save','ImageLibController@save');
        Route::post('/image-lib-delete','ImageLibController@delete');
        Route::post('/image-lib-upload','ImageLibController@upload');
        Route::post('/image-lib-remove-upload','ImageLibController@remove_upload_tmp');

        //==== ProfessorController ==============================
        Route::get('/professor','ProfessorController@index');
        Route::get('/professor-form','ProfessorController@form');
        Route::put('/professor-form','ProfessorController@form');
        Route::post('/professor-save','ProfessorController@save');
        Route::post('/professor-delete','ProfessorController@delete');
        Route::post('/professor-upload','ProfessorController@upload');
        Route::post('/professor-remove-upload','ProfessorController@remove_upload_tmp');

        //==== item-category ==============================
        Route::get('/item-category','ItemCategoryController@index');
        Route::get('/item-category-form','ItemCategoryController@form');
        Route::put('/item-category-form','ItemCategoryController@form');
        Route::post('/item-category-save','ItemCategoryController@save');
        Route::post('/item-category-delete','ItemCategoryController@delete');

        //==== Page ==============================
        Route::get('/item','ItemController@index');
        Route::get('/item-form','ItemController@form');
        Route::put('/item-form','ItemController@form');
        Route::post('/item-save','ItemController@save');
        Route::post('/item-delete','ItemController@delete');

    }
);


