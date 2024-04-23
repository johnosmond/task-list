@extends('layouts.app')

@section('title', 'Tasks List')

@section('content')
    <h1>Welcome to the main page</h1>
    <div>
        <a href="{{ route('tasks.create') }}">Create a new task</a>
    </div>
    <div>
        @forelse ($tasks as $task)
            <div>
                <a href="{{ route('tasks.show', $task->id) }}">{{ $task->title }}</a>
            </div>
        @empty
            <div>There are no tasks</div>
        @endforelse

        @if ($tasks->count())
            <nav>
                {{ $tasks->links() }}
            </nav>
        @endif
    </div>
@endsection
