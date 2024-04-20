@extends('layouts.app')

@section('title', 'Tasks List')

@section('content')
    <p>Welcome to the main page</p>
    <div>
        {{-- @if (count($tasks)) --}}
        @forelse ($tasks as $task)
            <div>
                <a href="{{ route('tasks.show', $task->id) }}">{{ $task->title }}</a>
            </div>
        @empty
            <div>There are no tasks</div>
        @endforelse
        {{-- @endif --}}
    </div>
@endsection
