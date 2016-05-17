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
            'uses'  => '\Hdesk\Http\Controllers\HomeController@index',
            'as'    => 'home',
        ]);


    /**
    + Ticket
    */
    Route::get('ticket/new', [
            'uses'  => '\Hdesk\Http\Controllers\TicketController@getTicket',
            'as'    => 'ticket.newticket',
        ]);

    Route::post('ticket/new', [
            'uses'  => '\Hdesk\Http\Controllers\TicketController@postTicket',
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

<<<<<<< HEAD
		Route::get('ticket/{ticketid}', [
			'uses'  => '\Hdesk\Http\Controllers\SearchController@getTicketById',
			'as'		=> 'search.ticketbyid',
		]);

		/**
		* Admin
		*/
		Route::post('admin/new',[
			'uses'	=> '\Hdesk\Http\Controllers\AuthController@postNewAdmin',
	]);
			Route::get('admin/new',[
				'uses'	=> '\Hdesk\Http\Controllers\AuthController@getNewAdmin',
				'as'		=> 'admin.newadmin',
	]);

		Route::get('admin/login',[
			'uses'	=> '\Hdesk\Http\Controllers\AuthController@getLogin',
			'as'		=> 'admin.login',
			'middleware'	=> ['guest'],
		]);

		Route::post('admin/login',[
			'uses'	=> '\Hdesk\Http\Controllers\AuthController@postLogin',
			'middleware'	=> ['guest'],
		]);



		Route::get('admin/signout',[
			'uses'	=> '\Hdesk\Http\Controllers\AuthController@getSignOut',
			'as'		=> 'admin.signout',
		]);

		/**
		* Agent
		*/
		Route::get('agent/newagent',[
			'uses'	=> '\Hdesk\Http\Controllers\AgentController@getCreateAgent',
			'as'		=> 'agent.createagent',
		]);

		Route::post('agent/newadmin',[
			'uses'	=> '\Hdesk\Http\Controllers\AgentController@postCreateAgent',
		]);

		/**
		+ Dashboard
		*/
		Route::get('admin/dashboard',[
			'uses'	=> '\Hdesk\Http\Controllers\DashboardController@getDashboard',
			'as'		=> 'dashboard.index',
		]);

	/**
	+ Alerts
	*/
	Route::get('/alert', function () {
		return redirect()->route('home')->with('info', 'This is an alert');
	});

=======


        /**
        * Admin
        */
        Route::get('admin/login',[
            'uses'  => '\Hdesk\Http\Controllers\AuthController@getLogin',
            'as'        => 'admin.login',
            'middleware'    => ['guest'],
        ]);

        Route::post('admin/login',[
            'uses'  => '\Hdesk\Http\Controllers\AuthController@postLogin',
            'middleware'    => ['guest'],
        ]);


        /**
        * Agent
        */
        Route::get('agent/newagent',[
            'uses'  => '\Hdesk\Http\Controllers\AgentController@getCreateAgent',
            'as'        => 'agent.createagent',
        ]);

        Route::post('agent/newadmin',[
            'uses'  => '\Hdesk\Http\Controllers\AgentController@postCreateAgent',
        ]);

    /**
    + Alerts
    */
    Route::get('/alert', function () {
        return redirect()->route('home')->with('info', 'This is an alert');
    });

});


//Routes Accessed only by being logged in routes

Route::group(['middleware' => 'admin'], function (){
    Route::get('admin/new',[
        'uses'  => '\Hdesk\Http\Controllers\AuthController@getNewAdmin',
        'as'        => 'admin.newadmin',

    ]);

    Route::post('admin/new',[
        'uses'  => '\Hdesk\Http\Controllers\AuthController@postNewAdmin',

    ]);

    Route::get('admin/signout',[
        'uses'  => '\Hdesk\Http\Controllers\AuthController@getSignOut',
        'as'        => 'admin.signout',
    ]);

    /**
    + Dashboard
    */
    Route::get('admin/dashboard',[
        'uses'  => '\Hdesk\Http\Controllers\DashboardController@getDashboard',
        'as'        => 'dashboard.index',
    ]);
// Search by ticket number
Route::get('ticket/{ticketid}', [
    'uses'  => '\Hdesk\Http\Controllers\SearchController@getTicketById',
    'as'        => 'search.ticketbyid',
]);


>>>>>>> fb134c027fb77aa0c0a608f1052fa7aee95e1745

});
