@extends('layouts.app')

@section('title', 'Tasks List')

@section('content')
    <p>Welcome to the main page</p>
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
