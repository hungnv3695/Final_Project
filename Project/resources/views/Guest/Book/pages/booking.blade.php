@extends('Guest.Book.shared.master')
@section('head')
	<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset( '/plugins/bootstrap-3.3.7-dist/css/bootstrap.min.css' )   }}">
	<link rel="stylesheet" type="text/css" href="{{asset('/plugins/font-awesome-4.7.0/css/font-awesome.min.css' ) }}">
	<link rel="stylesheet" type="text/css" href="{{asset('/plugins/animate/animate.css')}}">
	<link rel="stylesheet" type="text/css" href=" {!! asset('css/index.css') !!}">
	<script type="text/javascript" src="{{ asset('/plugins/jquery/jquery-3.2.1.min.js') }}"></script>
	<script type="text/javascript" src="{{asset( '/plugins/bootstrap-3.3.7-dist/js/bootstrap.min.js' )}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('slick/slick.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('slick/slick-theme.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/css/booking.css')}}">

@endsection
@section('body')
    @include('Guest.Book.components.navbar')
    <div class="bg"></div>
    @include('Guest.Book.components.slider')
    @include('Guest.Book.components.pickroom')
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="{{asset('slick/slick.min.js')}}"></script>

    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('datetimepicker-master/jquery.datetimepicker.css')}}" />
    <script type="text/ecmascript" src="{{asset('datetimepicker-master/jquery.datetimepicker.min.js')}}"></script>

    <script type="text/ecmascript" src="{{asset('datetimepicker-master/build/jquery.datetimepicker.full.min.js')}}"></script>
    <script src="{{asset('Scripts/BookOnline/BookOnline.js')}}"></script>

@endsection

<script type="text/javascript">


</script>