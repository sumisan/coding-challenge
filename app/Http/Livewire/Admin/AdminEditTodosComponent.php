<?php

namespace App\Http\Livewire\Admin;

use App\Models\Todo;
use Livewire\Component;

class AdminEditTodosComponent extends Component
{
    public $task_name;
    public $completed;
    public $todo;

    protected $rules = [
        'task_name' => 'required|max:255',
        'completed' => 'required',
    ];

    protected $messages = [
        'completed.required' => 'Task status is required',
    ];

    public function mount($todo_id)
    {
        $todo = Todo::findOrFail($todo_id);
        $this->task_name = $todo->task_name;
        $this->completed = $todo->completed;
        $this->todo = $todo;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function updateTodo()
    {
        $this->validate();

        $this->todo->task_name = $this->task_name;
        $this->todo->completed = $this->completed;
        $this->todo->save();

        session()->flash('success-message', 'Task updated successfully');

        return redirect()->route('admin.todos');

    }

    public function render()
    {
        return view('livewire.admin.admin-edit-todos-component')
        ->layout('layouts.base');
    }
}
