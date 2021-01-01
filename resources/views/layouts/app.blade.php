<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    

        <title> {{$title ??  $book->title ?? ''}} - bookShelf</title>
        
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/materialdesignicons.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/uikit.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/vue-multiselect.min.css') }}" rel="stylesheet">
        {{-- <script  src="{{ asset('css/uikit-icons.min.js') }}"></script> --}}
        

    </head>
    
    <body style='overflow-x:hidden;'>
        
        @include('includes.navbar')

        <section class="col-12 d-flex mt-4 pr-0">
            @include('includes.leftbar')
            <script src="{{ asset('js/vue.min.js') }}" ></script>
            <script src="{{ asset('js/vee-validate.js')}} "></script>
            <script src="{{ asset('js/vue-multiselect.min.js') }}" ></script>
            <script src="{{ asset('js/axios.min.js') }}" ></script>
            <script src="{{ asset('js/uikit.min.js') }}"></script>
            {{-- <script src="{{ asset('js/jquery.min.js') }}"></script> --}}
            <script>
                window.Laravel ={!! json_encode([
                    'csrfToken' => csrf_token(),
                    'url'       => url('/')
                ])!!};
            </script>
            <script src="{{ asset('js/lodash.min.js') }}"></script>

            @yield('content')
            
        </section>

        @include('includes.footer')

   
    </body>
    
</html>
