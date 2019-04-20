@extends('layouts.app')

@section('content')
	<div class="lg:w-1/2 lg:mx-auto bg-white p-6 md:py-12 md:px-16 rounded shadow">
		<h1 class="text-2xl font-normal mb-10 text-center">Create a Project</h1>
		<form method="POST" action="/projects">
			@include('projects.form', [
				'project' => new App\Project,
				'buttonText' => 'Create Project'
			])
		</form>
	</div>
<!-- 
		<form method="POST" action="/projects">
		@csrf
			<h1>Create a Project</h1>

			<div class="control">
				<input type="text" class="input" name="title" placeholder="Title">
			</div>

			<div class="field">
				<label class="label" for="description">Description</label>
				<div class="control">
					<textarea name="description" class="textarea"></textarea>
				</div>
			</div>

			<div class="field">
				<div class="control">
					<button type="submit" class="button is-link">Create a Project</button>
					<a href="/projects">Cancel</a>
				</div>
			</div>

		</form>

	</body> -->

@endsection