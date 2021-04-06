<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Stripe Charge</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

        <style type="text/css">
            .float-right{
                float:right;
            }
            .logout-btn{
                padding: 0px 5px 0px 0px;
            }
        </style>

        @yield('styles')      
       
    </head>
    <body class="antialiased">
        <div class="text-center"><h1>Laravel - Stripe</h1></div>
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline float-right">Dashboard</a>
                         <form method="POST" action="{{ route('logout') }}" class="text-sm">
                            @csrf                          
                          
                                <button type="submit" class="btn btn-default text-gray-700 underline float-right logout-btn">
                                    Logout
                                </button>
                         
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline float-right">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline float-right">Register&nbsp;</a>
                        @endif
                    @endauth
                </div>            
            @endif
            <div class="container">
               @yield('body-content')
           </div>
            @yield('scripts')
    </body>
</html>
