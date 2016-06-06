<div class="container hdesk-container">

  <h3><a href="{{Route('dashboard.index')}}">Dashboard</a></h3>

  <div class="navbar navbar-default">
    <div class="navbar-header">
      <div class="container">
        <div class="nav navbar-nav">

          <form class="navbar-form navbar-left" action="#" method="post">
            <div class="form-group">
              <select class="selectpicker " name="ticket-status">
                <option class="open_ticket">Open Tickets</option>
                <option class="pending_ticket">Pending Tickets</option>
                <option class="closed_ticket">Closed Tickets</option>
              </select>
              <button type="button" class="btn btn-success" name="button">Apply</button>
            </div>
          </form>

          <form class="navbar-form navbar-right" action="{{ Route('dashboard.search') }}"role="search">
              <div class="form-group{{ $errors->has('searchItem') ? ' has-error': '' }}">
                <input type="text" class="form-control"  name="searchItem" placeholder="Search">

                @if($errors->has('searchItem'))
                    <span class="help-block">{{ $errors->first('name') }}</span>
                @endif()
              </div>
              <button type="submit" class="btn btn-default">Search</button>
            </form>


          <a class="btn btn-primary navbar-btn" href="{{ Route('ticket.newticket') }}" role="button">+ New Ticket</a>
        </div><!-- .nav navbar-nav -->

      </div><!-- .container-->
    </div><!-- .navbar-header-->

  </div><!-- .navbar-navbar-default-->
