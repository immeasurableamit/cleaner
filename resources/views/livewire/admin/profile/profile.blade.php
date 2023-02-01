<div>
    <div class="form-group">
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
   
  </div>
        <div class="customer-avatar-upload-div">
        <div class="customer-avatar-upload">
            <div class="customer-avatar-edit">
                <input type='file' id="upload" accept=".png, .jpg, .jpeg" />
                <label for="upload">Upload a profile pic</label>
            </div>
            <div class="customer-avatar-preview position-relative">
            
            <div id="uploaded">
            @if(auth()->user()->image)
                    <img src="{{ asset('/admin/images/' . auth()->user()->image) }}" id="customerimagePreview">
                   @else
                   <img src="{{ asset('/assets/images/iconshow.png') }}" id="customerimagePreview"> 
              @endif      
                    <a href="javascript::void(0)" onclick="uploadImgViaLivewire()" ><i class="fas fa-save"></i></a>
            </div>
            <div class="lawyer_profile-img mb-3">
                    <!-- <div class="circle" id="uploaded">
                                                        <img class="profile-pic" src="">
                                                    </div> -->
                    <div class="p-image">
                        <!-- <span class="pencil_icon"><i class="fa-solid fa-pencil upload-button"></i></span> -->
                        <!-- <input class="file-upload" id="upload" type="file" accept="image/*" /> -->
                        <input type="hidden" name="image" id="upload-img">
                    </div>
                </div>
            </div>
        <div class="h3-p-design">
            <h3>Profile Photo</h3>
            <p>Upload a new profile photo.</p>
        </div>
    </div> 
    </div>          
<!--   <div class="form-group">
        <label for="file">Image:</label>
        <input type="file" name="file" id="file" wire:model="file" class="form-control" accept=".png, .jpg, .jpeg">
        @error('file') <span class="text-danger">{{ $message }}</span> @enderror
</div> -->
<div class="row">
    <div class="col-md-7">
        
  <div class="form-group input-design">
    <label for="name" class="pt-3 pb-2">Firstname</label>
    <input type="text" class="form-control" id="name" wire:model="first_name" aria-describedby="emailHelp" value="{{$roles->first_name}}">
    @error('first_name') <span class="text-danger">{{ $message }}</span>@enderror
  </div>
   <div class="form-group input-design">
    <label for="name" class="pt-3 pb-2">Lastname</label>
    <input type="text" class="form-control" id="name" wire:model="last_name" aria-describedby="emailHelp">
     @error('last_name') <span class="text-danger">{{ $message }}</span>@enderror
  </div>
  <div class="form-group input-design">
    <label for="exampleInputPassword1" class="pt-3 pb-2">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" wire:model="password">
  </div>
  <div class="form-group input-design">
    <label for="email" class="pt-3 pb-2">Email</label>
    <input type="email" class="form-control" id="email" wire:model="email">
  </div>
  <br>
  <button type="submit" class="btn_blue" wire:click.prevent="update()">Submit</button>
</div>
</div>

</div>
@section('script')

<script>
    function uploadImgViaLivewire()
    {

        var base64_string = $("#upload-img").val();
        var data = { base64_string };
        Livewire.emit('imgUploaded', data );
    }

</script>
@include('layouts.common.cropper')

@endsection