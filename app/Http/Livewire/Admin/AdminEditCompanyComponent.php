<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Company;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;

class AdminEditCompanyComponent extends Component
{
    public $name;
    public $email;
    public $logo;
    public $website;
    public $newLogo;
    public $company;

    use WithFileUploads;

    public function mount($company_id)
    {
        $company = Company::findOrFail($company_id);
        $this->company = $company;
        $this->name = $company->name;
        $this->email = $company->email;
        $this->logo = $company->logo;
        $this->website = $company->website;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => ['required','max:255', Rule::unique('companies')->ignore($this->company)],
            'email' => ['required','email','max:255', Rule::unique('companies')->ignore($this->company)],
            'website' => ['required','max:255', Rule::unique('companies')->ignore($this->company)],
        ]);

        if($this->newLogo)
        {
            $this->validateOnly($fields, [
                'newLogo' => 'required|mimes:jpg,jpeg,png,gif|dimensions:min_width=100,min_height=100',
            ]);
        }
    }

    public function updateCompany(){
        $this->validate([
            'name' => ['required','max:255', Rule::unique('companies')->ignore($this->company)],
            'email' => ['required','email','max:255', Rule::unique('companies')->ignore($this->company)],
            'website' => ['required','max:255', Rule::unique('companies')->ignore($this->company)],
        ]);

        if($this->newLogo)
        {
            $this->validate([
                'newLogo' => 'required|mimes:jpg,jpeg,png,gif|dimensions:min_width=100,min_height=100',
            ]);
        }

        $this->company->name = $this->name;
        $this->company->email = $this->email;
        $this->company->website = $this->website;

        if($this->newLogo)
        {
            //delete old image from storage directory
            unlink('storage'.'/'.$this->logo);

            //generate unique name for image to be stored
            $imageName = Carbon::now()->timestamp . "." . $this->newLogo->extension();
            $this->newLogo->storeAs('public', $imageName);

            $this->company->logo = $imageName;
        }

        $this->company->save();

        Session()->flash('success-message', 'Company updated successfully');

        return redirect()->route('admin.company');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-company-component')
            ->layout('layouts.base');
    }
}
