<div>
  <table id="all-cleaner-table22" class="table dt-responsive nowrap" style="width:100%">
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
        <td class="name"><a href="{{ route('admin.cleaner.show', $user->id) }}">{{$user->first_name}} {{$user->last_name}}</a></td>
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
        <td>$182,695dsffsd</td>
        <!-- <td><a href="">o0k</a></td> -->
        <td class="status">
          @if( $user->status == 1)
          <button type="button" class="btn btn-success" wire:click="confirmStatus({{$user->id}})" value="0">Active</button>
          @else
          <button type="button" class="btn btn-danger" wire:click="confirmStatus({{$user->id}})" value="1">Inactive</button>
          @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>