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
     <!--  <div class="table-right-block">
      <button id="all-time1" class="all-time-btn">All Time</button>
    </div> -->
      <!-- <div class="dropdown">
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
        <table id="all-cleaner-table22" class="table dt-responsive nowrap" style="width:100%">
          <thead>
            <tr>
              <th>Team Name</th>
              <th>Main Cleaner</th>
              <th>Email</th>
              <th>Jobs</th>
              <th>Last Job</th>
              <th>City</th>
              <th>State</th>
              <th>Country</th>
              <th>Paid Out</th>
              <th>Status</th>
              
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
            <tr>
              @if($user)
              <td class="name"><a href="{{ route('admin.cleaner.team', $user->id) }}">{{$user->first_name}} {{$user->last_name}}</a></td>
              @else
              <td></td>
              @endif
              <td class="name"><a href="{{ route('admin.cleaner.show', $user->id) }}">{{$user->first_name}} {{$user->last_name}}</a></td>
              <td>{{$user->email}}</td>
              <td>{{$user->orders_count}}</td>
              @if($user->order_lastdate)
              <td>{{date("m/d/Y", strtotime($user->order_lastdate))}}</td>
              @else
              <td></td>
              @endif
              @if($user->UserDetails)
              <td>{{$user->UserDetails->city}}</td>
              @else
              <td></td>
              @endif
              @if($user->UserDetails)
              <td>{{$user->UserDetails->State->code}}</td>
              @else
              <td></td>
              @endif
              <td>USA</td>
              <td>$182,695</td>
              <!-- <td><a href="">o0k</a></td> -->
              <td class="status">
                @if( $user->status == 1)
                <a type="button" class="text-success" wire:click="confirmStatus({{$user->id}})" value="0">Active</a>
                @else
                <a type="button" class="text-danger" wire:click="confirmStatus({{$user->id}})" value="1">Inactive</a>
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>