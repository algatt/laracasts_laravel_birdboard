@extends('layouts.app')

@section('content')
	<header class="flex items-center mb-3 py-4">
		<div class="flex justify-between w-full items-end">
			<p class="text-grey text-sm font-normal">
				<a href="/projects/" class="text-grey text-sm font-normal no-underline">My Projects</a> / {{$project->title}}
			</p>
			<div class="flex items-center">
				@foreach ($project->members as $member)
					<img src="{{gravatar_url($member->email)}}" alt="{{$member->name}}'s avatar" class="rounded-full w-8 mr-2">
				@endforeach
				<img src="{{gravatar_url($project->owner->email)}}" alt="{{$project->owner->name}}'s avatar" class="rounded-full w-8 mr-2">
				<a class="button ml-4" href="{{$project->path().'/edit'}}">Edit Project</a>
			</div>
			
		</div>
	</header>
	
	<main>
		<div class="lg:flex -mx-3">
			<div class="lg:w-3/4 px-3 mb-8">
				<div class="mb-6">
					<h2 class="text-grey font-normal text-lg mb-3">Tasks</h2>
					@foreach($project->tasks as $task)
						<div class="card mb-3">
							<form action="{{$task->path()}}" method="POST">
							@method('PATCH')
							@csrf
								<div class="flex">
									<input name="body" value="{{$task->body}}" class="w-full {{$task->completed ? 'text-grey' : ''}}" >
									<input name="completed" type="checkbox" onChange="this.form.submit()" {{$task->completed ? 'checked' : ''}}>
								</div>
							</form>
						</div>
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
					<form method="POST" action="{{$project->path()}}">
					@method('PATCH')
					@csrf
						<textarea name="notes" class="card w-full min-height:200px mb-4" placeholder="Make some notes?">{{$project->notes}}</textarea>
						<button type="submit" class="button">Save</button>
					</form>

					@if ($errors->any())
						<div class="field mt-6">	
							@foreach($errors->all() as $error)
								<li class="text-sm text-red">{{$error}}</li>
							@endforeach
						</div>
					@endif
				</div>

			</div>
			<div class="lg:w-1/4 px-3">
				@include('projects.cards')
				@include('projects.activity.card')
			</div>
		</div>
	</main>

	

@endsection