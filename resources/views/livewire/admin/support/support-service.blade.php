<div>
    <style>
        nav svg {
            max-height: 20px;
        }
            .pagi_links .flex.justify-between.flex-1.sm\:hidden {
        display: none;
    }
    .pagi_links span.relative.z-0.inline-flex.rounded-md.shadow-sm button {
        width: 38px;
        height: 40px;
}
    </style>
    <div class="col-md-4">
        <input type="text" class="form-control" placeholder="Search..." wire:model="searchRecord" />
    </div>
    <br>
    <table id="all-customer-table22" class="table dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Name #</th>
                <th>Email</th>
                <th>Order Id</th>
                <th>Issue</th>
                <th>Request Resolution</th>
                <th>Description</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

            @foreach ($supportServices as $supportService)
            <tr>
                <td> {{@$supportService->order->user->name }} </td>
                <td> {{ @$supportService->order->user->email }}</td>
                <td> {{ @$supportService->order_id }} </td>
                <td> {{ @$supportService->issue }} </td>
                <td> {{ @$supportService->requested_resolution }} </td>
                <td> {{ @$supportService->description }} </td>

                <td class="status">
                    @if (@$supportService->status == 1)
                    <button type="button" class="btn btn-success" wire:click="confirmStatus({{ $supportService->id }})" value="0">Open</button>
                    @else
                    <button type="button" class="btn btn-danger" wire:click="confirmStatus({{ $supportService->id }})" value="1">Closed</button>
                    @endif
                </td>

                <td class="del" wire:key="{{@$supportService->id}}">
                    <button type="button" class="btn btn-danger" wire:click="deleteConfirm({{ $supportService->id }})">Delete</button>
                </td>

            </tr>
            @endforeach

        </tbody>
    </table>
 
 <div class="pagi_links">
   {{$supportServices->links()}}
   </div> 
</div>