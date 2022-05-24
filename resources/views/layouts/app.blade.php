<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Collativum</title>


  <link href="{{ mix('css/app.css') }}" rel="stylesheet"
    data-turbo-track="true">
  <script defer src="{{ mix('js/app.js') }}"></script>

  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"
    data-turbolinks-track="true" />


</head>

<body class="bg-base-200">
  @yield('content')
</body>

</html>
