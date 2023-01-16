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
      <div class="dropdown">
        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
        All <img src="{{ asset('assets/admin/images/icons/all-filter.svg') }}">
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
              <td>12</td>
              <td>2/14/22</td>
              <td>{{@$user->UserDetails->city}}</td>
              <td>{{@$user->UserDetails->State->code}}</td>
              <!-- <td>USA</td> -->
              <td>2/14/22</td>
              <td>$2,555</td>
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
</div>