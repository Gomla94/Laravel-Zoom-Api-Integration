<?php

use Illuminate\Support\Facades\Route;


Route::get('', 'HomeController@index');

Route::get('meetings', 'ZoomController@index')->name('meetings.index');
Route::get('start-meeting/{meeting}', 'ZoomController@start_meeting')->name('meeting.start');
Route::get('join-meeting/{meeting}', 'ZoomController@join_meeting')->name('meeting.join');
Route::get('leave-meeting', 'ZoomController@leave_meeting')->name('meeting.leave');
Route::get('create-new-meeting', 'ZoomController@create')->name('meeting.create');
Route::post('create-new-meeting', 'ZoomController@store')->name('meeting.store');
Route::delete('delete-meeting/{meeting}', 'ZoomController@destroy')->name('meeting.destroy');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
