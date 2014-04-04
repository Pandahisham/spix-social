{{-- layout --}}
@extends('layouts.main')

{{-- section --}}
@section('content')

	<!--
		feature:
		- splash screen
	-->
	<div class="panel panel-default">

		<!-- header -->
		<div class="panel-heading">
			<h3 class="panel-title">Home</h3>
		</div>

		<!-- body -->
		<div class="panel-body">

			@if (Auth::check())

				<!-- a few of splash screen content -->
				<h1>
					Welcome to the Spix Social
				</h1>
				<p>
					<span class="glyphicon glyphicon-headphones btn-lg"></span>
					<strong>Take your headset</strong>
					&nbsp;&nbsp;to listen something loud
				</p>
				<p>
					<span class="glyphicon glyphicon-send btn-lg"></span>
					<strong>Enjoy it</strong>
					&nbsp;&nbsp;and have fun
				</p>

			@else

				<!-- a few of splash screen content -->
				<h1>
					Connect with friends and the<br/>
					world around you on Spix Social
				</h1>
				<p>
					<span class="glyphicon glyphicon-list-alt btn-lg"></span>
					<strong>See timelines</strong>
					&nbsp;&nbsp;to keep you up-to-date
				</p>
				<p>
					<span class="glyphicon glyphicon-search btn-lg"></span>
					<strong>Look for persons</strong>
					&nbsp;&nbsp;for know different cultures
				</p>
				<p>
					<span class="glyphicon glyphicon-comment btn-lg"></span>
					<strong>Talk with friends</strong>
					&nbsp;&nbsp;about everything
				</p>

			@endif

		</div>

	</div>

@stop
