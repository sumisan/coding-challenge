<div class="row">
    <div class="col-md-12 mt-5">

        @if (Session::has('success-message'))
            <div class="alert alert-success">
                <p>{{ Session::get('success-message') }}</p>
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                Employees
                <a href="{{ route('admin.add-employee') }}" class="btn btn-primary float-right">Add Employee</a>
            </div>
            <div class="card-body">
            
            @if ($employees->count() > 0)
            <table class="table" id="table_id">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Full name</th>
                        <th>Company</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>  

                    <tbody>
                        @php
                            $count = 1;
                        @endphp

                        @foreach($employees as $employee)
                            <tr>
                                <td>{{ $count }}</td>
                                <td>
                                    {{ $employee->first_name }} {{ $employee->last_name }}
                                </td>
                                <td>{{ $employee->company->name }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>
                                    <a href="{{ route('admin.edit-employee', $employee->id) }}" >
                                        <i class="fa fa-edit fa-2x text-info"></i>
                                    </a>

                                    <a href="#"  onclick="confirm('Are you sure, you want to delete this employee: {{ $employee->first_name }}') || event.stopImmediatePropagation()" style="margin-left: 10px;" wire:click.prevent="deleteEmployee({{ $employee->id }})">
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
                <p>No employee has been added yet</p>
            @endif

            </div>
        </div>
    </div>
</div>
