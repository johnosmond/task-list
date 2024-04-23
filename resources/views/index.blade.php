@extends('layouts.app')

@section('title', 'Tasks List')

@section('content')
    <h2 class="text-xl mb-2">Welcome to the main page</h2>
    <nav class="mb-4">
        <a href="{{ route('tasks.create') }}" class="link">
            Create a new task
        </a>
    </nav>
    <div>
        @forelse ($tasks as $task)
            <div>
                <a href="{{ route('tasks.show', $task->id) }}" @class(['line-through' => $task->completed, 'text-lg block mb-2'])>
                    {{ $task->title }}
                </a>
            </div>
        @empty
            <div>There are no tasks</div>
        @endforelse

        @if ($tasks->count())
            <nav class="mt-4">
                {{ $tasks->links() }}
            </nav>
        @endif
    </div>
@endsection
