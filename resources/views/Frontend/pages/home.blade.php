@extends('Frontend.Layouts.head')
@section('main_content')
    @include('Frontend.pages.slider')
    <main id="main">

        @include('Frontend.pages.post')
{{--        @include('Frontend.pages.client')--}}
        @include('Frontend.pages.about')
        {{--    @include('Frontend.pages.service')--}}
        {{--    @include('Frontend.pages.portfolio')--}}
        {{--    @include('Frontend.pages.team')--}}
        {{--    @include('Frontend.pages.contact')--}}
    </main><!-- End #main -->
@endsection
