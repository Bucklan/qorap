<div>
    <!DOCTYPE html>
    <html class="no-js" lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Nest - Multipurpose eCommerce HTML Template</title>
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta property="og:title" content="" />
        <meta property="og:type" content="" />
        <meta property="og:url" content="" />
        <meta property="og:image" content="" />
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('favicon.ico')}}" />
        <!-- Template CSS -->
        @include('elements.css')
    </head>

    <body>

    @include('elements.navbar')
@yield('content')
    <!-- Vendor JS-->
    @include('elements.javascript')
    </body>

    </html>
</div>