<?php

namespace App\Http\Livewire\Admin;

use App\Models\Company;
use Livewire\Component;

class AdminCompanyComponent extends Component
{

    public function deleteCompany($id)
    {
        $company = Company::findOrFail($id);

        if($company->logo)
        {
            unlink('storage'."/".$company->logo);
        }

        $company->delete();

        Session()->flash('success-message', 'Company deleted successfully');
    }

    public function render()
    {
        $companies = Company::latest()->get();

        return view('livewire.admin.admin-company-component', ['companies'=>$companies])
            ->layout('layouts.base');
    }
}
