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

  <div class="col-md-4 search_input3 ">

        <input type="text" class="form-control" placeholder="Search..." wire:model="searchRecord" />
    </div><br>
<table id="all-customer-table22" class="table dt-responsive nowrap" style="width:100%">
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
                  <td><a href="javascript::void(0)" wire:click="confirmStatus({{ $contact->id }})">Open</a></td>
                  @else
                  <td>Closed</td>
                  @endif
                  <td><a href="javascript::void(0)" wire:click="deleteConfirm({{ $contact->id }})">Delete</a></td>
              </tr>
                 @endforeach

          </tbody>
        </table>
       <div class="pagi_links">
   {{$contacts->links()}}
   </div>
   



</div>
