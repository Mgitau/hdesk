@extends('templates.default')
@section('title', 'Edit')

@section('content')

<div class="container">

<div class="hdesk-container">

  <div class="row">

    <div class="col-lg-12">

      <form class="form-horizontal" role="form" method="post" action="{{ route('ticket.edit', ['ticket_id' => $ticket->id] ) }}">

        <div class="form-group{{ $errors->has('name') ? ' has-error': '' }}">

          <label for="name" class="col-lg-2 control-label">Name</label>

          <div class="col-lg-8">

            <input type="text" class="form-control" name="name" id="name" placeholder="Enter your Name" value="{{ Request::old('name')?:$ticket->name }}"></input>

                          @if($errors->has('name'))
                              <span class="help-block">{{ $errors->first('name') }}</span>
                          @endif()

          </div>

        </div> <!-- end form-group -->

        <div class="form-group{{ $errors->has('email') ? ' has-error': '' }}">

          <label for="name" class="col-lg-2 control-label">Email</label>
          <div class="col-lg-8">

            <input type="email" class="form-control" name="email" id="email" placeholder="Enter your Name" value="{{ Request::old('email')?: $ticket->email }}"></input>
                           @if($errors->has('email'))
                              <span class="help-block">{{ $errors->first('email') }}</span>
                          @endif()
          </div>

        </div> <!-- end form-group -->

        <hr class="hdesk-hr">

        <div class="form-group">

          <label for="name" class="col-lg-2 control-label">Category</label>
          <div class="dropdown col-lg-8">
                          <select class="selectpicker" name="category">
                            @if($ticket->category === 'General')
                              <option selected="selected">General</option>
                              <option>Support</option>
                              <option>Printing</option>
                              <option>Bim</option>

                            @elseif($ticket->category === 'Support')
                              <option>General</option>
                              <option selected="selected">Support</option>
                              <option>Printing</option>
                              <option>Bim</option>

                            @elseif($ticket->category === 'Printing')
                              <option>General</option>
                              <option>Support</option>
                              <option selected="selected">Printing</option>
                              <option>Bim</option>

                            @elseif($ticket->category === 'Bim')
                              <option>General</option>
                              <option>Support</option>
                              <option>Printing</option>
                              <option selected="selected">Bim</option>

                            @endif
                          </select>
          </div>
        </div>



        <div class="form-group">

          <label for="name" class="col-lg-2 control-label">Priority</label>
          <div class="dropdown col-lg-8">
                          <select class="selectpicker" name="priority">
                            @if($ticket->priority === 'Low')
                              <option class="priority-low" selected="selected">Low</option>
                              <option class="priority-medium">Medium</option>
                              <option class="priority-high">High</option>

                            @elseif($ticket->priority === 'Medium')
                              <option class="priority-low">Low</option>
                              <option class="priority-medium" selected="selected">Medium</option>
                              <option class="priority-high">High</option>

                            @elseif($ticket->priority === 'High')
                              <option class="priority-low">Low</option>
                              <option class="priority-medium">Medium</option>
                              <option class="priority-high" selected="selected">High</option>

                            @endif
                          </select>
          </div>

        </div> <!-- end form-group -->

        <div class="form-group">
          <label for="name" class="col-lg-2 control-label">Status</label>

          <div class="dropdown col-lg-8">
                          <select class="selectpicker" name="status">
                            @if($ticket->status === 'Open')
                              <option selected="selected">Open</option>
                              <option>Pending</option>
                              <option>Closed</option>

                            @elseif($ticket->status === 'Pending')
                              <option>Open</option>
                              <option selected="selected">Pending</option>
                              <option>Closed</option>

                            @elseif($ticket->status === 'Closed')
                              <option>Open</option>
                              <option>Pending</option>
                              <option selected="selected">Closed</option>
                            @endif
                          </select>
          </div>

        </div> <!-- end form-group -->

        <hr class="hdesk-hr">

        <div class="form-group{{ $errors->has('subject') ? ' has-error': '' }}">

          <label for="subject" class="col-lg-2 control-label">Subjects</label>

          <div class="col-lg-8">

            <input type="text" class="form-control" name="subject" id="subject" placeholder="Enter your Subject" value="{{ Request::old('subject')?: $ticket->subject }}"></input>
                           @if($errors->has('subject'))
                              <span class="help-block">{{ $errors->first('subject') }}</span>
                          @endif()
          </div>

        </div> <!-- ends form-group -->

        <div class="form-group {{ $errors->has('message') ? ' has-error': '' }}">

          <label for="message" class="col-lg-2 control-label">Message</label>

          <div class="col-lg-8">

            <textarea class="form-control" name="message" rows="3">{{ Request::old('message')?:$ticket->message }}</textarea>
                           @if($errors->has('message'))
                              <span class="help-block">{{ $errors->first('message') }}</span>
                          @endif()
          </div>

        </div> <!-- end form-group -->

        <hr class="hdesk-hr">

        <!-- <div class="form-group">

          <label for="attachments" class="col-lg-2 control-label">Attachments</label>

          <div class="col-lg-8">

            <input type="file" id="attachments"></input>

          </div>


        </div> -->



        <button type="submit" class="btn btn-primary  col-lg-offset-2">Update Ticket</button>

                  <!-- <input type="hidden" name="status" value="Open"> -->
                  <input type="hidden" name="id" value="{{$ticket->id}}">
                  <!-- <input type="hidden" name="ticket_no" value="{{uniqid('Triad_')}}"> -->
<!--                    CSRF -->
                  {{ csrf_field() }}


      </form> <!-- end form -->

    </div> <!-- end col-lg-12-->

</div> <!-- end row -->

</div> <!-- end hdesk-container -->


</div> <!-- end container -->


@stop
