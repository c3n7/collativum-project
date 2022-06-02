<div>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Student') }} #{{ $student->id }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="overflow-hidden shadow-xl sm:rounded-lg">


        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
          <div class="text-2xl flex justify-between">
            {{ __('Student Details') }}
          </div>

        </div>


      </div>
    </div>
  </div>
</div>
