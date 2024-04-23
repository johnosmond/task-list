@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Create a New Task')

@section('content')

    <form method="POST" action="{{ isset($task) ? route('tasks.update', $task->id) : route('tasks.store') }}">
        @csrf

        @isset($task)
            @method('PUT')
        @endisset

        <div class="mb-4">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" @class(['border-red-500' => $errors->has('title')])
                value="{{ old('title', $task->title ?? null) }}">
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description">Description:</label>
            <textarea name="description" id="description" @class(['border-red-500' => $errors->has('description')])>{{ old('description', $task->description ?? null) }}</textarea>
            @error('description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="notes">Notes:</label>
            <textarea name="notes" id="notes" @class(['border-red-500' => $errors->has('notes')])>{{ old('notes', $task->notes ?? null) }}</textarea>
            @error('notes')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="due_date">Due Date:</label>
            <input type="date" name="due_date" id="due_date" @class(['border-red-500' => $errors->has('due_date')])
                value="{{ old('due_date', $task->due_date ?? null) }}">
            @error('due_date')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="btn">
                @isset($task)
                    Update Task
                @else
                    Create Task
                @endisset
            </button>
            <a href="{{ url()->previous() }}" class="link">Cancel</a>
        </div>
    </form>

@endsection
