@extends('layouts.app')
@section('content')
<section class="light-banner customer-account-page" style="background-image: url('../assets/images/white-pattern.png')">
    <div class="container">
        <div class="profile_page_section">
            

            @livewire('home.profile', ['cleanerId'=>request()->id])

            



        </div>
    </div>
</section>
@endsection