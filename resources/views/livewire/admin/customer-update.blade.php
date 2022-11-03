<div>

   <section class="table-layout-sec jobs">
    <div class="white-bg-wrapper">
      <div class="account-info-blocks">
        <div class="row">
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
            <div class="detail-div-block">
            <h4>Customer account info</h4>
           
            <div class="inner-white-wrapper max-251px">
              <div class="customer-account-forms">
                <div class="customer-account-information cleaner_account_2 mt-4">
                  <ul class="list-unstyled">
                    <li class="position-relative">
                      <div class="d-flex justify-content-spacebw three_column edit_frm">
                          <h6 class="title-label"><i class="fas fa-user"></i></h6>
                          @if ($fieldStatus == true && $action == 'first_name')
                      
                            <input type="text" value="{{@$user->first_name}}" wire:model="first_name" />
                            <!-- <button class="save-icn-btn"><i class="fas fa-save"></i></button> -->
                            <span class="edit"><a class="link-design-2" wire:click="updateData('first_name')"><i class="fas fa-save"></i></a></span>
                            <span class="cancel"><a href="javascript::void(0)" class="link-design-2" wire:click="cancle"><i class="fas fa-times"></i></a></span>

                          @else
                          <p class="phone dsds"><a href="tel:+1 512-559-9582">{{@$user->first_name}}</a></p>
                          <div class="action-block">
                              <span class="edit"><a href="javascript::void(0)" wire:click="editData('{{@$user->id}}', 'first_name')">Edit</a></span>
                              <!-- <button class="edit">Edit</button> -->
                          </div>
                          @endif
                      </div>
                  
              
                    </li>
                    <li class="position-relative">
                     <form class="d-flex">
                  <h6 class="title-label"><i class="fas fa-home"></i></h6>
                  <input type="text" placeholder="Enter Address" style="display: none;">
                  <p>{{@$user->contact_number}}</p>
                  <div class="action-block">
                    <button class="edit">Edit</button>
                    <button class="save-icn-btn"><i class="fas fa-save"></i></button>
                    <button class="cancel"><i class="fas fa-times"></i></button>
                    </div>
                  </form>
                   </li>
                   <li class="position-relative">
                    <form class="d-flex">
                    <h6 class="title-label"><i class="fas fa-envelope"></i></h6>
                    <input type="email" placeholder="Enter Email" style="display: none;">
                    <p class="mail"><a href="mailto:{{@$user->email}}">{{@$user->email}}</a></p>
                   <!--  <div class="action-block">
                      <button class="edit">Edit</button>
                      <button class="save-icn-btn"><i class="fas fa-save"></i></button>
                      <button class="cancel"><i class="fas fa-times"></i></button>
                      </div> -->
                    </form>
                 </li>
                 <li class="position-relative">
                  <form class="d-flex">
                  <h6 class="title-label"><i class="fas fa-home"></i></h6>
                  <input type="text" placeholder="Enter Address" style="display: none;">
                  <p>{{@$user->UserDetails->address}}</p>
                  <div class="action-block">
                    <button class="edit">Edit</button>
                    <button class="save-icn-btn"><i class="fas fa-save"></i></button>
                    <button class="cancel"><i class="fas fa-times"></i></button>
                    </div>
                  </form>
               </li>
               <li class="d-flex payment-methoud">
                 <h6 class="title-label"><i class="far fa-credit-card"></i></h6>
                 <p class=""> Payment Method Visa ******3245</p>
                 <div class="action-block">
                  <button class="edit">Edit</button>
                  <button class="save-icn-btn"><i class="fas fa-save"></i></button>
                  <button class="cancel"><i class="fas fa-times"></i></button>
                  </div>
              </li>
              <li class="reset-password">
                <a href="#"><img src="../assets/admin/images/icons/reset-password.svg"> Reset Password</a>
              </li>
                  </ul>
                </div>
              </div>
            </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
            <div class="detail-div-block">
              <h4>Account history log</h4>
              <div class="inner-white-wrapper account-history-log max-251px">
                <p>2/24/22 - 11:37 CST TNX OUT23523 <strong>- Payout -</strong> <span class="success">SUCCESS</span> $200</p>
                <p>2/24/22 - 11:37 CST TNX OUT23523 <strong>- Refund -</strong> <span class="success">SUCCESS</span> $200</p>
                <p>2/24/22 - 11:37 CST TNX OUT23523 <strong>- Charge -</strong> <span class="failed">Failed</span> $200</p>
                <p>2/24/22 - 11:37 CST TNX OUT23523 <strong>- Payout -</strong> <span class="success">SUCCESS</span> $200</p>
                <p>2/24/22 - 11:37 CST TNX OUT23523 <strong>- Scheduled -</strong> <span class="scheduled-time">02/14/22</span> $200</p>
              </div>
              </div>
          </div>
        </div>
      </div>
      <div class="table-header-wrapper">
      <div class="table-tabs-wrap">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" data-bs-toggle="tab" href="#all">All <span class="data-span">(5,249)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="tab" href="#scheduled">Scheduled <span class="data-span">(199)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="tab" href="#completed">Completed <span class="data-span">(3,949)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="tab" href="#canceled">Canceled <span class="data-span">(368)</span></a>
        </li>
      </ul>
      </div>
      <div class="table-right-block">
        <button id="all-time" class="all-time-btn">All Time</button>
      </div>
      </div>
      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane active" id="all">
          <div class="table-design">
          <table id="all-jobs-table" class="table dt-responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Job #</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Amount</th>
                    <th>Type</th>
                    <th>Service Name</th>
                    <th>Cleaner</th>
                    <th>Customer</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="job-number">80348</td>
                    <td>02/10/22</td>
                    <td><span class="scheduled">Scheduled</span></td>
                    <td>$245</td>
                    <td>One time</td>
                    <td>Deep Clean</td>
                    <td><span class="name cleaner">John S.’s Team</span></td>
                    <td><span class="name customer">Anthony Peterson</span></td>
                    <td class="action-btns">
                      <a class="cancel-btn" role="button">Cancel</a>
                      <a class="rechedule-btn" role="button">Reschedule</a>
                    </td>
                </tr>
                  <tr>
                    <td class="job-number">80348</td>
                    <td>02/10/22</td>
                    <td><span class="scheduled">Scheduled</span></td>
                    <td>$245</td>
                    <td>One time</td>
                    <td>Deep Clean</td>
                    <td><span class="name cleaner">John S.’s Team</span></td>
                    <td><span class="name customer">Anthony Peterson</span></td>
                    <td class="action-btns">
                      <a class="cancel-btn" role="button">Cancel</a>
                      <a class="rechedule-btn" role="button">Reschedule</a>
                    </td>
                </tr>
               
            </tbody>
          </table>
          </div>
        </div>
      <!--   <div class="tab-pane fade" id="scheduled">
          <div class="table-design">
            <table id="schedule-jobs-table" class="table dt-responsive nowrap" style="width:100%">
              <thead>
                  <tr>
                      <th>Job #</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Amount</th>
                      <th>Type</th>
                      <th>Service Name</th>
                      <th>Cleaner</th>
                      <th>Customer</th>
                      <th></th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td class="job-number">80348</td>
                      <td>02/10/22</td>
                      <td><span class="scheduled">Scheduled</span></td>
                      <td>$245</td>
                      <td>One time</td>
                      <td>Deep Clean</td>
                      <td><span class="name cleaner">John S.’s Team</span></td>
                      <td><span class="name customer">Anthony Peterson</span></td>
                      <td class="action-btns">
                        <a class="cancel-btn" role="button">Cancel</a>
                        <a class="rechedule-btn" role="button">Reschedule</a>
                      </td>
                  </tr>
               
               
              </tbody>
            </table>
            </div>
        </div> -->
  <!--       <div class="tab-pane fade" id="completed">
          <div class="table-design">
            <table id="Completed-jobs-table" class="table dt-responsive nowrap" style="width:100%">
              <thead>
                  <tr>
                      <th>Job #</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Amount</th>
                      <th>Type</th>
                      <th>Service Name</th>
                      <th>Cleaner</th>
                      <th>Customer</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td class="job-number">80348</td>
                      <td>02/10/22</td>
                      <td>Completed</td>
                      <td>$245</td>
                      <td>One time</td>
                      <td>Deep Clean</td>
                      <td><span class="name cleaner">John S.’s Team</span></td>
                      <td><span class="name customer">Anthony Peterson</span></td>
                  </tr>
                   
              </tbody>
            </table>
            </div>
        </div> -->
<!--         <div class="tab-pane fade" id="canceled">
          <div class="table-design">
            <table id="canceled-jobs-table" class="table dt-responsive nowrap" style="width:100%">
              <thead>
                  <tr>
                      <th>Job #</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Amount</th>
                      <th>Type</th>
                      <th>Service Name</th>
                      <th>Cleaner</th>
                      <th>Customer</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td class="job-number">80348</td>
                      <td>02/10/22</td>
                      <td><span class="canceled">Canceled</span></td>
                      <td>$245</td>
                      <td>One time</td>
                      <td>Deep Clean</td>
                      <td><span class="name cleaner">John S.’s Team</span></td>
                      <td><span class="name customer">Anthony Peterson</span></td>
                  </tr>
           
              </tbody>
            </table>
            </div>
        </div> -->
      </div>
      </div>
   </section>


</div>




