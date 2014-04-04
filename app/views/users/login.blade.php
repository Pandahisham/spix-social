{{-- layout --}}
@extends('layouts.main')

{{-- section --}}
@section('content')

	<!--
		feature:
		- form to log in
	-->
	<div class="panel panel-default">

		<!-- header -->
		<div class="panel-heading">
			<h3 class="panel-title">Log In</h3>
		</div>

		<!-- body -->
		<div class="panel-body">

			<!-- form for user log in -->
			{{ Form::open(array('url'=>'users/login')) }}

				<div class="form-group">
					{{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email')) }}
				</div>

				<div class="form-group">
					{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
				</div>

				<div class="form-group">
					{{ Form::submit('Log In', array('class'=>'btn btn-default')) }}
				</div>

				<div class="form-group">
					{{ HTML::link('users/signup', 'Do you need an account? Sign Up!') }}
				</div>

			{{ Form::close() }}

		</div>

	</div>

@stop
