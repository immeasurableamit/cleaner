<div>
  
<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
      <div class="detail-div-block">
            <h4>Customer account info</h4>
            <div class="inner-white-wrapper">
              <div class="customer-account-forms">
                <div class="customer-account-information">
                  <ul class="list-unstyled">
                @if($user->cleanerTeam)
                <li class="position-relative">
                <div class="d-flex justify-content-spacebw three_column edit_frm">
                  <h6 class="title-label"><i class="fas fa-users"></i></h6>
                  @if (@$fieldStatus && $action == 'Team_name')
                    <input type="text" wire:model="Team_name"/>
                    <span class="edit"><a class="link-design-2" wire:click.prevent="updateData('Team_name')"><i class="fas fa-save"></i></a></span>
                    <span class="cancel"><a href="javascript::void(0)" class="link-design-2" wire:click.prevent="cancel"><i class="fas fa-times"></i></a></span>
                  @else
                    <p class="phone">{{$user->first_name}} {{$user->last_name}}</p>
                    <div class="action-block">
                      <span class="edit"><a href="javascript::void(0)" wire:click.prevent="editData('Team_name')">Edit</a></span>
                    </div>
                   
                  @endif
                </div>
              </li>
                     @endif
                     <li class="position-relative">
                <div class="d-flex justify-content-spacebw three_column edit_frm">
                  <h6 class="title-label"><i class="fas fa-user"></i></h6>
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
                 <li class="position-relative">
                <div class="d-flex justify-content-spacebw three_column edit_frm">
                  <h6 class="title-label"><i class="fas fa-phone"></i></h6>
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
                    
                <li class="position-relative">
                <form class="d-flex">
                  <h6 class="title-label"><i class="fas fa-envelope"></i></h6>
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
                <div class="d-flex justify-content-spacebw three_column edit_frm">
                  <h6 class="title-label"><i class="fas fa-home"></i></h6>
                  @if (@$fieldStatus && $action == 'address')
                    <input type="text" wire:model="address"/>
                    <span class="edit"><a class="link-design-2" wire:click.prevent="updateData('address')"><i class="fas fa-save"></i></a></span>
                    <span class="cancel"><a href="javascript::void(0)" class="link-design-2" wire:click.prevent="cancel"><i class="fas fa-times"></i></a></span>
                  @else
                    @if($user->UserDetails)
                    <p class="phone">{{$user->UserDetails->address}}</p>
                    @else
                    <p class="phone"></p>
                    @endif
                    <div class="action-block">
                      <span class="edit"><a href="javascript::void(0)" wire:click.prevent="editData('address')">Edit</a></span>
                    </div>
                  @endif
                </div>
              </li>
               <li class="payment-methoud two-blocks d-flex position-relative">
                <div class="payemnt-first-block">
                <form class="d-flex">
                 <h6 class="title-label"><svg class="svg-inline--fa fa-credit-card" aria-hidden="true" focusable="false" data-prefix="far" data-icon="credit-card" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M168 336C181.3 336 192 346.7 192 360C192 373.3 181.3 384 168 384H120C106.7 384 96 373.3 96 360C96 346.7 106.7 336 120 336H168zM360 336C373.3 336 384 346.7 384 360C384 373.3 373.3 384 360 384H248C234.7 384 224 373.3 224 360C224 346.7 234.7 336 248 336H360zM512 32C547.3 32 576 60.65 576 96V416C576 451.3 547.3 480 512 480H64C28.65 480 0 451.3 0 416V96C0 60.65 28.65 32 64 32H512zM512 80H64C55.16 80 48 87.16 48 96V128H528V96C528 87.16 520.8 80 512 80zM528 224H48V416C48 424.8 55.16 432 64 432H512C520.8 432 528 424.8 528 416V224z"></path></svg><!-- <i class="far fa-credit-card"></i> Font Awesome fontawesome.com --></h6>
                 <p class=""> Payment Method Checking ******3245</p>
                 <div class="action-block">
                  <button class="edit">Edit</button>
                  <button class="save-icn-btn"><svg class="svg-inline--fa fa-floppy-disk" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="floppy-disk" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M433.1 129.1l-83.9-83.9C342.3 38.32 327.1 32 316.1 32H64C28.65 32 0 60.65 0 96v320c0 35.35 28.65 64 64 64h320c35.35 0 64-28.65 64-64V163.9C448 152.9 441.7 137.7 433.1 129.1zM224 416c-35.34 0-64-28.66-64-64s28.66-64 64-64s64 28.66 64 64S259.3 416 224 416zM320 208C320 216.8 312.8 224 304 224h-224C71.16 224 64 216.8 64 208v-96C64 103.2 71.16 96 80 96h224C312.8 96 320 103.2 320 112V208z"></path></svg><!-- <i class="fas fa-save"></i> Font Awesome fontawesome.com --></button>
                  <button class="cancel"><svg class="svg-inline--fa fa-xmark" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path></svg><!-- <i class="fas fa-times"></i> Font Awesome fontawesome.com --></button>
                  </div>
                 </form>
                 </div>
                 <div class="payemnt-first-block">
                  <form class="d-flex">
                 <h6 class="title-label"><svg class="svg-inline--fa fa-credit-card" aria-hidden="true" focusable="false" data-prefix="far" data-icon="credit-card" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M168 336C181.3 336 192 346.7 192 360C192 373.3 181.3 384 168 384H120C106.7 384 96 373.3 96 360C96 346.7 106.7 336 120 336H168zM360 336C373.3 336 384 346.7 384 360C384 373.3 373.3 384 360 384H248C234.7 384 224 373.3 224 360C224 346.7 234.7 336 248 336H360zM512 32C547.3 32 576 60.65 576 96V416C576 451.3 547.3 480 512 480H64C28.65 480 0 451.3 0 416V96C0 60.65 28.65 32 64 32H512zM512 80H64C55.16 80 48 87.16 48 96V128H528V96C528 87.16 520.8 80 512 80zM528 224H48V416C48 424.8 55.16 432 64 432H512C520.8 432 528 424.8 528 416V224z"></path></svg><!-- <i class="far fa-credit-card"></i> Font Awesome fontawesome.com --></h6>
                 <p class=""> Payment Method Visa ******3245</p>
                 <div class="action-block">
                  <button class="edit">Edit</button>
                  <button class="save-icn-btn"><svg class="svg-inline--fa fa-floppy-disk" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="floppy-disk" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M433.1 129.1l-83.9-83.9C342.3 38.32 327.1 32 316.1 32H64C28.65 32 0 60.65 0 96v320c0 35.35 28.65 64 64 64h320c35.35 0 64-28.65 64-64V163.9C448 152.9 441.7 137.7 433.1 129.1zM224 416c-35.34 0-64-28.66-64-64s28.66-64 64-64s64 28.66 64 64S259.3 416 224 416zM320 208C320 216.8 312.8 224 304 224h-224C71.16 224 64 216.8 64 208v-96C64 103.2 71.16 96 80 96h224C312.8 96 320 103.2 320 112V208z"></path></svg><!-- <i class="fas fa-save"></i> Font Awesome fontawesome.com --></button>
                  <button class="cancel"><svg class="svg-inline--fa fa-xmark" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path></svg><!-- <i class="fas fa-times"></i> Font Awesome fontawesome.com --></button>
                  </div>
                 </form>
                 </div>
              </li>
              <li class="position-relative">
                <form class="d-flex">
                <h6 class="title-label"><img src="{{ asset('assets/admin/images/icons/tin.svg') }}"></h6>
                <input type="number" placeholder="Enter Tin Number" style="display: none;">
                <p>TIN: ****1164</p>
                <div class="action-block">
                  <button class="edit">Edit</button>
                  <button class="save-icn-btn"><svg class="svg-inline--fa fa-floppy-disk" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="floppy-disk" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M433.1 129.1l-83.9-83.9C342.3 38.32 327.1 32 316.1 32H64C28.65 32 0 60.65 0 96v320c0 35.35 28.65 64 64 64h320c35.35 0 64-28.65 64-64V163.9C448 152.9 441.7 137.7 433.1 129.1zM224 416c-35.34 0-64-28.66-64-64s28.66-64 64-64s64 28.66 64 64S259.3 416 224 416zM320 208C320 216.8 312.8 224 304 224h-224C71.16 224 64 216.8 64 208v-96C64 103.2 71.16 96 80 96h224C312.8 96 320 103.2 320 112V208z"></path></svg><!-- <i class="fas fa-save"></i> Font Awesome fontawesome.com --></button>
                  <button class="cancel"><svg class="svg-inline--fa fa-xmark" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path></svg><!-- <i class="fas fa-times"></i> Font Awesome fontawesome.com --></button>
                  </div>
                </form>
             </li>
             <li class="d-flex position-relative">
              <h6 class="title-label"><img src="{{ asset('assets/admin/images/icons/team-size.svg') }}"></h6>
              <p>Team Size: 3</p>
           </li>
           <li class="d-flex position-relative">
            <h6 class="title-label"><img src="{{ asset('assets/admin/images/icons/insured.svg') }}"></h6>
            <p>Insured: Yes</p>
            </li>
              <li class="reset-password">
                <a href="#"><img src="{{ asset('assets/admin/images/icons/reset-password.svg') }}"> Reset Password</a>
              </li>
                  </ul>
                </div>
              </div>
            </div>
            </div>

 </div>
</div>

