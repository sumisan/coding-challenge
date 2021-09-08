<div>
    <div class="row">
        <div class="col-10 mx-auto">

            <h3 class="mt-3">Edit Company</h3>
    
            <form method="post" wire:submit.prevent="updateCompany" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="name">Company name</label>
                  <input type="text" class="form-control" id="name" placeholder="Enter name" wire:model="name" required value="{{ old('name') }}">
                  
                  @error('name')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
    
                <div class="form-group">
                    <label for="email">Company email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" wire:model="email" required value="{{ old('email') }}">
                    
                    @error('email')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
    
                  <div class="form-group">
                    <label for="website">Company Website</label>
                    <input type="website" class="form-control" id="website" placeholder="Enter website url" wire:model="website" required value="{{ old('website') }}">
                    
                    @error('website')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
    
                  <div class="form-group">
                    <label for="newLogo">Company logo</label>
                    <input type="file" class="form-control" id="newLogo" wire:model="newLogo">
                    
                    @error('newLogo')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
    
                    @if($newLogo)
                        <img src="{{ $newLogo->temporaryUrl() }}" width="50"/>
                    @else   
                        <img src="{{ asset('/storage/'.$logo) }}" width="50"/>
                    @endif
                  </div>
                
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
    
        </div>
    </div>
    </div>
    