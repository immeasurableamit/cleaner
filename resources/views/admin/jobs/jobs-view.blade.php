@extends('layouts.adminapp')
@section('content')

   <section class="table-layout-sec jobs">
      <div class="white-bg-wrapper">
         <div class="account-info-blocks">
            <div class="row">
             @livewire('admin.jobs.view.jobs-info', ["order_id" => $id])
            </div>
         </div>
        
      </div>
   </section>

@endsection