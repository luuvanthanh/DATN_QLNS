<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Home Page')</title>
    @include('layouts.css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">
    @include('layouts.navbar')

    @include('layouts.sidebar')

<div class="content-wrapper">

    @include('layouts.header')

    @include('layouts.navbar')

    @include('layouts.menu')

    <section class="content">
        <div class="container-fluid">
          @yield('content')
        </div>
      </section>
</div>
    @include('layouts.footer')
</div>
    @include('layouts.js')
</body>
</html>