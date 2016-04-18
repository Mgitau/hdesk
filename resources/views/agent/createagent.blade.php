@extends('templates.default')

@section('content')

	<div class="container">

	<div class="hdesk-container">

		<div class="row">
      <h3 class="text-center">Create Agent</h3>
			<div class="col-lg-12">

				<form class="form-horizontal" role="form" method="post" action="{{ route('agent.createagent') }}">

					<div class="form-group{{ $errors->has('first_name') ? ' has-error': '' }}">

						<label for="first_name" class="col-lg-2 control-label">First Name</label>

						<div class="col-lg-8">

							<input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter First Name" value="{{ Request::old('first_name')?: '' }}"></input>

                            @if($errors->has('first_name'))
                                <span class="help-block">{{ $errors->first('first_name') }}</span>
                            @endif()

						</div>

					</div> <!-- end form-group -->

					<div class="form-group{{ $errors->has('last_name') ? ' has-error': '' }}">

						<label for="last_name" class="col-lg-2 control-label">Last Name</label>

						<div class="col-lg-8">

							<input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter Last Name" value="{{ Request::old('last_name')?: '' }}"></input>

                            @if($errors->has('last_name'))
                                <span class="help-block">{{ $errors->first('last_name') }}</span>
                            @endif()

						</div>

					</div> <!-- end form-group -->

					<div class="form-group{{ $errors->has('first_name') ? ' has-error': '' }}">

						<label for="username" class="col-lg-2 control-label">User Name</label>

						<div class="col-lg-8">

							<input type="text" class="form-control" name="username" id="username" placeholder="Enter Username" value="{{ Request::old('username')?: '' }}"></input>

														@if($errors->has('username'))
																<span class="help-block">{{ $errors->first('username') }}</span>
														@endif()

						</div>

					</div> <!-- end form-group -->

					<div class="form-group{{ $errors->has('email') ? ' has-error': '' }}">

						<label for="email" class="col-lg-2 control-label">Email</label>

						<div class="col-lg-8">

							<input type="email" class="form-control" name="email" id="email" placeholder="Enter email" value="{{ Request::old('email')?: '' }}"></input>

                             @if($errors->has('email'))
                                <span class="help-block">{{ $errors->first('email') }}</span>
                            @endif()

						</div>

					</div> <!-- end form-group -->

					<div class="form-group{{ $errors->has('password') ? ' has-error': '' }}">

						<label for="password" class="col-lg-2 control-label">Password</label>

						<div class="col-lg-8">

							<input type="password" class="form-control" name="password" id="password" placeholder="Enter your password"></input>

														 @if($errors->has('password'))
																<span class="help-block">{{ $errors->first('password') }}</span>
														@endif()
						</div>

					</div> <!-- ends form-group -->


					<button type="submit" class="btn btn-primary  col-lg-offset-2">Create Agent</button>

                    <input type="hidden" name="ticket_no" value="{{uniqid('Triad_')}}">
<!--                    CSRF -->
                    {{ csrf_field() }}


				</form> <!-- end form -->

			</div> <!-- end col-lg-12-->

	</div> <!-- end row -->

</div> <!-- end hdesk-container -->


</div> <!-- end container -->


@stop
