<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ mb_ucfirst(strtolower(config('app.name'))) }}</title>
    <meta charset="utf-8">
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ mix('assets/admin/css/app.css') }}" rel="stylesheet">
</head>
<body>
<noscript>
    <strong>We're sorry but this app doesn't work properly without JavaScript enabled. Please enable it to continue.</strong>
</noscript>
<div id="app"></div>
<script src="{{ mix('assets/admin/js/manifest.js') }}"></script>
<script src="{{ mix('assets/admin/js/vendor.js') }}"></script>
<script src="{{ mix('assets/admin/js/app.js') }}"></script>
</body>
</html>
