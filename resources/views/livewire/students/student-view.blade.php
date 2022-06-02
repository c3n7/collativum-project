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
          <div class="text-2xl flex justify-between items-center">
            <span>
              {{ __('Student Details') }}
            </span>
            @if (!empty($current_image))
              <img src="{{ asset('/storage/' . $current_image) }}" alt=""
                class="h-24 w-24 rounded-full object-cover">
            @endif
          </div>

          <div class="mt-6 mb-6">
            <div>

              <div>
                <div class="col-span-6 sm:col-span-4">
                  <x-jet-label for="name" value="{{ __('Name') }}" />
                  <x-jet-input id="name" type="text" class="mt-1 block w-full"
                    wire:model.defer="name" autocomplete="name" />
                  <x-jet-input-error for="name" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4 mt-3">
                  <x-jet-label for="brief_description"
                    value="{{ __('Brief Desription') }}" />
                  <x-jet-input id="brief_description" type="text"
                    wire:model="brief_description" class="mt-1 block w-full" />
                  <x-jet-input-error for="brief_description"
                    class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4 mt-3">
                  <x-jet-label for="background"
                    value="{{ __('Background') }}" />
                  <x-forms.text-area id="background" type="Background"
                    wire:model="background" class="mt-1 block w-full" />
                  <x-jet-input-error for="background" class="mt-2" />
                </div>

                <div class="grid grid-cols-2 gap-8 mt-3">
                  <div class="">
                    <x-jet-label for="dob"
                      value="{{ __('Date of Birth') }}" />
                    <x-jet-input id="dob" type="date" class="mt-1 block w-full"
                      wire:model.defer="dob" />
                    <x-jet-input-error for="dob" class="mt-2" />
                  </div>

                  <div class="">
                    <x-jet-label for="kcpe_marks"
                      value="{{ __('KCPE Marks') }}" />
                    <x-jet-input id="kcpe_marks" type="number"
                      class="mt-1 block w-full" wire:model.defer="kcpe_marks" />
                    <x-jet-input-error for="kcpe_marks"
                      class="mt-2" />
                  </div>
                </div>

                <div class="col-span-6 sm:col-span-4 mt-3">
                  <x-jet-label for="high_school_name"
                    value="{{ __('High School Name') }}" />
                  <x-jet-input id="high_school_name" type="text"
                    class="mt-1 block w-full"
                    wire:model.defer="high_school_name" />
                  <x-jet-input-error for="high_school_name"
                    class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4 mt-3">
                  <x-jet-label for="ambition" value="{{ __('Ambition') }}" />
                  <x-jet-input id="ambition" type="text"
                    class="mt-1 block w-full" wire:model.defer="ambition" />
                  <x-jet-input-error for="ambition" class="mt-2" />
                </div>

                <div class="grid grid-cols-2 gap-8 mt-3">
                  <div class="">
                    <x-jet-label for="siblings"
                      value="{{ __('Siblings') }}" />
                    <x-jet-input id="siblings" type="number"
                      class="mt-1 block w-full" wire:model.defer="siblings" />
                    <x-jet-input-error for="siblings" class="mt-2" />
                  </div>

                  <div class="">
                    <x-jet-label for="language"
                      value="{{ __('Language') }}" />
                    <x-jet-input id="language" type="text"
                      class="mt-1 block w-full" wire:model.defer="language" />
                    <x-jet-input-error for="language" class="mt-2" />
                  </div>
                </div>

                <div class="grid grid-cols-2 gap-8 mt-3">
                  <div class="">
                    <x-jet-label for="liaison_officer"
                      value="{{ __('Liaison Officer') }}" />
                    <x-jet-input id="liaison_officer" type="text"
                      class="mt-1 block w-full"
                      wire:model.defer="liaison_officer" />
                    <x-jet-input-error for="liaison_officer"
                      class="mt-2" />
                  </div>

                  <div class="">
                    <div class="flex justify-between">
                      <x-jet-label for="image"
                        value="{{ __('Student Photo') }}" />
                      <span wire:loading
                        class="text-gray-600 text-xs">Uploading</span>
                    </div>
                    <x-forms.input-file id="image" type="file"
                      class="mt-1 block w-full" wire:model.defer="image" />
                    <x-jet-input-error for="image" class="mt-2" />
                  </div>
                </div>
              </div>

              <div class=" flex justify-end w-full mt-6">
                <div wire:loading.attr="hidden">
                  <x-jet-button class="ml-3"
                    wire:click="updateRecord">
                    {{ __('Update') }}
                  </x-jet-button>
                </div>

                <div wire:loading>
                  <x-jet-button class="ml-3" disabled>
                    {{ __('Wait') }}
                  </x-jet-button>

                </div>
              </div>
            </div>
          </div>

        </div>


      </div>
    </div>
  </div>
</div>
