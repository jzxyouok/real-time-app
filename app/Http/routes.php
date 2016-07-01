<?php

use Illuminate\Support\Facades\App;

Route::get('bridge', function() {
    $pusher = App::make('pusher');

    $pusher->trigger( 'test-channel',
                      'test-event', 
                      array('text' => 'So this api message is going through!'));

    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('auth/github', 'Auth\AuthController@redirectToProvider');
Route::get('auth/github/callback', 'Auth\AuthController@handleProviderCallback');

Route::controller('activities', 'ActivityController');
Route::post('activities/status-update', 'ActivityController@postStatusUpdate');
Route::post('activities/like', 'ActivityController@postLike');
Route::controller('chat', 'ChatController');
Route::resource('vuechat', 'VueChatController');

Route::get('about', [
	'uses' => 'VueChatController@aboutIndex',
	'as' => 'vuechat.about',
]);

Route::get('contact', [
	'uses' => 'VueChatController@contactIndex',
	'as' => 'vuechat.contact',
]);

Route::controller('notifications', 'NotificationController');
