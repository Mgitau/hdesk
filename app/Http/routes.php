<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function (){


	/**
	+ Home
	*/
	Route::get('/', [
			'uses' 	=> '\Hdesk\Http\Controllers\HomeController@index',
			'as'	=> 'home',
		]);


	/**
	+ Ticket
	*/
	Route::get('submitticket', [
			'uses'	=> '\Hdesk\Http\Controllers\TicketController@getTicket',
			'as'	=> 'ticket.ticketform',
		]);

    Route::post('submitticket', [
			'uses'	=> '\Hdesk\Http\Controllers\TicketController@postTicket',
		]);


    /**
	+ Search
	*/
    Route::get('search',[
        'uses'  => '\Hdesk\Http\Controllers\SearchController@getSearch',
        'as'    => 'search.ticketsearch',
    ]);

    Route::get('results',[
        'uses'  => '\Hdesk\Http\Controllers\SearchController@getResults',
        'as'    => 'search.results',
    ]);

		Route::get('ticket/{ticketid}', [
			'uses'  => '\Hdesk\Http\Controllers\SearchController@getTicketById',
			'as'		=> 'search.ticketbyid'
		]);


    // Route::get('email', function(){
		//
    //     Mail::send('email.test',['name' => 'Mbugua'], function($message){
    //         $message->to('mbugit88@gmail.com', 'H-desk')->subject('Ticket #1');
    //     });
		//
    // });

	/**
	+ Alerts
	*/
	Route::get('/alert', function () {
		return redirect()->route('home')->with('info', 'This is an alert');
	});



});
