@extends('layouts.app')

@section('content')

	<div class="flex items-center mb-3">
		<a href="/projects/create">Create New</a>
	</div>
	<ul>
		@forelse($projects as $project)
			<li>
				<a href="{{ $project->path()}}">{{$project->title}}</a>
			</li>
		@empty
			<li>No Projects Yet</li>
		@endforelse
	</ul>

@endsection