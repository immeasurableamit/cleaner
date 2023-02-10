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
    <div class="col-md-4 search_input3">
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

                <td><a href="{{ route('admin.jobs.view', $supportService->order_id) }}">{{ @$supportService->order_id }}</a></td>
                
                <td> {{ @$supportService->issue }} </td>
                <td> {{ @$supportService->requested_resolution }} </td>
                <td><a type="button" class="text-success" wire:click="edit({{$supportService->id}})">{{ str_limit(@$supportService->description, 25) }}</a></td>
                <td class="status">
                    @if (@$supportService->status == 0)
                    <a type="button" class="text-success" wire:click="confirmStatus({{ $supportService->id }})" value="0">Open</a>
                    @else
                    <a type="button" class="text-danger" wire:click="confirmStatus({{ $supportService->id }})" value="1">Closed</a>
                    @endif
                </td>
 
                <td class="del" wire:key="{{@$supportService->id}}">
                    <a type="button" class="text-danger" wire:click="deleteConfirm({{ $supportService->id }})">Delete</a>
                </td>

            </tr>
            @endforeach

        </tbody>
    </table>
 
 <div class="pagi_links">
   {{$supportServices->links()}}
   </div> 


   <!-- Modal -->
<div wire:ignore.self class="modal fade show in" id="serviceForm" tabindex="-1" role="dialog" aria-labelledby="serviceForm" aria-hidden="true">
        <div class="modal-dialog modal_style">
            <div class="modal-content">
            <button type="button" class="btn btn_close close serviceFormClose"><span aria-hidden="true">×</span></button>
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea wire:model="description" readonly  style="height: 300px;" ></textarea>
                    </div>
                <div class="text-center pt-3">
                    <button type="submit" class="btn_blue serviceFormClose" wire:loading.attr="disabled">Close
                    </button>
                </div>
            </div>
        </div>
    </div>



 <!-- Accept Modal Close Here-->
   @push('scripts') 
   <script>
      $(document).ready(function() {
        window.livewire.on('serviceFormClose', () => {
          $('#serviceForm').modal('hide');
        });
        window.livewire.on('serviceForm', () => {
          $('#serviceForm').modal('show');
        });
      });
      $(document).on('click', '.serviceForm', function(e) {
        $('#serviceForm').modal('show');
      });
      $(document).on('click', '.serviceFormClose', function(e) {
        $('#serviceForm').modal('hide');
      });
   </script> 
   @endpush
</div>