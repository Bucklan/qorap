<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>
        Nest
        Dashboard</title>
    <meta http-equiv="x-ua-compatible"
          content="ie=edge"/>
    <meta name="description"
          content=""/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1"/>
    <meta property="og:title"
          content=""/>
    <meta property="og:type"
          content=""/>
    <meta property="og:url"
          content=""/>
    <meta property="og:image"
          content=""/>
    <link rel="shortcut icon"
          type="image/x-icon"
          href="{{asset('assets-back/imgs/theme/favicon.svg')}}"/>
    <link href="{{asset('assets-back/css/main.css?v=1.1')}}"
          rel="stylesheet"
          type="text/css"/>
</head>

<body>
@auth
    {{--@include('livewire.admin.navbar')--}}
    {{--@include('livewire.admin.navbar')--}}
    {{--@include('livewire.admin.navbar')--}}
    {{--@include('livewire.admin.navbar')--}}
    @include('livewire.backend.elements.aside')
    <main class="main-wrap">
        @include('livewire.backend.elements.header')
        <section
                class="content-main">
            {{$slot}}
        </section>
        @include('livewire.backend.elements.footer')
    </main>
@else
    {{$slot}}
@endauth

<script src="{{asset('assets-back/js/vendors/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets-back/js/vendors/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets-back/js/vendors/select2.min.js')}}"></script>
<script src="{{asset('assets-back/js/vendors/perfect-scrollbar.js')}}"></script>
<script src="{{asset('assets-back/js/vendors/jquery.fullscreen.min.js')}}"></script>
<script src="{{asset('assets-back/js/vendors/chart.js')}}"></script>
<script src="{{asset('assets-back/js/main.js?v=1.1')}}"
        type="text/javascript"></script>
<script src="{{asset('assets-back/js/custom-chart.js')}}"
        type="text/javascript"></script>
</body>
</html>
