<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>

	<body>
		<h1>Bird Board</h1>
	</body>

	<ul>
		@forelse($projects as $project)
			<li>
				<a href="{{ $project->path()}}">{{$project->title}}</a>
			</li>
		@empty
			<li>No Projects Yet</li>
		@endforelse
	</ul>

</html>