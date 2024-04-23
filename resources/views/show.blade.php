@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <p>{{ $task->description }}</p>

    @if ($task->long_description)
        <p>{{ $task->long_description }}</p>
    @endif

    <p>{{ $task->created_at }}</p>
    <p>{{ $task->updated_at }}</p>

    <p>
        @if ($task->completed)
            This task is completed.
        @else
            This task is not completed.
        @endif
    </p>

    <div>
        <a href="{{ route('tasks.edit', $task) }}">Edit</a>
    </div>

    <div>
        <form method="POST" action="{{ route('tasks.toggle-complete', $task) }}">
            @csrf
            @method('PATCH')
            <button type="submit">{{ $task->completed ? 'Mark as uncompleted' : 'Mark as completed' }}</button>
        </form>
    </div>
    <div>
        <form method="POST" action="{{ route('tasks.destroy', $task) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
    </div>
@endsection
