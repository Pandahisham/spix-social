{{-- layout --}}
@extends('layouts.main')

{{-- section --}}
@section('content')

	<!--
		feature:
		- list of all persons (users)
	-->
	<div class="panel panel-default">

		<!-- header -->
		<div class="panel-heading">
			<h3 class="panel-title">Persons</h3>
		</div>

		<!-- body -->
		<div class="panel-body">
			@foreach ($persons as $person)
				<p>
					<span class="glyphicon glyphicon glyphicon-user btn-lg"></span>
					{{ HTML::link('#', $person->email) }}
				</p>
			@endforeach
		</div>

	</div>

@stop
