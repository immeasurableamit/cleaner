<div>
  <div class="table-header-wrapper">
    <div class="table-tabs-wrap">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link{{$tab=='all'?' active':''}}" href="javascript:void(0)" wire:click="setTab('all')">All <span class="data-span">({{$allCount}})</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link{{$tab=='scheduled'?' active':''}}" href="javascript:void(0)" wire:click="setTab('scheduled')">Scheduled <span class="data-span">({{$scheduledCount}})</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link{{$tab=='completed'?' active':''}}" href="javascript:void(0)" wire:click="setTab('completed')">Completed <span class="data-span">({{$completedCount}})</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link{{$tab=='cancelled'?' active':''}}" href="javascript:void(0)" wire:click="setTab('cancelled')">Cancelled <span class="data-span">({{$cancelledCount}})</span></a>
        </li>
      </ul>
    </div>
    <div class="table-right-block">
      <button id="all-time" class="all-time-btn">All Time</button>
    </div>
  </div>
  <!-- Tab panes -->
  <div class="tab-content">
    <div class="tab-pane active">
      <div class="table-design">
        <table id="all-jobs-table" class="table dt-responsive nowrap" style="width:100%">
          <thead>
            <tr>
              <th>#</th>
              <th>Date</th>
              <th>Status</th>
              <th>Amount</th>
              <th>Type</th>
              <th>Service Name</th>
              <th>Customer</th>
            </tr>
          </thead>
          <tbody>
            @foreach($orders as $order)
            <tr>
              <td class="job-number">{{ $order->id }}</td>
              <td>{{ $order->cleaning_datetime }}</td>
              <td><span class="scheduled">{{ $order->statusForAdmin()  }}</span></td>
              <td>${{ $order->total }}</td>
              <td>One time</td>
              <td>Deep Clean</td>
              <td><a href="{{ route('admin.customer.show', $order->user->id) }}" class="name cleaner">{{ $order->name }}</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    
  </div>
</div>