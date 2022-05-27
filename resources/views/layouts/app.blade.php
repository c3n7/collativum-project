<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
  data-theme="light">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
  <div class="min-h-screen bg-gray-100">
    @include('layouts.navigation')

    <!-- Page Heading -->
    <header class="bg-white shadow">
      <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        {{ $header }}
      </div>
    </header>

    <!-- Page Content -->
    <main>
      {{ $slot }}
    </main>
  </div>



  @if (session()->has('message'))
    <div class="fixed flex justify-center w-full bottom-5">
      <div class="shadow-lg alert alert-success w-fit transition-all ease-out">
        <div>
          <i class="fa-solid fa-check-circle"></i>
          <span>{{ session('message') }}</span>
        </div>
      </div>
    </div>
  @elseif (session()->has('long-message'))
    <div class="fixed flex justify-center w-full bottom-5">
      <div
        class="shadow-lg alert alert-success w-fit transition-all ease-out ignore">
        <div>
          <i class="fa-solid fa-check-circle"></i>
          <span>{{ session('long-message') }}</span>
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
  @elseif (session()->has('long-warning'))
    <div class="w-full fixed bottom-5 flex justify-center">
      <div
        class="alert alert-warning shadow-lg  w-fit transition-all ease-out ignore">
        <div>
          <i class="fa-solid fa-exclamation-circle"></i>
          <span>{{ session('long-warning') }}</span>
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
