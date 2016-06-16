@extends('templates.default')

@section('title', 'Admin Login')

@section('content')

<div class="container">

  <div class="row">

    <div class="col-md-6 col-md-offset-3">

      <div class="panel panel-default">
          <h3 class="text-center">Admin Login</h3>
        <div class="panel-body">

          <form class="form-horizontal" role="form" method="post" action="{{ route('admin.login') }}">

            <div class="form-group{{ $errors->has('email') ? ' has-error': '' }}">

              <label for="name" class="col-lg-2 control-label">Email</label>

              <div class="col-lg-8">

                <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" value="{{ Request::old('email')?: '' }}"></input>

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

            <div class="checkbox col-lg-offset-2">
              <label>
                <input type="checkbox" name="remember"> Remember me
              </label>
           </div>
           <br>

           <button type="submit" class="btn btn-primary  col-lg-offset-2">Login</button>
   <!--                    CSRF -->
                     {{ csrf_field() }}
          </form>
        </div>

      </div> <!-- end panel-default -->

    </div> <!-- end col-md-6 col-md-offset-3 -->

  </div> <!-- end row -->

  </div> <!-- end container -->


@stop
