<div class="row">
    <div class="col-md-12 mt-5">

        @if (Session::has('success-message'))
            <div class="alert alert-success">
                <p>{{ Session::get('success-message') }}</p>
            </div>
        @endif

        <div class="card">
            <div class="card-header">
            Companies
            <a href="{{ route('admin.add-company') }}" class="btn btn-primary float-right">Add Company</a>
            </div>
            <div class="card-body">
            
            @if ($companies->count() > 0)
            <table class="table" id="table_id">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Logo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Website</th>
                        <th>Action</th>
                    </tr>
                </thead>  

                    <tbody>
                        @php
                            $count = 1;
                        @endphp

                        @foreach($companies as $company)
                            <tr>
                                <td>{{ $count }}</td>
                                <td>
                                    <img src="{{ asset('/storage/'.$company->logo) }}" alt="Company logo" width="50">
                                </td>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->email }}</td>
                                <td>{{ $company->website }}</td>
                                <td>
                                    <a href="{{ route('admin.edit-company', $company->id) }}" >
                                        <i class="fa fa-edit fa-2x text-info"></i>
                                    </a>

                                    <a href="#"  onclick="confirm('Are you sure, you want to delete this company: {{ $company->name }}') || event.stopImmediatePropagation()" style="margin-left: 10px;" wire:click.prevent="deleteCompany({{ $company->id }})">
                                        <i class="fa fa-times fa-2x text-danger"></i>
                                    </a>

                                </td>
                            </tr>

                            @php
                                $count++
                            @endphp

                        @endforeach
                    </tbody>
                    
            </table>

            @else
                <p>No company has been added yet</p>
            @endif

            </div>
        </div>
    </div>
</div>
