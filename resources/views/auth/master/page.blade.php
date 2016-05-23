<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>--</title>
	<link href='http://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('asset/css/animate.css') }}">
	<link rel="stylesheet" href="{{ asset('asset/css/login.css') }}">
	<link href="{{ asset('asset/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
</head>

<body class="container">
	<?php 
		$errors->setFormat('<div class="animated flash text-danger">:message</div>'); 
	?>

	<div class="col-sm-offset-2 col-sm-8 login-wrapper">
		
		<div class="row">
			<div class="col-sm-12 title-wrapper">
				<h1 class="title">Cosy Manager</h1>
			</div>
		</div>

		@yield('section')
		
	</div>
</body>
</html>
