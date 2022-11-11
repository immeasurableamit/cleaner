@extends('layouts.adminapp')
@section('content')
 
   @livewire('admin.support.contact-service')
  
 @endsection
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('assets/js/mdb.min.js') }}"></script>
<x-livewire-alert::scripts />