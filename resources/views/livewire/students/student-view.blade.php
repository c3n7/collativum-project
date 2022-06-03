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

  <div class="pb-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="overflow-hidden shadow-xl sm:rounded-lg">


        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

          <div class="">

            <!-- Name -->
            <div class="col-span-6 sm:col-span-4 mb-3">
              <div class="flex justify-between items-center">
                <div class="text-2xl flex justify-between items-center">
                  <span>
                    {{ __('Report Cards') }}
                  </span>
                </div>
                <div>
                  <x-jet-button wire:click="confirmAddingItem">
                    {{ __('Add Report Card') }}
                  </x-jet-button>
                </div>
              </div>
            </div>

            <div class="overflow-x-auto w-full">
              <table class="table-auto w-full">
                <thead>
                  <tr>
                    <th class="border px-4 py-2 bg-gray-100">ID</th>
                    <th class="border px-4 py-2 bg-gray-100">Term</th>
                    <th class="border px-4 py-2 bg-gray-100">Year</th>
                    <th class="border px-4 py-2 bg-gray-100">Teacher's Comment
                    </th>
                    <th class="border px-4 py-2 bg-gray-100">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($report_cards as $record)
                    <tr>
                      <td class="border px-4 py-2">{{ $record->id }}</td>
                      <td class="border px-4 py-2">{{ $record->term }}</td>
                      <td class="border px-4 py-2">{{ $record->year }}</td>
                      <td class="border px-4 py-2">
                        {{ substr($record->teachers_comment, 0, 20) }}
                      </td>
                      <td class="border px-4 py-2 flex justify-center">
                        <a href="{{ route('students.view', $record->id) }}">
                          <x-jet-button class="ml-3">
                            {{ __('View') }}
                          </x-jet-button>
                        </a>

                        <x-jet-danger-button class="ml-3"
                          wire:click="confirmDeletingItem({{ $record->id }})">
                          {{ __('Delete') }}
                        </x-jet-danger-button>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>

          </div>

        </div>


      </div>
    </div>
  </div>

  <x-jet-dialog-modal wire:model="deletingItemFromModel">
    <x-slot name="title">
      {{ __('Delete Record') }}
    </x-slot>

    <x-slot name="content">
      {{ __('Are you sure you want to delete the selected record? This operation can not be reversed.') }}
    </x-slot>

    <x-slot name="footer">
      <x-jet-secondary-button wire:click="$set('deletingItemFromModel', false)"
        wire:loading.attr="disabled">
        {{ __('Cancel') }}
      </x-jet-secondary-button>

      <x-jet-danger-button class="ml-3"
        wire:click="deleteRecord({{ $deletingItemFromModel }})"
        wire:loading.attr="disabled">
        {{ __('Delete') }}
      </x-jet-danger-button>
    </x-slot>
  </x-jet-dialog-modal>


  <x-jet-dialog-modal wire:model="addingItemToModel">
    <x-slot name="title">
      {{ __('Add Report Card') }}
    </x-slot>

    <x-slot name="content">
      <div class="grid grid-cols-2 gap-8 mt-3">
        <div class="">
          <x-jet-label for="term" value="{{ __('Term') }}" />
          <x-jet-input id="term" type="number" class="mt-1 block w-full"
            wire:model.defer="term" />
          <x-jet-input-error for="term" class="mt-2" />
        </div>

        <div class="">
          <x-jet-label for="year" value="{{ __('Year') }}" />
          <x-jet-input id="year" type="number" class="mt-1 block w-full"
            wire:model.defer="year" />
          <x-jet-input-error for="year" class="mt-2" />
        </div>
      </div>


      <div class="col-span-6 sm:col-span-4 mt-3">
        <x-jet-label for="tearchers_comment"
          value="{{ __('Teacher Comments') }}" />
        <x-forms.text-area id="teachers_comment" wire:model="teachers_comment"
          class="mt-1 block w-full" />
        <x-jet-input-error for="teachers_comment" class="mt-2" />
      </div>

      <div class="col-span-6 sm:col-span-4 mt-3">
        <div class="flex justify-between">
          <x-jet-label for="original_report_card_file"
            value="{{ __('Original Report Card') }}" />
          <span wire:loading class="text-gray-600 text-xs">Uploading</span>
        </div>
        <x-forms.input-file id="original_report_card_file" type="file"
          class="mt-1 block w-full"
          wire:model.defer="original_report_card_file" />
        <x-jet-input-error for="original_report_card_file"
          class="mt-2" />

      </div>
    </x-slot>

    <x-slot name="footer">
      <x-jet-secondary-button wire:click="$toggle('addingItemToModel')"
        wire:loading.attr="disabled">
        {{ __('Cancel') }}
      </x-jet-secondary-button>

      <div wire:loading.attr="hidden">
        <x-jet-button class="ml-3" wire:click="saveNewRecord">
          {{ __('Save') }}
        </x-jet-button>
      </div>

      <div wire:loading>
        <x-jet-button class="ml-3" disabled>
          {{ __('Wait') }}
        </x-jet-button>

      </div>
    </x-slot>
  </x-jet-dialog-modal>
</div>
