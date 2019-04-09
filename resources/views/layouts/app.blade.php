<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
{{-- <html> --}}
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title> Mystrile </title>

    <!-- Scripts -->
    
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    
    <!-- Styles -->
    <link type="text/css" rel="stylesheet"  src="{{ asset('css/app.css') }}"  >

    <!-- index.html -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Material+Icons" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/2.0.46/css/materialdesignicons.min.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/weather-icons/2.0.9/css/weather-icons.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/weather-icons/2.0.9/css/weather-icons-wind.min.css" />
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
<link rel="stylesheet" href="https://afeld.github.io/emoji-css/emoji.css" />

</head>
<body>
    
    <div id="app">
       
        <drawer-c>
            <template>
                @yield('content')
            </template>
        </drawer-c>
        
        {{-- <main class="py-4">
           
            @yield('content')
        </main> --}}

        {{-- <footer-c></footer-c> --}}
    </div>

    <script  type="text/javascript"  src="{{ asset('js/app.js') }}" ></script>
    {{-- <script src="/js/app.js"></script> --}}
</body>
</html>
