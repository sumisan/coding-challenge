<div>
    <div class="row">
        <div class="col-10 mx-auto">
    
          <h3 class="mt-3">Edit Employee</h3>
    
            <form method="post" wire:submit.prevent="updateEmployee" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="first_name">First name</label>
                  <input type="text" class="form-control" id="first_name" placeholder="Enter first name" wire:model="first_name" required value="{{ old('first_name') }}">
                  
                  @error('first_name')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>

                <div class="form-group">
                    <label for="last_name">Last name</label>
                    <input type="text" class="form-control" id="last_name" placeholder="Enter last name" wire:model="last_name" required value="{{ old('last_name') }}">
                    
                    @error('last_name')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>

                <div class="form-group">
                    <label for="company_id">Company</label>
                    
                    <select name="company_id" id="company_id" wire:model="company_id" class="form-control">
                        <option value="">Select Company</option>

                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>   
                        @endforeach
                    </select>
                    
                    @error('company_id')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" wire:model="email" required value="{{ old('email') }}">
                    
                    @error('email')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
    
                  <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="number" class="form-control" id="phone" placeholder="Enter phone" wire:model="phone" required value="{{ old('phone') }}">
                    
                    @error('phone')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
    
        </div>
    </div>
    </div>
    