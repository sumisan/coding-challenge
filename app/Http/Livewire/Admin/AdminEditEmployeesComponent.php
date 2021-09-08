<?php

namespace App\Http\Livewire\Admin;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Validation\Rule;
use Livewire\Component;

class AdminEditEmployeesComponent extends Component
{
    public $first_name;
    public $last_name;
    public $email;
    public $company_id;
    public $phone;
    public $employee;


    public function mount($employee_id)
    {
        $employee = Employee::findOrFail($employee_id);

        $this->first_name = $employee->first_name;
        $this->last_name = $employee->last_name;
        $this->email = $employee->email;
        $this->company_id = $employee->company_id;
        $this->phone = $employee->phone;
        $this->employee = $employee;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => ['required','email','max:255', Rule::unique('employees')->ignore($this->employee)],
            'company_id' => 'required',
            'phone' => ['required', Rule::unique('employees')->ignore($this->employee)],
        ],
        [
            'first_name.required' => 'First name is required',
            'last_name.required' => 'Last name is required',
            'company_id.reduired' => 'Company is required'
        ]);
    }

    public function updateEmployee()
    {
        $this->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => ['required','email','max:255', Rule::unique('employees')->ignore($this->employee)],
            'company_id' => 'required',
            'phone' => ['required', Rule::unique('employees')->ignore($this->employee)],
        ],
        [
            'first_name.required' => 'First name is required',
            'last_name.required' => 'Last name is required',
            'company_id.reduired' => 'Company is required'
        ]);

        $this->employee->first_name = $this->first_name;
        $this->employee->last_name = $this->last_name;
        $this->employee->email = $this->email;
        $this->employee->phone = $this->phone;
        $this->employee->company_id = $this->company_id;

        $this->employee->save();

        session()->flash('success-message', 'Employee updated successfully');

        return redirect()->route('admin.employees');
    }

    public function render()
    {
        $companies = Company::all();
        return view('livewire.admin.admin-edit-employees-component', ['companies'=>$companies])
            ->layout('layouts.base');
    }
}
