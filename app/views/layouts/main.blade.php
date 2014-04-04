<!DOCTYPE html>
<html>

	<head>

		<title>Spix Social</title>

		<!-- meta tags -->
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<!-- stylesheets -->
		{{ HTML::style('http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css') }}
		{{ HTML::style('http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css') }}

	</head>

	<body>

		<!--
			feature:
			- menu for simple informations
		-->
		<nav class="navbar navbar-default" role="banner">
			<div class="container-fluid">

				<!-- toogle -->
				<div class="navbar-header">
					<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
						<span class="sr-only">Toggle Navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					{{ HTML::link('/', 'Spix Social', array('class'=>'navbar-brand')) }}
				</div>

				<!-- top menu -->
				<div class="collapse navbar-collapse bs-navbar-collapse" role="navigation">

					<!-- left side -->
					<ul class="nav navbar-nav">
						<li></li>
					</ul>

					<!-- right side -->
					<p class="navbar-text navbar-right">
						@if(Auth::check())
							<span class="glyphicon glyphicon-user"></span>
							{{ Auth::user()->email }}
							&nbsp;
							<span class="glyphicon glyphicon-trash"></span>
							{{ HTML::link('users/logout', 'Log Out', array('class'=>'navbar-link')) }}
						@else
							<span class="glyphicon glyphicon-trash"></span>
							{{ HTML::link('users/login', 'Log In', array('class'=>'navbar-link')) }}
						@endif
					</p>

				</div>

			</div>
		</nav>

		<!--
			feature:
			- messages triggered by the system
		-->
		<div class="container-fluid">
			@if(Session::has('message'))
				<div class="alert alert-warning alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Message!</strong> {{ Session::get('message') }}
				</div>
			@endif
		</div>

		<!-- content -->
		<div class="container-fluid">
			<div class="row">

				<!-- right side -->
				<div class="col-md-9 col-md-push-3">

					<!--
						feature:
						- main content generated via controller
					-->
					{{-- blade template --}}
					@yield('content')

				</div>

				<!-- right side -->
				<div class="col-md-3 col-md-pull-9">
					@if(Auth::check())

						<!--
							feature:
							- list of applications available
						-->
						<div class="panel panel-default">

							<!-- header -->
							<div class="panel-heading">
								<h3 class="panel-title">Apps</h3>
							</div>

							<!-- body -->
							<div class="panel-body">
								<div>
									<span class="glyphicon glyphicon-arrow-right"></span>
									{{ HTML::link('/', 'Timeline') }}
								</div>
								<div>
									<span class="glyphicon glyphicon-arrow-right"></span>
									{{ HTML::link('/persons', 'Persons') }}
								</div>
								<div>
									<span class="glyphicon glyphicon-arrow-right"></span>
									{{ HTML::link('/friends', 'Friends') }}
								</div>
							</div>

						</div>

					@endif
				</div>

			</div>
		</div>

		<!-- javascripts -->
		{{ HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js') }}
		{{ HTML::script('http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js') }}

		{{-- blade template --}}
		@yield('javascript')

	</body>

</html>
