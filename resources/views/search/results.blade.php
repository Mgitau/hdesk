@extends('templates.default')

@section('content')

{{dd($ticket)}}

<div class="container">

    <div class="hdesk-container">

        @if(!$ticket)

            <div class="alert alert-info">
		      <p>No ticket found, sorry</p>
	       </div>

        @else

        <div class="row">

            <h4 class="text-center">{{$ticket->subject}}</h4>

            <div class="col-md-2">

               <p><b>Ticket ID:</b></p>

            </div> <!--end col-md-2-->

            <div class="col-md-10">

               {{$ticket->ticket_no}}

            </div> <!--end col-md-10-->

        </div> <!--end row-->

        <div class="row">

            <div class="col-md-2">

               <p><b>Ticket Status:</b></p>

            </div> <!--end col-md-2-->

            <div class="col-md-10">

              {{$ticket->status}}

            </div> <!--end col-md-10-->

        </div> <!--end row-->

        <div class="row">

            <div class="col-md-2">

               <p><b>Created on:</b></p>

            </div> <!--end col-md-2-->

            <div class="col-md-10">

                {{$ticket->created_at}}

            </div>

        </div> <!--end row-->

        <div class="row">

            <div class="col-md-2">

               <p><b>Updated on:</b></p>

            </div> <!--end col-md-2-->

            <div class="col-md-10">

                {{$ticket->updated_at}}

            </div>

        </div> <!--end row-->

<!--
        <div class="row">

            <div class="col-md-2">

               <p><b>Last Replier:</b></p>

            </div>

            <div class="col-md-10">

                Agent 007

            </div>

        </div> end row
-->

        <div class="row">

            <div class="col-md-2">

               <p><b>Category:</b></p>

            </div> <!--end col-md-2-->

            <div class="col-md-10">

                {{$ticket->category}}

            </div>

        </div> <!--end row-->

<!--
        <div class="row">

            <div class="col-md-2">

               <p><b>Replies:</b></p>

            </div>

            <div class="col-md-10">

                0

            </div>

        </div> end row
-->

        <div class="row">

            <div class="col-md-2">

               <p><b>Priority:</b></p>

            </div> <!--end col-md-2-->

            <div class="col-md-10">

                {{$ticket->priority}}

            </div>

        </div> <!--end row-->

        <hr class="hdesk-hr">

        <div class="row">

            <div class="col-md-2">

               <p><b>Date:</b></p>

            </div> <!--end col-md-2-->

            <div class="col-md-10">

                {{$ticket->created_at}}

            </div>

        </div> <!--end row-->

        <div class="row">

            <div class="col-md-2">

               <p><b>Name:</b></p>

            </div> <!--end col-md-2-->

            <div class="col-md-10">

                {{$ticket->name}}

            </div>

        </div> <!--end row-->

        <div class="row">

            <div class="col-md-2">

               <p><b>Email:</b></p>

            </div> <!--end col-md-2-->

            <div class="col-md-10">

                {{$ticket->email}}

            </div>

        </div> <!--end row-->

        <div class="row">

            <div class="col-md-2">

               <p><b>Subject:</b></p>

            </div> <!--end col-md-2-->

            <div class="col-md-10">

               {{$ticket->subject}}

            </div>

        </div> <!--end row-->

        <div class="row">

            <div class="col-md-2">

               <p><b>Message:</b></p>

            </div> <!--end col-md-2-->

            <div class="col-md-10">

               {{$ticket->message}}

            </div>

        </div> <!--end row-->

    </div> <!--end hdesk-container-->

</div><!-- end containter-->


@endif

@stop
