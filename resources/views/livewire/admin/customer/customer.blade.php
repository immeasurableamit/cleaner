<div>
  <div class="table-header-wrapper">
    <div class="table-tabs-wrap">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link{{$tab=='all'?' active':''}}" href="javascript:void(0)" wire:click="setTab('all')">All <span class="data-span">({{$allCount}})</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link{{$tab=='active'?' active':''}}" href="javascript:void(0)" wire:click="setTab('active')">Active <span class="data-span">({{$activeCount}})</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link{{$tab=='inactive'?' active':''}}" href="javascript:void(0)" wire:click="setTab('inactive')">Inactive <span class="data-span">({{$inactiveCount}})</span></a>
        </li>
      </ul>
    </div>
    <div class="table-right-block">
        <div class="table-right-block">
      <button id="all-time1" class="all-time-btn">All Time</button>
    </div>
     <!--  <div class="dropdown">
        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
        All <img src="{{ asset('assets/admin/images/icons/all-filter.svg') }}">
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Link 1</a></li>
          <li><a class="dropdown-item" href="#">Link 2</a></li>
          <li><a class="dropdown-item" href="#">Link 3</a></li>
        </ul>
      </div> -->
    </div>

    <div class="header-search">
          <input type="search" placeholder="Search here..." id="search" wire:model="search">
         </div>
  </div>
  <!-- Tab panes -->
  <div class="tab-content">
    <div class="tab-pane active" id="all">
      <div class="table-design">
        <table id="all-customer-table22" class="table dt-responsive nowrap" style="width:100%">
          <thead>
            <tr>
              <th>Name #</th>
              <th>Email</th>
              <th>Jobs</th>
              <th>Last Job</th>
              <th>City</th>
              <th>State</th>
              <th>Join date</th>
              <th>Total Spend</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)

              <tr>
                <td class="name"><a href="{{ route('admin.customer.show', $user->id) }}">{{$user->first_name}} {{$user->last_name}}</a></td>
                <td>{{$user->email}}</td>
                <td>{{$user->orders_count}}</td>
                @if($user->order_lastdate)
                <td>{{date("m/d/Y", strtotime($user->order_lastdate))}}</td>
                @else
                <td></td>
                @endif
                <td>{{@$user->UserDetails->city}}</td>
                <td>{{@$user->UserDetails->State->code}}</td>
                <!-- <td>USA</td> -->
                <td>{{ date("m/d/Y", strtotime($user->created_at))}}</td>
                <td>${{$user->total_sum}}</td>
                <td class="status">
                  @if( $user->status == 1)
                  <button type="button" class="btn btn-success" wire:click="confirmStatus({{$user->id}})" value="0">Active</button>
                  @else
                  <button type="button" class="btn btn-danger" wire:click="confirmStatus({{$user->id}})" value="1">Inactive</button>
                  @endif
                </td>
              </tr>
          
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/litepicker.js"></script>

    <script>
    new Litepicker({
        element: document.getElementById('all-time1'),
        singleMode: false,
        allowRepick: true,
        numberOfMonths: 2,
        numberOfColumns: 2,
        setup: (picker) => {
            picker.on('selected', (date1, date2) => { 
              
                @this.set('dateStart', formatDate(date1.dateInstance));
                @this.set('dateEnd', formatDate(date2.dateInstance))
            });
        },

    });

     function formatDate(dateInstance) {
            let year = dateInstance.getFullYear();
            let month = dateInstance.getMonth() + 1; // adding 1 because getMonth returns month from range 0 to 11
            let day = dateInstance.getDate();
            let date = `${year}-${month}-${day}`;
            return date;
        }
</script>
</div>