<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    {{-- Icon-fmpf  --}}
    <link rel="icon" href="storage/img/fmpf.png">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body{
            background-color: #343a40 !important;
        }
        .radius-border{
            border-radius: 50px !important;
            opacity: 80%;
        }
        .center-image{
            margin-left: 0%;
        }
        .space{
            padding: 20px;
        }
        .set-space{
            margin-left: 40%;
            padding-top: 10px;
            padding-bottom: 10px;
            padding-left: 40px;
            padding-right: 40px;
            /* background-color: aqua !important; */
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div id="app">
        <div class="container-fluid bg-primary ">
            <div class="container bg-primary ">
                 <span class="row align-items-center text-center">
                     <a href="http://www.usmba.ac.ma">
        <h5 class="text-warning text-uppercase">  جــــــــــامــــــعـــــة ســــــيـــدي مـــــحمـــــــــد بـــن عــــبد اللـــــه بــفـــاس
            <br>ⵜⴰⵙⴷⴰⵡⵉⵜ ⵏ ⵜⵙⵏⵉⵊⵊⵉⵜ ⴷ ⵜⵙⴰⵙⴳⵔⵜ                                    
            <br>Faculté de Médicine et de Pharmacie de Fès 
                                               
        </h5></a>
                    <p class="space">        </p>   
                 <a href="http://www.usmba.ac.ma">
                     <img src="storage/img/usmba.png" width="100" height="100" class="img-fluid center-image " >
                    </a>
                    
                    <a href="http://ww2.fmp-usmba.ac.ma">
                        <img src="storage/img/fmpf.png" width="100" height="100" class="img-fluid center-image" >
                       </a>
                       <p class="space">        </p>
                    <a href="http://ww2.fmp-usmba.ac.ma">
                        <h5 class="text-warning text-uppercase">  كــــــلـــية الـــــــــــطـب و الــــــــــــــصيـــــــــدلــــــــة فــــــــــاس    
                            <br>ⵜⴰⵙⴷⴰⵡⵉⵜ   ⵙⵉⴷⵉ  ⵎⵓⵃⵎⵎⴰⴷ  ⴱⵏ   ⵄⴱⴷⵍⵍⴰⵀ  ⵏ   ⴼⴰⵙ                                   
                            <br>Université sidi Mohamed ben Abdellah
                                                               
                        </h5></a>
                </span>
            </div>
        </div>
        <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand text-dark" href="{{ url('/') }}">
                    {{ config('app.name', 'My-e-stages') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                       
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <footer class=" container footer bg-primary radius-border ">
            <!-- Copywrite Area -->
            <div class="card-footer">
                <div class="container">
                    <div class="row text-center ">
                        <!-- Copywrite Text -->
                        <div class="col-12 col-sm-12">
                                <h5>
                                    Copyright &copy;
                                    <script>document.write(new Date().getFullYear());</script>
                                     All rights reserved 
                                </h5>
                                 <a class="btn-link text-danger" href="http://ww2.fmp-usmba.ac.ma">FMPF</a>
                             </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
