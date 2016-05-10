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
//use Mail;

Route::group(['middleware' => ['web']], function (){


	/**
	+ Home
	*/
	Route::get('/', [
			'uses' 	=> '\Hdesk\Http\Controllers\HomeController@index',
			'as'	=> 'home',
		]);


	/**
	+ New Ticket
	*/
	Route::get('ticket/new', [
			'uses'	=> '\Hdesk\Http\Controllers\TicketController@getTicket',
			'as'	=> 'ticket.newticket',
		]);

    Route::post('ticket/new', [
			'uses'	=> '\Hdesk\Http\Controllers\TicketController@postTicket',
		]);

//Display ticket via the ticket number
		Route::get('ticket/view/{ticket}', function($ticket){
				return view('search.results')->with('ticket', $ticket);
		});






    /**
	+ Search Ticket
	*/
    Route::get('ticket/search',[
        'uses'  => '\Hdesk\Http\Controllers\SearchController@getSearch',
        'as'    => 'search.ticket',
    ]);

    Route::get('ticket/results',[
        'uses'  => '\Hdesk\Http\Controllers\SearchController@getResults',
        'as'    => 'search.results',
    ]);


// Test route for emails
    Route::get('email', function(){

        Mail::send('email.test',['name' => 'Mbugua'], function($message){
            $message->to('mbugit88@gmail.com', 'H-desk')->subject('Ticket #1');
        });

    });


/**
* Admin
*/
route::get('login', [
		'uses'	=> '\Hdesk\Http\Controllers\AdminController@getLogin',
		'as'		=> 'admin.login',
]);

/**
+ Alerts
*/
Route::get('/alert', function () {
	return redirect()->route('home')->with('info', 'This is an alert');
});



});
