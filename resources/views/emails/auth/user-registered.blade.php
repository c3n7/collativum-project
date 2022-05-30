@component('mail::message')
  # {{ config('app.name') }}

  Hello {{ $name }},

  You account for {{ config('app.name') }} has been created successfully. Your
  password is **{{ $password }}**

  @component('mail::button', ['url' => config('app.url')])
    Log In
  @endcomponent

  Regards,<br>
  {{ config('app.name') }}
@endcomponent
