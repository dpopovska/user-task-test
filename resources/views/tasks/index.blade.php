@extends('layouts.app')

@section('content')

	<div class="container">
		<h2>Tasks</h2>

		{{-- List Tasks--}}
		<div class="row">
			<div class="col-md-6">
				<ul class="list-group">
					@foreach($tasks as $task)
						<li class="list-group-item">
							{{ Form::open(['route' => ['task.delete', $task->id], 'method' => 'delete', 'class' => 'form-inline']) }}
								{{ $task->description }}
								<div class="pull-right">
									<a href="{{ route('task.index', $task->id) }}">Edit</a>
									{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) }}
								</div>
							{{ Form::close() }}
						</li>
					@endforeach
				</ul>
			</div>
		</div>

		{{-- Task Form --}}
		<div class="row">
			<div class="col-md-6">
				@if(isset($editTask))
					{{ Form::model($editTask, ['route' => ['task.update', $editTask->id], 'method' => 'patch', 'class' => 'form-inline']) }}
				@else
					{{ Form::open(['route' => ['task.store'], 'method' => 'post', 'class' => 'form-inline']) }}
				@endif
						<div class="form-group">
							{{ Form::text('description', null, ['class' => 'form-control', 'size' => '58px', 'placeholder' => 'Task description']) }}
						</div>
						<div class="form-group">
							{{ Form::submit('Ok', ['class' => 'btn btn-primary form-control']) }}
						</div>
					{{ Form::close() }}
			</div>
		</div>
	</div>

@endsection