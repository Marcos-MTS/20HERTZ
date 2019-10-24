<!doctype html>
<html lang="pt-br">


    <head>
        <title>@yield('title')</title>
        <meta name="description" content="Our first page">
        <meta name="keywords" content="html tutorial template">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <div class="container" >
            @yield('content')
        </div>
    </body>
</html>