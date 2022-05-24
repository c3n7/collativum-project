@extends('layouts.app')

@section('content')
  <div class="w-screen h-screen flex justify-center items-center">
    <div class="w-4/12 bg-base-100 px-3 py-4 pb-6 rounded-lg">
      <div class="text-xl font-bold pt-2 pb-1 px-1">Forgot Password</div>
      <div class="form-control w-full">
        <label class="label">
          <span class="label-text">Email</span>
        </label>
        <input type="text" placeholder="Email"
          class="input input-bordered w-full" />
        <!-- <label class="label">
              <span class="label-text-alt">Alt label</span>
            </label> -->
      </div>

      <div class="mt-3 w-full">
        <button class="btn btn-primary w-full">Reset Password</button>
      </div>
    </div>
  </div>
@endsection
