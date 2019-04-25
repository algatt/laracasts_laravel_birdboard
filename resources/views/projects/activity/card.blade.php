<div class="card mt-3">
	@foreach($project->activity as $activity)
		<ul class="text-sm list-reset text-default">
			<li class="{{$loop->last ? '' : 'mb-1'}}">
				@include("projects.activity.{$activity->description}")
				<span class="text-default">{{$activity->created_at->diffForHumans(null,true)}}</span>
			</li>
		</ul>
	@endforeach
</div>

