<?php

namespace App\Models;

use Dotenv\Util\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'notes', 'due_date', 'completed'];

    public function getDueDateAttribute($value)
    {
        return $value ? date('Y-m-d', strtotime($value)) : null;
    }

    public function toggleComplete() : string
    {
        $this->update(['completed' => !$this->completed]);
        return $this->completed ? 'Task completed!' : 'Task marked as incomplete!';
    }
}
