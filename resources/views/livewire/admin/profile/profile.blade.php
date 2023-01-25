<div>
    <div class="form-group">
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
   
  </div>
  <div class="form-group">
        <label for="file">Image:</label>
        <input type="file" name="file" id="file" wire:model="file" class="form-control" accept=".png, .jpg, .jpeg">
        @error('file') <span class="text-danger">{{ $message }}</span> @enderror
</div>
  <div class="form-group">
    <label for="name">Firstname</label>
    <input type="text" class="form-control" id="name" wire:model="first_name" aria-describedby="emailHelp" value="{{$roles->first_name}}">
    @error('first_name') <span class="text-danger">{{ $message }}</span>@enderror
  </div>
   <div class="form-group">
    <label for="name">Lastname</label>
    <input type="text" class="form-control" id="name" wire:model="last_name" aria-describedby="emailHelp">
     @error('last_name') <span class="text-danger">{{ $message }}</span>@enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" wire:model="password">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" wire:model="email">
  </div>
  <br>
  <button type="submit" class="btn btn-primary" wire:click.prevent="update()">Submit</button>

</div>