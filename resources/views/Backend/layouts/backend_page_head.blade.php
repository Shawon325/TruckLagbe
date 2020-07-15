<div class="page-header">
    <div class="page-title">
        <h3><b>@yield('head')</b></h3>
    </div>
</div>

<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li><a href="/">@yield('head_name')</a></li>
        <li class="active">@yield('sub_name')</li>
    </ul>

    <div class="visible-xs breadcrumb-toggle">
        <a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
    </div>
</div>
