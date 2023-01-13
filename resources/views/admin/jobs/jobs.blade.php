@extends('layouts.adminapp')
@section('content')
   <section class="table-layout-sec jobs">
    <div class="add-job-flex">
    <div class="white-bg-wrapper">
    <div class="table-header-wrapper">
    <div class="table-tabs-wrap">
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" data-bs-toggle="tab" href="#all">All <span class="data-span"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#scheduled">Scheduled <span class="data-span"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#completed">Completed <span class="data-span"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#canceled">Canceled <span class="data-span"></span></a>
      </li>
    </ul>
    </div>
  <!--   <div class="table-right-block">
      <button id="all-time" class="all-time-btn">All Time</button>
    </div> -->
    </div>
    <!-- Tab panes -->
    <div class="tab-content">
      <div class="tab-pane active" id="all">
        <div class="table-design">
            @livewire('admin.jobs.jobs')
          </div>
      </div>
    <div class="tab-pane fade" id="scheduled">
        <div class="table-design">
            @livewire('admin.jobs.scheduled')
          </div>
      </div>
      <div class="tab-pane fade" id="completed">
        <div class="table-design">
           @livewire('admin.jobs.completed')
          </div>
      </div> 
      <div class="tab-pane fade" id="canceled">
        <div class="table-design">
           @livewire('admin.jobs.canceled')
          </div>
      </div>
    </div>
    </div>
    <!-- <div class="add-job-btn">
      <a href="#">Add Job <i class="fas fa-plus"></i></a>
    </div> -->
    </div>
   </section>
   @endsection
 