<div class="container hdesk-container">

  <h3><a href="{{Route('dashboard.index')}}">Dashboard</a></h3>

  <div class="navbar navbar-default">
    <div class="navbar-header">
      <div class="container">
        <div class="nav navbar-nav">
          
          <a class="btn btn-info navbar-btn" href="{{ Route('tickets.open') }}" role="button"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> Open</a>
          <a class="btn btn-warning navbar-btn" href="{{ Route('tickets.pending') }}" role="button"><span class="glyphicon glyphicon-option-horizontal" aria-hidden="true"></span> Pending</a>
          <a class="btn btn-success navbar-btn" href="{{ Route('tickets.closed') }}" role="button"><span class="glyphicon glyphicon-check" aria-hidden="true"></span> Closed</a>
          <a class="btn btn-primary navbar-btn" href="{{ Route('ticket.newticket') }}" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> New Ticket</a>

          <form class="navbar-form navbar-right" action="{{ Route('dashboard.search') }}"role="search">
              <div class="form-group{{ $errors->has('searchItem') ? ' has-error': '' }}">
                <input type="text" class="form-control"  name="searchItem" placeholder="Search">

                @if($errors->has('searchItem'))
                    <span class="help-block">{{ $errors->first('name') }}</span>
                @endif()
              </div>
              <button type="submit" class="btn btn-default">Search</button>
            </form>

        </div><!-- .nav navbar-nav -->

      </div><!-- .container-->
    </div><!-- .navbar-header-->

  </div><!-- .navbar-navbar-default-->
