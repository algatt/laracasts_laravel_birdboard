@extends('layouts.app')

@section('content')
	<header class="flex items-center mb-3 py-4">
		<div class="flex justify-between w-full items-end">
			<p class="text-grey text-sm font-normal">
				<a href="/projects/" class="text-grey text-sm font-normal no-underline">My Projects</a> / {{$project->title}}
			</p>
			<a class="button" href="/projects/create">New Project</a>
		</div>
	</header>
	
	<main>
		<div class="lg:flex -mx-3">
			<div class="lg:w-3/4 px-3 mb-8">
				<div class="mb-6">
					<h2 class="text-grey font-normal text-lg mb-3">Tasks</h2>
					@foreach($project->tasks as $task)
						<div class="card mb-3">{{$task->body}}</div>
					@endforeach
					<div class="card mb-3">
						<form action="{{$project->path().'/tasks'}}" method="POST">
						@csrf
							<input name="body" placeholder="Add a new task..." class="w-full">
						</form>
					</div>
				</div>
				<div>
					<h2 class="text-grey font-normal text-lg mb-3">General Notes</h2>
					<textarea class="card w-full min-height:200px;">Lorem ipsum</textarea>
				</div>

			</div>
			<div class="lg:w-1/4 px-3">
				@include('projects.cards')
			</div>
		</div>
	</main>

	

@endsection