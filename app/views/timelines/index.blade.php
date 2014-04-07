{{-- layout --}}
@extends('layouts.main')

{{-- section --}}
@section('content')

	<!--
		feature:
		- box for new timelines
	-->
	<div class="panel panel-default">

		<!-- header -->
		<div class="panel-heading">
			<h3 class="panel-title">Timeline</h3>
		</div>

		<!-- body -->
		<div class="panel-body">

			<!-- form for store timilines -->
			{{ Form::open(array('url'=>'timelines')) }}

				<div class="form-group">
					{{ Form::label('body', 'Do you have any news?') }}
					{{ Form::textarea('body', null, array('class'=>'form-control', 'placeholder'=>'So, tell me')) }}
				</div>

				<!--
					feature:
					- button to select the order of timeline
				-->
				<div class="form-group">
					{{ Form::label('privacy', 'Who can see?') }}
					{{ Form::select('privacy', array('ME'=>'Only me','ME_FRIENDS'=>'Me & My friends','ANYONE'=>'Anyone',), 'ANYONE', array('class'=>'form-control',)) }}
				</div>

				<div class="form-group">

					{{ Form::submit('Publish', array('class'=>'btn btn-default')) }}

					<!--
						feature:
						- button to select the order of timeline
					-->
					<div class="btn-group">
						<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
							Order by <span class="caret"></span>
						</button>
						<ul class="dropdown-menu" role="menu">
							<li>
								{{ HTML::link('timelines?order_by=created_at', 'Created at (desc)') }}
							</li>
							<li>
								{{ HTML::link('timelines?order_by=user', 'User (desc)') }}
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
					<a id="timeline-{{ $timeline->id }}">News</a>
				</h3>
			</div>

			<!-- body -->
			<div class="panel-body">

				<!-- block for list all timelines -->
				<blockquote class="blockquote-reverse">
					<p>{{ $timeline->body }}</p>
					<footer>{{ $timeline->user->email }}, {{ $timeline->created_at }}</footer>
				</blockquote>

				<!--
					feature:
					- box for comment on timeline
					- button for like timeline
					- list of all comments (with like support)
				-->
				<div>

					<!-- form for store likes -->
					{{ Form::open(array('url'=>'likes')) }}

						<div class="form-group">
							{{ Form::hidden('timeline_id', $timeline->id) }}
							{{ Form::submit('Like', array('class'=>'btn btn-default')) }}
						</div>

					{{ Form::close() }}

					<!-- button for create comments -->
					{{ HTML::link('#timeline-'.$timeline->id, 'Comment', array('class'=>'btn btn-default createComment','id'=>'')) }}

					<div id="commentForm{{ $timeline->id }}" style="display: none; padding: 15px">

						<!-- block for list all comments from current timeline -->
						<div>{{ CommentsHelper::listComments($timeline->id) }}</div>

						<hr />

						<!-- form for store comments -->
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

@stop

{{-- section --}}
@section('javascript')

	<script type="text/javascript">
		/**
		 * Snipet responsible for display the box to comment on timeline
		 */
		$('.createComment').click(function() {
			$(this).next().show();
		});
	</script>

@stop
