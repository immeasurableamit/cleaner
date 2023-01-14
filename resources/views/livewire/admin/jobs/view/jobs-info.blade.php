<div>
     <div class="white-bg-wrapper">
        <div class="job_id">
       <h5>Job # {{$user->id}}</h5>
        </div>

        <div class="row pt-3 job_row "> 
         <div class="col-md-4">
          <h4>Job information</h4>
          <div class="job_card">
     
            <div class="job_lists">
        <h3>Completion date:</h3>
        <p>{{ date("d/m/Y", strtotime($user->cleaning_datetime))}}</p>
        <a class="cancel_r" href="#" ></a>
       </div>

       <div class="job_lists">
        <h3>Status:</h3>
        <p>{{$user->statusForAdmin()}}</p>
        <a class="cancel_r" href="#" ></a>
       </div>

       <div class="job_lists">
        <h3> Amount:</h3>
        <p>{{$user->total}}</p>
        <a class="cancel_r" href="#" ></a>
       </div>

       <div class="job_lists">
        <h3>Customer:</h3>
        <p>{{$user->user->first_name}} {{$user->user->last_name}}</p>
        <a class="cancel_r" href="#" ></a>
       </div>

       <div class="job_lists">
        <h3> Cleaner:</h3>
        <p>{{$user->cleaner->first_name}} {{$user->cleaner->last_name}}</p>
        <a class="cancel_r" href="#" ></a>
       </div>

       <div class="job_lists">
        <h3> Frequency:</h3>
        <p>Every 4 Weeks  </p>
        <a class="cancel_r" href="#" >Cancel</a>
       </div>

          </div>
         </div>
         <div class="col-md-3 service_adres">
       <h4>Service address</h4>
       <div class="job_card">
        <div class="job_lists">
            <h3>Address:</h3>
            <p>{{$user->address}}</p>
            <a class="edit_r" href="#" ></a>
           </div>
           <div class="job_lists">
            <h3>Address 2:</h3>
            <p>{{$user->address}}</p>
            <a class="edit_r" href="#" ></a>
           </div>
           <div class="job_lists">
            <h3>City:</h3>
            <p>{{$user->city}}</p>
            <a class="edit_r" href="#" ></a>
           </div>
           <div class="job_lists">
            <h3>State:</h3>
            <p>{{$user->state->code}}</p>
            <a class="edit_r" href="#" ></a>
           </div>
           <div class="job_lists">
            <h3>Zip</h3>
            <p>{{$user->zip}}</p>
            <a class="edit_r" href="#" ></a>
           </div>
           
       </div>
         </div>
         <div class="col-md-4 job_history">
<h4>Job History log</h4>
<div class="job_card">
    <p>2/24/22 - 11:37 CST TNX OUT23523 - <b>Payout</b> - <span class="text-success">SUCCESS</span> $200</p>
    <p>2/24/22 - 11:37 CST TNX OUT23523 - <b>Payout</b> - <span class="text-success">SUCCESS</span> $200</p>
    <p>2/24/22 - 11:37 CST TNX OUT23523 - <b>Payout</b> - <span class="text-success">SUCCESS</span> $200</p>
    <p>2/24/22 - 11:37 CST TNX OUT23523 - <b>Payout</b> - <span class="text-danger">FAILED</span> $200</p>
    <p>2/24/22 - 11:37 CST TNX OUT23523 - <b>Payout</b> - <span class="text-success">SUCCESS</span> $200</p>
    </div>
         </div>
        </div>

   

        <div class="table_row pt-5">
     <div class="row">
   <div class="col-md-8">
    <div class="tittle_job_tabel">
<h5>Job Transactions</h5>
    </div>
    <div class="table-design bg_r">
        <table id="" class="table dt-responsive nowrap" style="width:100%">
          <thead>
              <tr>
                  <th style="white-space: nowrap;">Transaction #</th>
                  <th>Details</th>
                  <th>Amount</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th></th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td>{{$user->transactions->first()->id ?? ''}}</td>
                  <td>Deep clean - 20500 sq ft</td>
                  <td>{{$user->transactions->first()->amount ?? ''}}</td>
                  <td>{{ date("d/m/Y", strtotime($user->transactions->first()->created_at ?? ''))}}</td>
                  <td>Refunded</td>
                  <td>
                    <div class="dropdown refund_div">
                        <button class="refund_link dropdown-toggle"  id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Refund
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <div class="full_partail">
                            <div class="full_1">
                                <h6>Full</h6>
                            <input style="width:100px;" type="text" placeholder="Amount">
                            <input style="width:70px;" type="text" placeholder="2FR">
                          </div>
                          <div class="partial_1">
                            <h6>Partial</h6>
                            <input style="width:100px;" type="text" placeholder="$0.00">
                            <input style="width:70px;" type="text" placeholder="-------">
                          </div>
                        </div>
                        <div class="btn_refund_div">
                        <a class="btn_refund" href="#">SEND REFUND<img class="" src="../assets\admin\images\icons\send.png"></a>
                        </div>
                        </div>
                      </div>
                </td>
              </tr>
            
          <!--   <tr>
                <td>324-254-458</td>
                <td>Deep clean - 20500 sq ft</td>
                <td>$220</td>
                <td>2/11/22</td>
                <td>Refunded</td>
                <td>
                  <div class="dropdown refund_div">
                      <button class="refund_link dropdown-toggle"  id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                          Refund
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <div class="full_partail">
                          <div class="full_1">
                              <h6>Full</h6>
                          <input style="width:100px;" type="text" placeholder="Amount">
                          <input style="width:70px;" type="text" placeholder="2FR">
                        </div>
                        <div class="partial_1">
                          <h6>Partial</h6>
                          <input style="width:100px;" type="text" placeholder="$0.00">
                          <input style="width:70px;" type="text" placeholder="-------">
                        </div>
                      </div>
                      <div class="btn_refund_div">
                      <a class="btn_refund" href="#">SEND REFUND<img class="" src="../assets\admin\images\icons\send.png"></a>
                      </div>
                      </div>
                    </div>
              </td>
            </tr> -->

            <!-- refunds tr -->
            <tr class="refunds_tr">
                <td>
                    <h3 class="h3_refunds">Refunds</h3>
                    324-254-458r1</td>
                <td>Refund: Dishes</td>
                <td>-$20</td>
                <td>2/16/22</td>
                <td>Success</td>
            </tr>
          </tbody>
        </table>
        </div>

        <div class="table-design  bg_r mt-3 ">
            <table id="" class="table dt-responsive nowrap" style="width:100%">
                <tr class="invoice_tr">
                 <td style="color: #2677B1;">Invoice</td>
                 <td>$290</td>
                 <td></td>
                </tr>
                <tr class="invoice_tr">
                    <td style="color: #2677B1;">Adjustments</td>
                    <td>$290</td>
                    <td></td>   
                </tr>

                   <tr class="final_invoice_tr">
                    <td style="color: #2677B1;">Final Invoice</td>
                    <td>$290</td>
                    <td class="pdf" style="color: #2677B1;"><a class="pdf_r"style="color: #2677B1;"href="#">PDF Download <img src="../assets/admin/images/icons/pdf.png"></a></td>  
                </tr>
            </table>
    </div>  
   </div>
     </div>

     <div class="row pt-5">
        <div class="col-md-8">
            <div class="tittle_job_tabel">
                <h5>Cleaner Payout</h5>
                    </div>
                    <div class="table-design bg_r">
                        <table id="" class="table dt-responsive nowrap" style="width:100%">
                          <thead>
                              <tr>
                                  <th style="white-space: nowrap;">Job #</th>
                                  <th>Paid To</th>
                                  <th>Amount</th>
                                  <th>Canary Fee</th>
                                  <th>Payout</th>
                                  <th>Date</th>
                                  <th>Status</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td>8254</td>
                                  <td><a href="#" class="view_link">View</a></td>
                                  <td>$270</td>
                                  <td>$70</td>
                                  <td>$200</td>
                                  <td>2/11/22</td>
                                  <td>Success</td>
                              </tr>
                              
                           
                          </tbody>
                        </table>
                        </div>
        </div>
     </div>
        </div>

    </div>
</div>