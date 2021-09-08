<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Company;
use Livewire\Component;
use App\Mail\NewCompanyMail;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Mail;

class AdminAddCompanyComponent extends Component
{
    public $name;
    public $email;
    public $logo;
    public $website;

    use WithFileUploads;

    protected $rules = [
        'name' => 'required|max:255|unique:companies',
        'email' => 'required|max:255|unique:companies|email',
        'logo' => 'required|mimes:jpg,jpeg,png,gif|dimensions:min_width=100,min_height=100',
        'website' => 'required|max:255|unique:companies',
    ];
    
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function store()
    {
        $this->validate();

        $company = new Company();

        $company->name = $this->name;
        $company->email = $this->email;
        $company->website = $this->website;

        //generate unique name for image to be stored
        $imageName = Carbon::now()->timestamp . "." . $this->logo->extension();
        $this->logo->storeAs('public', $imageName);

        $company->logo = $imageName;
        $company->save();

        Mail::to('murimiharizon@gmail.com')->send(new NewCompanyMail($company));

        Session()->flash('success-message', 'Company added successfully');

        return redirect()->route('admin.company');

    }

    public function render()
    {
        return view('livewire.admin.admin-add-company-component')
            ->layout('layouts.base');
    }
}
