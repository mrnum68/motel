<?php

get('','HomeController@index');


Route::group(['namespace' => 'Auth' , 'prefix' => 'auth'] , function(){

});


Route::group(['prefix'=>'admin' , 'namespace' 	=> 'Admin' , 'middleware' => 'auth'] , function(){
	


});

