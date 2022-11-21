<div>

    <button type="button" class="btn btn-success addService">Add Service</button>

    @foreach($services as $service)
    <table id="all-cleaner-table22" class="table dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Title</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$service->title}}</td>
                <td>{{ $service->status=='1'?'Active':'In-active' }}</td>
                <td class="status">
                    <button type="button" class="btn btn-success" wire:click="edit({{$service->id}})">Edit</button>

                    <button type="button" class="btn btn-success" wire:click="deleteService({{$service->id}})">Delete</button>

                    <button type="button" class="btn btn-success" wire:click="storeServiceItem({{$service->id}})">Add Items</button>
                </td>
            </tr>


            @if(@count($service->items)>0)
            <table id="all-cleaner-table22" class="table dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Duration</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($service->items as $item)
                    <tr>
                        <td>{{$item->title}}</td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->duration}}</td>
                        <td>{{$item->description}}</td>
                        <td>{{ $item->status=='1'?'Active':'In-active' }}</td>
                        <td class="status">
                            <button type="button" class="btn btn-success" wire:click="editItem({{$item->id}})">Edit</button>

                            <button type="button" class="btn btn-success" wire:click="deleteItem({{$item->id}})">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif

        </tbody>
    </table>
    @endforeach



    <div wire:ignore.self class="modal fade show in" id="serviceForm" tabindex="-1" role="dialog" aria-labelledby="serviceForm" aria-hidden="true">
        <div class="modal-dialog modal_style">
        <button type="button" class="btn btn-default serviceFormClose"><span aria-hidden="true">×</span></button>
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">@if(!empty($serviceId)) Edit @else Add @endif Service</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" wire:model="title" class="form-control">
                        {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label>Status</label></br>
                        <label class="container_radio">
                            <input type="radio" name="status" value="1" wire:model="status"> Active
                        </label>
                        <label class="container_radio">
                            <input type="radio" name="status" value="0" wire:model="status"> In-active
                        </label>
                        {!! $errors->first('status', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="text-center mb-3">  
                
                    <button type="submit" class="btn_s" wire:click="store" wire:loading.attr="disabled">
                        {{--<i wire:loading wire:target="store" class="fa fa-spin fa-spinner"></i>--}} Save
                    </button>
                </div>
            </div>
        </div>
    </div>




    <div wire:ignore.self class="modal fade show in" id="serviceItemsForm" tabindex="-1" role="dialog" aria-labelledby="serviceItemsForm" aria-hidden="true">
        <div class="modal-dialog modal_style">
        <button type="button" class="btn btn-default serviceFormClose"><span aria-hidden="true">×</span></button>
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">@if(!empty($serviceId)) Edit @else Add @endif Service Items</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" wire:model="itemTitle" class="form-control">
                        {!! $errors->first('itemTitle', '<span class="help-block">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" wire:model="itemPrice" class="form-control">
                        {!! $errors->first('itemPrice', '<span class="help-block">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label>Duration</label>
                        <input type="text" wire:model="itemDuration" class="form-control">
                        {!! $errors->first('itemDuration', '<span class="help-block">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" wire:model="itemDescription" class="form-control">
                        {!! $errors->first('itemDescription', '<span class="help-block">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label>Status</label></br>
                        <label class="container_radio">
                            <input type="radio" name="itemStatus" value="1" wire:model="itemStatus"> Active
                        </label>
                        <label class="container_radio">
                            <input type="radio" name="itemStatus" value="0" wire:model="itemStatus"> In-active
                        </label>
                        {!! $errors->first('itemStatus', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="text-center mb-3">  
                
                    <button type="submit" class="btn_s" wire:click="storeItem" wire:loading.attr="disabled">
                        {{--<i wire:loading wire:target="storeItem" class="fa fa-spin fa-spinner"></i>--}} Save
                    </button>
                </div>
            </div>
        </div>
    </div>



    @push('scripts')
    <script>
        $(document).ready(function () {
            window.livewire.on('serviceForm', () => {
                $('#serviceForm').modal('show');
            });
            window.livewire.on('serviceFormClose', () => {
                $('#serviceForm').modal('hide');
            });

            window.livewire.on('serviceItemsForm', () => {
                $('#serviceItemsForm').modal('show');
            });
            window.livewire.on('serviceItemsFormClose', () => {
                $('#serviceItemsForm').modal('hide');
            });
        });
        
        
        $(document).on('click', '.addService', function (e) {
            $('#serviceForm').modal('show');
        });
        $(document).on('click', '.serviceFormClose', function (e) {
            $('#serviceForm').modal('hide');
        });

    </script>
    @endpush

</div>