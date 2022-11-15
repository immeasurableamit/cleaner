@extends('layouts.adminapp')
@section('content')
   <section class="table-layout-sec jobs">
      <div class="white-bg-wrapper">
         <div class="account-info-blocks">
            <div class="row">
               @livewire('admin.cleaner.cleaner-account', ["user_id" => $id])
               @livewire('admin.cleaner.cleaner-history')
            </div>
         </div>
         @livewire('admin.cleaner.cleaner-booking')
      </div>
   </section>
@endsection