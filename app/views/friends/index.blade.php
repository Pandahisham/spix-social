{{-- layout --}}
@extends('layouts.main')

{{-- section --}}
@section('content')

	<!--
		feature:
		- list of all friends (users)
	-->
	<div class="panel panel-default">

		<!-- header -->
		<div class="panel-heading">
			<h3 class="panel-title">Friends</h3>
		</div>

		<!-- body -->
		<div class="panel-body">

			<p>You Dude,</p>
			<p>
				<span class="glyphicon glyphicon-user btn-lg"></span>
				{{ Auth::user()->email }}
			</p>

			<hr />

			@if (count($friends) > 0)

				<p>Has the follow list of friends:</p>
				@foreach ($friends as $friend)
					<p>
						<span class="glyphicon glyphicon-user btn-lg"></span>
						{{ HTML::link('/persons/'.$friend->friend->id, $friend->friend->email) }}
					</p>
				@endforeach

			@else

				<p>Ops! There is something wrong here:</p>
				<p>
					<span class="glyphicon glyphicon-exclamation-sign btn-lg"></span>
					You have any friends yet? {{ HTML::link('/persons', 'Find out!') }}
				</p>

			@endif

		</div>

	</div>

@stop
