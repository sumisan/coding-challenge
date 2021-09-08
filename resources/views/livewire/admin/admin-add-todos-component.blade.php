<div>
    <div class="row">
        <div class="col-10 mx-auto">
    
          <h3 class="mt-3">Add Task</h3>
    
            <form method="post" wire:submit.prevent="store">
                <div class="form-group">
                  <label for="task_name">Task name</label>
                  <input type="text" class="form-control" id="task_name" placeholder="Enter task name" wire:model="task_name" required value="{{ old('task_name') }}">
                  
                  @error('task_name')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>

                <div class="form-group">
                    <label for="completed">Task Status</label>
                    
                    <select name="completed" class="form-control" wire:model="completed">
                        <option value="">Set task status</option>
                        <option value="0">Pending</option>
                        <option value="1">Completed</option>
                    </select>
                    
                    @error('completed')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
    
        </div>
    </div>
    </div>
    