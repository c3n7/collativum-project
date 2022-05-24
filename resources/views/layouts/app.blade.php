<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Collativum</title>


  <link href="{{ mix('css/app.css') }}" rel="stylesheet"
    data-turbo-track="true">
  <script defer src="{{ mix('js/app.js') }}"></script>


</head>

<body class="bg-base-200">
  @yield('content')
</body>

</html>
