@extends('layouts.adminapp')
@section('content')
<section class="table-layout-sec jobs">
  <div class="white-bg-wrapper">
    
    @livewire('admin.jobs.jobs')
    
  </div>
</section>
@endsection