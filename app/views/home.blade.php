{{-- layout --}}
@extends('layouts.main')

{{-- section --}}
@section('content')

	{{-- check if user is not authenticated --}}
	{{-- for non-users authenticated request the log in --}}
	@if(!Auth::check())

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
				<h1>
					Connect with friends and the<br/>
					world around you on Spix Social.
				</h1>
				<p>
					<span class="glyphicon glyphicon-list-alt btn-lg"></span>
					<strong>See updates</strong>
					&nbsp;&nbsp;from friends in News Feed.
				</p>
				<p>
					<span class="glyphicon glyphicon-send btn-lg"></span>
					<strong>Share what's new</strong>
					&nbsp;&nbsp;in your life on your Timeline.
				</p>
			</div>

		</div>

	{{-- for users authenticated render the content --}}
	@else

		<!--
			feature:
			- box to post a new timeline
		-->
		<div class="panel panel-default">

			<!-- header -->
			<div class="panel-heading">
				<h3 class="panel-title">Timeline</h3>
			</div>

			<!-- body -->
			<div class="panel-body">

				{{ Form::open(array('url'=>'timelines')) }}

					<div class="form-group">
						{{ Form::textarea('body', null, array('class'=>'form-control', 'placeholder'=>'Tell me a news.')) }}
					</div>

					<div class="form-group">

						{{ Form::submit('Publish', array('class'=>'btn btn-default')) }}

						<!--
							feature:
							- button to select the order of posts on timeline
						-->
						<div class="btn-group">
							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
								Order by <span class="caret"></span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li>
									{{ HTML::link('/?order_by=created_at', 'Created at (desc)') }}
								</li>
								<li>
									{{ HTML::link('/?order_by=user', 'User (desc)') }}
								</li>
							</ul>
						</div>

					</div>

				{{ Form::close() }}

			</div>

		</div>

		<!--
			feature:
			- list of all timeline
		-->
		@foreach ($timelines as $timeline)

			<div class="panel panel-default">

				<!-- header -->
				<div class="panel-heading">
					<h3 class="panel-title">
						<a id="timeline-{{ $timeline->id }}">
							News
						</a>
					</h3>
				</div>

				<!-- body -->
				<div class="panel-body">

					<blockquote class="blockquote-reverse">
						<p>{{ $timeline->body }}</p>
						<footer>{{ $timeline->user->email }}, {{ $timeline->created_at }}</footer>
					</blockquote>

					<!--
						feature:
						- box to comment on post
						- list of all comments
					-->
					<div>

						{{ HTML::link('#timeline-'.$timeline->id, 'Comment', array('class'=>'btn btn-default createComment','id'=>'')) }}

						<div id="commentForm{{ $timeline->id }}" style="display: none; padding: 15px">

							<hr />

							<div>{{ Helpers::listComments($timeline->id) }}</div>

							<hr />

							{{ Form::open(array('url'=>'comments')) }}

								<div class="form-group">
									{{ Form::textarea('body', null, array('class'=>'form-control', 'placeholder'=>'Fell free to comment.')) }}
								</div>

								<div class="form-group">
									{{ Form::hidden('timeline_id', $timeline->id) }}
									{{ Form::submit('Publish', array('class'=>'btn btn-default')) }}
								</div>

							{{ Form::close() }}

						</div>

					</div>

				</div>

			</div>

		@endforeach

	@endif

@stop

{{-- section --}}
@section('javascript')

	<script type="text/javascript">
		$('.createComment').click(function() {
			$(this).next().show();
		});
	</script>

@stop
