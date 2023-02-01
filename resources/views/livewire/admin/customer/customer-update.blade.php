<div>
  
<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
   <div class="detail-div-block">
      <h4>Customer account info</h4>
      <div class="inner-white-wrapper max-251px">
         <div class="customer-account-forms">
            <div class="customer-account-information">
               <ul class="list-unstyled">
                  <li class="position-relative">
                     <div class="d-flex ">
                        <h6 class="title-label  w-auto"><i class="fas fa-user"></i></h6>
                        @if (@$fieldStatus && $action == 'first_name')
                        <input type="text" wire:model="first_name"/>
                        <span class="edit"><a class="link-design-2" wire:click.prevent="updateData('first_name')"><i class="fas fa-save"></i></a></span>
                        <span class="cancel"><a href="javascript::void(0)" class="link-design-2" wire:click.prevent="cancel"><i class="fas fa-times"></i></a></span>
                        @else
                        <p class="phone">{{$user->first_name}} {{$user->last_name}}</p>
                        <div class="action-block">
                           <span class="edit"><a href="javascript::void(0)" wire:click.prevent="editData('first_name')">Edit</a></span>
                        </div>
                        @endif
                     </div>
                  </li>
                  <!--  <li class="position-relative">
                     <form class="d-flex">
                       <h6 class="title-label w-auto"><i class="fas fa-user"></i></h6>
                       <input type="text" placeholder="Enter Name" style="display: none;">
                       <p class="name"><strong>Alex Landers</strong></p>
                       <div class="action-block">
                         <button class="edit">Edit</button>
                         <button class="save-icn-btn"><i class="fas fa-save"></i></button>
                         <button class="cancel"><i class="fas fa-times"></i></button>
                       </div>
                     </form>
                     </li> -->
                  <li class="position-relative">
                     <div class="d-flex">
                        <h6 class="title-label w-auto"><i class="fas fa-phone"></i></h6>
                        @if (@$fieldStatus && $action == 'contact_number')
                        <input type="text" wire:model="contact_number"/>
                        <span class="edit"><a class="link-design-2" wire:click.prevent="updateData('contact_number')"><i class="fas fa-save"></i></a></span>
                        <span class="cancel"><a href="javascript::void(0)" class="link-design-2" wire:click.prevent="cancel"><i class="fas fa-times"></i></a></span>
                        @else
                        <p class="phone">{{$user->contact_number}}</p>
                        <div class="action-block">
                           <span class="edit"><a href="javascript::void(0)" wire:click.prevent="editData('contact_number')">Edit</a></span>
                        </div>
                        @endif
                     </div>
                  </li>
                  <!--    <li class="position-relative">
                     <form class="d-flex">
                       <h6 class="title-label w-auto"><i class="fas fa-phone-alt"></i></h6>
                       <input type="number" placeholder="Enter Phone number" style="display: none;">
                       <p class="phone"><a href="tel:+1 512-559-9582">+1 512-559-9582</a></p>
                       <div class="action-block">
                         <button class="edit">Edit</button>
                         <button class="save-icn-btn"><i class="fas fa-save"></i></button>
                         <button class="cancel"><i class="fas fa-times"></i></button>
                       </div>
                     </form>
                     </li> -->
                  <li class="position-relative">
                     <form class="d-flex">
                        <h6 class="title-label w-auto"><i class="fas fa-envelope"></i></h6>
                        <input type="email" placeholder="Enter Email" style="display: none;">
                        <p class="mail"><a href="mailto:{{$user->email}}">{{$user->email}}</a></p>
                        <!--  <div class="action-block">
                           <button class="edit">Edit</button>
                           <button class="save-icn-btn"><i class="fas fa-save"></i></button>
                           <button class="cancel"><i class="fas fa-times"></i></button>
                           </div> -->
                     </form>
                  </li>
                  <li class="position-relative">
                     <div class="d-flex">
                        <h6 class="title-label w-auto"><i class="fas fa-home"></i></h6>
                        @if (@$fieldStatus && $action == 'address')
                        <input type="text" wire:model="address"/>
                        <span class="edit"><a class="link-design-2" wire:click.prevent="updateData('address')"><i class="fas fa-save"></i></a></span>
                        <span class="cancel"><a href="javascript::void(0)" class="link-design-2" wire:click.prevent="cancel"><i class="fas fa-times"></i></a></span>
                        @else
                        <p class="phone">{{$user->UserDetails->address}}</p>
                        <div class="action-block">
                           <span class="edit"><a href="javascript::void(0)" wire:click.prevent="editData('address')">Edit</a></span>
                        </div>
                        @endif
                     </div>
                  </li>
                  <!--   <li class="position-relative">
                     <form class="d-flex">
                       <h6 class="title-label w-auto"><i class="fas fa-home"></i></h6>
                       <input type="text" placeholder="Enter Address" style="display: none;">
                       <p>Canary Dr., Austin, TX 78745</p>
                       <div class="action-block">
                         <button class="edit">Edit</button>
                         <button class="save-icn-btn"><i class="fas fa-save"></i></button>
                         <button class="cancel"><i class="fas fa-times"></i></button>
                       </div>
                     </form>
                     </li> -->
                  <li class="d-flex payment-methoud">
                     <h6 class="title-label w-auto"><i class="far fa-credit-card"></i></h6>
                     <p class=""> Payment Method Visa ******3245</p>

                     <!-- <div class="action-block">

                     <div class="action-block w-auto">

                        <button class="edit">Edit</button>
                        <button class="save-icn-btn"><i class="fas fa-save"></i></button>
                        <button class="cancel"><i class="fas fa-times"></i></button>
                     </div> -->
                  </li>
                  <li class="reset-password">
                     <a href="#" id="reset-password" class="addService"><img src="{{ asset('../assets/admin/images/icons/reset-password.svg') }}"> Reset Password</a>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>

<div wire:ignore.self class="modal fade show in" id="serviceForm" tabindex="-1" role="dialog" aria-labelledby="serviceForm" aria-hidden="true">
        <div class="modal-dialog modal_style">
            <div class="modal-content">
               <button type="button" class="btn btn_close btn-default close serviceFormClose"><i class="fas fa-close"></i></button>
                <div class="modal-header">
                    <h4 class="modal-title">Reset Password</h4>
                </div>
                <div class="modal-body">
                     <div class="form-group">
                        <label>New password</label>
                        <input type="password" wire:model="new_password" class="form-control" id="password">
                     
                    </div>  
                <div class="text-center pt-3">

                    <button type="submit" class="btn_blue serviceFormClose" wire:click.prevent="updateData('new_password')" wire:loading.attr="disabled">
                         Save
                    </button>
                </div>
            </div>
        </div>
    </div>

  @push('scripts')
    <script>
        $(document).ready(function () {
            window.livewire.on('serviceForm', () => {
                $('#serviceForm').modal('show');
            });
            window.livewire.on('serviceFormClose', () => {
                $('#serviceForm').modal('hide');
            });
        });


        $(document).on('click', '.addService', function (e) {
             $('#password').val('');
            $('#serviceForm').modal('show');
        });
        $(document).on('click', '.serviceFormClose', function (e) {
            $('#serviceForm').modal('hide');
        });

    </script>
    @endpush


</div>
</div>



