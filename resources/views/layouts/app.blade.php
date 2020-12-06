<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Burak Turhan">
    <title>Codicians</title>
    @include('app.partials.styles')
</head>
<body>
@include('app.partials.menu')

<div class="main-content" id="panel">
    <!--Header-->
@include('app.partials.topnav')
@include('app.partials.header')

<!-- Page content -->
    <div class="container-fluid mt--6">
        @yield('content')
        @include('app.partials.footer')
    </div>


</div>
@include('app.partials.scripts')
</body>
</html>