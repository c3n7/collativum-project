<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
  <div class="text-2xl flex justify-between">
    Users
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
      {{ __('Add User') }}
    </x-slot>

    <x-slot name="content">
      <div class="col-span-6 sm:col-span-4">
        <x-jet-label for="name" value="{{ __('Name') }}" />
        <x-jet-input id="name" type="text" class="mt-1 block w-full"
          wire:model.defer="name" autocomplete="name" />
        <x-jet-input-error for="name" class="mt-2" />
      </div>

      <div class="col-span-6 sm:col-span-4 mt-3">
        <x-jet-label for="email" value="{{ __('Email') }}" />
        <x-jet-input id="email" type="email" class="mt-1 block w-full"
          wire:model.defer="email" autocomplete="email" />
        <x-jet-input-error for="email" class="mt-2" />
      </div>
    </x-slot>

    <x-slot name="footer">
      <x-jet-secondary-button wire:click="$toggle('addingItemToModel')"
        wire:loading.attr="disabled">
        {{ __('Cancel') }}
      </x-jet-secondary-button>

      <x-jet-button class="ml-3" wire:click="saveNewRecord"
        wire:loading.attr="disabled">
        {{ __('Save') }}
      </x-jet-button>
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
