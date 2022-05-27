@extends('layouts.app')

@section('content')
  <div class="w-screen h-screen flex justify-center items-center">
    <div class="w-4/12 bg-base-100 px-4 py-4 pb-6 rounded-lg">
      <div class="text-xl font-bold pt-2 pb-1 px-2">Sign In</div>
      <form class="bg-base-100 px-4 py-4 pb-6 rounded-lg flex flex-wrap"
        action="{{ route('auth.login') }}" method="post">
        @csrf
        <div class="form-control w-full">
          <label class="label">
            <span class="label-text">Email</span>
          </label>
          <input type="text" placeholder="Email" name="email"
            class="input input-bordered w-full" />
          @error('email')
            <label class="label">
              <span class="label-text-alt text-error">{{ $message }}</span>
            </label>
          @enderror
        </div>

        <div class="form-control w-full">
          <label class="label">
            <span class="label-text">Password</span>
          </label>
          <input type="password" placeholder="password" name="password"
            class="input input-bordered w-full" />
          @error('password')
            <label class="label">
              <span class="label-text-alt text-error">{{ $message }}</span>
            </label>
          @enderror
        </div>

        <div class="flex justify-between mt-2 items-center w-full">
          <div class="form-control">
            <label class="label cursor-pointer">
              <input type="checkbox" class="checkbox checkbox-primary" />
              <span class="label-text ml-1 text-opacity-85"> Remember me </span>
            </label>
          </div>

          <a href="{{ route('auth.forgot-password') }}"
            class="text-primary font-semibold text-sm">
            Reset Password?
          </a>
        </div>

        <div class="mt-3 w-full">
          <button class="btn btn-primary w-full">Sign In</button>
        </div>
      </form>
    </div>
  </div>
@endsection
