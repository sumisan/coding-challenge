<?php

namespace App\Http\Livewire\Admin;

use App\Models\Todo;
use Livewire\Component;

class AdminAddTodosComponent extends Component
{
    public $task_name;
    public $completed;

    protected $rules = [
        'task_name' => 'required|max:255',
        'completed' => 'required',
    ];

    protected $messages = [
        'completed.required' => 'Task status is required',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function store()
    {
        $this->validate();

        
        $todo = new Todo();
        $todo->task_name = $this->task_name;
        $todo->completed = $this->completed;
        $todo->save();

        session()->flash('success-message', 'Task added successfully');

        return redirect()->route('admin.todos');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-todos-component')
            ->layout('layouts.base');
    }
}
