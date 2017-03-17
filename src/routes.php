<?php

use Illuminate\Session\TokenMismatchException;

/**
 * FRONT
 */
Route::get('comment', [
    'as' => 'comment',
    'uses' => 'Group\Comment\Controllers\Front\CommentFrontController@index'
]);

Route::get('comment/add', [
    'as' => 'comment.add',
    'uses' => 'Group\Comment\Controllers\Front\CommentFrontController@add'
]);

/**
 * ADMINISTRATOR
 */
Route::group(['middleware' => ['web']], function () {

    Route::group(['middleware' => ['admin_logged', 'can_see']], function () {

        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////SAMPLES ROUTE///////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        /**
         * list
         */
        Route::get('admin/comment', [
            'as' => 'admin_comment',
            'uses' => 'Group\Comment\Controllers\Admin\CommentAdminController@index'
        ]);

        
        /**
         * edit-add
         */
        Route::get('admin/comment/edit', [
            'as' => 'admin_comment.edit',
            'uses' => 'Group\Comment\Controllers\Admin\CommentAdminController@edit'
        ]);

        /**
         * post
         */
        Route::post('admin/comment/edit', [
            'as' => 'admin_comment.up_comment',
            'uses' => 'Group\Comment\Controllers\Admin\CommentAdminController@up_comment'
        ]);
    });
});
