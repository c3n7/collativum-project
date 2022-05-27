@extends('layouts.app')

@section('content')
  <div class="flex flex-col justify-start items-center min-h-screen">
    <x-auth.nav-bar />

    <div class="h-full w-10/12 mt-2">
      <div class="text-xl font-bold pt-2 pb-1 px-1">Add User</div>
      <form class="bg-base-100 px-4 py-4 pb-6 rounded-lg flex flex-wrap"
        action="{{ route('auth.register') }}" method="post">
        @csrf

        <div class="form-control w-full">
          <label class="label">
            <span class="label-text">Name</span>
          </label>
          <input type="text" placeholder="Name" name="name"
            class="input input-bordered w-full" />
          @error('name')
            <label class="label">
              <span class="label-text-alt text-error">{{ $message }}</span>
            </label>
          @enderror
        </div>

        <div class="form-control w-full">
          <label class="label">
            <span class="label-text">Email</span>
          </label>
          <input type="email" placeholder="Email" name="email"
            class="input input-bordered w-full" />
          @error('email')
            <label class="label">
              <span class="label-text-alt text-error">{{ $message }}</span>
            </label>
          @enderror
        </div>

        <div class="mt-3 w-full">
          <button class="btn btn-primary gap-2">
            <i class="fa-solid fa-save"></i>
            Save
          </button>
        </div>

      </form>
    </div>
  </div>
@endsection
