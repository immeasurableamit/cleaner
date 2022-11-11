<div>
 <section class="table-layout-sec jobs">
    <div class="white-bg-wrapper">
    <div class="table-header-wrapper">
    <div class="table-tabs-wrap">
    <ul class="nav nav-tabs">
    <!--   <li class="nav-item">
        <a class="nav-link active" data-bs-toggle="tab" href="#all">All <span class="data-span"></span></a>
      </li> -->
     
    </ul>
    </div>
    <div class="table-right-block">
      <div class="dropdown">
        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
          All <img src="../assets/admin/images/icons/all-filter.svg">
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Link 1</a></li>
          <li><a class="dropdown-item" href="#">Link 2</a></li>
          <li><a class="dropdown-item" href="#">Link 3</a></li>
        </ul>
      </div>
    </div>
    </div>
    <!-- Tab panes -->
    <div class="tab-content">
      <div class="tab-pane active" id="all">
        <div class="table-design">
       
             
        <table id="all-customer-table" class="table dt-responsive nowrap" style="width:100%">
          <thead>
              <tr>
                  <th>Name #</th>
                  <th>Email</th>
                  <th>Order Number</th>
                  <th>Phone</th>
                  <th>Message</th>
                  <th>Status</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
            <!-- <a href="javascript:void(0)" class="link-design-2" wire:click="destroy()">Delete</a> -->
                @foreach($contacts as $contact)
              <tr>
                  <td class="name">{{$contact->name}}</td>
                  <td>{{$contact->email}}</td>
                  <td>{{$contact->order_number}}</td>
                  <td>{{$contact->phone}}</td>
                  <td>{{$contact->message}}</td>
                  @if($contact->status == 0)
                  <td><a href="javascript::void(0)" wire:click.prevent="statusClose({{$contact->id}})">Open</a></td>
                  @else
                  <td><a href="javascript::void(0)">Closed</a></td>
                  @endif
                  <td><a href="javascript::void(0)" wire:click.prevent="destroy({{$contact->id}})">Delete</a></td>
              </tr>
                 @endforeach
           
          </tbody>
        </table>
         
        </div>
      </div>
   
    </div>
    </div>
   </section>
 

</div>



