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

		Route::get('ticket/{ticketid}', [
			'uses'  => '\Hdesk\Http\Controllers\SearchController@getTicketById',
			'as'		=> 'search.ticketbyid',
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
	+ Alerts
	*/
	Route::get('/alert', function () {
		return redirect()->route('home')->with('info', 'This is an alert');
	});

    /**
    + Admin
    */
  Route::get('dashboard/login',[
      'uses'  => '\Hdesk\Http\Controllers\AuthController@getLogin',
      'as'        => 'admin.login',
      'middleware'    => ['guest'],
  ]);

  Route::post('dashboard/login',[
      'uses'  => '\Hdesk\Http\Controllers\AuthController@postLogin',
      'middleware'    => ['guest'],
  ]);


    /**
    + Agent
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


/****************DASHBOARD***********************/

Route::group(['middleware' => 'admin'], function (){
    /**
    + Admin
    */
    Route::get('dashboard/admin/new',[
        'uses'  => '\Hdesk\Http\Controllers\AuthController@getNewAdmin',
        'as'        => 'admin.newadmin',

    ]);

    Route::post('dashboard/admin/new',[
        'uses'  => '\Hdesk\Http\Controllers\AuthController@postNewAdmin',

    ]);

    /**
    + Dashboard
    */
    Route::get('dashboard',[
        'uses'  => '\Hdesk\Http\Controllers\DashboardController@getDashboard',
        'as'        => 'dashboard.index',
    ]);

    /**
    + Ticket Edit
    */
    Route::get('dashboard/ticket/edit/{ticket_id}', [
            'uses'  => '\Hdesk\Http\Controllers\TicketController@getTicketEdit',
            'as'    => 'ticket.edit',
        ]);

    Route::post('dashboard/ticket/edit/{ticket_id}', [
            'uses'  => '\Hdesk\Http\Controllers\TicketController@postTicketEdit',

        ]);

    // Search by ticket id
    Route::get('dashboard/ticket/{ticketid}', [
        'uses'  => '\Hdesk\Http\Controllers\SearchController@getTicketById',
        'as'        => 'search.ticketbyid',
    ]);

    /**
    + Ticket delete
    */
    Route::get('dashboard/ticket/delete/{ticket_id}', [
        'uses' => '\Hdesk\Http\Controllers\TicketController@getTicketDelete',
        'as'    => 'ticket.delete',
      ]);

      /**
      + Ticket Status
      */
      Route::get('dashboard/tickets/closed/{$ticket_status}', [
        'usses' => '\Hdesk\Http\Controllers\TicketController@getclosedTickets',
        'as'    => 'status.closed',
      ]);


    /**
    + Search
    */
    Route::get('/admin/dashboard/search',[
      'uses'  => '\Hdesk\Http\Controllers\SearchController@getDashboardSearch',
      'as'    => 'dashboard.search',
    ]);

    /**
    + Trash
    */

    Route::get('dashboard/trash',[
      'uses'  => '\Hdesk\Http\Controllers\TrashController@getTrashbin',
      'as'    => 'dashboard.trash',
    ]);


});
