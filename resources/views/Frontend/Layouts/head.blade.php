<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>TruckLagbe</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">
    @include('Frontend.Layouts.frontend_css')
</head>

<body>
@include('Frontend.Layouts.top_bar')
<header id="header">
    @include('Frontend.Layouts.nav')
</header><!-- End Header -->
@include('Frontend.pages.slider')
<main id="main">
    @include('Frontend.pages.about')
    @include('Frontend.pages.post')
    @include('Frontend.pages.client')
{{--    @include('Frontend.pages.service')--}}
{{--    @include('Frontend.pages.portfolio')--}}
{{--    @include('Frontend.pages.team')--}}
{{--    @include('Frontend.pages.contact')--}}
</main><!-- End #main -->
@include('Frontend.Layouts.footer')
<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
@include('Frontend.Layouts.frontend_js')
</body>
</html>
