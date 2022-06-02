<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
  <div class="text-2xl flex justify-between">
    {{ __('Students') }}
  </div>

  <div class="mt-6">

    <!-- Name -->
    <div class="col-span-6 sm:col-span-4 mb-3">
      <div class="flex justify-between items-center">
        <div>
          <x-jet-input type="search" class="mt-1 block w-fit"
            wire:model.debounce.250ms="search_term" placeholder="Search" />
          <x-jet-input-error for="search_term" class="mt-2" />
        </div>
        <div>
          <x-jet-button wire:click="confirmAddingItem">
            {{ __('Add Student') }}
          </x-jet-button>
        </div>
      </div>
    </div>

    <div class="overflow-x-auto w-full">
      <table class="table-auto w-full">
        <thead>
          <tr>
            <th class="border px-4 py-2 bg-gray-100">ID</th>
            <th class="border px-4 py-2 bg-gray-100">Name</th>
            <th class="border px-4 py-2 bg-gray-100">High School</th>
            <th class="border px-4 py-2 bg-gray-100">Age</th>
            <th class="border px-4 py-2 bg-gray-100">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($students as $record)
            <tr>
              <td class="border px-4 py-2">{{ $record->id }}</td>
              <td class="border px-4 py-2">{{ $record->name }}</td>
              <td class="border px-4 py-2">
                {{ ucwords($record->high_school_name) }}
              </td>
              <td class="border px-4 py-2 text-center">
                {{ $record->dob->diffInYears() }}
              </td>
              <td class="border px-4 py-2 flex justify-center">
                <x-jet-button class="ml-3">
                  {{ __('View') }}
                  </x-jet-danger-button>

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

  <div class="mt-4">{{ $students->links() }}</div>

  <x-jet-dialog-modal wire:model="addingItemToModel">
    <x-slot name="title">
      {{ __('Add Student') }}
    </x-slot>

    <x-slot name="content">
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
          class="mt-1 block w-full" autocomplete="brief_description" />
        <x-jet-input-error for="brief_description" class="mt-2" />
      </div>

      <div class="col-span-6 sm:col-span-4 mt-3">
        <x-jet-label for="background" value="{{ __('Background') }}" />
        <x-forms.text-area id="background" type="Background"
          class="mt-1 block w-full" autocomplete="background" />
        <x-jet-input-error for="background" class="mt-2" />
      </div>

      <div class="grid grid-cols-2 gap-8 mt-3">
        <div class="">
          <x-jet-label for="dob" value="{{ __('Date of Birth') }}" />
          <x-jet-input id="dob" type="date" class="mt-1 block w-full"
            wire:model.defer="dob" />
          <x-jet-input-error for="dob" class="mt-2" />
        </div>

        <div class="">
          <x-jet-label for="kcpe_marks" value="{{ __('KCPE Marks') }}" />
          <x-jet-input id="kcpe_marks" type="number" class="mt-1 block w-full"
            wire:model.defer="kcpe_marks" />
          <x-jet-input-error for="kcpe_marks" class="mt-2" />
        </div>
      </div>

      <div class="col-span-6 sm:col-span-4 mt-3">
        <x-jet-label for="high_school_name"
          value="{{ __('High School Name') }}" />
        <x-jet-input id="high_school_name" type="text" class="mt-1 block w-full"
          wire:model.defer="high_school_name" />
        <x-jet-input-error for="high_school_name" class="mt-2" />
      </div>

      <div class="col-span-6 sm:col-span-4 mt-3">
        <x-jet-label for="ambition" value="{{ __('Ambition') }}" />
        <x-jet-input id="ambition" type="text" class="mt-1 block w-full"
          wire:model.defer="ambition" />
        <x-jet-input-error for="ambition" class="mt-2" />
      </div>

      <div class="grid grid-cols-2 gap-8 mt-3">
        <div class="">
          <x-jet-label for="siblings" value="{{ __('Siblings') }}" />
          <x-jet-input id="siblings" type="number" class="mt-1 block w-full"
            wire:model.defer="siblings" />
          <x-jet-input-error for="siblings" class="mt-2" />
        </div>

        <div class="">
          <x-jet-label for="language" value="{{ __('Language') }}" />
          <x-jet-input id="language" type="text" class="mt-1 block w-full"
            wire:model.defer="language" />
          <x-jet-input-error for="language" class="mt-2" />
        </div>
      </div>

      <div class="grid grid-cols-2 gap-8 mt-3">
        <div class="">
          <x-jet-label for="liaison_officer"
            value="{{ __('Liaison Officer') }}" />
          <x-jet-input id="liaison_officer" type="text"
            class="mt-1 block w-full" wire:model.defer="liaison_officer" />
          <x-jet-input-error for="liaison_officer" class="mt-2" />
        </div>

        <div class="">
          <div class="flex justify-between">
            <x-jet-label for="image" value="{{ __('Student Photo') }}" />
            <span wire:loading class="text-gray-600 text-xs">Uploading</span>
          </div>
          <x-forms.input-file id="image" type="file" class="mt-1 block w-full"
            wire:model.defer="image" />
          <x-jet-input-error for="image" class="mt-2" />
        </div>
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

  <x-jet-dialog-modal wire:model="deletingItemFromModel">
    <x-slot name="title">
      {{ __('Delete Student') }}
    </x-slot>

    <x-slot name="content">
      {{ __('Are you sure you want to delete the selected student? This operation can not be reversed.') }}
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
</div>
