{{-- check if user is not authenticated --}}
{{-- for non-users authenticated request the log in --}}
@if(!Auth::check())

	<!-- content -->
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

	<div class="row">

		<!-- right side -->
		<div class="col-md-9 col-md-push-3">

			<!-- content -->
			<div class="panel panel-default">

				<!-- header -->
				<div class="panel-heading">
					<h3 class="panel-title">Content</h3>
				</div>

				<!-- body -->
				<div class="panel-body">
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</p>
				</div>

			</div>

		</div>

		<!-- left side -->
		<div class="col-md-3 col-md-pull-9">

			<!-- content -->
			<div class="panel panel-default">

				<!-- header -->
				<div class="panel-heading">
					<h3 class="panel-title">Menu</h3>
				</div>

				<!-- body -->
				<div class="panel-body">
					<div>
						<span class="glyphicon glyphicon-arrow-right"></span>
						People
					</div>
					<div>
						<span class="glyphicon glyphicon-arrow-right"></span>
						Friends
					</div>
				</div>

			</div>

		</div>

	</div>

@endif
