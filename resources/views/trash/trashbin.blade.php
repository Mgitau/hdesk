@extends('templates.default')
@section('title', 'TrashBin')
@section('content')

  <!-- include Ticket Partial -->
  @include('dashboard.partials.header')

  @if(!$tickets)
  <div class="alert alert-info">
      <p>No ticket found, sorry</p>
  </div>

  @else

  <!-- include Ticket Partial -->
  @include('trash.partials.trashblock')


  </div><!--end container-->
  @endif


@stop
