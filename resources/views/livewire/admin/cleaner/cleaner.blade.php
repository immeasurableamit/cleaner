<div>
    <table id="all-cleaner-table" class="table dt-responsive nowrap" style="width:100%">
          <thead>
              <tr>
                  <th>Team Name</th>
                  <th>Main Cleaner</th>
                  <th>Email</th>
                  <th>Jobs</th>
                  <th>Last Job</th>
                  <th>City</th>
                  <th>State</th>
                  <th>Country</th>
                  <th>Paid Out</th>
                  <th>Status</th>
              </tr>
          </thead>
          <tbody>
                   @foreach($users as $user)
            
              <tr>
                  @if($user)
                     <td class="name"><a href="{{ route('admin.cleaner.team', $user->id) }}">{{$user->first_name}} {{$user->last_name}}</a></td>
                   @else
                  <td></td>
                  @endif
              
                  <td class="name"><a href="{{ route('admin.cleaner.show', $user->id) }}" >{{$user->first_name}} {{$user->last_name}}</a></td>
                  <td>{{$user->email}}</td>
                  <td>729</td>
                  <td>3/19/2022</td>
                  @if($user->UserDetails)
                  <td>{{$user->UserDetails->city}}</td>
                  @else
                  <td></td>
                  @endif
                    @if($user->UserDetails)
                  <td>{{$user->UserDetails->State->code}}</td>
                   @else
                  <td></td>
                  @endif
                  <td>USA</td>
                  <td>$182,695</td>
                  <td class="status">
                    <span class="active">Active</span>
                  </td>
              </tr>
              @endforeach
          
          </tbody>
        </table>

</div>


