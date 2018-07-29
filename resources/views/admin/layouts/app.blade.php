<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ ucfirst($setting->name) }}</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/metisMenu/2.7.7/metisMenu.min.css">
    {{-- dropzone css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.0.1/min/dropzone.min.css">
    {{-- icon tab --}}
    <link rel="icon" href="{{ !empty($setting->images()->wherePivot('option', 5)->first()) ? asset($setting->images()->wherePivot('option', 5)->first()->thumbnail->location) : asset('images/icon.png') }}">
    @yield('styles')

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>
<body>
    <div>
        @yield('body')    
    </div>
    
<script src="{{ asset("js/app.js") }}"></script>
<script src="{{ asset("js/Chart.js") }}"></script>
<script src="{{ asset("js/admin.js") }}"></script>
<script src="{{ asset("https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.0.1/min/dropzone.min.js") }}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/metisMenu/2.7.7/metisMenu.min.js"></script>
@yield('script')
</body>
</html>