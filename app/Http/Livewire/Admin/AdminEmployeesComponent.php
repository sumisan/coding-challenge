<?php

namespace App\Http\Livewire\Admin;

use App\Models\Employee;
use Livewire\Component;

class AdminEmployeesComponent extends Component
{
    public function deleteEmployee($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        session()->flash('success-message', 'Employee deleted successfully');
    }

    public function render()
    {
        $employees = Employee::with('company')->latest()->get();
        
        return view('livewire.admin.admin-employees-component', ['employees'=>$employees])
            ->layout('layouts.base');
    }
}
