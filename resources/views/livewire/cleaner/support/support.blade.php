<div>

    <!-- past-service -->
    <div class="form-headeing-second mt-4">
        <h4 class="border-0 mb-0">Get help with an issue</h4>
      </div>
      <div class="get-more-issue-wrap">
      <form>
        <div class="issue_card_section">
          <form>
          <div class="row">
            <div class="col-md-12">
              <div class="form-grouph select-design mb-30 width-mx-50">
                <label>Select a Job</label>
                <select class="select-custom-design">
                  <option>Select a Job</option>
                 <option>Cleaner</option>
                  <option>Cleaner</option>
                </select>
              </div>
          </div>
           <div class="col-xl-6 col-lg-6 col-sm-12 col-md-6">
                <div class="form-grouph select-design mb-30">
                  <label>Issue</label>
                  <select class="select-custom-design">
                    <option>Select an issue</option>
                    <option>Report Customer - Abusive</option>
                    <option>Report Customer - Home did not match quote</option>
                    <option>Other</option>
                  </select>
                </div>
           </div>
           <div class="col-xl-6 col-lg-6 col-sm-12 col-md-6">
                  <div class="form-grouph select-design mb-30">
                    <label>Requested Resolution</label>
                    <select class="select-custom-design">
                      <option>Select an option</option>
                     <option>Give Refund</option>
                      <option>Other</option>
                    </select>
                  </div>

          </div>
          <div class="col-md-12">
            <div class="form-grouph input-design mb-30">
              <input type="text" placeholder="If you selected Other - explain">
              </div>
        </div>
        <div class="col-md-12">
          <textarea placeholder="Please describe your issue and/or requested resolution in detail."></textarea>
      </div>
          </div>
          <div class="row">
           <div class="col-md-12 pt-3">
             <button class="btn_c d-block w-100">Submit</button>
           </div>
          </div>
          </form>
        </div>
        </form>
      </div>
{{--
  <!-- past-service -->
  <div class="past-services-container card_service_row">
    <div class="listing-row">

        @forelse ( $completedOrders as $order )
      <div class="listing-column lcd-6 lc-12 mb-2">
        <div class="select-date-toggles header-main-cntnt-differ">
          <button class="service_toggle_s"></button>
          <div class="service-main-service-column">
            <div class="card-layout-showcase">
              <div class="job-first-details four-column">
                <p class="job-d-info blue">Time</p>
                <p class="job-d-info">{{ $order->cleaning_datetime->format('h:i A') }}</p>
                <p class="job-d-info blue">Date</p>
                <p class="job-d-info">{{ $order->cleaning_datetime->toFormattedDateString() }}</p>
              </div>
              <div class="job-first-details  four-column">
                <p class="job-d-info">Job</p>
                <p class="job-d-info address">DDDD</p>
                <p class="job-d-info">Customer</p>
                <p class="job-d-info address">{{ $order->user->name }}</p>
              </div>

              <div class="response-msg">
                <a href="#" class="red-bordered-full-btn">There’s an issue with this job</a>
              </div>

            </div>
            <div class="altrntive_rw">
              <p class="appointment_label">Time</p>
              <p class="app-value">{{ $order->cleaning_datetime->format('h:i A') }}</p>
            </div>
            <div class="altrntive_rw">
              <p class="appointment_label">Job</p>
              <p class="app-value blue"><strong>Deep clean</strong></p>
            </div>
            <div class="altrntive_rw">
              <p class="appointment_label">Date</p>
              <p class="app-value">{{ $order->cleaning_datetime->toFormattedDateString() }}</p>
            </div>
            <div class="altrntive_rw">
              <p class="appointment_label">Est Duration</p>
              <p class="app-value">1:00 hrs</p>
            </div>
            <div class="altrntive_rw">
              <p class="appointment_label">Customer</p>
              <p class="app-value">{{ $order->user->name }}</p>
              <a href="#" class="btn_b" type="button" id="dropdownMenu2"
              data-bs-toggle="dropdown" aria-expanded="false">Contact </a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <li class="c_text">Contact information</li>
                <li><a href="tel:512-558-5876" class="link-design-2 mt-3"><img
                src="assets/images/icons/phone.svg">512-558-5876</a></li>
                <li><a href="mailto:example@mail.com" class="link-design-2"><img
                src="assets/images/icons/email.svg">example@mail.com</a></li>
                <li><a href="#" class="link-design-2"><img src="assets/images/icons/home.svg">15648
                Maple St, Austin, TX 78744</a></li>
                <li class="chat_with_member"><a href="message.html" class="btn_chat_member">Chat With
                Member<img src="assets/images/icons/email-2.svg" /></a></li>
              </ul>
            </div>
            <div class="altrntive_rw">
              <p class="appointment_label blue">Location</p>
              <p class="app-value location blue">22559 Bear Dr., Applev...</p>
            </div>
            <div class="altrntive_rw">
              <p class="appointment_label">Cleaner</p>
              <p class="app-value">Brooklyn S.</p>
              <a href="#" class="btn_b" type="button" id="dropdownMenu2"
              data-bs-toggle="dropdown" aria-expanded="false">Contact </a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <li class="c_text">Contact information</li>
                <li><a href="tel:{{ $order->user->UserDetails->contact_number }}" class="link-design-2 mt-3"><img
                src="assets/images/icons/phone.svg">{{ $order->user->UserDetails->contact_number }}</a></li>
                <li><a href="mailto:{{ $order->user->email }}" class="link-design-2"><img
                src="assets/images/icons/email.svg">{{ $order->user->email }}</a></li>
                <li><a href="#" class="link-design-2"><img src="assets/images/icons/home.svg">15648
                Maple St, Austin, TX 78744</a></li>
                <li class="chat_with_member"><a href="message.html" class="btn_chat_member">Chat With
                Member<img src="assets/images/icons/email-2.svg" /></a></li>
              </ul>
            </div>
            <div class="altrntive_rw">
              <p class="appointment_label">Price</p>
              <p class="app-value">$130</p>
            </div>
            <div class="altrntive_rw">
              <p class="appointment_label">Payment</p>
              <p class="app-value">**2345</p>
            </div>
            <div class="altrntive_rw">
              <p class="appointment_label">Invoice</p>
              <p class="app-value blue"><strong>FB-57382324</strong></p>
            </div>
          </div>
          <div class="collect-payment-btn">
            <a href="#" class="red-bordered-full-btn">There’s an issue with this job</a>
          </div>
        </div>
      </div>
      @empty
        <h3>No completed orders yet</h3>

      @endforelse


      <div class="pagination_search_div text-center pagination-cubic-design mt-5">
        <div id="pagination-container" class="pagination_list"></div>
      </div>
    </div>
  </div>

--}}
</div>
