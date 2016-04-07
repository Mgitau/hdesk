<!DOCTYPE html>
<html>
<head>
	<title>H-Desk</title>
	<meta name="viewport" content="width=device-width, initail-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">
	<link rel="stylesheet" type="text/css" href="css/hdesk.css">
<!--    <link rel="stylesheet" href="{{ asset('hdesk.css') }}">-->
   

</head>
<body>
<!-- Display navigation -->
@include('templates.partials.navigation')

<div class="container">
<br>
	<!-- Display alert -->
	@include('templates.partials.alerts')

	<!-- Display page content -->
	@yield('content')

</div> <!-- end continer -->
</body>

<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
</html>