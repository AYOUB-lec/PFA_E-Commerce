@extends('layouts.landingApp')
@section('landingPage')
<div class="main" >
    <img src="{{asset('images/cover.jpg')}}" alt="">
</div>
<div class="floating-content">
    <div class="first">
        <span>STAY  </span>
        {{-- <img src=" {{asset('images/logo.png')}}" alt=""> --}}
        <span>FIT</span>
    </div>
    <div class="second">
        <span>GYM AND FITNESS</span>
    </div>
    <div class="third">
        <span>ACHIEVE GREATNESS NOW</span>
    </div>
    <div class="forth">
        <button > <a style="text-decoration:none;color:azure;" href="{{ route('home') }}"> EXPLORE</a></button>
    </div>
</div>
{{-- About section --}}
{{-- image already in folder --}}
{{-- think of design first --}}
@endsection

