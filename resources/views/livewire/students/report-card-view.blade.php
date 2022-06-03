<div>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Student') }} #{{ $student->id }} Report Card
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="overflow-hidden shadow-xl sm:rounded-lg">


        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
          <div class="text-2xl flex justify-between items-center">
            <span>
              {{ __('Report Card') }} #{{ $reportCard->id }}
            </span>
            @if (!empty($current_report_card))
              <a href="{{ asset('/storage/' . $current_report_card) }}"
                target="_blank"
                class="text-blue-500 underline underline-offset-2 text-base">
                Current Report Card
              </a>
            @endif
          </div>

          <div class="mt-6 mb-6">


            <section name="content">
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
                <x-forms.text-area id="teachers_comment"
                  wire:model="teachers_comment" class="mt-1 block w-full" />
                <x-jet-input-error for="teachers_comment"
                  class="mt-2" />
              </div>

              <div class="col-span-6 sm:col-span-4 mt-3">
                <div class="flex justify-between">
                  <x-jet-label for="original_report_card_file"
                    value="{{ __('Original Report Card') }}" />
                  <span wire:loading
                    class="text-gray-600 text-xs">Uploading</span>
                </div>
                <x-forms.input-file id="original_report_card_file" type="file"
                  class="mt-1 block w-full"
                  wire:model.defer="original_report_card_file" />
                <x-jet-input-error for="original_report_card_file"
                  class="mt-2" />

              </div>
            </section>


            <div class=" flex justify-end w-full mt-6">
              <div wire:loading.attr="hidden">
                <x-jet-button class="ml-3" wire:click="updateRecord">
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
                    {{ __('Subject Grades') }}
                  </span>
                </div>
                <div>
                  <x-jet-button wire:click="confirmAddingItem">
                    {{ __('Add Grades') }}
                  </x-jet-button>
                </div>
              </div>
            </div>

            <div class="overflow-x-auto w-full">
              <table class="table-auto w-full">
                <thead>
                  <tr>
                    <th class="border px-4 py-2 bg-gray-100">ID</th>
                    <th class="border px-4 py-2 bg-gray-100">Subject</th>
                    <th class="border px-4 py-2 bg-gray-100">Mark</th>
                    <th class="border px-4 py-2 bg-gray-100">Grade
                    </th>
                    <th class="border px-4 py-2 bg-gray-100">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($subject_grades as $record)
                    <tr>
                      <td class="border px-4 py-2">{{ $record->id }}</td>
                      <td class="border px-4 py-2">
                        {{ ucfirst($record->subject_name) }}
                      </td>
                      <td class="border px-4 py-2 text-center">
                        {{ $record->mark }}</td>
                      <td class="border px-4 py-2 text-center">
                        {{ $record->grade }}</td>
                      <td class="border px-4 py-2 flex justify-center">
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
