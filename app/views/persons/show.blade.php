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
						{{ Form::submit('Make friendship', array('class'=>'btn btn-default')) }}
					</div>
				{{ Form::close() }}
			@endif

			<!--
				feature:
				- remove the person as friend
			-->
			@if ($person->id != Auth::user()->id && count($friendship) > 0)
				{{ HTML::link('friends/'.$person->id, 'Break friendship', array('class'=>'btn btn-danger', 'data-method'=>'delete')) }}
			@endif

		</div>

	</div>

@stop

{{-- section --}}
@section('javascript')

	<script type="text/javascript">
		/**
		 * restfulizer.js
		 * http://forumsarchive.laravel.io/viewtopic.php?id=2900
		 *
		 * Restfulize any hiperlink that contains a data-method attribute by
		 * creating a mini form with the specified method and adding a trigger
		 * within the link.
		 *
		 * Requires jQuery!
		 *
		 * Ex:
		 *     <a href="post/1" data-method="delete">destroy</a>
		 *     // Will trigger the route Route::delete('post/(:id)')
		 */
		$(function() {
			$('[data-method]').append(function() {
				return "\n"+
						"<form action='"+$(this).attr('href')+"' method='POST' style='display:none'>\n"+
						"   <input type='hidden' name='_method' value='"+$(this).attr('data-method')+"'>\n"+
						"</form>\n"
			})
			.removeAttr('href')
			.attr('style','cursor:pointer;')
			.attr('onclick','$(this).find("form").submit();');
		});
	</script>

@stop
