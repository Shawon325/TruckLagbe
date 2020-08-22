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
@yield('main_content')

@include('Frontend.Layouts.footer')
<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
@include('Frontend.Layouts.frontend_js')
</body>
</html>
