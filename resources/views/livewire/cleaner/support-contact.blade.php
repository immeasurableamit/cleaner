<div>
   <!-- contact-us -->
   <div class="contact_us_form row">
      <div class="col-md-8">
         <p class="contact_form_text">This is a general contact form. If there is an issue with one of your cleanings or providers, please <b>file an issue</b> under your past services instead for a quicker resolution. </p>
         <div class="row">
            <div class="col-md-6">
               <div class="form-grouph input-design mb-30">
                  <input type="text" placeholder="Name" wire:model="name">
                  @error('name')
                  <div class="alert ">{{ $message }}</div>
                  @enderror
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-grouph input-design mb-30">
                  <input type="text" placeholder="Order Number (if applicable)" wire:model="order_number">
                  @error('order_number')
                  <div class="alert ">{{ $message }}</div>
                  @enderror
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-grouph input-design mb-30">
                  <input type="email" placeholder="Email" wire:model="email">
                  @error('email')
                  <div class="alert ">{{ $message }}</div>
                  @enderror
               </div>
              </div> 
               <div class="col-md-6">
                  <div class="form-grouph input-design mb-30">
                     <input type="number" placeholder="Phone" wire:model="phone">
                     @error('phone')
                     <div class="alert ">{{ $message }}</div>
                     @enderror
                  </div>
               </div>
               <div class="col-md-12">
                  <textarea placeholder="Write your message here" wire:model="message"></textarea>
                  @error('message')
                  <div class="alert ">{{ $message }}</div>
                  @enderror
               </div>
               <div class="col-md-12 pt-3">
                  <button class="btn_c d-block w-100" wire:click.prevent="store">Submit</button>
               </div>
            
         </div>
        </div> 
         <div class="col-md-4 blue_right_card">
            <div class="card_b">
               <div class="fist_div">
                  <img src="assets/images/logo/logo.svg"/>
               </div>
               <div class="scnd_div">
                  <p>Get in touch with us and our team will get back to you.</p>
               </div>
               <div class="thrd_div">
                  <a href=""><img src="assets/images/icons/email.svg">support@canary.com</a>
               </div>
            </div>
         </div>
      </div>
  
</div>