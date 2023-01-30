<div class="seeting_tabs">

<style>
   nav svg {
   max-height: 20px;
   }
   .pagi_links .flex.justify-between.flex-1.sm\:hidden {
   display: none;
   }
   .pagi_links span.relative.z-0.inline-flex.rounded-md.shadow-sm button {
   width: 38px;
   height: 40px;
   }
</style>
   <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation" wire:ignore>
         <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Settings</button>
      </li>
      <li class="nav-item" role="presentation" wire:ignore>
         <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">SMTP Email</button>
      </li>
      <li class="nav-item" role="presentation" wire:ignore>
         <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Stripe keys</button>
      </li>
      <li class="nav-item" role="presentation" wire:ignore>
         <button class="nav-link" id="social-tab" data-bs-toggle="tab" data-bs-target="#social" type="button" role="tab" aria-controls="social" aria-selected="false">Social link</button>
      </li>
      <li class="nav-item" role="presentation" wire:ignore>
         <button class="nav-link" id="seo-tab" data-bs-toggle="tab" data-bs-target="#seo" type="button" role="tab" aria-controls="seo" aria-selected="false">Seo</button>
      </li>
   </ul>
   <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab" wire:ignore.self>
         <div class="form-group row">
            <label for="type" class="col-sm-2 col-form-label">Tax type</label>
            <div class="col-sm-10">
               <select class="form-control" wire:model="tax_type">
                  <option value="">Select type</option>
                  <option value="percentage" selected="selected">Percentage</option>
                  <option value="fixed">Fixed</option>
               </select>
            </div>
         </div>
         <br>
         <div class="form-group row">
            <label for="tax" class="col-sm-2 col-form-label">Tax</label>
            <div class="col-sm-10">
               <input type="text" class="form-control" id="tax" placeholder="" wire:model="tax">
            </div>
         </div>
         <br>
         <div class="form-group row">
            <label for="Transaction" class="col-sm-2 col-form-label">Transaction fee type</label>
            <div class="col-sm-10">
               <select class="form-control" wire:model="transaction_type" required>
                  <option value="">Select type</option>
                  <option value="percentage" selected="selected">Percentage</option>
                  <option value="fixed">Fixed</option>
               </select>
            </div>
         </div>
         <br>
         <div class="form-group row">
            <label for="fee" class="col-sm-2 col-form-label">Transaction Fee</label>
            <div class="col-sm-10">
               <input type="text" class="form-control" id="fee" placeholder="" wire:model="transaction_fee">
            </div>
         </div>
         <br>
         <div class="form-group">
            <button type="submit" wire:click.prevent="update()" class="btn_blue">Submit</button>
         </div>
      </div>
      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab" wire:ignore.self>
         <div class="form-group row">
            <label for="SMTPserver" class="col-sm-2 col-form-label">smtphost</label>
            <div class="col-sm-10">
               <input type="text" class="form-control" id="SMTPserver" wire:model="smtp_host" aria-describedby="emailHelp">
            </div>
         </div>
         <br>
         <div class="form-group row">
            <label for="SMTPport" class="col-sm-2 col-form-label">smtpport</label>
            <div class="col-sm-10">
               <input type="text" class="form-control" id="SMTPport" wire:model="smtp_port" placeholder="">
            </div>
         </div>
         <br>
         <div class="form-group row">
            <label for="SMTPemail" class="col-sm-2 col-form-label">smtpusername</label>
            <div class="col-sm-10">
               <input type="text" class="form-control" id="SMTPemail" wire:model="smtp_username" placeholder="">
            </div>
         </div>
         <br>
         <div class="form-group row">
            <label for="SMTPpassword" class="col-sm-2 col-form-label">smtppassword</label>
            <div class="col-sm-10">
               <input type="text" class="form-control" id="SMTPpassword" wire:model="smtp_password" placeholder="">
            </div>
         </div>
         <br>
         <div class="form-group">
            <button type="submit" wire:click.prevent="update()" class="btn_blue">Submit</button>
         </div>
      </div>
      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab" wire:ignore.self>
         <div class="form-group row">
            <label for="public_key" class="col-sm-2 col-form-label">Stripe key</label>
            <div class="col-sm-10">
               <input type="text" class="form-control" id="public_key" wire:model="stripe_key" placeholder="">
            </div>
         </div>
         <br>
         <div class="form-group row">
            <label for="secret_key" class="col-sm-2 col-form-label">Stripe secret key</label>
            <div class="col-sm-10">
               <input type="text" class="form-control" id="secret_key" wire:model="stripe_secret_key" placeholder="">
            </div>
         </div>
         <br>
         <div class="form-group">
            <button type="submit" wire:click.prevent="update()" class="btn_blue">Submit</button>
         </div>
      </div>
      <div class="tab-pane fade" id="social" role="tabpanel" aria-labelledby="social-tab" wire:ignore.self>
         <div class="form-group row">
            <label for="fb" class="col-sm-2 col-form-label">Facebook</label>
            <div class="col-sm-10">
               <input type="text" class="form-control" id="fb" wire:model="facebook" placeholder="Enter link">
            </div>
         </div>
         <br>
         <div class="form-group row">
            <label for="twitter" class="col-sm-2 col-form-label">Twitter</label>
            <div class="col-sm-10">
               <input type="text" class="form-control" id="twitter" wire:model="twitter" placeholder="Enter link">
            </div>
         </div>
         <br>
         <div class="form-group row">
            <label for="instagram" class="col-sm-2 col-form-label">Instagram</label>
            <div class="col-sm-10">
               <input type="text" class="form-control" id="instagram" wire:model="instagram" placeholder="Enter link">
            </div>
         </div>
         <br>
         <div class="form-group row">
            <label for="linkedin" class="col-sm-2 col-form-label">Linked In</label>
            <div class="col-sm-10">
               <input type="text" class="form-control" id="linkedin" wire:model="linkedin" placeholder="Enter link">
            </div>
         </div>
         <br>
         <div class="form-group">
            <button type="submit" wire:click.prevent="update()" class="btn_blue">Submit</button>
         </div>
      </div>
      <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tab" wire:ignore.self>
         <div class="tab-content">
            <div class="add-litigations py-3">
               <button type="button" class="btn_blue showModal">Add</button>
            </div>
            <div class="tab-pane active" id="all">
               <div class="table-design">
                  <table class="table dt-responsive nowrap" style="width:100%">
                     <thead>
                        <tr>
                           <th>Page</th>
                           <th>Title</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($seos as $seo) 
                        <tr>
                           <td>{{ $seo->page }}</td>
                           <td>{{ $seo->title }}</td>
                           <td>
                              <a class="edit-icons pe-2" href="javascript::void(0)" wire:click="edit('{{$seo->id}}')">
                              <i class="fas fa-pen"></i>
                              </a>
                              <a class="view-icon" href="javascript::void(0)" wire:click="delete('{{$seo->id}}')">
                              <i class="fas fa-trash"></i>
                              </a>
                           </td>
                        </tr>
                        @endforeach 
                     </tbody>
                  </table>
               </div>
               <div class="pagi_links">
                  {{$seos->links()}}
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Accept Modal Start Here-->
   <div wire:ignore.self class="modal fade common_modal modal-design" id="seoForm" tabindex="-1" aria-labelledby="stateForm" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
            <button type="button" class="btn btn_close btn-default close closeModal">
            <i class="fas fa-close"></i>
            </button>
            <form>
               <div class="modal-header modal_h">
                  <h3>Add/Edit Seo</h3>
               </div>
               <div class="modal-body">
                  <div>
                     <div class="form-group">
                        <label>Select Page</label>
                        <select class="form-control" wire:model="page_name">
                           <option value="">Select Page</option>
                           <option value="account">Account</option>
                           <option value="billing">Billing</option>
                           <option value="appoinments">Appoinments</option>
                           <option value="notification">Notification</option>
                           <option value="favourite">Favourite</option>
                           <option value="support">Support</option>
                           <option value="jobs">Jobs</option>
                           <option value="insurance">Insurance and badges</option>
                           <option value="reviews">Reviews</option>
                           <option value="team">Team</option>
                           <option value="set-location">Set location served</option>
                           <option value="availability">Set availability</option>
                           <option value="service">Set service</option>
                        </select>
                        {!! $errors->first('page_name', ' <span class="help-block">:message</span>') !!}
                     </div>
                     <div class="form-group">
                        <label>Meta Title</label>
                        </br>
                        <input type="text" wire:model="title" class="form-control"> {!! $errors->first('title', ' <span class="help-block">:message</span>') !!}
                     </div>
                     <div class="form-group">
                        <label>Meta Description</label>
                        </br>
                        <input type="text" wire:model="description" class="form-control"> {!! $errors->first('description', ' <span class="help-block">:message</span>') !!}
                     </div>
                     <div class="form-group">
                        <label>Meta Keywords</label>
                        </br>
                        <input type="text" wire:model="keywords" class="form-control"> {!! $errors->first('keywords', ' <span class="help-block">:message</span>') !!}
                     </div>
                  </div>
               </div>
               <div class="text-center mb-3">
                  <button type="button" class="btn_blue" wire:click.prevent="store" wire:loading.attr="disabled">Save </button>
               </div>
            </form>
         </div>
      </div>
   </div>
   <!-- Accept Modal Close Here-->
   @push('scripts') 
   <script>
      $(document).ready(function() {
        window.livewire.on('formClose', () => {
          $('#seoForm').modal('hide');
        });
        window.livewire.on('formShow', () => {
          $('#seoForm').modal('show');
        });
      });
      $(document).on('click', '.showModal', function(e) {
        $('#seoForm').modal('show');
      });
      $(document).on('click', '.closeModal', function(e) {
        $('#seoForm').modal('hide');
      });
   </script> 
   @endpush
</div>