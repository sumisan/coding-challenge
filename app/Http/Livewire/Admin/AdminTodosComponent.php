<?php

namespace App\Http\Livewire\Admin;

use App\Models\Todo;
use Livewire\Component;

class AdminTodosComponent extends Component
{
    public function deleteTodo($id)
    {
        $todo = Todo::findOrFail($id);

        $todo->delete();

        Session()->flash('success-message', 'Task deleted successfully');
    }

    public function render()
    {
        $todos = Todo::latest()->get();

        return view('livewire.admin.admin-todos-component', ['todos'=>$todos])
            ->layout('layouts.base');
    }
}
