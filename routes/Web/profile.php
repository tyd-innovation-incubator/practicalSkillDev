<?php
Route::group([
    'namespace' => 'Profile',
], function() {
    Route::group(['as' => 'profile.'], function (){

        Route::get('/education_details/{user}', 'ProfileController@educationDetails')->name('education_details');
        Route::post('/education_details/store/{user}','ProfileController@storeEducationDetails')->name('education_details.store');

    });

});