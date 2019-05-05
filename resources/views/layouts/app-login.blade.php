<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
{{-- <html> --}}
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Description" content="Author: Aditya Sudyana,
    Imam Satya Wedhatama">  
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preload" as="image" href="MystrileV1_1.png" width="40px" height="40px" alt="" srcset=""> 
    <link rel="preload" href="{{ asset('css/app.css') }}" as="style">
    <link rel="preload" href="{{ asset('js/app.js') }}" as="script">
    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title> Mystrile </title>
    <link rel="shortcut icon" href="{{ asset('MystrileV1_1.png') }}">
    
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
       
       
            <template>
                @yield('content')
            </template>
     
        
        {{-- <main class="py-4">
           
            @yield('content')
        </main> --}}

        {{-- <footer-c></footer-c> --}}
    </div>

    <script  type="text/javascript"  src="{{ asset('js/app.js') }}" ></script>
    {{-- <script src="/js/app.js"></script> --}}
    {{-- <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script> --}}
</body>
</html>
