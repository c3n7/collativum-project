@extends('layouts.app')

@section('content')
  <div class="w-screen h-screen flex justify-center items-center">
    <div class="w-4/12 bg-base-100 px-4 py-4 pb-6 rounded-lg">
      <div class="text-xl font-bold pt-2 pb-1 px-1">Sign In</div>
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

      <div class="form-control w-full">
        <label class="label">
          <span class="label-text">Password</span>
        </label>
        <input type="password" placeholder="password"
          class="input input-bordered w-full" />
        <!-- <label class="label">
                        <span class="label-text-alt">Alt label</span>
                      </label> -->
      </div>

      <div class="flex justify-between mt-2 items-center">
        <div class="form-control">
          <label class="label cursor-pointer">
            <input type="checkbox" class="checkbox checkbox-primary" />
            <span class="label-text ml-1 text-opacity-85"> Remember me </span>
          </label>
        </div>

        <a href="" class="text-primary font-semibold text-sm">
          Reset Password?
        </a>
      </div>

      <div class="mt-3 w-full">
        <button class="btn btn-primary w-full">Sign In</button>
      </div>
    </div>
  </div>
@endsection
