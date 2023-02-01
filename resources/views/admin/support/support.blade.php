@extends('layouts.adminapp')
@section('content')
  <section class="table-layout-sec jobs">
    <div class="white-bg-wrapper mt-3">
    <!-- Tab panes -->
    <div class="tab-content">
      <div class="tab-pane active" id="all">
        <div class="table-design">
   @livewire('admin.support.contact-service')
     </div>
      </div>
   
    </div>
    </div>
   </section>
 

  
 @endsection
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('assets/js/mdb.min.js') }}"></script>
<x-livewire-alert::scripts />