<div class="row">
    <div class="col-md-12 mt-5">

        @if (Session::has('success-message'))
            <div class="alert alert-success">
                <p>{{ Session::get('success-message') }}</p>
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <div>
                    Tasks
                    <a href="{{ route('admin.add-todo') }}" class="btn btn-primary float-right">Add Task</a>
                </div>
            </div>

            <div class="card-body">
            
            @if ($todos->count() > 0)
            <table class="table" id="table_id">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Task name</th>
                        <th>Task Status</th>
                        <th>Action</th>
                    </tr>
                </thead>  

                    <tbody>
                        @php
                            $count = 1;
                        @endphp

                        @foreach($todos as $todo)
                            <tr>
                                <td>{{ $count }}</td>
                                <td>
                                    {{ $todo->task_name }}
                                </td>
                                <td>{{ $todo->completed == 1 ? 'Completed' : 'Pending' }}</td>
                            
                                <td>
                                    <a href="{{ route('admin.edit-todo', $todo->id) }}" >
                                        <i class="fa fa-edit fa-2x text-info"></i>
                                    </a>

                                    <a href="#"  onclick="confirm('Are you sure, you want to delete this task: {{ $todo->task_name }}') || event.stopImmediatePropagation()" style="margin-left: 10px;" wire:click.prevent="deleteTodo({{ $todo->id }})">
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
                <p>No task has been added yet</p>
            @endif

            </div>
        </div>
    </div>
</div>
