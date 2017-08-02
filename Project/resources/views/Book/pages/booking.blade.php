@extends('Book.shared.master')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{asset('slick/slick.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('slick/slick-theme.css')}}"/>

    <link rel="stylesheet" type="text/css" href="{{asset('/css/booking.css')}}">
@endsection
@section('body')
    @include('Book.components.navbar')
    <div class="bg"></div>
    @include('Book.components.slider')
    @include('Book.components.pickroom')
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="{{asset('slick/slick.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.multiple-items').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 3
            });
        });
    </script>
@endsection