@extends('layouts.app')

@section('title', $task->title)

@section('content')

    <div class="mb-4">
        <a href="{{ route('tasks.index') }}" class="link">
            Back to task list.
        </a>
    </div>

    <p class="label">Description:</p>
    <p class="mb-4 data">{{ $task->description }}</p>

    @if ($task->notes)
        <p class="label">Notes:</p>
        <p class="mb-4 data">{{ $task->notes }}</p>
    @endif

    @if ($task->due_date)
        <p class="mb-4">
            <span class="label">Due date:</span>
            <span class="data">{{ $task->due_date }}</span>
        </p>
    @endif

    <p class="mb-4 text-sm">
        <span class="label">Created:</span>
        <span class="data">{{ $task->created_at->diffForHumans() }}</span>
        ⁝
        <span class="label">Updated:</span>
        <span class="data">{{ $task->updated_at->diffForHumans() }}</span>
    </p>

    <p class="mb-4">
        @if ($task->completed)
            <span class="font-medium text-green-500">Task completed</span>
        @else
            <span class="font-medium text-red-500">Task not completed</span>
        @endif
    </p>

    <div class="flex gap-2">
        <a href="{{ route('tasks.edit', $task) }}" class="btn">
            Edit
        </a>
        <form method="POST" action="{{ route('tasks.toggle-complete', $task) }}">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn">{{ $task->completed ? 'Mark as uncompleted' : 'Mark as completed' }}</button>
        </form>
        <form method="POST" action="{{ route('tasks.destroy', $task) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn">Delete</button>
    </div>
@endsection
