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
        <div class="header-search search_input2">
            <input type="search" placeholder="Search here..." id="search" wire:model="searchResult">
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
                  <th>Action</th>
                  <th></th>
              </tr>
          </thead>
          <tbody>
            @if(count($orders))
             @foreach($orders as $order)
              <tr>
                  <td class="job-number">{{$order->id}}</td>
                  <td>{{ date("m/d/Y", strtotime($order->cleaning_datetime))}}</td>
                  <td><span class="scheduled">{{$order->statusForAdmin()}}</span></td>
                  <td>${{$order->total}}</td>
                  <td>{{$order->title2}}</td>
                  <td>{{$order->title}}</td>
                 
                  <td><span class="name cleaner">{{$order->cleaner->first_name}} {{$order->cleaner->last_name}}</span></td>
                 
                
                  <td><span class="name customer">{{$order->user->first_name}} {{$order->user->last_name}}</span></td>
                  <td class="action-btns">
                    <a class="rechedule-btn" href="{{ route('admin.jobs.view', $order->id) }}">View</a>
                  </td>
                 <!--  <td class="action-btns">
                    <a class="cancel-btn" role="button">Cancel</a>
                    <a class="rechedule-btn" role="button">Reschedule</a>
                  </td> -->
              </tr>
             @endforeach
             @endif
          </tbody>
        </table>
               <!--  -->
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/litepicker.js"></script>

    <script>
    new Litepicker({
        element: document.getElementById('all-time'),
        singleMode: false,
        allowRepick: true,
        numberOfMonths: 2,
        numberOfColumns: 2,
        setup: (picker) => {
            picker.on('selected', (date1, date2) => { 
                // console.log(date1.toLocaleString())
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