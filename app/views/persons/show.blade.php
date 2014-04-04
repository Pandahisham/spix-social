{{-- layout --}}
@extends('layouts.main')

{{-- section --}}
@section('content')

	<!--
		feature:
		- show the persons (users)
	-->
	<div class="panel panel-default">

		<!-- header -->
		<div class="panel-heading">
			<h3 class="panel-title">Persons</h3>
		</div>

		<!-- body -->
		<div class="panel-body">

			<!-- block for display a person -->
			<p>
				<span class="glyphicon glyphicon-user btn-lg"></span>
			</p>
			<p><strong>Email: </strong>{{ $person->email }}</p>
			<p><strong>Created at: </strong>{{ $person->created_at }}</p>

			<!--
				feature:
				- add the person as friend
			-->
			@if ($person->id != Auth::user()->id && count($friendship) == 0)
				{{ Form::open(array('url'=>'friends')) }}
					<div class="form-group">
						{{ Form::hidden('user_id', Auth::user()->id) }}
						{{ Form::hidden('has_friendship', $person->id) }}
						{{ Form::submit('Make friends', array('class'=>'btn btn-default')) }}
					</div>
				{{ Form::close() }}
			@endif

		</div>

	</div>

@stop
