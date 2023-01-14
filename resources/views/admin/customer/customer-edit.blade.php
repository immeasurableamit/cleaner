@extends('layouts.adminapp')
@section('content')

   <section class="table-layout-sec jobs">
      <div class="white-bg-wrapper">
         <div class="account-info-blocks">
            <div class="row">
               @livewire('admin.customer.customer-update', ["user_id" => $id])
               @livewire('admin.customer.account-history', ["userId" => $id])
            </div>
         </div>
         @livewire('admin.customer.customer-booking', ["userId" => $id])
      </div>
   </section>

@endsection