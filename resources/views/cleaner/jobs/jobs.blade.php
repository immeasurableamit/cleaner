@extends('layouts.cleanerapp')

@section('content')

<section class="light-banner customer-account-page"
      style="background-image: url('/assets/images/white-pattern.png')">
      <div class="container">
        <div class="customer-white-wrapper">
          <div class="row no-mrg">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 no-padd">
              <div class="blue-bg-wrapper bar_left">
                <div class="blue-bg-heading">
                  <h4>Settings</h4>
                </div>
                @include('layouts.common.sidebar')
                <div class="blue-logo-block text-center max-width-100">
                  <a href="{{ route('index') }}"><img src="{{asset('/assets/images/logo/logo.svg')}}"></a>
                </div>
             </div>
            </div>

            @livewire ('cleaner.jobs')

          </div>
        </div>
      </div>
    </section>

  @push ('scripts')
 {{--
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var calendarEl = document.getElementById('calendar');

      var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
          left: 'prev,next,today',
          center: 'title',
          right: ''
        },
        initialDate: '2020-09-12',
        navLinks: false, // can click day/week names to navigate views
        editable: true,
        dayMaxEvents: true, // allow "more" link when too many events
        events: [
          {
            title: 'All Day Event',
            start: '2020-09-01'
          },
          {
            title: 'Long Event',
            start: '2020-09-07',
            end: '2020-09-10'
          },
          {
            groupId: 999,
            title: 'Repeating Event',
            start: '2020-09-09T16:00:00'
          },
          {
            groupId: 999,
            title: 'Repeating Event',
            start: '2020-09-16T16:00:00'
          },
          {
            title: 'Conference',
            start: '2020-09-11',
            end: '2020-09-13'
          },
          {
            title: 'Meeting',
            start: '2020-09-12T10:30:00',
            end: '2020-09-12T12:30:00'
          },
          {
            title: 'Lunch',
            start: '2020-09-12T12:00:00'
          },
          {
            title: 'Meeting',
            start: '2020-09-12T14:30:00'
          },
          {
            title: 'Happy Hour',
            start: '2020-09-12T17:30:00'
          },
          {
            title: 'Dinner',
            start: '2020-09-12T20:00:00'
          },
          {
            title: 'Birthday Party',
            start: '2020-09-13T07:00:00'
          },
          {
            title: 'Click for Google',
            url: 'http://google.com/',
            start: '2020-09-28'
          }
        ]
      });

      window.calendar = calendar;

      calendar.render();
    });
  </script>
  <script>

    $(document).ready(function(){
      $(".toggle_row").click(function(){
        $(this).toggleClass("show_row arrow",1000);
      });
    });
    </script>
    <script>
      $(document).ready(function(){
        $(".toggle_menu").click(function(){
          $(".bar_left").toggleClass("show");
        });
      });
      </script>
       <script>
        $(document).ready(function(){
          $(".toggle_r").click(function(){
            $(this).toggleClass("show");
            $(this).parent(".togler_row").toggleClass('show');
          });
        });
        </script>
  --}}
  @endpush
@endsection
