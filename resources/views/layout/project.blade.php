@extends ('master')

@section ('title', $project->title)

@section ('css')

	<link href="/css/project.css" rel="stylesheet">

@endsection

@section ('content')

	<div class="project-header {{ $project->key }}">

		<div class="container">

			<h1>{{ $project->title }}</h1>
			<h2>{{ $project->description }}</h2>

			<ul class="details">
				<li><span class="title">Responsibilities:</span> {{ $project->responsibilities }}</li>
				<li><span class="title">Technologies:</span> {{ $project->technologies }}</li>
				<li><span class="title">Timeframe:</span> {{ date('d-m-Y', strtotime($project->started)) }} – {{date('d-m-Y', strtotime($project->ended)) }}</li>
			</ul>

		</div>

	</div>

	<div class="project-content">

		@yield ('project-content')

	</div>

@endsection
