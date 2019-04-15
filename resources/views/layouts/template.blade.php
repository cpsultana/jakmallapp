<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <title>{{config('app.name', 'JakMallApp')}} - {{$title}}</title>
    </head>
    <body>
        @include('inc.navbar')
        <div class="container">
            @include('inc.messages')
            <h1>{{$title}}</h1>
            @yield('content')
        </div>
    </body>
</html>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="/jakmallapp/public/">{{config('app.name', 'JakMallApp')}}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/jakmallapp/public/order_history">Unpaid Order</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="/jakmallapp/public/">Topup Balance</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="/jakmallapp/public/product/">Product Page</a>
                        </li>
                    </ul>
        </div>
    </nav>
