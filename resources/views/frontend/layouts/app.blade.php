<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($title) ? $title : 'AmericaKingStones' }}</title>
    <meta name="description"
        content="{{ isset($description) ? $description : 'Retail granite,marble and quartz' }}">
    <meta name="keyword"
        content="{{ isset($keywords) ? $keywords : 'americakingstones' }}">


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
        integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    
        <!-- Styles -->
   @if(parse_url(config('app.url'), PHP_URL_SCHEME) === 'https')
        <link href="{{ secure_asset('css/frontend/app.css') }}" rel="stylesheet">
            <script src="{{ secure_asset('js/frontend/app.js') }}" defer></script>
        @else
        <link href="{{ asset('css/frontend/app.css') }}" rel="stylesheet">
            <script src="{{ asset('js/frontend/app.js') }}" defer></script>
        @endif;
    </head>

<body>
    <div id="app">
        @include('frontend.layouts.nav')

        <div class="container-fluid full-height main-content">
            <div class="row full-height">
                <div class="col-12">
                    @yield('content')
                </div>
            </div>
        </div>

        @include('frontend.layouts.footer')
    </div>
</body>

</html>
