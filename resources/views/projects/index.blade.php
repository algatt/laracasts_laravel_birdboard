<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>

	<body>
		<h1>Bird Board</h1>
	</body>

	<ul>
		@foreach($projects as $project)
			<li>{{$project->title}}</li>
		@endforeach
	</ul>

</html>