<div>
<table id="all-customer-table" class="table dt-responsive nowrap" style="width:100%">
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
                  <td><a href="javascript::void(0)" wire:click.prevent="statusClose({{$contact->id}})">Open</a></td>
                  @else
                  <td><a href="javascript::void(0)">Closed</a></td>
                  @endif
                  <td><a href="javascript::void(0)" wire:click.prevent="destroy({{$contact->id}})">Delete</a></td>
              </tr>
                 @endforeach

          </tbody>
        </table>

</div>
