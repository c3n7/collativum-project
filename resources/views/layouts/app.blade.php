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


  @if (session()->has('message'))
    <div class="fixed flex justify-center w-full bottom-5">
      <div class="shadow-lg alert alert-success w-fit transition-all ease-out">
        <div>
          <i class="fa-solid fa-check-circle"></i>
          <span>{{ session('message') }}</span>
        </div>
      </div>
    </div>
  @elseif (session()->has('warning'))
    <div class="w-full fixed bottom-5 flex justify-center">
      <div class="alert alert-warning shadow-lg  w-fit transition-all ease-out">
        <div>
          <i class="fa-solid fa-exclamation-circle"></i>
          <span>{{ session('warning') }}</span>
        </div>
      </div>
    </div>
  @elseif (session()->has('info'))
    <div class="w-full fixed bottom-5 flex justify-center">
      <div class="alert alert-info shadow-lg  w-fit transition-all ease-out">
        <div>
          <i class="fa-solid fa-info-circle"></i>
          <span>{{ session('info') }}</span>
        </div>
      </div>
    </div>
  @elseif (session()->has('error'))
    <div class="fixed flex justify-center w-full bottom-5">
      <div class="shadow-lg alert alert-error w-fit transition-all ease-out">
        <div>
          <i class="fa-solid fa-times-circle"></i>
          <span>{{ session('error') }}</span>
        </div>
      </div>
    </div>
  @endif


</body>

</html>
