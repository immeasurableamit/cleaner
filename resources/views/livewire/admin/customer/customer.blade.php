<div>
<table id="all-customer-table" class="table dt-responsive nowrap" style="width:100%">
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
                  <td>{{$user->UserDetails->city}}</td>
                  <td>{{$user->UserDetails->State->code}}</td>
                  <!-- <td>USA</td> -->
                  <td>2/14/22</td>
                  <td>$2,555</td>
                  <td class="status">
                    <span class="active">Active</span>
                  </td>
              </tr>
                
                  @endforeach
           
          </tbody>
        </table>
         
</div>


