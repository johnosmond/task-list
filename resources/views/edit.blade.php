@extends('layouts.app')

@section('title', 'Edit a Task')

@section('styles')
<style>
    form {
        display: flex;
        flex-direction: column;
        width: 50%;
        margin: 0 auto;
    }

    label {
        margin-top: 1rem;
    }

    input, textarea {
        margin-top: 0.5rem;
        padding: 0.5rem;
        font-size: 1rem;
    }

    button {
        margin-top: 1rem;
        padding: 0.5rem;
        font-size: 1rem;
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
    }

    button:hover {
        background-color: #45a049;
        max-width: 400px;
    }

    p.error {
        color: red;
        font-size: 0.8rem;
    }
</style>
@endsection

@section('content')

    <form method="POST" action="{{ route('tasks.update', $task->id) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $task->title) }}">
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description">{{ old('description', $task->description) }}</textarea>
            @error('description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="notes">Notes</label>
            <textarea name="notes" id="notes">{{ old('notes', $task->notes) }}</textarea>
            @error('notes')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="due_date">Due Date</label>
            <input type="date" name="due_date" id="due_date" value="{{ old('due_date', $task->due_date) }}">
            @error('due_date')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Edit Task</button>
    </form>

@endsection
