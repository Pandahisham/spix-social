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
			<p>
				<span class="glyphicon glyphicon-user btn-lg"></span>
			</p>
			<p><strong>Email: </strong>{{ $person->email }}</p>
			<p><strong>Created at: </strong>{{ $person->created_at }}</p>
		</div>

	</div>

@stop
