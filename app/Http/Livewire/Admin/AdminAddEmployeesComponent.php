<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Company;
use App\Models\Employee;

class AdminAddEmployeesComponent extends Component
{
    public $first_name;
    public $last_name;
    public $email;
    public $company_id;
    public $phone;

    protected $rules = [
        'first_name' => 'required|max:255',
        'last_name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:employees',
        'company_id' => 'required',
        'phone' => 'required|unique:employees'
    ];

    protected $messages = [
        'first_name.required' => 'First name is required',
        'last_name.required' => 'Last name is required',
        'company_id.reduired' => 'Company is required'
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function store()
    {
        $this->validate();

        $employee = new Employee();

        $employee->first_name = $this->first_name;
        $employee->last_name = $this->last_name;
        $employee->email = $this->email;
        $employee->phone = $this->phone;
        $employee->company_id = $this->company_id;

        $employee->save();

        session()->flash('success-message', 'Employee added successfully');

        return redirect()->route('admin.employees');
    }

    public function render()
    {
        $companies = Company::latest()->get();

        return view('livewire.admin.admin-add-employees-component', ['companies'=>$companies])
            ->layout('layouts.base');
    }
}
