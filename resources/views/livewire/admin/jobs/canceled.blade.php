<div>
      <div class="table-right-block">
      <button id="all-time4" class="all-time-btn">All Time</button>
    </div>
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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td class="job-number">{{$order->id}}</td>
                    <td>{{ date("d/m/Y", strtotime($order->cleaning_datetime))}}</td>
                    <td><span class="canceled">{{$order->statusForAdmin()}}</span></td>
                    <td>{{$order->total}}</td>
                    <td>One time</td>
                    <td>Deep Clean</td>
                    <td><span class="name cleaner">{{$order->cleaner->first_name}} {{$order->cleaner->last_name}}</span></td>
                    <td><span class="name customer">{{$order->user->first_name}} {{$order->user->last_name}}</span></td>
                     <td class="action-btns">
                    <a class="rechedule-btn" href="{{ route('admin.jobs.view', $order->id) }}">View</a>
                  </td>
                </tr>
                @endforeach              
            </tbody>
          </table>
          <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/litepicker.js"></script>

    <script>
    new Litepicker({
        element: document.getElementById('all-time4'),
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